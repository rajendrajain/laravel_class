@extends('layouts.main')
@section('content')
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Orders -->
        <div class="orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="box-title">Attendance </h4>
                            <div class="form-group">
                                <a href="<?php echo url('/users/fillattendance');?>" class="btn btn-success pull-right">Fill Attendance</a>
                            </div>
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Attendance</th>
                                            <th>Attendance Taken By</th>
                                            <th>Total Present</th>
                                            <th>Total Absent</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(count($attendances) >=1){?>
                                            <?php foreach($attendances as $attendance){?>
                                                <tr>
                                                    <td><?php echo $attendance->id?></td>
                                                    <td><?php echo $attendance->attendance_date?></td>
                                                    <td><?php echo $attendance->attendaceTakenBy->firstname.' '.$attendance->attendaceTakenBy->lastname?></td>
                                                    <td><?php echo $attendance->total_present?></td>
                                                    <td><?php echo $attendance->total_absent?></td>
                                                    <td>
                                                        <a href="<?php echo url('/users/view/'.base64_encode(base64_encode($attendance->id)));?>"> View </a>
                                                    </td>
                                                </tr>
                                            <?php }?>
                                        <?php }else{?>
                                            <tr>
                                                <td colspan="6" class="text-center">No data found</td>
                                            </tr>
                                            <?php }?>
                                    </tbody>
                                </table>
                            </div> <!-- /.table-stats -->
                        </div>
                    </div> <!-- /.card -->
                </div>  <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /.orders -->
    </div>
    <!-- .animated -->
</div>
@endsection