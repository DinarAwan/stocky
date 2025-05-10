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

    

    // public function index(){
    //     $data = User::all();
    //     return view('users.user')->with('data', $data);
    // }

    public function index(Request $request){
        if($request->has('search')){
            $data = User::where('name', 'like', '%' .$request->search.'%')->get();
      
        }else{
            $data = $this->userService->getAllUsers();
        }

        return view('users.user')->with('data', $data);
    }

    public function destroy($id){
        $this->userService->hapusUser($id);
        return redirect()->route('users')->with('success', 'stok berhasil di delete');
    }
    
    public function edit($id){
        $data = $this->userService->getById($id);
        return view('users.edit')->with('data', $data);
    }

    public function update(Request $request, $id){
        $request->validate([
            'role' => 'required'
        ]);

        $this->userService->updateUser($id, $request->all());
        return redirect()->route('users')->with('success', 'berhasil edit');
    }
    
}