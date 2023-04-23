<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    
    protected $redirectTo = RouteServiceProvider::HOME;


    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {  
        return view("auth.login");
    }  
  
    public function login(Request $request)
    {
        $remember_me = $request->has('remember') ? true : false; 

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
  
        
        if (auth()->attempt(['username' => $request->input('username'), 'password' => $request->input('password')], $remember_me))
        {
            if(auth()->user()->role == 'admin')
                return redirect()->route('home');

            if(auth()->user()->role == 'student')
                return redirect()->route('student.home');
            
            if(auth()->user()->role == 'teacher')
                return redirect()->route('teacher.home');
            else
                return redirect()->route('front.home');
        }
  
        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    
}
