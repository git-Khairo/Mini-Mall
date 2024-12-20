<?php

namespace App\repositoryInterface;

interface UserRepositoryInterface
{
    public function Register(array $data);
    public function login(array $data);
    public function getUser($userId);


}
