<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService
{
    protected $categoryRepo;

    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }


    public function add( array $data )
    {
        return $this->categoryRepo->create($data);
    }


    public function delete( int $id )
    {
        $cat = $this->categoryRepo->find($id);
        
        $cat->posts()->delete();
        $cat->delete();

        swal("Category And Posts deleted successfully!");

        return redirect('/');
    }
}
