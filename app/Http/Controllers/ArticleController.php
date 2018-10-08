<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use App\Article;
use App\Category;
use App\Pic;
use Validator;
use Image;
use File;

class ArticleController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index(Request $request)
  {

    //dd($request->all());
    $search = $request->search;
    $category = $request->category;

    // Si hay búsqueda
    if (isset($search)) {
      $articles = Article::Title($search)->get();
    } else {
      $articles = Article::orderBy('title')->get();
    }

    // Si hay categoría
    if (isset($category)) {
      // Filtrar articulos por categoria
      $filtered = $articles->reject(function ($a, $key) use ($category) { // Por cada articulo
        $filter = true;
        foreach ($a->categories as $c) { // Por cada categoria del articulo
          if ($c->slug == $category) { // Si el articulo contiene la categoria que se busca
            $filter = false; // No filtrar
          }
        }
        return $filter;
      });

      $articles = $filtered;
    }

    $categories = Category::all();
    return view('backend.article.index', ['articles' => $articles, 'search' => $search, 'categories' => $categories]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $categories = Category::all();
    return view('backend.article.create', ['categories' => $categories]);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    //dd($request->all());
    $input = $request->all();

    $rules = [
      'title' => 'unique:articles|required|max:255',
      'content' => 'required',
      'meta_descr' => 'required',
      'page_title' => 'required',
      // 'image' => 'required',
      // 'image.*' => 'mimes:jpeg,png,jpg|max:400',
      // 'bg_img' => 'required|mimes:jpeg,png,jpg|max:400',
      'pdf' => 'required|mimes:pdf,jpeg,png,jpg',
    ];
    $messages = [
      'title.unique' => 'Ya existe un Atrículo con este nombre',
      'title.required' => 'El campo "título" es obligatorio',
      'meta_descr.required' => 'El campo "meta descripción" es obligatorio',
      'page_title.required' => 'El campo "título" es obligatorio',
      'content.required' => 'El campo "contenido" es obligatorio',
      'image.required' => 'Debes subir una foto',
      'image.mimes' => 'El archivo debe ser una imagen en jpeg, png o jpg',
      'image.max' => 'La imagen no debe pesar más de 400KB',
      'bg_img.required' => 'Debes subir una foto de fondo',
      'bg_img.mimes' => 'La foto de fondo debe ser una imagen en jpeg, png o jpg',
      'bg_img.max' => 'La imagen no debe pesar más de 400KB',
      'pdf.required' => 'Debes subir una ficha técnica en formato pdf, jpeg, png o jpg',
      'pdf.mimes' => 'La ficha técnica debe estar en formato pdf',
      'pdf.max' => 'La ficha técnica debe pesar menos de 2 Mb',
    ];

    $validator = Validator::make($input, $rules, $messages);
    if ($validator->fails()) {
      return redirect('articles/create')
      ->withErrors($validator)
      ->withInput();
    } else {
      $a = new Article;
      $a->title = $request->input('title');
      $a->content = $request->input('content');
      $a->meta_descr = $request->input('meta_descr');
      $a->page_title = $request->input('page_title');
      $a->slug = Str::slug($request->input('title'));

      /*
      // Guardar imagen de fondo
      $file = Input::file('bg_img');
      $file_name = str_random(16).'.'.$file->getClientOriginalExtension();
      $a->bg_img = Article::$image_path.'/bg/'.$file_name;
      $request->bg_img->move(Article::$image_path.'/bg/', $file_name);
      */


      // Ficha técnica PDF
      $file = Input::file('pdf');
      $file_name = $a->slug.'.'.$file->getClientOriginalExtension();
      $a->pdf = Article::$pdf_path.$file_name;
      $request->pdf->move(Article::$pdf_path, $file_name);
      $a->save();

      /*
      //  Guardar una o varias imagenes de frente
      foreach ($request->image as $image) {
      $file_name = str_random(16).'.'.$image->getClientOriginalExtension();
      $pic = new Pic;
      $pic->path = Article::$image_path.$file_name;
      $image->move(Article::$image_path, $file_name);
      $a->pics()->save($pic);
    }
    */
    // Sincronizar Categorias
    $a->categories()->sync($request->input('category'));
    //return redirect()->action('ArticleController@storeImagesForm', ['id' => $a->id]);

		$categories = Category::all();
		$article = Article::find($a->id); // Refrescar Articulo
		return view('backend.article.edit', ['article' => $article, 'categories' => $categories]);
    //return redirect('articles/');
  }
}

// Regresa la forma para subir imágenes
public function storeImagesForm(Request $request, $id)
{
  $article = Article::find($id);
  return view('backend.article.add_images', ['article' => $article]);
}

// Sube imágenes de producto
public function storeArticleImages(Request $request, $id)
{

  //  Crear Imagen
  $rawfile = Input::file('file');
	$file = array_slice($rawfile, 0, 3);// Tomar solo los primeros 4
  //dd($image);
  $a= Article::find($id);
  for ($i=0; $i < count($file); $i++) {
    $file_name =str_random(16).'.'.$file[$i]->getClientOriginalExtension();
    $pic = new Pic;
    $pic->path = Article::$image_path.$file_name;
    $file[$i]->move(Article::$image_path, $file_name);
    $a->pics()->save($pic);
  }
  return response()->json([
    'message' => 'Image saved Successfully'
  ], 200);
}
// Sube imágenes de fondo de producto
public function storeBackgroundImage(Request $request, $id)
{
  //  Crear Imagen
  $file = Input::file('file');
  //dd($file);

	$a= Article::find($id);

	// Borrar la vieja imagen
	$oldfile = $a->bg_img;
  $filename = public_path($oldfile);
  File::delete($filename);

  // Guardar nueva imagen
  $file_name =str_random(16).'.'.$file[0]->getClientOriginalExtension();
  $a->bg_img = Article::$image_path.'bg/'.$file_name;
  $file[0]->move(Article::$image_path.'bg/', $file_name);
  $a->save();

  return response()->json([
    'message' => 'Image saved Successfully'
  ], 200);
}

// Regresa la forma para subir imágenes
public function updateImagesForm(Request $request, $id)
{
  return view('backend.article.add_images', ['id' => $id]);
}

// Sube imágenes
// public function updateImages(Request $request, $id)
// {
//   $input = $request->all();
//
//
//   $rules = [
//     'imagen' => 'required',
//     'imagen.*' => 'mimes:jpeg,png,jpg|max:400',
//     'bg_img' => 'required|mimes:jpeg,png,jpg|max:400',
//   ];
//   $messages = [
//     'imagen.required' => 'Debes subir una foto',
//     'imagen.mimes' => 'El archivo debe ser una imagen en jpeg, png o jpg',
//     'imagen.max' => 'La imagen no debe pesar más de 400KB',
//     'bg_img.required' => 'Debes subir una foto de fondo',
//     'bg_img.mimes' => 'La foto de fondo debe ser una imagen en jpeg, png o jpg',
//     'bg_img.max' => 'La imagen no debe pesar más de 400KB',
//   ];
//
//   $validator = Validator::make($input, $rules, $messages);
//   if ($validator->fails()) {
//     return redirect('articles/create')
//     ->withErrors($validator)
//     ->withInput();
//   } else {
//
//     // Guardar imagen de fondo
//     $file = Input::file('bg_img');
//     $file_name = str_random(16).'.'.$file->getClientOriginalExtension();
//     $a->bg_img = Article::$image_path.'/bg/'.$file_name;
//     $request->bg_img->move(Article::$image_path.'/bg/', $file_name);
//
//     //  Guardar una o varias imagenes de frente
//     foreach ($request->imagen as $image) {
//       $file_name = str_random(16).'.'.$image->getClientOriginalExtension();
//       $pic = new Pic;
//       $pic->path = Article::$image_path.$file_name;
//       $image->move(Article::$image_path, $file_name);
//       $a->pics()->save($pic);
//     }
//     return redirect('articles/');
//   }
// }
/**
* Display the specified resource.
*
* @param  \App\Article  $article
* @return \Illuminate\Http\Response
*/
public function show(Article $article)
{
  return view('backend.article.show', ['article' => $article]);
}

/**
* Show the form for editing the specified resource.
*
* @param  \App\Article  $article
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
  $categories = Category::all();
  $article = Article::find($id);
  return view('backend.article.edit', ['article' => $article, 'categories' => $categories]);
}

/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  \App\Article  $article
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
  //dd($request->all());
  $input = $request->all();
  $a = Article::find($id);

  $rules = [
    'title' => 'unique:articles,title,'.$a->id.'|required|max:255',
    'content' => 'required',
    'meta_descr' => 'required',
    'page_title' => 'required',
    'imagen.*' => 'mimes:jpeg,png,jpg|max:400',
    'bg_img' => 'mimes:jpeg,png,jpg|max:400',
    'pdf' => 'mimes:pdf,jpeg,png,jpg',
  ];
  $messages = [
    'title.unique' => 'Ya existe un Atrículo con este nombre',
    'title.required' => 'El campo "título" es obligatorio',
    'meta_descr.required' => 'El campo "meta descripción" es obligatorio',
    'page_title.required' => 'El campo "título" es obligatorio',
    'content.required' => 'El campo "contenido" es obligatorio',
    'imagen.mimes' => 'El archivo debe ser una imagen en jpeg, png o jpg',
    'imagen.max' => 'La imagen no debe pesar más de 400KB',
    'bg_img.mimes' => 'La foto de fondo debe ser una imagen en jpeg, png o jpg',
    'bg_img.max' => 'La imagen no debe pesar más de 400KB',
    'pdf.mimes' => 'La ficha técnica debe estar en formato pdf, jpeg, png o jpg',
    'pdf.max' => 'La ficha técnica debe pesar menos de 2 Mb',
  ];

  $validator = Validator::make($input, $rules, $messages);
  if ($validator->fails()) {
    return redirect('articles/'.$id.'/edit')
    ->withErrors($validator)
    ->withInput();
  } else {
    //dd($request->imagen);
    $a->title = $request->input('title');
    $a->content = $request->input('content');
    $a->meta_descr = $request->input('meta_descr');
    $a->page_title = $request->input('page_title');

    // Si hay bg_img
    if ($request->bg_img) {
      // Eliminar vieja Imagen de fondo
      $oldfile = public_path($a->bg_img);
      File::delete($oldfile);
      // Guardar nueva imagen de fondo
      $file = Input::file('bg_img');
      $file_name = str_random(16).'.'.$file->getClientOriginalExtension();
      $a->bg_img = Article::$image_path.'bg/'.$file_name;
      $request->bg_img->move(Article::$image_path.'/bg/', $file_name);
    }

    if ($request->image) {
      // Obtener todas las imagenes viejas
      $pics = Pic::where('article_id', $a->id)->get();
      // Eliminar todas las imagenes viejas
      foreach ($pics as $p) {
        $file = $p->path;
        $filename = public_path($file);
        File::delete($filename);
        $p->delete();
      }
      //  Guardar una o varias imagenes de frente
      foreach ($request->image as $image) {
        $file_name = str_random(16).'.'.$image->getClientOriginalExtension();
        $pic = new Pic;
        $pic->path = Article::$image_path.$file_name;
        $image->move(Article::$image_path, $file_name);
        $a->pics()->save($pic);
      }
    }
    //Guardar pdf
    if ($request->pdf) {
      // Eliminar viejo pdf
      $oldfile = public_path($a->pdf);
      File::delete($oldfile);
      // Ficha técnica PDF
      $file = Input::file('pdf');
      $file_name = $a->slug.'.'.$file->getClientOriginalExtension();
      $a->pdf = Article::$pdf_path.$file_name;
      $request->pdf->move(Article::$pdf_path, $file_name);
    }

    $a->save();
    $a->categories()->sync($request->input('category'));

    return redirect('articles/');
  }
}

/**
* Remove the specified resource from storage.
*
* @param  \App\Article  $article
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
  $a = Article::find($id);

  // Eliminar imagen de fondo
  $oldfile = public_path($a->bg_img);
  File::delete($oldfile);

  // Eliminar todas las imagenes
  $pics = Pic::where('article_id', $a->id)->get();
  foreach ($pics as $p) {
    $file = $p->path;
    $filename = public_path($file);
    File::delete($filename);
    $p->delete();
  }

  // Eliminar pdf
  $oldfile = public_path($a->pdf);
  File::delete($oldfile);

  $a->delete();
  return redirect('articles/');
}

/**
* Add a category to the article.
*
* @param  \App\Article  $a
* @param  \App\Category  $c
* @return \Illuminate\Http\Response
*/
public function addCategory(Article $a, Category $c)
{
  // Save category $c without detaching other categories
  $a->categories()->sync($c, false);
}
//
//
// public function searchResults(Request $request)
// {
//   //dd($request->all());
//   $title = $request->title;
//   $category = $request->category;
//   $categories = Category::all();
//   $articles = Article::Title($title)->get();
//
//   if ($category != '') {
//     $art = $articles->reject(function ($a, $key) use ($category) {
//       foreach ($a->categories as $c) {
//         if ($c->slug == $category) {
//           return false;
//         }
//       }
//       return true;
//     });
//   }
//   dd($art);
//   return view('backend.article.index', ['articles' => $art, 'title' => $title, 'categories' => $categories]);
// }
public function eraseBackgroundImage($id)
{
  $a = Article::find($id);
  $file = $a->bg_img;
  $filename = public_path($file);
  File::delete($filename);
  $a->bg_img = null;
  $a->save();
  return redirect()->back();

}

public function eraseArticleImage($id)
{
  $pic = Pic::find($id);
  $file = $pic->path;
  $filename = public_path($file);
  File::delete($filename);
  $pic->delete();
  return redirect()->back();
}
}
