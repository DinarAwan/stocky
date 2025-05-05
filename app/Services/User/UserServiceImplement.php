<?php

namespace App\Services\User;

use Mockery\Expectation;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use LaravelEasyRepository\ServiceApi;
use App\Repositories\User\UserRepository;

class UserServiceImplement extends ServiceApi implements UserService{

    /**
     * set title message api for CRUD
     * @param string $title
     */
     protected $title = "";
     /**
     * uncomment this to override the default message
     * protected $create_message = "";
     * protected $update_message = "";
     * protected $delete_message = "";
     */

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(UserRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function manggilEmail($email){
    //   try{
    //     return $this->mainRepository->manggilEmail($email);
    //   }catch (\Exception $exception){
    //     Log::debug($exception->getMessage());
    //     return [];
    //   }
    //  ;

    // untuk mencari berdasarkan email
    }

    public function register(array $userData)
    {
        return $this->mainRepository->createUser($userData);
    }

    public function login(array $credentials)
    {
        $user = $this->mainRepository->findUserByEmail($credentials['email']);
        
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return false;
        }
        
        Auth::login($user);
        return true;
    }

    public function logout()
    {
        Auth::logout();
        return true;
    }

    public function redirectBasedOnRole($user)
    {
        if ($user->role == 'admin') {
            return redirect('dashboard');
        } elseif ($user->role == 'manager_gudang') {
            return redirect('dashboard/manager');
        } else {
            return redirect('dashboard/staf');
        }
    }
}
