<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Slider;
use App\Category;
use App\Message;
use App\Mail\NewMessage;
use App\Mail\RecievedMessage;
use Mail;
use Validator;
use Illuminate\Support\Str;

class FrontController extends Controller
{
    public function index()
    {
        $slides = Slider::where('enabled', 1)->take(3)->get();
        $categories = Category::all();
        return view('frontend.index', ['slides' => $slides, 'categories' => $categories]);
    }

    public function category($category)
    {
      $cat = Category::where('slug', $category)->get()->pop();
      //dd($cat);
      $articles = Article::whereHas('categories', function($query) use ($category) {
        $query->where('categories.slug', $category); })->orderBy('title')->get();
      //dd($articles);
      //Obtener todos los id de artículos
      //$article_ids = collect($articles)->pluck('id');
      $categories = Category::all();
      return view('frontend.category', ['articles' => $articles, 'categories' => $categories, 'currentcat' => $cat]);
    }

    public function articleBySlug($article_slug, $currentcat = null)
    {
      // Decode JSON to PHP array
      $main = Article::where('slug', $article_slug)->get()->pop();
      //dd($a);
      $category = json_decode($main->categories()->get());
      // If it's an array
      if (is_array($category)){
        //Obtener todos los id de categoria
        $category_ids = collect($category)->pluck('id');
        $articles = Article::whereHas('categories', function($query) use ($category_ids) {
          // Assuming your category table has a column id
          $query->whereIn('categories.id', $category_ids);
        })->orderBy('title')->get();

        // Excluye el artículo que estás viendo
        $filtered_articles = $articles->filter(function ($current, $key) use ($main)
        {
          return ($current->id != $main->id);
        });

        //dd($filtered_articles);
      } else {
        dd('Not an array (bad url parameter)');
      }
        //dd($articles);

        $categories = Category::all();
        return view('frontend.article', ['main' => $main, 'related' => $filtered_articles, 'categories' => $categories, 'currentcat' => $currentcat]);
    }


    public function messagesend(Request $request)
    {
      $input = $request->all();
      //dd($input);

      $rules = [
       'name' => 'required|max:64|unique:categories,name',
       'email' => 'required|email',
       'phone' => 'required|numeric'
      ];
      $messages = [
          'name.required' => 'El campo "nombre" es obligatorio.',
          'name.max' => 'El nombre debe tener de menos de 64 caracteres.',
          'email.required' => 'el campo "email" es obligatorio',
          'email.email' => 'La el correo no es una dirección válida.',
          'phone.required' => 'El campo "Teléfono" es obligatorio',
          'phone.numeric' => 'El campo "Teléfono" debe contener sólo números.'
      ];
     $validator = Validator::make($input, $rules, $messages);
     if ( $validator->fails() ) {
     return redirect('/#contacto')
                 ->withErrors( $validator )
                 ->withInput();
      } else {
       $message = Message::create([
        'name' => $input['name'],
        'phone' => $input['phone'],
        'email' => $input['email'],
        'message' => $input['message']
       ]);
       //$mall = Message::all();
       //dd($mall,$message);
       Mail::to('contacto@casaralero.com.mx')->send(new NewMessage($message));
       Mail::to($message->email)->send(new RecievedMessage($message));
       return redirect()->route('front.index');
      }
    }
}
