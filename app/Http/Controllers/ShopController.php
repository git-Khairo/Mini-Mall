<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShopRequest;
use App\Http\Requests\UpdateShopRequest;
use App\Models\Shop;
use App\repositoryInterface\ShopRepositoryInterface;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class ShopController extends Controller
{

    private  $ShopRepository;

    public function __construct(ShopRepositoryInterface  $ShopRepository){
        $this->ShopRepository=$ShopRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function all()
    {
        $shops = $this->ShopRepository->all();

        return response()->json(['message' => 'All shops delievered', 'shops' => $shops,201]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $shop = $this->ShopRepository->show($id);

        return response()->json(['message' => 'shops is delievered', 'shop' => $shop,201]);
    }
}
