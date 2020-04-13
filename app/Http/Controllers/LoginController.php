<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use validate;

class LoginController extends Controller
{
    public function index(){
        return view('Login.index');
    }

    public function verifyUser(Request $req){
        $req->validate([ 
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('username', $req->username)
                    ->where('password', $req->password)
                    ->first();
        
        if($user != null){
            if($user['type'] == 'SuperAdmin'){
                $req->session()->put('username', $req->username);
                return redirect()->route('SuperAdmin.index');
            }
        }
        else{
            $req->session()->flash('loginError', 'Invalid ID/Password!');
            return view('Login.index');
        }
    }
}
