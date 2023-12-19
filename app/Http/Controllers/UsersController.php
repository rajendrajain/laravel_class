<?php
namespace App\Http\Controllers;
use Session;
use Response;
class UsersController extends Controller{
    private $request;
    

    public function login(){
        return view('users.login');
    }

    public function forgotpassword(){
        return view('users.forgotpassword');
    }
    public function signup(){
        return view('users.signup');
    }
}
?>