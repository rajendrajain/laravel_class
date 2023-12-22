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
                {{ Form::model($users, array('url'=>url('users/post_signup'), 'method' => 'POST','class'=>'tm-form tm-contactform3','files'=>true,'id'=>'tm-contactform')) }}
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
                   
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Agree the terms and policy
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
                    <div class="social-login-content">
                        <div class="social-button">
                            <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Register with facebook</button>
                            <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Register with twitter</button>
                        </div>
                    </div>
                    <div class="register-link m-t-15 text-center">
                        <p>Already have account ? <a href="<?php echo url('/users/login');?>"> Sign in</a></p>
                    </div>
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>