<?php
  include("include/config.inc.php");

$cid= $_GET["id"];
$mode= $_GET["mode"];
$mode1= $_GET["mode1"];
$mode2=$_GET["mode2"];

if(isset($mode) && $mode='edit' && $cid>0)
{
    $q='SELECT * FROM clint_contactdetail WHERE clcon_id ='.$cid;
    $result=mysqli_query($con,$q);

    $row=mysqli_fetch_assoc($result);

    $cn=$row["clint_id"];
    $cpn=$row["contact_person"];
    $mb=$row["mobile"];
    $en=$row["email"];
    $dg=$row["designation"];
}

if(isset($mode1) && $mode1='delete' && $cid>0)
{
$sql = 'DELETE FROM clint_contactdetail WHERE clcon_id ='.$cid;

if ($con->query($sql) === TRUE) {
  echo '<script>alert("Data Deleted Successfully")</script>';
  header("location: client_contact.php");
} else {
  echo "Error deleting record: " . $con->error;
}

$con->close();
}

if (isset($_POST['update']))
{

    $cn=$_POST['cn'];
    $cpn=$_POST['cpn'];
    $mb=$_POST['mb'];
    $en=$_POST['en'];
    $dg=$_POST['dg'];

    $q="update `clint_contactdetail` set clint_id='$cn', contact_person='$cpn', mobile='$mb', email='$en', designation='$dg' where clcon_id =$cid";
       error_reporting(E_ALL); 

    //echo $q;
    //exit;
    if(mysqli_query($con,$q)){
       // echo "Date updated scussfully!";
        echo "<script>window.location.href='client_contact.php';</script>";
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
    $cpn=$_POST['cpn'];
    $mb=$_POST['mb'];
    $en=$_POST['en'];
    $dg=$_POST['dg'];
    
    //$GoTo = "client_reg.php";

    $q="INSERT INTO `clint_contactdetail`(`clint_id`, `contact_person`, `mobile`, `email`, `designation`) VALUES ('".$cn."','".$cpn."','".$mb."','".$en."','".$dg."')";
    if(mysqli_query($con,$q))
    {
        echo "<script>window.location.href='client_contact.php';</script>";
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
            echo "<title>Add Client Contact</title>";
        }
        if (isset($mode) && $mode='edit'){
            echo "<title>Edit Client Contact</title>";   
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
                        <span>Add Contact</span>
                    </div>";
                    }
                    if (isset($mode) && $mode='edit'){
                    echo "<div class='mws-panel-header'>
                        <span>Edit Contact</span>
                    </div>";   
                    }
                    ?>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" method="post" action="">
                            <div class="mws-form-inline">

                                <div class="mws-form-row ">
                                    <label class="mws-form-label">Client Name</label>
                                    <div class="mws-form-item">
                                        <select name="cn">
                                            <option value=""> --select Client--</option>
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
                                    <label class="mws-form-label">Contact Person Name</label>
                                    <div class="mws-form-item">
                                        <input type="text" value="<?php echo $cpn ?>" name="cpn">
                                    </div>
                                </div>

                                <div class="mws-form-row ">
                                    <label class="mws-form-label">Mobile</label>
                                    <div class="mws-form-item">
                                        <input type="text" value="<?php echo $mb ?>" name="mb">
                                    </div>
                                </div>

                                <div class="mws-form-row ">
                                    <label class="mws-form-label">Email</label>
                                    <div class="mws-form-item">
                                        <input type="text" value="<?php echo $en ?>" name="en">
                                    </div>
                                </div>
                                
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">Designation</label>
                                    <div class="mws-form-item">
                                        <input type="text" value="<?php echo $dg ?>" name="dg"/> 
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