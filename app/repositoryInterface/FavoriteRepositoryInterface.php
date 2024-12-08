<?php

namespace App\repositoryInterface;

interface FavoriteRepositoryInterface
{
    public function show($id);
    public function store($data, $id);
    public function delete($userId, $productId);
}
