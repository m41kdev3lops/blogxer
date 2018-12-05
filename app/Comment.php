<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'post_id', 'user', 'body'
    ];
    
    // Relationships

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    // General/Helper methods

    public function getLink()
    {
        return url("comment/{$this->id}");
    }
}
