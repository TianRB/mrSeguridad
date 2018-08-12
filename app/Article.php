<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{

    public static $image_path = 'img/article_pictures/';

    protected $fillable = ['title', 'content'];
    /**
     * The categories that belong to the article.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category');
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

    /**
     * Get slug from title.
     */
    public function getSlugFromTitle()
    {
        return Str::slug($this->title);
    }

    public function scopeTitle($query, $title)
    {
        return $query->where("title","like","%$title%");
    }

}
