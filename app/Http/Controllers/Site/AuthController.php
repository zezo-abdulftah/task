<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
   public function loginPage(){
       return view('site.auth.login');

   }
   public function Login(Request $request){
      $request->validate([ 'email'=>'required|email',
           'password'=>'required']);
       try {


           $remember_me = $request->has('remember_me') ? true : false;
           if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
               return redirect()->route('site');
           }
           return redirect()->back()->with(['error' => 'login failed']);
       }catch (\Exception $ex){
           return redirect()->back()->with(['error' => 'login failed']);
       }
   }


   public function Register(UserRequest $request){
       try {

             $request->merge(['password'=>bcrypt($request->password)]);
             $user=User::create($request->all());

           return redirect()->back()->with(['success'=>'Register is Successful']);
       }catch (Exception $ex){
           return redirect()->back()->with(['error'=>'There is error in your information']);
       }
   }
    public function logout(){
        $guard=$this->getguard();
        $guard->logout();
        return redirect()->route('login.page');
    }
    private function getguard(){
        return auth('web');
    }
}
