<table class="table table-striped table-bordered">
    <tr>
        <td colspan="2" align="right"><a href="<?php echo url('/users/profile/'.base64_encode(base64_encode($users->id)));?>" class="btn btn-success">Update Profile</a></td>
    </tr>
    <tr>
        <td width='20%'>Img</td>
        <td>
            <?php 
            $pic = '';
            if(isset($users->Profile->pic) and $users->Profile->pic !=''){ ?>
                <img id="previewImg" src="<?php echo url('/uploads/users/'.$users->Profile->pic);?>" alt="Placeholder">     
           <?php }?>
            
        </td>
    </tr>
    <tr>
        <td width='20%'>ID</td>
        <td><?php echo ($users->Profile->id) ?? ""; ?></td>
    </tr>
    <tr>
        <td>Designation/Main Course</td>
        <td><?php echo $users->Profile->main_course ?? "";?></td>
    </tr>
    <tr>
        <td>Other Designation/Other Course</td>
        <td><?php echo $users->Profile->sub_course ?? "";?></td>
    </tr>
    <tr>
        <td>Salary/Fee</td>
        <td><?php echo $users->Profile->salary_fees ?? "";?></td>
    </tr>
    <tr>
        <td>Phone</td>
        <td><?php echo $users->Profile->phone ?? "";?></td>
    </tr>
    <tr>
        <td>Joining Date</td>
        <td><?php echo $users->Profile->joining_date ?? "";?></td>
    </tr>


    <tr>
        <td>Gender</td>
        <td><?php echo $users->Profile->gender ?? "";?></td>
    </tr>
    <tr>
        <td>Marital Status</td>
        <td><?php echo $users->Profile->marital_status ?? "";?></td>
    </tr>
    <tr>
        <td>DoM</td>
        <td><?php echo $users->Profile->dom ?? "";?></td>
    </tr>
    <tr>
        <td>Blood Group</td>
        <td><?php echo $users->Profile->blood_group ?? "";?></td>
    </tr>
    <tr>
        <td>Address</td>
        <td><?php echo $users->Profile->address ?? "";?></td>
    </tr>
    <tr>
        <td>City</td>
        <td><?php echo $users->Profile->city ?? "";?></td>
    </tr>
    <tr>
        <td>Zip Code</td>
        <td><?php echo $users->Profile->zip ?? "";?></td>
    </tr>



    <tr>
        <td>Created At</td>
        <td><?php echo $users->Profile->created_at ?? "";?></td>
    </tr>
    <tr>
        <td>Updated At</td>
        <td><?php echo $users->Profile->updated_at ?? "";?></td>
    </tr>
</table>