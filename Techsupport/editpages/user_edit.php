<?php
    include("include/config.inc.php");
?>
<?php
$uid= $_GET["id"];
$mode= $_GET["mode"];
$mode1= $_GET["mode1"];


if(isset($mode) && $mode='edit' && $uid>0)
{
    $q='SELECT * FROM user_master WHERE user_id ='.$uid;
    $result=mysqli_query($con,$q);

    $row=mysqli_fetch_assoc($result);

    $dn=$row["disp_name"];
    $un=$row["username"];
    $ul=$row["user_level"];
    $uti=$row["user_table_id"];
    $psw=$row["password"];
    $us=$row["status"];
}

if(isset($mode1) && $mode1='delete' && $uid>0)
{
$sql = 'DELETE FROM user_master WHERE user_id ='.$uid;

if ($con->query($sql) === TRUE) {
  echo '<script>alert("Data Deleted Successfully")</script>';
  header("location: user_master.php");
} else {
  echo "Error deleting record: " . $con->error;
}

$con->close();
}

if (isset($_POST['update']))
{
    $dn=$_POST['dn'];
    $un=$_POST['un'];
    $psw=$_POST['psw'];
    $ul=$_POST['ul'];
    $uti=$_POST['uti'];
    $us=$_POST['us'];

    $q="UPDATE user_master SET disp_name ='".$dn."', username ='".$un."', user_level ='".$ul."', user_table_id ='".$uti."', password ='".$psw."', status ='".$us."' WHERE user_id = ".$uid;

    
       error_reporting(E_ALL); 

    echo $q;
    //exit;
    if(mysqli_query($con,$q)){
       // echo "Date updated scussfully!";
        echo "<script>window.location.href='user_master.php';</script>";
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>      

    <!-- Header -->
    <?php include('include/header.php'); ?>

<script>
$(document).ready(function(){
    $('#myselection').on('change', function(){
        var demovalue = $(this).val(); 
        $("div.myDiv").hide();
        $("#show"+demovalue).show();
    });
});

</script>
<body>
    
    <style>
.myDiv{
    display:none;
    padding:1px;
    margin-top:1px;
}
</style> 
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
        
        <?php include("include/sidebar.php"); ?>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
            <!-- Inner Container Start -->
            <div class="container">


                <div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span>Edit User</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" method="post" action="">
                            <div class="mws-form-inline">
                                <div class="mws-form-row ">
                                    <label class="mws-form-label">Display Name</label>
                                    <div class="mws-form-item">
                                        <input type="text" value="<?php echo $dn?>" name="dn" >
                                    </div>
                                </div>
                                <div class="mws-form-row ">
                                    <label class="mws-form-label">User Name</label>
                                    <div class="mws-form-item">
                                        <input type="text" value="<?php echo $un?>" name="un">
                                    </div>
                                </div>
                                <div class="mws-form-row ">
                                    <label class="mws-form-label">Password</label>
                                    <div class="mws-form-item">
                                        <input type="text" value="<?php echo $psw?>" name="psw" >
                                    </div>
                                </div>
                                <div class="mws-form-row ">
                                    <label class="mws-form-label">User Level</label>
                                    <div class="mws-form-item">
                                        <select name="ul" id="myselection" class="mws-select2 small">
                                        <option value="admin"<?php
                                                if($ul == 'admin'){
                                                    echo "selected";
                                                } 
                                                ?>>Admin</option>
                                        <option value="client"<?php
                                                if($ul == 'client'){
                                                    echo "selected";
                                                } 
                                                ?>>Client</option>
                                        <option value="staff"<?php
                                                if($ul == 'staff'){
                                                    echo "selected";
                                                } 
                                                ?>>Staff</option>
                                        <option value="operator"<?php
                                                if($ul == 'operator'){
                                                    echo "selected";
                                                } 
                                                ?>>Operator</option>
                                        </select>   
                                    </div>
                                </div>

                            <div class="mws-form-row ">
                                    <div class="mws-form-item">

                                        <div id="showclient" class="myDiv">
                                        
                                        <label class="mws-form">User table id</label>
                                        <select name="uti" class="mws-select2 small">
                                            <option>--select Client--</option>
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

                                            if ($uti == $option['clint_id'])
                                            {
                                                echo "Selected";
                                            }  

                                            ?>> <?php echo $option['clint_name']; ?></option>
                                            <?php }?>
                                        </select>
                                        </div>
                                        
                                        <div id="showstaff" class="myDiv">
                                        
                                        <select name="uti" class="mws-select2 small">
                                            <option>--select Staff--</option>
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

                                            if ($uti == $option['satff_id'])
                                            {
                                                echo "Selected";
                                            }  

                                            ?>> <?php echo $option['staff_name']; ?></option>
                                            <?php }?>
                                        </select>
                                        </div>

                                    </div>
                                </div>


                                <div class="mws-form-row">
                                    <label class="mws-form-label">User Status</label>
                                    <select name="us" id="myselection">
                                        <option value="Is_Suspend"<?php
                                                if($us == 'Is_Suspend'){
                                                    echo "selected";
                                                } 
                                                ?>>Is_Suspend</option>
                                        <option value="Is_System"<?php
                                                if($us == 'Is_System'){
                                                    echo "selected";
                                                } 
                                                ?>>Is_System</option>
                                        </select> 
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