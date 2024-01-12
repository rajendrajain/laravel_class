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
                                {{ Form::model($Experince, array('url'=>url('users/post_exprience/'.$str), 'method' => 'POST','class'=>'tm-form tm-contactform3','files'=>true,'id'=>'tm-contactform')) }}
                                <div class="form-group">
                                    <a href="javascript:;" onclick="history.back()" class="btn btn-success pull-right">Back</a>
                                </div>
                                <div class="clearfix"></div>  
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Company Name</label>
                                                {{ Form::text('company', old('company') , array('class'=>'form-control'))}}
                                                    <span class='error_controlx'><?php if ($errors->has('company')){
                                                        echo $errors->first('company');
                                                    }?></span>
                                            </div>
                                        </div>   
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Designation</label>
                                                {{ Form::text('profile', old('profile') , array('class'=>'form-control'))}}
                                                    <span class='error_controlx'><?php if ($errors->has('profile')){
                                                        echo $errors->first('profile');
                                                    }?></span>
                                            </div>
                                        </div>   
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Start Date</label>
                                                {{ Form::text('start_date', old('start_date') , array('class'=>'form-control'))}}
                                                    <span class='error_controlx'><?php if ($errors->has('start_date')){
                                                        echo $errors->first('start_date');
                                                    }?></span>
                                            </div>
                                        </div>   
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>End Date</label>
                                                {{ Form::text('end_date', old('end_date') , array('class'=>'form-control'))}}
                                                    <span class='error_controlx'><?php if ($errors->has('end_date')){
                                                        echo $errors->first('end_date');
                                                    }?></span>
                                            </div>
                                        </div> 
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Comment</label>
                                                {{ Form::textarea('comment', old('comment') , array('class'=>'form-control'))}}
                                                    <span class='error_controlx'><?php if ($errors->has('comment')){
                                                        echo $errors->first('comment');
                                                    }?></span>
                                            </div>
                                        </div>    
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