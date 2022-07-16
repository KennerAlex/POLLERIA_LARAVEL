<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    //
    public function showlogin(){
        return view('login.iniciar');
    }
    public function verificalogin(Request $request){
        //return dd($request->all()); ver los valores enviados
        $credentials =$request->validate([
            'name'=>'required|string', 
            'password'=>'required|string'
        ],[
            'name.required'=>'Ingrese el usuario',
            'password'=>'Ingrese la contraseña'
        ]);
            if(Auth::attempt($credentials)){
                $request->session()->regenerate();
                return redirect()->intended('bienvenido')->with('status','Sesión correcta');
            }
            throw ValidationException::withMessages([
                'name'=>'Usuario no encontrado',
                'password'=>'Contraseña incorrecta'
            ]);
            
        
    }
    public function salir( Request $request){
      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect()->route('login');
           
    }
}

