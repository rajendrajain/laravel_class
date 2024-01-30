<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Response;
use App\Models\Users;
use App\Models\UserTypes;
use App\Models\Profile;
use App\Models\Experince;
use App\Models\AttendanceDay;
use App\Models\Attendance;
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

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/users/login');
    }

    public function dashboard(){
        $data = array();
       
        return view('users.dashboard',$data);
    }

    public function manageusers(){
        $data = array();
        $users = Users::with(array('userType'))->orderby('registration_no','asc')->get();
        //echo '<pre>';print_r($users);echo '</pre>';exit;
        $data['users'] = $users;
        return view('users.manageusers',$data);
    }

    public function view($str){
        $id = $this->decodestr($str);
        $data = array();
        $users = Users::where('id',$id)->with(array('userType','Profile','Experince'))->first();
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


    public function profile($str){
        $data = array();
        $id = $this->decodestr($str);
        $profile = Profile::where('user_id',$id)->with(array('Users'))->first();
        $data['profile'] = $profile;
        $data['str'] = $str;
        return view('users.profile',$data);
    }

    public function post_profile(Request $request, $str){
        $id = $this->decodestr($str);
        $data = $request->input();
        $Profile = Profile::where('user_id',$id)->first();
        if(isset($Profile->id) and $Profile->id != ''){
            $Profile->update($request->all());
        }else{
            $Profile = Profile::create($request->all());
        }
        $logo = $request->file('pic');
        if(!empty($logo)){
            $logo_img = time().'.'.$logo->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/users');
            $logo->move($destinationPath, $logo_img);
            $Profile->pic = $logo_img;
            
        }
        $Profile->user_id = $id;
        $Profile->save();
        return redirect('users/view/'.$str)->with('success','Your record has been save success fully.');
    }

    public function exprience($str){
        $data = array();
        $id = $this->decodestr($str);
        $Experince = new Experince();
        $data['Experince'] = $Experince;
        $data['str'] = $str;
        return view('users.exprience',$data);
    }

    public function post_exprience(Request $request, $str){
        $id = $this->decodestr($str);
        $data = $request->input();
        $validator =  Validator::make($data, [
            'company'=>'required',
            'profile'=>'required',
            'start_date' => 'required',
            'comment' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('/users/exprience/'.$str)
                    ->withErrors($validator)
                    ->withInput();
        }

        $Experince = Experince::create($request->all());
        $Experince->user_id = $id;
        $Experince->save();
        return redirect('users/view/'.$str)->with('success','Your record has been save success fully.');
    }

    public function view_experince($str){
        $id = $this->decodestr($str);
        $Experince = Experince::where('id',$id)->first();
        $data = array();
        $data['Experince'] = $Experince;
        return view('users.view_experince',$data);
    }

    public function edit_experince($id){
        $Experince_id = $this->decodestr($id);
        $Experince = Experince::where('id',$Experince_id)->first();
        $data = array();
        $data['Experince'] = $Experince;
        $data['id'] = $id;
        return view('users.edit_experince',$data);
    }

    public function post_edit_experince(Request $request, $id){
        $Experince_id = $this->decodestr($id);
        $data = $request->input();
        $validator =  Validator::make($data, [
            'company'=>'required',
            'profile'=>'required',
            'start_date' => 'required',
            'comment' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('/users/exprience/'.$id)
                    ->withErrors($validator)
                    ->withInput();
        }

        $Experince = Experince::where('id',$Experince_id)->first();
        $Experince->update($request->all());
        return redirect('users/view/'.base64_encode(base64_encode($Experince->user_id)))->with('success','Your record has been save success fully.');
    }

    public function delete_experince($id){
        $Experince_id = $this->decodestr($id);
        $Experince = Experince::where('id',$Experince_id)->first();
        if(isset($Experince->id) and $Experince->id !=''){
            $Experince->delete();
            return redirect('users/view/'.base64_encode(base64_encode($Experince->user_id)))->with('success','Your record has been deleted successfully.');
        }else{
            return redirect('users/view/'.base64_encode(base64_encode($Experince->user_id)))->with('error','Sorry! unable to delete record');
        }
    }

    
    public function createuser(){
        $data = array();
        $usertypes = UserTypes::orderBy('name')->pluck('name', 'id')->toArray();
        $data['users'] = new Users();
        $data['usertypes'] = array('--Select--')+$usertypes;
        return view('users.createuser',$data);
    }

    public function post_createuser(Request $request){
       // echo '<pre>';print_r($request->input());echo '</pre>';exit;
       $data = $request->input();
        $validator =  Validator::make($data, [
            'firstname'=>'required',
            'lastname'=>'required',
            'email' => 'required|email|max:255|unique:users,email',
            'password'=>'required'
        ]);
        if ($validator->fails()) {
            return redirect('/users/createuser')
                    ->withErrors($validator)
                    ->withInput();
        }
        $order = Users::orderby('registration_no','desc')->first();
        $registration_no = $order->registration_no+1;
        $users = Users::create($request->all());
        if($users){
            $users->password = bcrypt($request->input('password'));
            $users->registration_no = $registration_no;
            $users->save();
            //bcrypt
            return redirect('users/manageusers')->with('success','Thanks you for your interest.');
        }
    }

    public function attendance(){
        $data = array();
        //$users = Users::with(array('userType'))->orderby('registration_no','asc')->get();
        
        $attendances = AttendanceDay::with(array('attendaceTakenBy'))->orderby('attendance_date','desc')->get();
        //echo '<pre>';print_r($attendances);exit;
        $data['attendances'] =$attendances;
        return view('users.attendance',$data);
    }

    public function fillattendance(){
        $data = array();
        $users = Users::orderBy('firstname','asc')->orderBy('lastname', 'asc')->get();
        $AttendanceDay = new AttendanceDay();
        //echo '<pre>';print_r($users);echo '</pre>';exit;
        $data['users'] =$users;
        $data['AttendanceDay'] =$AttendanceDay;
        return view('users.fillattendance',$data);
    }

    public function post_fillattendance(Request $request){
        $data = $request->input();
        $validator =  Validator::make($data, [
            'attendance_date' => 'required|unique:attendance_days,attendance_date',
        ]);
        if ($validator->fails()) {
            return redirect('/users/fillattendance')
                    ->withErrors($validator)
                    ->withInput();
        }
        $attendance_day = new AttendanceDay;
        $attendance_day->attendance_date = $data['attendance_date'];
        $attendance_day->attendance_taken_by_id = auth()->user()->id;
        

        $uncheckall = 0;
        $checkall = 0;
        if(isset($data['checkall']) and $data['checkall'] !=''){
            $checkall = substr($data['checkall'],0,-1);
            $checkalls = explode(',',$checkall);
            $checkall = count($checkalls);
            //echo '<pre>';print_r($checkalls);echo '</pre>';
        }
        if(isset($data['uncheckall']) and $data['uncheckall'] !=''){
            $uncheckall = substr($data['uncheckall'],0,-1);
            $uncheckalls = explode(',',$uncheckall);
            $uncheckall = count($uncheckalls);
            //echo '<pre>';print_r($uncheckalls);echo '</pre>';
        }
        $attendance_day->total_present = $checkall;
        $attendance_day->total_absent = $uncheckall;
        $attendance_day->save();
        $attendance_day_id = $attendance_day->id;
        if(isset($checkalls) and !empty($checkalls)){
            foreach($checkalls as $checkall){
                $Attendance = new Attendance();
                $Attendance->user_id = $checkall;
                $Attendance->attendance_day_id = $attendance_day_id;
                $Attendance->is_present = 1;
                $Attendance->attendence = date('Y-m-d');
                $Attendance->save();
            }
        }
        if(isset($uncheckalls) and !empty($uncheckalls)){
            foreach($uncheckalls as $uncheckall){
                $Attendance = new Attendance();
                $Attendance->user_id = $checkall;
                $Attendance->attendance_day_id = $attendance_day_id;
                $Attendance->is_present = 0;
                $Attendance->attendence = date('Y-m-d');
                $Attendance->save();
            }
        }
        return redirect('users/attendance')->with('success','Attendance has been filled.');
        //echo '<pre>';print_r($data);echo '</pre>';exit;

    }
}
?>