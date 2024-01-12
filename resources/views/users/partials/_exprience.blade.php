<table class="table table-striped table-bordered">
    <tr>
        <td colspan="5" align="right"><a href="<?php echo url('/users/exprience/'.base64_encode(base64_encode($users->id)));?>" class="btn btn-success">Add Exprience</a></td>
    </tr>
    <tr>
        <td>Company Name</td>
        <td>Designation</td>
        <td>Start Date</td>
        <td>End Date</td>
        <td>Action</td>
    </tr>
    <?php if(!empty($users->Experince) and count($users->Experince) >=1){?>
        <?php foreach ($users->Experince as $Experince) {?>
            <tr>
                <td><?php echo $Experince->company;?></td>
                <td><?php echo $Experince->profile;?></td>
                <td><?php echo $Experince->start_date;?></td>
                <td><?php echo $Experince->end_date;?></td>
                <td>
                    <a href="<?php echo url('/users/view_experince/'.base64_encode(base64_encode($Experince->id)));?>"> View </a> | 
                    <a href="<?php echo url('/users/edit_experince/'.base64_encode(base64_encode($Experince->id)));?>"> Edit </a> | 
                    <a href="javascript:;" onclick="fnconfirmdelete('<?php echo url('/users/delete_experince/'.base64_encode(base64_encode($Experince->id)));?>');"> Delete </a>
                </td>
            </tr>
        <?php }?>
    <?php }?>
</table>
<script>
    function fnconfirmdelete(url){
        var r = confirm('Are you sure? you want to delete.');
        if(r == true){
            window.location.href = url;
        }
        return false;
    }
</script>