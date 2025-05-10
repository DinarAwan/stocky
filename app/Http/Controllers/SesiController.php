<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Services\User\UserServiceImplement;

class SesiController extends Controller
{

    protected $authService;
    
    public function __construct(UserServiceImplement $authService)
    {
        $this->authService = $authService;
    }
    public function index(){
        return view('sesi.login');
    }


    public function reg(){
        return view('sesi.register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $credentials = $request->only('email', 'password');
        
        if ($this->authService->login($credentials)) {
            return $this->authService->redirectBasedOnRole(Auth::user());
        }
        
        return back()->withErrors(['email' => 'Kredensial yang diberikan tidak cocok dengan catatan kami.']);
    }


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            
        ]);
        
        $user = $this->authService->register($request->all());
        
        Auth::login($user);
        
        return $this->authService->redirectBasedOnRole($user);
    }

    public function logout()
    {
        $this->authService->logout();
        Session::flush();
        
        return redirect('sesi');
    }
}
