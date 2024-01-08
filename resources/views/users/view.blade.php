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
                                <div class="table-stats">
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td colspan="2" align="right"><a href="<?php echo url('/users/edit/'.base64_encode(base64_encode($users->id)));?>" class="btn btn-success">Edit</a></td>
                                        </tr>
                                        <tr>
                                            <td width='20%'>ID</td>
                                            <td><?php echo $users->id?></td>
                                        </tr>
                                        <tr>
                                            <td>Reg. No</td>
                                            <td><?php echo $users->registration_no?></td>
                                        </tr>
                                        <tr>
                                            <td>First Name</td>
                                            <td><?php echo $users->firstname?></td>
                                        </tr>
                                        <tr>
                                            <td>Last Name</td>
                                            <td><?php echo $users->lastname?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><?php echo $users->email?></td>
                                        </tr>
                                        <tr>
                                            <td>User Type</td>
                                            <td><?php echo $users->usertype->name?></td>
                                        </tr>
                                        <tr>
                                            <td>Created At</td>
                                            <td><?php echo $users->created_at?></td>
                                        </tr>
                                        <tr>
                                            <td>Updated At</td>
                                            <td><?php echo $users->updated_at?></td>
                                        </tr>
                                    </table>
                                </div> <!-- /.table-stats -->
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