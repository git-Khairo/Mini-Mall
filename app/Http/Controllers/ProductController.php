<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\repositoryInterface\ProductRepositoryInterface;
use Illuminate\Support\Facades\Request;

class ProductController extends Controller
{

    private  $ProductRepository;

    public function __construct(ProductRepositoryInterface  $ProductRepository){
        $this->ProductRepository=$ProductRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->ProductRepository->all();

        return response()->json(['message' => 'All products', 'products' => $products, 201]);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = $this->ProductRepository->find($id);

        return response()->json(['message' => 'All products', 'products' => $product, 201]);
    }
}
