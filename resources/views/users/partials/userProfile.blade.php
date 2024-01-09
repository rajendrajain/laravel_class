<table class="table table-striped table-bordered">
    <tr>
        <td colspan="2" align="right"><a href="<?php echo url('/users/profile/'.base64_encode(base64_encode($users->id)));?>" class="btn btn-success">Update Profile</a></td>
    </tr>
    <tr>
        <td width='20%'>ID</td>
        <td><?php echo $profile->id?></td>
    </tr>
    <tr>
        <td>Designation/Main Course</td>
        <td><?php echo $profile->main_course?></td>
    </tr>
    <tr>
        <td>Other Designation/Other Course</td>
        <td><?php echo $profile->sub_course?></td>
    </tr>
    <tr>
        <td>Salary/Fee</td>
        <td><?php echo $profile->salary_fees?></td>
    </tr>
    <tr>
        <td>Phone</td>
        <td><?php echo $profile->phone?></td>
    </tr>
    <tr>
        <td>Joining Date</td>
        <td><?php echo $profile->joining_date?></td>
    </tr>


    <tr>
        <td>Gender</td>
        <td><?php echo $profile->gender?></td>
    </tr>
    <tr>
        <td>Marital Status</td>
        <td><?php echo $profile->marital_status?></td>
    </tr>
    <tr>
        <td>DoM</td>
        <td><?php echo $profile->dom?></td>
    </tr>
    <tr>
        <td>Blood Group</td>
        <td><?php echo $profile->blood_group?></td>
    </tr>
    <tr>
        <td>Address</td>
        <td><?php echo $profile->address?></td>
    </tr>
    <tr>
        <td>City</td>
        <td><?php echo $profile->city?></td>
    </tr>
    <tr>
        <td>Zip Code</td>
        <td><?php echo $profile->zip?></td>
    </tr>



    <tr>
        <td>Created At</td>
        <td><?php echo $profile->created_at?></td>
    </tr>
    <tr>
        <td>Updated At</td>
        <td><?php echo $profile->updated_at?></td>
    </tr>
</table>