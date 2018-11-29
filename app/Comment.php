<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
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
