@extends('layouts.auth')
@section('content')
<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a href="index.html">
                    <img class="align-content" src="<?php echo url('images/logo.png');?>" alt="">
                </a>
            </div>
            <div class="login-form">
                <div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>	
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>	
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                </div>
                {{ Form::model($user, array('url'=>url('users/login_post'), 'method' => 'POST','class'=>'tm-form tm-contactform3','files'=>true,'id'=>'tm-contactform')) }}
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
                    <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                    
                    <div class="register-link m-t-15 text-center">
                        <p>Don't have account ? <a href="<?php echo url('/users/signup');?>"> Sign Up Here</a></p>
                    </div>
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>