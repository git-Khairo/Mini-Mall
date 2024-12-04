<?php

namespace App\repository;

interface UserRepositoryInterface
{
    public function Register(array $data);

    public function login(array $data);


}
