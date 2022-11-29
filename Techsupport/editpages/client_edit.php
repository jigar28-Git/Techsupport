<?php
	include("include/config.inc.php");
?>
<?php
$cid= $_GET["id"];
$mode= $_GET["mode"];
$mode1= $_GET["mode1"];

if(isset($mode) && $mode='edit' && $cid>0)
{
    $q='SELECT * FROM clint_master WHERE clint_id ='.$cid;
    $result=mysqli_query($con,$q);

    $row=mysqli_fetch_assoc($result);

    $cn=$row["clint_name"];
    $ad=$row["address"];
    $ct=$row["city"];
    $pin=$row["pin"];
    $st=$row["state_id"];
    $wb=$row["website"];
    $gst=$row["gst_no"];
    $rm=$row["remarks"];
}

if(isset($mode1) && $mode1='delete' && $cid>0)
{
$sql = 'DELETE FROM clint_master WHERE clint_id ='.$cid;

if ($con->query($sql) === TRUE) {
  echo "<script>alert(Data Deleted Successfully')</script>";
  header("location: client_reg.php");
} else {
  echo "Error deleting record: " . $con->error;
}

$con->close();
}

if (isset($_POST['update']))
{

    $cn=$_POST['cn'];
    $ad=$_POST['ad'];
    $ct=$_POST['ct'];
    $pin=$_POST['pin'];
    $st=$_POST['st'];
    $wb=$_POST['wb'];
    $gst=$_POST['gst'];
    $rm=$_POST['rm'];

    $q="update clint_master set clint_name='$cn', address='$ad', city='$ct', pin='$pin' ,state_id='$st' ,website='$wb' ,gst_no='$gst',remarks='$rm'  where clint_id=$cid";
       error_reporting(E_ALL); 

    //echo $q;
    //exit;
    if(mysqli_query($con,$q)){
       // echo "Date updated scussfully!";
        echo "<script>window.location.href='client_reg.php';</script>";
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


                <div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span>Columned Form</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" action="" method="post">
                            <div class="mws-form-row">
                                <div class="mws-form-cols">
                                    <div class="mws-form-col-2-8">
                                        <label class="mws-form-label">Client Name</label>
                                        <div class="mws-form-item">
                                            <input type="text" name="cn" value="<?php echo $cn ?>">
                                        </div>
                                    </div>
                                    <div class="mws-form-col-2-8">
                                        <label class="mws-form-label">Enter State</label>
                                        <div class="mws-form-item">
                                            <select name="st" class="mws-select2">
                                            <?php 
                                            $query ="SELECT * FROM state_master";
                                            $result = $con->query($query);
                                            if($result->num_rows> 0){
                                            $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
                                            }
                                            ?>
                                            <?php 
                                            foreach ($options as $option) {
                                            ?>
                                            <option value="<?php echo $option['state_id']; ?>"<?php

                                            if ($st == $option['state_id'])
                                            {
                                                echo "Selected";
                                            }  

                                            ?>> <?php echo $option['state_name']; ?></option>
                                            <?php }?>
                                </select>
                                        </div>
                                    </div>
                                    <div class="mws-form-col-2-8">
                                        <label class="mws-form-label">Enter City</label>
                                        <div class="mws-form-item">
                                            <input type="text" name="ct" value="<?php echo $ct ?>">
                                        </div>
                                    </div>
                                    <div class="mws-form-col-2-8">
                                        <label class="mws-form-label">Enter PIN</label>
                                        <div class="mws-form-item">
                                            <input type="text" name="pin" value="<?php echo $pin ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mws-form-row">
                                <div class="mws-form-cols">
                                    <div class="mws-form-col-5-8">
                                        <label class="mws-form-label">Address</label>
                                        <div class="mws-form-item">
                                            <textarea type="text" name="ad" rows="" cols="" class="large"><?php echo $ad ?></textarea>
                                        </div>
                                    </div><br>
                                    <div class="mws-form-col-3-8">
                                        <label class="mws-form-label">WebSite</label>
                                        <div class="mws-form-item">
                                            <input type="text" name="wb" value="<?php echo $wb ?>">
                                        </div>
                                    </div><br><br><br><br>
                                    <div class="mws-form-col-3-8">
                                        <label class="mws-form-label">GST NUMBER</label>
                                        <div class="mws-form-item">
                                            <input type="text" name="gst" value="<?php echo $gst ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mws-form-row">
                                <div class="mws-form-cols">
                                    <div class="mws-form-col-8-8">
                                        <label class="mws-form-label">Remark</label>
                                        <div class="mws-form-item">
                                            <input type="text" name="rm" value="<?php echo $rm ?>">
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
	<?php include('include/jlinks.php'); ?>
    <script>

 
 	</script> 
</body>
</html>