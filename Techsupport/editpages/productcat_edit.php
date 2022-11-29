<?php
	include("include/config.inc.php");
    ?>
<?php

$pid=$_GET["id"];
$mode=$_GET["mode"];
$mode1=$_GET["mode1"];

if(isset($mode) && $mode='edit' && $pid>0)
{
    $q='SELECT * FROM product_category WHERE product_cat_id ='.$pid;
    $result=mysqli_query($con,$q);

    $row=mysqli_fetch_assoc($result);

    $pn=$row["p_category"];
}


if(isset($mode1) && $mode='delete' && $pid>0)
{
    $sql = 'DELETE FROM product_category WHERE product_cat_id ='.$pid;
    if ($con->query($sql) === TRUE) {
        echo '<script>alert("Data Deleted Successfully")</script>';
        header("location: productcat_reg.php");
    } else {
        echo "Error deleting record: " . $con->error;
    }
$con->close();
}


if (isset($_POST['update']))
{

    $pc=$_POST['pc'];

    $q="UPDATE `product_category` SET `p_category`='".$pc."' WHERE `product_cat_id`=".$pid;
     error_reporting(E_ALL); 

    //echo $q;
    //exit;
    if(mysqli_query($con,$q)){
       // echo "Date updated scussfully!";
        echo "<script>window.location.href='productcat_reg.php';</script>";
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
                        <span>Edit category</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" method="post" action="">
                            <div class="mws-form-inline">
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">Product Category</label>
                                    <div class="mws-form-item">
                                        <input type="text" name="pn" value="<?php echo $pn ?>" class="large">
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