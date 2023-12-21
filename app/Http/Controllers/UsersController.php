<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Response;
use App\Models\Users;
use Illuminate\Support\Facades\Validator;
class UsersController extends Controller{
    private $request;
    

    public function login(){
        return view('users.login');
    }

    public function forgotpassword(){
        return view('users.forgotpassword');
    }
    public function signup(){
        $data = array();
        $data['users'] = new Users();
        return view('users.signup',$data);
    }

    public function post_signup(Request $request){
       // echo '<pre>';print_r($request->input());echo '</pre>';exit;
       $data = $request->input();
        $validator =  Validator::make($data, [
            'firstname'=>'required',
            'lastname'=>'required',
            'email' => 'required|email|max:255|unique:users,email',
            'password'=>'required'
        ]);
        if ($validator->fails()) {
            return redirect('/users/signup')
                    ->withErrors($validator)
                    ->withInput();
        }

        $users = Users::create($request->all());
        if($users){
            $users->password = bcrypt($request->input('password'));
            $users->save();
            //bcrypt
            return redirect('users/login')->with('success','Thanks you for your interest.');
        }
		
    }
}
?>