<?php

namespace App\Http\Controllers;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use Image;
use File;

class SliderController extends Controller
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
    public function index()
    {
        $sliders = Slider::all();
        return view('backend.slider.index', ['sliders' => $sliders]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.slider.create');
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
       'title' => 'required|max:64',
       'description' => 'required|max:512',
       'image' => 'required|mimes:jpeg,png,jpg|max:800',
       'bg_img' => 'required|mimes:jpeg,png,jpg|max:800'
      ];
      $messages = [
        'title.required' => 'El campo "título" es obligatorio',
        'title.max' => 'El campo "título" debe ser de menos de 64 caracteres',
        'description.required' => 'El campo "descripción" es obligatorio',
        'description.max' => 'El campo "descripción" debe ser de menos de 512 caracteres',
        'image.required' => 'Debes subir una foto de frente',
        'image.mimes' => 'La foto de frente debe ser jpeg, png o jpg',
        'image.max' => 'La imagen de frente no debe pesar más de 800KB',
        'bg_img.required' => 'Debes subir una foto de frente',
        'bg_img.mimes' => 'La foto de frente debe ser jpeg, png o jpg',
        'bg_img.max' => 'La imagen de frente no debe pesar más de 800KB'
      ];

       $validator = Validator::make($input, $rules, $messages);
       if ( $validator->fails() ) {
         return redirect('sliders/create')
           ->withErrors( $validator )
           ->withInput();
        } else {

          $s = new Slider;
          $s->title = $request->input('title');
          $s->description = $request->input('description');
          $s->url = $request->input('url');

          //  Crear Imagen
          $file = Input::file('image');
          $file_name = str_random(16).'.'.$file->getClientOriginalExtension();
          $img_path = Slider::$image_path.$file_name;
          $request->imagen->move(Slider::$image_path, $file_name);
          $s->image = $img_path;

          //  Crear Imagen de fondo
          $bgfile = Input::file('bg_img');
          $file_name = str_random(16).'.'.$bgfile->getClientOriginalExtension();
          $img_path = Slider::$image_path.'/bg/'.$file_name;
          $request->imagen->move(Slider::$image_path.'/bg/', $file_name);
          $s->bg_img = $img_path;


          if ($request->input('enabled')) {
              $s->enabled = true;
          }

          $s->save();
          return redirect('sliders/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = Slider::find($id);
        return view('backend.slider.edit', ['slide' => $slide]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $input = $request->all();
        $rules = [
         'title' => 'required|max:64',
         'description' => 'required|max:512',
         'image' => 'mimes:jpeg,png,jpg|max:800',
         'bg_img' => 'mimes:jpeg,png,jpg|max:800'
        ];
        $messages = [
          'title.required' => 'El campo "título" es obligatorio',
          'title.max' => 'El campo "título" debe ser de menos de 64 caracteres',
          'description.required' => 'El campo "descripción" es obligatorio',
          'description.max' => 'El campo "descripción" debe ser de menos de 512 caracteres',
          'image.mimes' => 'La foto de frente debe ser jpeg, png o jpg',
          'image.max' => 'La imagen de frente no debe pesar más de 800KB',
          'bg_img.mimes' => 'La foto de frente debe ser jpeg, png o jpg',
          'bg_img.max' => 'La imagen de frente no debe pesar más de 800KB'
        ];

       $validator = Validator::make($input, $rules, $messages);
       if ( $validator->fails() ) {
         return redirect('sliders/'.$id.'/edit')
           ->withErrors( $validator )
           ->withInput();
        } else {
            $s = Slider::find($id);

            // Si hay image
            if ($request->image) {
              // Eliminar vieja Imagen de fondo
              $oldfile = public_path($s->image);
              File::delete($oldfile);
              // Guardar nueva imagen de fondo
              $file = Input::file('image');
              $file_name = str_random(16).'.'.$file->getClientOriginalExtension();
              $s->image = Slider::$image_path.'/bg/'.$file_name;
              $request->image->move(Slider::$image_path.'/bg/', $file_name);
            }

            // Si hay bg_img
            if ($request->bg_img) {
              // Eliminar vieja Imagen de fondo
              $oldfile = public_path($s->bg_img);
              File::delete($oldfile);
              // Guardar nueva imagen de fondo
              $file = Input::file('bg_img');
              $file_name = str_random(16).'.'.$file->getClientOriginalExtension();
              $s->bg_img = Slider::$image_path.'/bg/'.$file_name;
              $request->bg_img->move(Slider::$image_path.'/bg/', $file_name);
            }

            $s->title = $request->input('title');
            $s->description = $request->input('description');
            $s->url = $request->input('url');

            if ($request->input('activado')) {
                $s->enabled = true;
            } else {
                $s->enabled = false;
            }
            $s->save();
            return redirect('sliders/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $s = Slider::find($id);
        // Eliminar vieja Imagen
        $oldfile = public_path($s->image);
        File::delete($oldfile);
        // Eliminar vieja Imagen de fondo
        $oldfile = public_path($s->bg_img);
        File::delete($oldfile);

        $s->delete();
        return redirect('sliders/');
    }
}
