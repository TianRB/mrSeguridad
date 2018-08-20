<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use App\Pic;
use App\Article;
use File;

class PicController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //  Crear Imagen
         dd($request->all());
         $file = Input::file('image');
         //dd($image);
          $ar= Article::find($request->article_id);
          $name = str_replace(' ', '', strtolower($ar->title));
          for ($i=0; $i < count($file); $i++) {
          $file_name =$name.str_random(6).'.'.$file[$i]->getClientOriginalExtension();
          $pic = new Pic;
          $pic->path = 'img/article_pictures/'.$file_name;
          $file[$i]->move('img/article_pictures/', $file_name);
          $pic->article_id=$request->article_id;
          $pic->save();
         }
     return response()->json([
         'message' => 'Image saved Successfully'
     ], 200);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $p = Pic::find($id);
      $file = $p->path;
      $filename = public_path($file);
      File::delete($filename);
      $p->delete();
      return redirect()->back();
    }

    public function articlePics($id)
    {
      $a = Article::find($id);
      return view('backend.pics.create', [
       'article' => $a,
      ]);
    }
}
