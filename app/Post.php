<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;

class Post extends Model
{
    protected $fillable = [
        'category_id', 'title', 'short_description', 'body'
    ];
    // Relationships
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }


    public function comments()
    {
        return $this->hasMany('App\Comment')->orderBy('created_at', 'desc');
    }

    // General/Helper methods

    public function getPublished()
    {
        return $this->where('is_published', 1)->orderBy('created_at', 'desc')->get();
    }


    public function getShortDescription()
    {
        return $this->short_description ?? substr($this->body, 0, 100) . '...';
    }


    public function getLink()
    {
        return url("post/{$this->id}");
    }
}
