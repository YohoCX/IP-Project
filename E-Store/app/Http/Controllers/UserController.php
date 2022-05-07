<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    //
    function login(Request $req){
        $user = User::where(['email'=>$req->email])->first();
        if(!$user|| !Hash::check($req->password,$user->password)){
            return "Wrong Info";
        }
        else{
            $req->session()->put('user',$user);
            return redirect('/');
        }
    }
    function register(Request $req){
        $checkUser = User::where(['email'=>$req->email])->first();

        if($checkUser){
            echo '<script>alert("User with this email already exist")</script>';
            return "User with this email already exist";
        }elseif ($req->password!=$req->confirm_password){
            echo '<script>alert("Passwords don\'t match")</script>';
            return "Password don\'t match";
        }

        else{
            $user = new User;
            $user->name=$req->name;
            $user->email=$req->email;
            $user->password=Hash::make($req->password);
            $user->save;
            return redirect('login');
        }
    }

}
