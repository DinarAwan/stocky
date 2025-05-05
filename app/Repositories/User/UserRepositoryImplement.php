<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use LaravelEasyRepository\Implementations\Eloquent;

class UserRepositoryImplement extends Eloquent implements UserRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function manggilEmail($email){
        
        // return $this->model->where("email", $email)->get();   untuk mencari berdasarkan email
    }


    public function createUser(array $userData)
    {
        // Hash password sebelum menyimpan
        $userData['password'] = Hash::make($userData['password']);
        
        return $this->model->create($userData);
    }

    public function findUserByEmail(string $email)
    {
        return $this->model->where('email', $email)->first();
    }
    
    public function findUserById(int $id)
    {
        return $this->model->find($id);
    }
}
