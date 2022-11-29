<?php
	include("include/config.inc.php");
?>
<?php
$cid= $_GET["id"];
$mode= $_GET["mode"];
$mode1= $_GET["mode1"];

if(isset($mode) && $mode='edit' && $cid>0)
{
    $q='SELECT * FROM complaint_master WHERE  complaint_id='.$cid;
    $result=mysqli_query($con,$q);

    $row=mysqli_fetch_assoc($result);

    $comp=$row["complaint_no"];
    $pn=$row["product_id"];
    $cs=$row['complaint_status'];
    $as=$row['assignedto_staff_id'];
    $pnr=$row['pending_remarks'];
    $cd=$row['completion_date'];
    $ct=$row['completion_time'];
    $cbs=$row['completed_by_staff_id'];
    $cr=$row['completion_remark'];
    $cn=$row['clint_id'];
    $bs=$row['booked_by_staff_id'];
    $prbn=$row['prob_id'];
    $prbd=$row['prob_description'];
    $pr=$row['priority'];
    $compd=$row['completion_date'];
    $compt=$row['completion_time'];
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

    $comp=$_POST["comp"];
    $pn=$_POST["pn"];
    $cs=$_POST['cs'];
    $as=$_POST['as'];
    $pnr=$_POST['pnr'];
    $cd=$_POST['cd'];
    $ct=$_POST['ct'];
    $cbs=$_POST['cbs'];
    $cr=$_POST['cr'];
    $cn=$_POST['cn'];
    $bs=$_POST['bs'];
    $prbn=$_POST['prbn'];
    $prbd=$_POST['prbd'];
    $pr=$_POST['pr'];
    $compd=$_POST['compd'];
    $compt=$_POST['compt'];

    $q="UPDATE `complaint_master` SET `complaint_time`='".$compt."',`clint_id`='".$cn."',`product_id`='".$pn."',`booked_by_staff_id`='".$bs."',`prob_id`='".$prbn."',`complaint_status`='".$cs."',`assignedto_staff_id`='".$as."',`pending_remarks`='".$pnr."',`completion_date`='".$cd."',`completion_time`='".$ct."',`completed_by_staff_id`='".$cbs."',`completion_remark`='".$cr."',`prob_description`='".$prbd."',`priority`='".$pr."',`complaint_date`='".$compd."' WHERE complaint_id=".$cid;
       error_reporting(E_ALL); 

    //echo $q;
    //exit;
    if(mysqli_query($con,$q)){
       // echo "Date updated scussfully!";
        echo "<script>window.location.href='complaint_master.php';</script>";
        //exit();
    }
    else {
       // echo "Error: " . $q . ":-" . mysqli_error($con);
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

<title><?php echo $_SESSION['title']; ?> Dashboard</title>
</head>

<body>
	<!-- Header -->
	<?php include('include/header.php'); ?>
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    	
        <?php include("include/sidebar.php"); ?>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
        	<!-- Inner Container Start -->
            <div class="container">
                <div class="mws-panel">
                    
                        <div class="mws-panel-header">
                            <span>Edit Complaint</span>
                        </div>
                        <div class="mws-panel-toolbar">
                                <div class="btn-toolbar">
                                <div class="btn-group">
                                <a href="#" class="btn"><i class="icol-application-edit"></i><b> COMPLAINT NO : <u><?php echo $comp?></u></b></a>
                            </div>
                        </div>
                    </div>

                        <div class="mws-panel-body no-padding">
                        <form class="mws-form" method="post" action="">
                            <div class="mws-form-inline">
                            <div class="mws-form-row">
                                <div class="mws-form-cols">
                                    <div class="mws-form-col-2-8">
                                        <label class="mws-form-label">Product Name</label>
                                        <div class="mws-form-item">
                                            <select class="mws-select2" name="pn">
                                            <?php                                           
                                            $query ="SELECT * FROM product_master";
                                            $result = $con->query($query);
                                            if($result->num_rows> 0){
                                            $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
                                            }
                                            ?>
                                            <?php 
                                            foreach ($options as $option) {
                                            ?>
                                            <option value="<?php echo $option['product_id']; ?>"<?php

                                            if ($pn == $option['product_id'])
                                            {
                                                echo "Selected";
                                            }  

                                            ?>> <?php echo $option['product_name']; ?></option>
                                            <?php }?>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="mws-form-col-4-8">
                                        <label class="mws-form-label">Problem Name</label>
                                        <div class="mws-form-item">
                                            <select name="prbn" class="mws-select2">
                                            <?php
                                            $query ="SELECT * FROM problem_master";
                                            $result = $con->query($query);
                                            if($result->num_rows> 0){
                                            $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
                                            }
                                            ?>
                                            <?php 
                                            foreach ($options as $option) {
                                            ?>
                                            <option value="<?php echo $option['prob_id']; ?>"<?php

                                            if ($prbn == $option['prob_id'])
                                            {
                                                echo "Selected";
                                            }  

                                            ?>> <?php echo $option['prob_name']; ?></option>
                                            <?php }?>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="mws-form-col-2-8">
                                        <label class="mws-form-label">Client Name</label>
                                        <div class="mws-form-item">
                                            <select name="cn" id="myselection">
                                            <option value=""> -- select client --</option>
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

                                            if ($cn == $option['clint_id'])
                                            {
                                                echo "Selected";
                                            }  

                                            ?>> <?php echo $option['clint_name']; ?></option>
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
                                            <textarea name="prbd" rows="" cols="" class="small"><?php echo $prbd ?></textarea>
                                        </div>
                                    </div><br>
                                    <div class="mws-form-col-3-8">
                                        <label class="mws-form-label">Booked By Staff</label>
                                        <div class="mws-form-item">
                                            <select name="bs" id="myselection">
                                            <option value=""> -- Select Staff --</option>
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
                                            <option value="<?php echo $option['satff_id']; ?>"<?php

                                            if ($bs == $option['satff_id'])
                                            {
                                                echo "Selected";
                                            }  

                                            ?>> <?php echo $option['staff_name']; ?></option>
                                            <?php }?>
                                        </select>
                                        </div>
                                    </div><br><br><br><br>
                                    <div class="mws-form-col-3-8">
                                        <label class="mws-form-label">Assign To Staff</label>
                                        <div class="mws-form-item">
                                            <select name="as">
                                            <option value=""> -- select Staff --</option>
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
                                            <option value="<?php echo $option['staff_name']; ?>"
                                            <?php

                                            if($as == $option['staff_name']){
                                            echo "selected";
                                            }

                                            ?>> <?php echo $option['staff_name']; ?></option>
                                            <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mws-form-row">
                                <div class="mws-form-cols">
                                    <div class="mws-form-col-2-8">
                                        <label class="mws-form-label">Complaint Date</label>
                                        <div class="mws-form-item">
                                            <input type="text" class="mws-datepicker-wk large" name="compd" value="<?php echo $compd?>" readonly>
                                        </div>
                                    </div>
                                    <div class="mws-form-col-2-8">
                                        <label class="mws-form-label">Complaint Time</label>
                                        <div class="mws-form-item">
                                        <input type="time" value="<?php echo $compt?>" name="compt">
                                        </div>
                                    </div>
                                    <div class="mws-form-col-2-8">
                                        <label class="mws-form-label">Priority</label>
                                        <div class="mws-form-item">
                                            <select name="pr">
                                            <option value="Regular" <?php
                                                if($pr == 'Regular'){
                                                    echo "selected";
                                                } 
                                                ?>> Regular 
                                            </option>
                                            <option value="High Priority"<?php
                                                if($pr == 'High Priority'){
                                                    echo "selected";
                                                } 
                                                ?>>High Priority</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mws-form-col-2-8">
                                        <label class="mws-form-label">Complaint Status</label>
                                        <div class="mws-form-item">
                                            <select name="cs">
                                            <option value="Pending" <?php
                                                if($cs == 'Pending'){
                                                    echo "selected";
                                                } 
                                                ?>> Pending 
                                            </option>
                                            <option value="complete"<?php
                                                if($cs == 'complete'){
                                                    echo "selected";
                                                } 
                                                ?>>Complete</option>
                                            </select>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="mws-form-row">
                                <div class="mws-form-cols">
                                    <div class="mws-form-col-8-8">
                                        <label class="mws-form-label">Pending Remark</label>
                                        <div class="mws-form-item">
                                            <textarea rows="" cols="" class="large" name="pnr"><?php echo $pnr ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <fieldset class="mws-form-inline">
                                <legend align="center">Completion Details</legend>
                                <div class="mws-form-row">
                                <div class="mws-form-cols">
                                    <div class="mws-form-col-2-8">
                                        <label class="mws-form-label">Complete By Staff</label>
                                        <div class="mws-form-item">
                                            <select name="cbs">
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
                                            <option value="<?php echo $option['staff_name']; ?>"<?php

                                            if ($cbs == $option['staff_name'])
                                            {
                                                echo "Selected";
                                            }  

                                            ?>> <?php echo $option['staff_name']; ?></option>
                                            <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mws-form-col-3-8">
                                        <label class="mws-form-label">Completion Date</label>
                                        <div class="mws-form-item">
                                            <input type="text" class="mws-datepicker-wk large" name="cd" value="<?php echo $cd ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="mws-form-col-3-8">
                                        <label class="mws-form-label">Completion Time</label>
                                        <div class="mws-form-item">
                                            <input type="time" value="<?php echo $ct ?>" name="ct">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </fieldset>
                            <div class="mws-form-row">
                                <div class="mws-form-cols">
                                    <div class="mws-form-col-8-8">
                                        <label class="mws-form-label">Completion Remark</label>
                                        <div class="mws-form-item">
                                            <textarea type="text" name="cr" rows="" cols="" class="large" ><?php echo $cr ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mws-button-row">
                                <input type="submit" value="UPDATE" name="update" class="btn btn-danger">
                                <input type="reset" value="RESET" class="btn ">
                            </div>
                        </form>
                    </div>      
                </div>

            </div>
            <?php include('include/footer.php'); ?>
            
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