<?php
include("include/config.inc.php");

$cid= $_GET["id"];
$mode= $_GET["mode"];
$mode1= $_GET["mode1"];
$mode2= $_GET["mode2"];
if(isset($mode) && $mode='edit' && $cid>0)
{
    $q='SELECT * FROM complaint_master WHERE complaint_id='.$cid;
    $result=mysqli_query($con,$q);
    $row=mysqli_fetch_assoc($result);
    
    $complaintno         = $row["complaint_no"]; 
    $product             = $row["product_id"];
    $problem             = $row['prob_id'];
    $client_id           = $row['clint_id'];
    $problem_deseription = $row['prob_deseription'];
    $complaint_date      = $row['complaint_date'];
    $complaint_time      = $row['complaint_time'];
    $booked_by_staff_id  = $row['booked_by_staff_id'];
    $priority            = $row['priority'];
    $complaint_status    = $row['complaint_status'];
    $assign_to_staff     = $row['assign_to_staff_id'];
    $pending_remark      = $row['pending_remark'];
    $completed_by_staff  = $row['completed_by_staff_id'];
    $completion_date     = $row['completion_date'];
    $completion_time     = $row['completion_time'];
    $completion_remark   = $row['completion_remark'];
    $attachment          = $row['attachment'];
}
if(isset($mode1) && $mode1='delete' && $cid>0)
{
$sql = 'DELETE FROM complaint_master WHERE complaint_id ='.$cid;

if ($con->query($sql) === TRUE) {
  echo '<script>alert("Data Deleted Successfully")</script>';
  header("location: complaint_master.php");
} else {
  echo "Error deleting record: " . $con->error;
}

$con->close();
}


if (isset($_POST['update']))
{
    $complaint_date      = $_POST['complaint_date'];
    $complaint_time      = $_POST['complaint_time'];
    $client_name         = $_POST['client_name'];
    $product_name        = $_POST["product_name"];
    $booked_by_staff     = $_POST['booked_by_staff'];
    $problem_name        = $_POST['problem_name'];
    $problem_deseription = $_POST['problem_deseription'];
    $priority            = $_POST['priority'];
    $complaint_status    = $_POST['complaint_status'];
    $assign_to_staff     = $_POST['assign_to_staff'];
    $pending_remark      = $_POST['pending_remark'];
    $completion_date     = $_POST['completion_date'];
    $completion_time     = $_POST['completion_time'];
    $completed_by_staff  = $_POST['completed_by_staff'];
    $completion_remark   = $_POST['completion_remark'];
    $attachment = $_FILES['attachment']['name'];

    if(empty($attachment))
    {
        $q="UPDATE `complaint_master` SET `complaint_date`='".$complaint_date."',
        `complaint_time`='".$complaint_time."',
        `clint_id`='".$client_name."',
        `product_id`='".$product_name."',
        `booked_by_staff_id`='".$booked_by_staff."',
        `prob_id`='".$problem_name."',
        `prob_deseription`='".$problem_deseription."',
        `priority`='".$priority."',
        `complaint_status`='".$complaint_status."',
        `assign_to_staff_id`='".$assign_to_staff."',
        `pending_remark`='".$pending_remark."',
        `completion_date`='".$completion_date."',
        `completion_time`='".$completion_time."',
        `completed_by_staff_id`='".$completed_by_staff."',
        `completion_remark`='".$completion_remark."' WHERE complaint_id=".$cid;

        //error_reporting(E_ALL); 
        //echo $q;
        //exit;
        if(mysqli_query($con,$q))
        {
        // echo "Date updated successfully!";
        echo "<script>window.location.href='complaint_master.php';</script>";
        move_uploaded_file($_FILES['attachment']['tmp_name'],'upload/complaintimage/'.$_FILES["attachment"]['name']);
        exit();
        }
        else{
        echo "Error: " . $q . ":-" . mysqli_error($con);
        }
    }
    else{
        $q="UPDATE `complaint_master` SET 
                   `complaint_date`='".$complaint_date."',
                   `complaint_time`='".$complaint_time."',
                   `clint_id`='".$client_name."',
                   `product_id`='".$product_name."',
                   `booked_by_staff_id`='".$booked_by_staff."',
                   `prob_id`='".$problem_name."',
                   `prob_deseription`='".$problem_deseription."',
                   `priority`='".$priority."',
                   `complaint_status`='".$complaint_status."',
                   `assign_to_staff_id`='".$assign_to_staff."',
                   `pending_remark`='".$pending_remark."',
                   `completion_date`='".$completion_date."',
                   `completion_time`='".$completion_time."',
                   `completed_by_staff_id`='".$completed_by_staff."',
                   `completion_remark`='".$completion_remark."',
                   `attachment`='".$attachment."' WHERE complaint_id=".$cid;
        echo $q;
        mysqli_query($con,$q);
        unlink("upload/complaintimage/$attachment");
        move_uploaded_file($_FILES['attachment']['tmp_name'],'upload/complaintimage/'.$_FILES["attachment"]['name']);
        $msg='<div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> Property Data Update successful.
        </div>';
        echo "<script>window.location.href='complaint_master.php';</script>";
    }
}

if(isset($mode2) && $mode2='add')   
{
    if(isset($_POST['update']))
    {

        $str=rand();
        $complaint_no=$str;
        
        $complaint_date      = $_POST['complaint_date'];
        $complaint_time      = $_POST['complaint_time'];
        $client_name         = $_POST['client_name'];
        $product_name        = $_POST["product_name"];
        $booked_by_staff     = $_POST['booked_by_staff'];
        $problem_name        = $_POST['problem_name'];
        $problem_deseription = $_POST['problem_deseription'];
        $priority            = $_POST['priority'];
        $complaint_status    = $_POST['complaint_status'];
        $assign_to_staff     = $_POST['assign_to_staff'];   
        $pending_remark      = $_POST['pending_remark'];
        $completion_date     = $_POST['completion_date'];
        $completion_time     = $_POST['completion_time'];
        $completed_by_staff  = $_POST['completed_by_staff'];
        $completion_remark   = $_POST['completion_remark'];
        $attachment = $_FILES['attachment']['name'];

        $q="INSERT INTO `complaint_master`(`complaint_no`, `complaint_date`, `complaint_time`, `clint_id`, `product_id`, `booked_by_staff_id`, `prob_id`, `prob_deseription`, `priority`, `complaint_status`, `assign_to_staff_id`, `pending_remark`, `completion_date`, `completion_time`, `completed_by_staff_id`, `completion_remark`, `attachment`) 
        VALUES ('".$complaint_no."','".$complaint_date."','".$complaint_time."','".$client_name."','".$product_name."','".$booked_by_staff."','".$problem_name."','".$problem_deseription."','".$priority."','".$complaint_status."','".$assign_to_staff."','".$pending_remark."','".$completion_date."','".$completion_time."','".$completed_by_staff."','".$completion_remark."','".$attachment."')";
        //echo $q;
        if(mysqli_query($con,$q)){
            echo "<script>window.location.href='complaint_master.php';</script>";
            //echo "Date Inserted scussfully!";
            move_uploaded_file($_FILES['attachment']['tmp_name'],'upload/complaintimage/'.$_FILES["attachment"]['name']);
        }
        else 
        {
            echo "Error: " . $q . ":-" . mysqli_error($con);
        }
    }
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<?php include('include/head.php'); ?>
    <?php 
        if (isset($mode2) && $mode2='add'){   
            echo "<title>Add Complaint</title>";
        }
        if (isset($mode) && $mode='edit'){
            echo "<title>Edit Complaint</title>";   
        }
    ?>

</head>

<body>
    <!-- Header -->
    <?php include('include/header.php'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
    $("#status").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".box").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".box").hide();
            }
        });
    }).change();
});
</script>

<script>
$(document).ready(function() {
    $('#product').on('change', function() {
            var product_id = this.value;
            $.ajax({
                url: "",
                type: "POST",
                data: {
                    product_id : product_id 
                },
                cache: false,
                success: function(result){
                    $("#problem").html(result);
                        //alert(product_id);
                }
            });
        });        
    });  
</script>

<?php
$product_id = $_POST["product_id"];
$query = "SELECT * FROM problem_master where product_id = $product_id";
$result = $con->query($query);
    if($result->num_rows>0){
    $options = mysqli_fetch_all($result, MYSQLI_ASSOC);    
    }
    foreach ($options as $option){ ?>
    <option value="<?php echo $option["prob_id"];?>"<?php
    if ($problem == $option['prob_id'])
    {
    echo "Selected";
    }  
    ?>><?php echo $option["prob_name"];?></option>
    <?php } ?>

<!-- Start Main Wrapper -->
    <div id="mws-wrapper">
        
        <?php include("include/sidebar.php"); ?>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
            <!-- Inner Container Start -->
            <div class="container">

                <div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                    <?php 
                    if (isset($mode2) && $mode2='add')
                        {   
                    echo "<span>Add Complaint</span>";
                    }
                    if (isset($mode) && $mode='edit'){
                    echo "<span>Edit Complaint</span>";   
                    }
                    ?>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" method="post" enctype="multipart/form-data" action=""> 
                            <fieldset class="wizard-step mws-form-inline">
                                <legend class="wizard-label"><i class="icol-application-edit"></i><b> COMPLAINT NO : <?php 
                                if (isset($mode2) && $mode2='add')
                                {
                                $complaint_no=" - -";
                                echo $complaintno;
                                }
                                if (isset($mode) && $mode='edit'){
                                    echo "<u>".$complaintno."</u>";
                                }
                                ?></legend>
                            </fieldset>
                            <div class="mws-form-row bordered">
                                <div class="mws-form-cols">
                                    <div class="mws-form-col-2-8">
                                        <label class="mws-form-label">Product Name</label>
                                        <div class="mws-form-item">
                                            <select class="mws-select2" id="product" name="product_name">
                                            <option>-- select product --</option>
                                            <?php
                                            $query ="SELECT * FROM product_master";
                                            $result = $con->query($query);
                                            if($result->num_rows> 0){
                                            $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
                                            } 
                                            foreach ($options as $option) {
                                            ?>
                                            <option value="<?php echo $option['product_id']; ?>"<?php
                                            if ($product == $option['product_id'])
                                            {
                                                echo "Selected";
                                            }  
                                            ?>><?php echo $option['product_name']; ?></option>
                                            <?php }?>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="mws-form-col-4-8">
                                        <label class="mws-form-label">Problem Name</label>
                                        <div class="mws-form-item">
                                        <select name="problem_name" id="problem" class="mws-select2">
                                        <option>-- Select Problem --</option>
                                        <?php
                                            $query ="SELECT * FROM problem_master";
                                            $result = $con->query($query);
                                            if($result->num_rows> 0){
                                            $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
                                            } 
                                            foreach ($options as $option) {
                                            ?>
                                            <option value="<?php echo $option['prob_id']; ?>"<?php
                                            if ($problem == $option['prob_id'])
                                            {
                                                echo "Selected";
                                            }  
                                            ?>><?php echo $option['prob_name']; ?></option>
                                            <?php }?>
                                    </select>
                                        </div>
                                    </div>
                                    <div class="mws-form-col-2-8">
                                        <label class="mws-form-label">Client Name</label>
                                        <div class="mws-form-item">
                                            <select name="client_name" class="mws-select2">
                                            <option>-- select client --</option>
                                            <?php
                                            $query ="SELECT * FROM clint_master";
                                            $result = $con->query($query);
                                            if($result->num_rows> 0){
                                            $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
                                            }
                                            ?>
                                            <?php 
                                            foreach ($options as $option) {
                                            ?>
                                            <option value="<?php echo $option['clint_id']; ?>"<?php
                                            if ($client_id == $option['clint_id'])
                                            {
                                                echo "Selected";
                                            }  
                                            ?>><?php echo $option['clint_name']; ?></option>
                                            <?php }?>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mws-form-row">
                                <div class="mws-form-cols">
                                    <div class="mws-form-col-5-8">
                                        <label class="mws-form-label">Problem Deseription</label>
                                        <div class="mws-form-item">
                                            <textarea name="problem_deseription" rows="" cols="" class="small"><?php echo $problem_deseription ?></textarea>
                                        </div>
                                    </div><br>
                                    <div class="mws-form-col-3-8">
                                        <label class="mws-form-label">Complaint Date</label>
                                        <div class="mws-form-item">
                                            <input type="date" name="complaint_date" value="<?php echo $complaint_date?>">
                                        </div>
                                    </div><br><br><br>
                                    <div class="mws-form-col-3-8">
                                        <label class="mws-form-label">Complaint Time</label>
                                        <div class="mws-form-item">
                                        <input type="time" name="complaint_time" value="<?php echo $complaint_time?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mws-form-row">
                                <div class="mws-form-cols">
                                 <div class="mws-form-col-3-8">
                                        <label class="mws-form-label">Booked By Staff</label>
                                        <div class="mws-form-item">
                                            <select name="booked_by_staff" class="mws-select2">
                                            <option>-- Select Staff --</option>
                                            <?php                                            
                                            $query ="SELECT * FROM staff_master";
                                            $result = $con->query($query);
                                            if($result->num_rows> 0){
                                            $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
                                            }
                                            ?>
                                            <?php 
                                            foreach ($options as $option) {
                                            ?>
                                            <option value="<?php echo $option['staff_id']; ?>"<?php
                                            if ($booked_by_staff_id == $option['staff_id'])
                                            {
                                                echo "selected";
                                            }  
                                            ?>><?php echo $option['staff_name']; ?></option>
                                            <?php }?>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="mws-form-col-2-8">
                                        <label class="mws-form-label">Complaint Status</label>
                                        <div class="mws-form-item">
                                            <select name="complaint_status" id="status" class="mws-select" class="required">
                                                <option value="null">Select</option>
                                                <option value="Pending"<?php
                                                if($complaint_status == 'Pending'){
                                                    echo "selected";
                                                } 
                                                ?>>Pending</option>
                                                <option value="Completed"<?php
                                                if($complaint_status == 'Completed'){
                                                    echo "selected";
                                                } 
                                                ?>>Complete</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mws-form-col-3-8">
                                        <label class="mws-form-label">Priority</label>
                                        <div class="mws-form-item">
                                        <select name="priority" class="mws-select2">
                                            <option>-- Select Priority--</option>
                                            <option value="Regular"<?php
                                                if($priority == 'Regular'){
                                                    echo "selected";
                                                } 
                                                ?>>Regular</option>
                                            <option value="High Priority"<?php
                                                if($priority == 'High Priority'){
                                                    echo "selected";
                                                } 
                                                ?>>High Priority</option>
                                        </select>
                                        </div>
                                    </div>
 
                                </div>
                            </div>
                            <div class="Pending box">
                            <div class="mws-form-row">
                                <div class="mws-form-cols">
                                    <div class="mws-form-col-3-8">
                                        <label class="mws-form-label">Assign To Staff</label>
                                        <div class="mws-form-item">
                                            <select name="assign_to_staff" class="mws-select2">
                                            <option>-- Select Staff --</option>
                                            <?php                                            
                                            $query ="SELECT * FROM staff_master";
                                            $result = $con->query($query);
                                            if($result->num_rows> 0){
                                            $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
                                            }
                                            ?>
                                            <?php 
                                            foreach ($options as $option) {
                                            ?>
                                            <option value="<?php echo $option['staff_id']; ?>"<?php
                                            if ($assign_to_staff == $option['staff_id'])
                                            {
                                                echo "selected";
                                            }  
                                            ?>> <?php echo $option['staff_name']; ?></option>
                                            <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mws-form-col-5-8" id="Pending1">
                                        <label class="mws-form-label">Pending Remark</label>
                                        <div class="mws-form-item">
                                            <textarea rows="" cols="" id="p_remarks" class="small" name="pending_remark"><?php echo $pending_remark ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="Completed box">
                            <div class="mws-form-row">
                                <div class="mws-form-cols">
                                    <div class="mws-form-col-2-8">
                                        <label class="mws-form-label">Complete By Staff</label>
                                        <div class="mws-form-item">
                                            <select name="completed_by_staff" class="mws-select2"   >
                                            <option>-- Select Staff --</option>
                                            <?php                                            
                                            $query ="SELECT * FROM staff_master";
                                            $result = $con->query($query);
                                            if($result->num_rows> 0){
                                            $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
                                            }
                                            ?>
                                            <?php 
                                            foreach ($options as $option) {
                                            ?>
                                            <option value="<?php echo $option['staff_id']; ?>"<?php
                                            if ($completed_by_staff == $option['staff_id'])
                                            {
                                                echo "selected";
                                            }  
                                            ?>><?php echo $option['staff_name']; ?></option>
                                            <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mws-form-col-3-8" id="Completed1">
                                        <label class="mws-form-label">Completion Date</label>
                                        <div class="mws-form-item">
                                            <input type="date" id="c_date" name="completion_date" value="<?php echo $completion_date ?>">
                                        </div>
                                    </div>
                                    <div class="mws-form-col-3-8" id="Completed2">
                                        <label class="mws-form-label">Completion Time</label>
                                        <div class="mws-form-item">
                                            <input type="time" id="c_time" value="<?php echo $completion_time ?>" name="completion_time">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mws-form-row">
                                <div class="mws-form-cols">
                                    <div class="mws-form-col-8-8" id="Completed3">
                                        <label class="mws-form-label">Completion Remark</label>
                                        <div class="mws-form-item">
                                            <textarea type="text" name="completion_remark" id="c_remarks" rows="" cols="" class="large"><?php echo $completion_remark ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="mws-form-row">
                                <div class="mws-form-cols">
                                    <div class="mws-form-col-8-8">
                                        <label class="mws-form-label">Attechment</label>
                                        <div class="mws-form-item">
                                            <input type="file" name="attachment" placeholder="select image"><br/><br/>
                                            <img src='upload/complaintimage/<?php echo $attachment; ?>' width='30%'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mws-button-row">
                                <input type="submit" value="SAVE" name="update" class="btn btn-danger">
                                <input type="reset" value="RESET" class="btn ">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php include('include/footer.php'); ?>
            
        </div> 
    </div>
    <?php include('include/jlinks.php'); ?>
    <script>

 
    </script> 
</body>
</html>