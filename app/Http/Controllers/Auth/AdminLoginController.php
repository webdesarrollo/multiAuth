<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct(){
      $this->middleware('guest:admin', ['except' => ['logout']]);
    }
    public function showLoginForm(){
        return view('auth.admin-login');
    }

    public function login(Request $request){
      //validar
      $this->validate($request, [
        'email'=> 'required|email',
        'password'=> 'required|min:6',
      ]);
      //attempt intento a login, devuelve true o false
      //Auth::guard('admin')->attempt($credentials, $remember);
      if (Auth::guard('admin')->attempt(['email'=> $request->email,
        'password'=> $request->password], $request->remember)){
          //si es exitoso
          return redirect()->intended(route('admin.dashboard'));
      }
      //si no es exitoso
      return redirect()->back()-withInput($request->only('email','remember'));
    }

    public function logout()
    {
      Auth::guard('admin')->logout();
      return redirect('/');
    }
}
