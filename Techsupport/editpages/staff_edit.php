<?php
	include("include/config.inc.php");
?>
<?php
$sid= $_GET["id"];
$mode= $_GET["mode"];
$mode1= $_GET["mode1"];


if(isset($mode) && $mode='edit' && $sid>0)
{
    $q='SELECT * FROM staff_master WHERE  satff_id='.$sid;
    $result=mysqli_query($con,$q);

    $row=mysqli_fetch_assoc($result);

    $sn=$row["staff_name"];
    $sm=$row["email"];
    $sem=$row["mobile"];
}

if(isset($mode1) && $mode1='delete' && $sid>0)
{
$sql = 'DELETE FROM staff_master WHERE satff_id='.$sid;

if ($con->query($sql) === TRUE) {
  echo '<script>alert("Data Deleted Successfully")</script>';
  header("location: staff_master.php");
} else {
  echo "Error deleting record: " . $con->error;
}

$con->close();
}

if (isset($_POST['update']))
{

    $sn=$_POST['sn'];
    $sm=$_POST['sm'];
    $sem=$_POST['sem'];

    $q="UPDATE `staff_master` SET `staff_name`='".$sn."',`mobile`='".$sm."',`email`='".$sem."' WHERE satff_id=".$sid;
       error_reporting(E_ALL); 

    //echo $q;
    //exit;
    if(mysqli_query($con,$q)){
       // echo "Date updated scussfully!";
        echo "<script>window.location.href='staff_master.php';</script>";
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

            <div class="mws-panel grid_4">
                    <div class="mws-panel-header">
                        <span>Edit Staff</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" method="post" action="">
                            <div class="mws-form-inline">
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">Staff Name</label>
                                    <div class="mws-form-item">
                                        <input type="text" name="sn" value="<?php echo $sn ?>" class="large">
                                    </div>
                                </div>
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">Mobile</label>
                                    <div class="mws-form-item">
                                        <input type="text" name="sm" value="<?php echo $sm ?>" class="large">
                                    </div>
                                </div>
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">Email</label>
                                    <div class="mws-form-item">
                                        <input type="text" name="sem" value="<?php echo $sem ?>" class="large">
                                    </div>
                                </div>
                                <div class="mws-button-row">
                                <input type="submit" value="UPDATE" name="update" class="btn btn-danger">
                                <input type="reset" value="RESET" class="btn ">
                            </div> 
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