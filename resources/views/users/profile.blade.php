@extends('layouts.main')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Profile Details</h4>
                </div>
                <div class="card-body">
                    <div class="default-tab">
                        <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                {{ Form::model($profile, array('url'=>url('users/post_profile/'.$str), 'method' => 'POST','class'=>'tm-form tm-contactform3','files'=>true,'id'=>'tm-contactform')) }}
                                <div class="form-group">
                                    <a href="javascript:;" onclick="history.back()" class="btn btn-success pull-right">Back</a>
                                </div>
                                <div class="clearfix"></div>    
                                    <div class="form-group">
                                        <label></label>
                                        {{ Form::file('pic' , array('class'=>'form-control','onchange'=>'changeimg(this);'))}}
                                            <span class='error_controlx'><?php if ($errors->has('pic')){
                                                echo $errors->first('pic');
                                            }?></span>
                                        <div class="col-sm-3">
                                            <?php 
                                            $pic = '';
                                            if(isset($profile->pic) and $profile->pic !=''){
                                                $pic = url('/uploads/users/'.$profile->pic);   
                                            }?>
                                            <img id="previewImg" src="<?php echo $pic;?>" alt="Placeholder">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Designation/Main Course</label>
                                        {{ Form::text('main_course', old('main_course') , array('class'=>'form-control'))}}
                                            <span class='error_controlx'><?php if ($errors->has('main_course')){
                                                echo $errors->first('main_course');
                                            }?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Other Designation/Other Course</label>
                                        {{ Form::text('sub_course', old('sub_course') , array('class'=>'form-control'))}}
                                            <span class='error_controlx'><?php if ($errors->has('sub_course')){
                                                echo $errors->first('sub_course');
                                            }?></span>
                                    </div>

                                    <div class="form-group">
                                        <label>Salary/Fee</label>
                                        {{ Form::text('salary_fees', old('salary_fees') , array('class'=>'form-control'))}}
                                            <span class='error_controlx'><?php if ($errors->has('salary_fees')){
                                                echo $errors->first('salary_fees');
                                            }?></span>
                                    </div>

                                    <div class="form-group">
                                        <label>Phone</label>
                                        {{ Form::text('phone', old('phone') , array('class'=>'form-control'))}}
                                            <span class='error_controlx'><?php if ($errors->has('phone')){
                                                echo $errors->first('phone');
                                            }?></span>
                                    </div>

                                    <div class="form-group">
                                        <label>Joining Date</label>
                                        {{ Form::text('joining_date', old('joining_date') , array('class'=>'form-control'))}}
                                            <span class='error_controlx'><?php if ($errors->has('joining_date')){
                                                echo $errors->first('joining_date');
                                            }?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        {{ Form::text('gender', old('gender') , array('class'=>'form-control'))}}
                                            <span class='error_controlx'><?php if ($errors->has('gender')){
                                                echo $errors->first('gender');
                                            }?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Marital Status</label>
                                        {{ Form::text('marital_status', old('marital_status') , array('class'=>'form-control'))}}
                                            <span class='error_controlx'><?php if ($errors->has('marital_status')){
                                                echo $errors->first('marital_status');
                                            }?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>DoM</label>
                                        {{ Form::text('dom', old('dom') , array('class'=>'form-control'))}}
                                            <span class='error_controlx'><?php if ($errors->has('dom')){
                                                echo $errors->first('dom');
                                            }?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Blood Group</label>
                                        {{ Form::text('blood_group', old('blood_group') , array('class'=>'form-control'))}}
                                            <span class='error_controlx'><?php if ($errors->has('blood_group')){
                                                echo $errors->first('blood_group');
                                            }?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        {{ Form::text('address', old('address') , array('class'=>'form-control'))}}
                                            <span class='error_controlx'><?php if ($errors->has('address')){
                                                echo $errors->first('address');
                                            }?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>City</label>
                                        {{ Form::text('city', old('city') , array('class'=>'form-control'))}}
                                            <span class='error_controlx'><?php if ($errors->has('city')){
                                                echo $errors->first('city');
                                            }?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Zip Code</label>
                                        {{ Form::text('zip', old('zip') , array('class'=>'form-control'))}}
                                            <span class='error_controlx'><?php if ($errors->has('zip')){
                                                echo $errors->first('zip');
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