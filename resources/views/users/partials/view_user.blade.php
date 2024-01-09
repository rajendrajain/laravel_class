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