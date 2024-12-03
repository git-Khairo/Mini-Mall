<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\repository\CategoryRepository;

class CategoryController extends Controller
{

    private $CategoryRepository;

    public function __construct(CategoryRepository $CategoryRepository){
        $this->CategoryRepository=$CategoryRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->CategoryRepository->all();

        return response()->json($categories);
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $products = $this->CategoryRepository->find($id);

        return response()->json($products);
    }

}
