@extends('layouts.main')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Experince Details</h4>
                </div>
                <div class="card-body">
                    <div class="default-tab">
                        <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                {{ Form::model($users, array('url'=>url('users/post_createuser'), 'method' => 'POST','class'=>'tm-form tm-contactform3','files'=>true,'id'=>'tm-contactform')) }}
                                    <div class="form-group">
                                        <a href="javascript:;" onclick="history.back()" class="btn btn-success pull-right">Back</a>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                        <label>User Type</label>
                                        {{ Form::select('user_type_id', $usertypes, old('user_type_id') , array('class'=>'form-control'))}}
                                        <span class='error_controlx'><?php if ($errors->has('user_type_id')){
                                            echo $errors->first('user_type_id');
                                        }?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>First Name</label>
                                        {{ Form::text('firstname', old('firstname') , array('class'=>'form-control','placeholder'=>'First Name*'))}}
                                            <span class='error_controlx'><?php if ($errors->has('firstname')){
                                                echo $errors->first('firstname');
                                            }?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>last Name</label>
                                        {{ Form::text('lastname', old('lastname') , array('class'=>'form-control','placeholder'=>'Last Name*'))}}
                                            <span class='error_controlx'><?php if ($errors->has('lastname')){
                                                echo $errors->first('lastname');
                                            }?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        {{ Form::text('email', old('email') , array('class'=>'form-control','placeholder'=>'Email'))}}
                                            <span class='error_controlx'><?php if ($errors->has('email')){
                                                echo $errors->first('email');
                                            }?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        {{ Form::password('password' , array('class'=>'form-control','placeholder'=>'Password'))}}
                                            <span class='error_controlx'><?php if ($errors->has('password')){
                                                echo $errors->first('password');
                                            }?></span>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
                                    {!! Form::close() !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!-- .animated -->
</div>
<script>
    function changeimg(input){
        var file = $("input[type=file]").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection