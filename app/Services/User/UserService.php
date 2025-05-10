<?php

namespace App\Services\User;

use LaravelEasyRepository\BaseService;

interface UserService extends BaseService{
    public function manggilEmail($email); //untuk mencari berdasarkan email

    public function register(array $userData);
    public function login(array $credentials);
    public function logout();
    public function redirectBasedOnRole($user);
}
