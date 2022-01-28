<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Admin;
use App\AdminUser;

class AdminAuthController extends Controller
{


    public function login(){
      return view('authAdmin.login');
    }

    public function handleLogin(Request $request){ //

      try {
          $credentials = ['email'=>$request->email,'password'=>$request->password];

          if (Auth::guard('webadmin')->attempt($credentials)) {
            $user = Admin::where('email','=', $request->email)->first();

              if(!$user){
                //return redirect()->back()->with('error', 'Usuário inválido');
                throw new \Exception("Usuário é inválido");
              }
              //dd(Hash::check($request->password, $user->password));
              if(Hash::check($request->password, $user->password) && $user->level == 'gerente'){

                //Auth::guard('webadmin')->login($user);
                Auth::login($user);
//throw new \Exception("Bem vindo gerente");
              return Redirect::intended(url('management'));

            }if(Hash::check($request->password, $user->password) && $user->level == 'admin'){

              Auth::login($user);
              return Redirect::intended(url('admin'));
            //  throw new \Exception("Bem vindo admin");

            }else{
                //return redirect()->back()->with('error', 'Senha invalida');
                throw new \Exception("Senha é inválida");
              }

          }else{
            return redirect()->back()->with('error', 'Senha invalida');
          }
        } catch (\Exception $e) {
            return $e->getMessage();
        }




      // if(Auth::guard('webadmin')->attempt($request->only(['email','password']))){
      //   Auth::login();
      //   return view('homeAdmin');
      // }
      // return redirect()->back()->with('error', 'Credenciais Invalidas');
    }

    public function logout(){

      Auth::guard('webadmin')->logout();
      return redirect()->route('admin.login');
    }
}
