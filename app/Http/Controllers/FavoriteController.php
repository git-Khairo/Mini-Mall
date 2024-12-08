<?php

namespace App\Http\Controllers;

use App\repositoryInterface\FavoriteRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    private $FavoriteRepository;

    public function __construct(FavoriteRepositoryInterface $FavoriteRepository)
    {
        $this->FavoriteRepository=$FavoriteRepository;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'productId' => 'required|numeric',
        ]);

        $userId = Auth::id();

        $favorite = $this->FavoriteRepository->store($validatedData, $userId);

        return response()->json(['message' => 'Favorite stored successfully','favorite' => $favorite], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $userId = Auth::id();

        $favorite = $this->FavoriteRepository->show($userId);

        return response()->json(['message' => 'Favorites Details','favorite' => $favorite], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $userId = Auth::id();

        $favorite = $this->FavoriteRepository->delete($userId, $id);

        return response()->json(['message' => 'Favorite deleted','favorite' => $favorite], 201);
    }
}
