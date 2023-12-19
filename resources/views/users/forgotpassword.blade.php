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
                <form>
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" placeholder="Email">
                    </div>
                    <button type="submit" class="btn btn-primary btn-flat m-b-15">Submit</button>
                    <div class="register-link m-t-15 text-center">
                        <p>You have account ? <a href="<?php echo url('/users/login');?>"> Login Here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>