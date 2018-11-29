<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Relationships

    public function posts()
    {
        return $this->hasMany('App\Post');
    }


    // General/Helper methods

    public function getLink()
    {
        return url("category/{$this->id}");
    }
}
