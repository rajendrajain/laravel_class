<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Response;
use App\Models\Users;
use App\Models\UserTypes;
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
        //echo '<pre>';print_r($data);echo '</pre>';exit;
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

    public function manageusers(){
        $data = array();
        $users = Users::with(array('userType'))->orderby('firstname','asc')->orderby('lastname','asc')->get();
        //echo '<pre>';print_r($users);echo '</pre>';exit;
        $data['users'] = $users;
        return view('users.manageusers',$data);
    }

    public function view($str){
        $id = $this->decodestr($str);
        $data = array();
        $users = Users::where('id',$id)->with(array('userType'))->first();
        //echo '<pre>';print_r($users);echo '</pre>';exit;
        $data['users'] = $users;
        return view('users.view',$data);
    }

    public function edit($str){
        $id = $this->decodestr($str);
        $data = array();
        $users = Users::where('id',$id)->with(array('userType'))->first();
        $usertypes = UserTypes::orderBy('name')->pluck('name', 'id')->toArray();
        //echo '<pre>';print_r($usertypes);echo '</pre>';exit;
        $data['users'] = $users;
        $data['usertypes'] = array('--Select--')+$usertypes;
        $data['str'] = $str;
        return view('users.edit',$data);
    }

    public function post_edit(Request $request, $str){
        $id = $this->decodestr($str);
        $data = $request->input();
        $validator =  Validator::make($data, [
            'firstname'=>'required',
            'lastname'=>'required',
            'email' => 'required|email|max:255|unique:users,email,'.$id,
        ]);
        if ($validator->fails()) {
            return redirect('/users/edit/'.$str)
                    ->withErrors($validator)
                    ->withInput();
        }
        $users = Users::where('id',$id)->first();
        $users->update($request->all());
        return redirect('users/view/'.$str)->with('success','Your record has been save success fully.');
    }
}
?>