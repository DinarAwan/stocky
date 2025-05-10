<?php

namespace App\Repositories\User;

use LaravelEasyRepository\Repository;

interface UserRepository extends Repository{

    public function manggilEmail($email); //untuk mencari berdasarkan email
    public function createUser(array $userData);
    public function findUserByEmail(string $email);
    public function findUserById(int $id);
    public function findAllUsers();

    public function getById($id);

    public function hapusUser($id);
    public function updateUser($id, array $newDetails);
}
