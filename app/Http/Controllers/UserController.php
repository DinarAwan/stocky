<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\User\UserService;
use App\Repositories\User\UserRepository;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService){
        $this->userService=$userService;
    }

    // public function temukanEmail($email){
    //     $result = $this->userService->manggilEmail($email);
    //     return response()->json([
    //         "success" => true,
    //         "code" => 200,
    //         "data" => $result
    //     ]);
    // }

    

    public function index(){
        $data = User::all();
        return view('users.user')->with('data', $data);
    }

    
// return view('user.index', compact('data'));
}