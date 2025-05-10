<?php

namespace App\Services\User;

use LaravelEasyRepository\BaseService;

interface UserService extends BaseService{
    public function manggilEmail($email); //untuk mencari berdasarkan email

    public function register(array $userData);
    public function login(array $credentials);
    public function logout();
    public function redirectBasedOnRole($user);

    public function getAllUsers();
    public function getById($id);
    public function hapusUser($id);
    public function updateUser($id, array $newDetails);
}
