<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Response;
use App\Models\Users;
use Auth;
use Illuminate\Support\Facades\Validator;
class UsersController extends Controller{
    private $request;
    

    public function login(){
        $user = new Users();
        return view('users.login',compact('user'));
    }

    public function login_post(Request $request){
        $data = $request->input();
        $validator =  Validator::make($data, [
            'email' => 'required',
            'password'=>'required'
        ]);
        if ($validator->fails()) {
            return redirect('/users/login')
                    ->withErrors($validator)
                    ->withInput();
        }
        $user = Users::where('email',$request->email)->first();
        //echo '<pre>';print_r($user);echo '</pre>';exit;
		if(!empty($user)){
			$userdata = array(
				'email'     => $request->email,
				'password'  => $request->password,
			);
			if(Auth::guard('web')->attempt($userdata)) {
				return redirect('/users/dashboard');
			}else{
				return redirect('/users/login')->with('error','Incorrect email or password.');
			}
		}else{
			return redirect('/users/login')->with('error','Incorrect email or password.');
		}
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

    public function dashboard(){
        $data = array();
       
        return view('users.dashboard',$data);
    }
}
?>