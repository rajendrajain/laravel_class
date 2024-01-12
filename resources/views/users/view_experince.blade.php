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
                                <div class="table-stats">
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td colspan="2" align="right"><a href="javascript:;" onclick="history.back()" class="btn btn-success">Back</a></td>
                                        </tr>
                                        <tr>
                                            <td width='20%'>ID</td>
                                            <td><?php echo $Experince->id?></td>
                                        </tr>
                                        <tr>
                                            <td>Company Name</td>
                                            <td><?php echo $Experince->company?></td>
                                        </tr>
                                        <tr>
                                            <td>Designation</td>
                                            <td><?php echo $Experince->profile?></td>
                                        </tr>
                                        <tr>
                                            <td>Start Date</td>
                                            <td><?php echo $Experince->start_date?></td>
                                        </tr>
                                        <tr>
                                            <td>End Date</td>
                                            <td><?php echo $Experince->end_date?></td>
                                        </tr>
                                        <tr>
                                            <td>Comment</td>
                                            <td><?php echo $Experince->comment?></td>
                                        </tr>
                                        <tr>
                                            <td>Created At</td>
                                            <td><?php echo $Experince->created_at?></td>
                                        </tr>
                                        <tr>
                                            <td>Updated At</td>
                                            <td><?php echo $Experince->updated_at?></td>
                                        </tr>
                                    </table>
                                </div> <!-- /.table-stats -->
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