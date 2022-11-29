<?php
  include("include/config.inc.php");
  
$pid= $_GET["id"];
$mode= $_GET["mode"];
$mode1= $_GET["mode1"];
$mode2= $_GET["mode2"];

if(isset($mode) && $mode='edit' && $pid>0)
{
    $q='SELECT * FROM product_master WHERE  product_id='.$pid;
    $result=mysqli_query($con,$q);

    $row=mysqli_fetch_assoc($result);

    $pn=$row["product_name"];
    $pc=$row["product_cat_id"];
}

if(isset($mode1) && $mode1='delete' && $pid>0)
{
$sql = 'DELETE FROM product_master WHERE product_id='.$pid;

if ($con->query($sql) === TRUE) {
  echo '<script>alert("Data Deleted Successfully")</script>';
  header("location: product_reg.php");
} else {
  echo "Error deleting record: " . $con->error;
}

$con->close();
}

if (isset($_POST['update']))
{

    $pn=$_POST['pn'];
    $pc=$_POST['pc'];

    $q="UPDATE `product_master` SET `product_name`='".$pn."',`product_cat_id`='".$pc."' WHERE product_id=".$pid;
       error_reporting(E_ALL); 

    //echo $q;
    //exit;
    if(mysqli_query($con,$q)){
       // echo "Date updated scussfully!";
        echo "<script>window.location.href='product_reg.php';</script>";
        //exit();
    }
    else {
       // echo "Error: " . $q . ":-" . mysqli_error($con);
     }
}
if(isset($mode2) && $mode2='add')
{
if (isset($_POST['update']))
{
    $pc=$_POST['pc'];
    $pn=$_POST['pn'];

    $q="INSERT INTO `product_master`( `product_name`, `product_cat_id`) VALUES ('".$pn."', '".$pc."')";


    if(mysqli_query($con,$q)){
        echo "<script>window.location.href='product_reg.php';</script>";
    echo "Date Inserted scussfully!";
  }
  else {
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
            echo "<title>Add Product</title>";
        }
        if (isset($mode) && $mode='edit'){
            echo "<title>Edit Product</title>";   
        }
    ?>
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
                    <?php 
                    if (isset($mode2) && $mode2='add')
                        {   
                    echo "<div class='mws-panel-header'>
                        <span>Add Product</span>
                    </div>";
                    }
                    if (isset($mode) && $mode='edit'){
                    echo "<div class='mws-panel-header'>
                        <span>Edit Product</span>
                    </div>";   
                    }
                    ?>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" method="post" action="">
                            <div class="mws-form-inline">
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">Product Name</label>
                                    <div class="mws-form-item">
                                        <input type="text" name="pn" value="<?php echo $pn ?>" class="large">
                                    </div>
                                </div>
                                <div class="mws-form-row bordered">
                            <label class="mws-form-label">Product Category</label>
                                <div class="mws-form-item">
                                    <select name="pc" class="mws-select2">
                                            <?php 
                                            $query ="SELECT * FROM product_category";
                                            $result = $con->query($query);
                                            if($result->num_rows> 0){
                                            $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
                                            }
                                            ?>
                                            <?php 
                                            foreach ($options as $option) {
                                            ?>
                                            <option value="<?php echo $option['product_cat_id']; ?>" 
                                            <?php

                                            if ($pc == $option['product_cat_id'])
                                            {
                                                echo "Selected";
                                            }  

                                            ?>> 
                                            <?php echo $option['p_category']; ?></option>
                                            <?php }?>
                                </select>
                                    </div>
                                </div> 
                                <div class="mws-button-row">
                                <input type="submit" value="SAVE" name="update" class="btn btn-danger">
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