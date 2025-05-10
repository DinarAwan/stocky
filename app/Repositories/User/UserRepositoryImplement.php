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

    public function findAllUsers(){
        return $this->model->orderBy('id', 'desc')->get();
    }

    public function getById($id){
        return $this->model->find($id);
    }

    public function hapusUser($id){
        return $this->model->destroy($id);
    }

    public function updateUser($id, array $newDetails){
        if (isset($newDetails['_token'])) {
            unset($newDetails['_token']);
        }
        if (isset($newDetails['_method'])) {
            unset($newDetails['_method']);
        }
        return $this->model->whereId($id)->update($newDetails);
    }
}
