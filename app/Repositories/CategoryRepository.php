<?php

namespace App\Repositories;

use App\Category;

class CategoryRepository
{
    protected $category;

    public function __construct( Category $category )
    {
        $this->category = $category;
    }


    public function create( array $data )
    {
        return $this->category->create([
            'name'  => $data['name']
        ]);
    }


    public function find( int $id )
    {
        return $this->category->find($id);
    }
}
