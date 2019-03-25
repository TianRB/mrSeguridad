<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Slider;
use App\Category;
use App\Message;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterMail;
use App\Mail\ContactoMail;
use App\Mail\RecievedMail;
use Validator;
use Illuminate\Support\Str;

class FrontController extends Controller
{
	public function index()
	{
		$slides = Slider::where('enabled', 1)->get();
		$categories = Category::all();
		return view('frontend.index', ['slides' => $slides, 'categories' => $categories]);
	}
	public function contacto()
	{
		$slides = Slider::where('enabled', 1)->take(3)->get();
		$categories = Category::all();
		return view('frontend.contacto', ['slides' => $slides, 'categories' => $categories]);
	}
	public function extra()
	{
		$slides = Slider::where('enabled', 1)->take(3)->get();
		$categories = Category::all();
		return view('frontend.extra', ['slides' => $slides, 'categories' => $categories]);
	}
	public function formulario()
	{
		$slides = Slider::where('enabled', 1)->take(3)->get();
		$categories = Category::all();
		return view('frontend.formulario', ['slides' => $slides, 'categories' => $categories]);
	}
	public function nosotros()
	{
		$slides = Slider::where('enabled', 1)->take(3)->get();
		$categories = Category::all();
		return view('frontend.nosotros', ['slides' => $slides, 'categories' => $categories]);
	}
	public function search(Request $request)
	{
		//dd($request->search);
		//return view('frontend.category', ['articles' => $articles, 'categories' => $categories, 'currentcat' => $cat]);
		//dd($request->all());
		$search = $request->search;
		//$category = $request->category;
		$categories = Category::all();
		$articles = Article::Title($search)->get();
		$cat = NULL;
	return view('frontend.search', ['articles' => $articles,'categories' => $categories]);

	}
	public function fichas(Request $request)
	{
		//dd($request->all());
		//$category = $request->category;
		$categories = Category::all();

		$articles = [];

	foreach ($categories as $catname => $cat) {
			$art = $cat->articles()->get();
			$articles[$cat->name] = $art;
		}
		//dd( $articles );

	return view('frontend.fichas', ['articles' => $articles,'categories' => $categories]);

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
				Mail::to($input['email'])->send(new RecievedMail($request));
				Mail::to('ventas@mrseguridad.com')->send(new ContactoMail($request));
				return redirect()->route('front.index');
			}
		}

		public function registersend(Request $request)
		{
			$input = $request->all();
			//dd($input);

			$rules = [
				'nombre' => 'required',
				'cargo' => 'required',
				'razonsocial' => 'required',
				'rfc' => 'required',
				'ciudad' => 'required',
				'mail' => 'required|email',
				'telefono' => 'required|numeric',
				'motivo' => 'required'
			];
			$messages = [
				'nombre.required' => 'El campo nombre es requerido',
				'cargo.required' => 'El campo cargo es requerido',
				'razonsocial.required' => 'El campo razon social es requerido',
				'rfc.required' => 'El campo rfc es requerido',
				'ciudad.required' => 'El campo ciudad es requerido',
				'mail.required' => 'El campo correo es requerido',
				'telefono.required' => 'El campo telefono es requerido',
				'telefono.numeric' => 'El campo telefono debe ser numérico',
				'motivo.required' => 'El campo motivo es requerido'
			];
			$validator = Validator::make($input, $rules, $messages);
			if ( $validator->fails() ) {
				return redirect('/#contacto')
				->withErrors( $validator )
				->withInput();
			} else {
				$message = [
					'nombre' => $input['nombre'],
					'cargo' => $input['cargo'],
					'razonsocial' => $input['razonsocial'],
					'rfc' => $input['rfc'],
					'ciudad' => $input['ciudad'],
					'mail' => $input['mail'],
					'telefono' => $input['telefono'],
					'motivo' => $input['motivo'],
					'mensaje' => $input['mensaje']
				];
				//$mall = Message::all();
				//dd($message);
				Mail::to('ventas@mrseguridad.com')->send(new RegisterMail($message));
				Mail::to($input['mail'])->send(new RecievedMessage($message));
				return redirect()->route('front.index');
			}
		}
	}
