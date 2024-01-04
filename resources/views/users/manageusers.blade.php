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
                            <h4 class="box-title">Users </h4>
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th class="avatar">Avatar</th>
                                            <th>Full Name</th>
                                            <th>User Type</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(count($users) >=1){?>
                                            <?php foreach($users as $user){?>
                                                <tr>
                                                    <td><?php echo $user->registration_no?></td>
                                                    <td class="avatar"></td>
                                                    <td><?php echo $user->firstname.' '.$user->lastname?></td>
                                                    <td>User Type</td>
                                                    <td><?php echo $user->email?></td>
                                                    <td>Phone</td>
                                                    <td>
                                                        <?php 
                                                            if($user->is_active == 1){
                                                                echo 'Active';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo url('/users/view/'.base64_encode(base64_encode($user->id)));?>"> View </a> | 
                                                        <a href="<?php echo url('/users/edit/'.base64_encode(base64_encode($user->id)));?>"> Edit </a> | 
                                                         <a href="<?php echo url('/users/delete/'.base64_encode(base64_encode($user->id)));?>"> Delete </a>
                                                    </td>
                                                </tr>
                                            <?php }?>
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