@extends('layouts.main')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Fill Attendance</h4>
                </div>
                <div class="card-body">
                    <div class="default-tab">
                        <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                {{ Form::model($AttendanceDay, array('url'=>url('users/post_fillattendance'), 'method' => 'POST','class'=>'tm-form tm-contactform3','files'=>true,'id'=>'tm-contactform')) }}
                                    
                                    <div class="form-group">
                                        <label>Date</label>
                                        {{ Form::text('attendance_date', date('Y-m-d') , array('class'=>'form-control datepicker','readonly'=>true))}}
                                            <span class='error_controlx'><?php if ($errors->has('attendance_date')){
                                                echo $errors->first('attendance_date');
                                            }?></span>
                                    </div>
                                    <div class="col-md-3 pull-left">
                                        <label><input type="checkbox" id="selectall" onclick="fnselectall(this);" /> Select All</label>
                                    </div>
                                    <div class="clearfix"></div>
                                    <hr>
                                    <?php foreach($users as $user){?>
                                    <div class="col-md-3 pull-left">
                                        <label><input type="checkbox" name="attendance[]" id="attendancesingle_<?php echo $user->id?>" class="attendancesingle" value="<?php echo $user->id?>" /> <?php echo $user->firstname.' '.$user->lastname;?></label>
                                    </div>
                                    <?php }?>
                                    <div class="clearfix"></div>
                                    <input type="hidden" id="checkall" name="checkall" />
                                    <input type="hidden" id="uncheckall" name="uncheckall" />
                                    <button type="button" onclick="fnsubmitAttendance();" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
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

    function fnselectall(obj){
        if(obj.checked == true){
            $('.attendancesingle').each(function(){
                $(this).prop('checked',true);
            });
        }else{
            $('.attendancesingle').each(function(){
                $(this).prop('checked',false);
            });
        }
    }

    function fnsubmitAttendance(){
        var checkedval = '';
        var uncheckval = '';
        $('.attendancesingle').each(function(){
            var checkboxids = $(this).attr('id');
            if(document.getElementById(checkboxids).checked == true){
                checkedval +=$(this).val()+',';
            }else{
                uncheckval +=$(this).val()+',';
            }
        });
        $('#checkall').val(checkedval);
        $('#uncheckall').val(uncheckval);
        $('#tm-contactform').submit();
    }
</script>
@endsection