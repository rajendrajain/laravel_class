@extends('layouts.main')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>User Details</h4>
                </div>
                <div class="card-body">
                    <div class="default-tab">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">User</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
                                <a class="nav-item nav-link" id="nav-exprince-tab" data-toggle="tab" href="#nav-exprince" role="tab" aria-controls="nav-exprince" aria-selected="false">Exprince</a>

                                <a class="nav-item nav-link" id="nav-education-tab" data-toggle="tab" href="#nav-education" role="tab" aria-controls="nav-education" aria-selected="false">Education</a>
                                <a class="nav-item nav-link" id="nav-salary_fee-tab" data-toggle="tab" href="#nav-salary_fee" role="tab" aria-controls="nav-salary_fee" aria-selected="false">Salary/Fee</a>
                                <a class="nav-item nav-link" id="nav-attendance-tab" data-toggle="tab" href="#nav-attendance" role="tab" aria-controls="nav-attendance" aria-selected="false">Attendance</a>
                            </div>
                        </nav>
                        <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                {{ Form::model($users, array('url'=>url('users/post_edit/'.$str), 'method' => 'POST','class'=>'tm-form tm-contactform3','files'=>true,'id'=>'tm-contactform')) }}
                                    <div class="form-group">
                                        <a href="<?php echo url('/users/view/'.base64_encode(base64_encode($users->id)));?>" class="btn btn-success pull-right mb-3">Back</a>
                                    </div> 
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
                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Edit</button>
                                    {!! Form::close() !!}
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <p>2</p>
                            </div>
                           
                            <div class="tab-pane fade" id="nav-exprince" role="tabpanel" aria-labelledby="nav-exprince-tab">
                                <p>3</p>
                            </div>


                            <div class="tab-pane fade" id="nav-education" role="tabpanel" aria-labelledby="nav-education-tab">
                                <p>4</p>
                            </div>
                            <div class="tab-pane fade" id="nav-salary_fee" role="tabpanel" aria-labelledby="nav-salary_fee-tab">
                                <p>5</p>
                            </div>
                            <div class="tab-pane fade" id="nav-attendance" role="tabpanel" aria-labelledby="nav-attendance-tab">
                                <p>6</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!-- .animated -->
</div>
@endsection