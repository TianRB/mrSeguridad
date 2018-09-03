<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    public static $image_path = 'img/article_pictures/';
    public static $pdf_path = 'img/article_fichas/';

    protected $fillable = ['title', 'content'];
    /**
     * The categories that belong to the article.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
    /**
     * The categories that belong to the article.
     */
    public function one_cat()
    {
      return $this->categories()->take(1)->get()->pop();
    }

    /**
     * Get the pics for the article.
     */
    public function pics()
    {
        return $this->hasMany('App\Pic');
    }

    /**
     * return path of first pic only.
     */
    public function one_pic()
    {
        return $this->pics()->take(1)->pluck('path')->pop();
    }

    public function scopeTitle($query, $title)
    {
        return $query->where("title","like","%$title%");
    }

}
