<?php
  include("include/config.inc.php");

$cpid= $_GET["id"];
$mode= $_GET["mode"];
$mode1= $_GET["mode1"];
$mode2=$_GET["mode2"];

if(isset($mode) && $mode='edit' && $cpid>0)
{
    $q='SELECT * FROM clint_productdetails WHERE client_prod_id ='.$cpid;
    $result=mysqli_query($con,$q);

    $row=mysqli_fetch_assoc($result);

    $cn=$row["clint_id"];
    $pn=$row["product_id"];
    $insd=$row["install_date"];
    $iltf=$row["is_lifetime_free"];
    $svd=$row["service_valid_upto"];
}

if(isset($mode1) && $mode1='delete' && $cpid>0)
{
$sql = 'DELETE FROM clint_productdetails WHERE client_prod_id ='.$cpid;

if ($con->query($sql) === TRUE) {
  echo '<script>alert("Data Deleted Successfully")</script>';
  header("location: client_product.php");
} else {
  echo "Error deleting record: " . $con->error;
}

$con->close();
}

if (isset($_POST['update']))
{

    $cn=$_POST['cn'];
    $pn=$_POST['pn'];
    $insd=$_POST['insd'];
    $iltf=$_POST['iltf'];
    $svd=$_POST['svd'];

    $q="UPDATE `clint_productdetails` SET `clint_id`='$cn',`product_id`='$pn',`install_date`='$insd',`is_lifetime_free`='$iltf',`service_valid_upto`='$svd' WHERE client_prod_id =$cpid";
       error_reporting(E_ALL); 

    //echo $q;
    //exit;
    if(mysqli_query($con,$q)){
       // echo "Date updated scussfully!";
        echo "<script>window.location.href='client_product.php';</script>";
        //exit();
    }
    else {
       // echo "Error: " . $q . ":-" . mysqli_error($con);
     }
}
if(isset($mode2) && $mode2='add'){
if (isset($_POST['update']))
{
    $cn=$_POST['cn'];
    $pn=$_POST['pn'];
    $insd=$_POST['insd'];
    $iltf=$_POST['iltf'];
    $svd=$_POST['svd'];
    
    //$GoTo = "client_reg.php";

    $q="INSERT INTO `clint_productdetails`(`clint_id`, `product_id`, `install_date`, `is_lifetime_free`, `service_valid_upto`) VALUES ('".$cn."','".$pn."','".$insd."','".$iltf."','".$svd."')";
    if(mysqli_query($con,$q))
    {
        echo "<script>window.location.href='client_product.php';</script>";
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
            echo "<title>Add Client Product</title>";
        }
        if (isset($mode) && $mode='edit'){
            echo "<title>Edit Client Product</title>";   
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

                <div class="mws-panel grid_8">
                    <?php 
                    if (isset($mode2) && $mode2='add')
                        {   
                    echo "<div class='mws-panel-header'>
                        <span>Add Client Product</span>
                    </div>";
                    }
                    if (isset($mode) && $mode='edit'){
                    echo "<div class='mws-panel-header'>
                        <span>Edit Client Product</span>
                    </div>";   
                    }
                    ?>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" method="post" action="">
                            <div class="mws-form-inline">

                                <div class="mws-form-row ">
                                    <label class="mws-form-label">Client Name</label>
                                    <div class="mws-form-item">
                                        <select name="cn" class="mws-select2 small">
                                            <option> --select Client--</option>
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
                                            <option value="<?php echo $option['clint_id']; ?>"
                                            <?php

                                            if ($cn == $option['clint_id'])
                                            {
                                                echo "Selected";
                                            }  

                                            ?>> <?php echo $option['clint_name']; ?></option>
                                            <?php }?>
                                       </select>
                                    </div>
                                </div>

                                <div class="mws-form-row ">
                                    <label class="mws-form-label">Product Name</label>
                                    <div class="mws-form-item">
                                        <select name="pn" class="mws-select2 small">
                                            <option> --select Product--</option>
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
                                            <option value="<?php echo $option['product_id']; ?>"
                                            <?php

                                            if ($pn == $option['product_id'])
                                            {
                                                echo "Selected";
                                            }  

                                            ?>> <?php echo $option['product_name']; ?></option>
                                            <?php }?>
                                       </select>
                                    </div>
                                </div>

                                <div class="mws-form-row">
                                        <label class="mws-form-label">Install Date</label>
                                        <div class="mws-form-item">
                                            <input type="text" class="mws-datepicker-wk small" name="insd" value="<?php echo $insd ?>" readonly>
                                        </div>
                                    </div>

                                <div class="mws-form-row">
                                        <label class="mws-form-label">Is Life Time Free</label>
                                        <div class="mws-form-item">
                                            <select name="iltf" id="status" class="mws-select2 small">
                                                <option>--Select--</option>
                                                <option id="YES" value="YES"<?php
                                                if($iltf == 'YES'){
                                                    echo "selected";
                                                } 
                                                ?>>Yes, It's Free</option>
                                                <option id="NO" value="NO"<?php
                                                if($iltf == 'NO'){
                                                    echo "selected";
                                                } 
                                                ?>>No, It's Not</option>
                                            </select>
                                        </div>
                                    </div>
                                
                                <div class="NO box">
                                    <div class="mws-form-row">
                                        <label class="mws-form-label">Service Valid Upto..</label>
                                        <div class="mws-form-item">
                                            <input type="text" class="mws-datepicker small" name="svd" value="<?php echo $svd ?>" id="svd" readonly>
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
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#status").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".box").not(".box" + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".box").hide(); 
            }
            $('#svd').val('');
        });
    }).change();
});
</script>
        </div>
        
    </div>
  <?php include('include/jlinks.php'); ?>
    <script>

 
  </script> 
</body>
</html>