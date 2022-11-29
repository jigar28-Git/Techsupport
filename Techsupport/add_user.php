<?php include("include/config.inc.php"); ?>
<?php

$uid=$_GET["id"];
$mode=$_GET["mode"];
$mode1=$_GET["mode1"];
$mode2=$_GET["mode2"];
if(isset($mode) && $mode='edit' && $uid>0)
{
    $q='SELECT * FROM user_master WHERE `user_id`='.$uid;
    $result=mysqli_query($con,$q);

    $row=mysqli_fetch_assoc($result);

    $dispname     = $row['disp_name'];
    $un           = $row['username'];
    $pass         = $row['password'];
    $userlevel    = $row['user_level'];
    $ulstaff      = $row['ul_staff_id'];
    $ulclient     = $row['ul_client_id'];
    $userstatus   = $row['user_status'];
    $ui           = $row['user_image'];
}


if(isset($mode1) && $mode='delete' && $uid>0)
{
    $sql = 'DELETE FROM user_master WHERE `user_id` ='.$uid;
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
    $displayname = $_POST['displayname'];
    $username    = $_POST['username'];
    $password    = $_POST['password'];
    $userlevel   = $_POST['userlevel'];
    $ulstaff     = $_POST['ulstaff'];
    $ulclient    = $_POST['ulclient'];
    $userstatus  = $_POST['userstatus'];
    $image       = $_FILES['image']['name'];
    if(empty($image)){
    $q="UPDATE `user_master` SET `disp_name`='".$displayname."',
                                  `username`='".$username."',
                                 `password`='".$password."',
                                 `user_level`='".$userlevel."',
                                 `ul_staff_id`='".$ulstaff."',
                                 `ul_client_id`='".$ulclient."',
                                 `user_status`='".$userstatus."' WHERE `user_id`=".$uid;
        error_reporting(E_ALL); 

        //echo $q;
        //exit;
        if(mysqli_query($con,$q)){
        // echo "Date updated scussfully!";
            echo "<script>window.location.href='user_master.php';</script>";
            //exit();
            move_uploaded_file($_FILES['image']['tmp_name'],'upload/userimg/'. $_FILES["image"]['name']);
        }
        else 
        {
       // echo "Error: " . $q . ":-" . mysqli_error($con);
        }
    }
    else{
        $q="UPDATE `user_master` SET `disp_name`='".$displayname."',
                                  `username`='".$username."',
                                 `password`='".$password."',
                                 `user_level`='".$userlevel."',
                                 `ul_staff_id`='".$ulstaff."',
                                 `ul_client_id`='".$ulclient."',
                                 `user_status`='".$userstatus."',
                                 `user_image`='".$image."' WHERE `user_id`=".$uid;
        mysqli_query($con,$q);
        unlink("upload/userimg/$image");
        move_uploaded_file($_FILES['image']['tmp_name'],'upload/userimg/'. $_FILES["image"]['name']);
        $msg='<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Property Data Update successful.
    </div>';
        echo "<script>window.location.href='user_master.php';</script>";
    }
}
if(isset($mode2) && $mode2='add')
{
    if (isset($_POST['update']))
    {
        $displayname = $_POST['displayname'];
        $username    = $_POST['username'];
        $password    = $_POST['password'];
        $userlevel   = $_POST['userlevel'];
        $ulstaff     = $_POST['ulstaff'];
        $ulclient    = $_POST['ulclient'];
        $userstatus  = $_POST['userstatus'];
        $image       = $_FILES['image']['name'];
        $q="INSERT INTO `user_master`(`disp_name`, `username`, `password`, `user_level`, `ul_staff_id`, `ul_client_id`, `user_status`, `user_image`)
            VALUES ('".$displayname."','".$username."','".$password."','".$userlevel."','".$ulstaff."','".$ulclient."','".$userstatus."','".$image."')";
        
        if(mysqli_query($con,$q)){
            //echo "Date Inserted scussfully!";
            echo "<script>window.location.href='user_master.php';</script>";
            move_uploaded_file($_FILES['image']['tmp_name'],'upload/userimg/'. $_FILES["image"]['name']);
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
<?php 
        if (isset($mode2) && $mode2='add'){   
            echo "<title>Add User</title>";
        }
        if (isset($mode) && $mode='edit'){
            echo "<title>Edit User</title>";   
        }
    ?>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>      

    <!-- Header -->
    <?php include('include/header.php'); ?>

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
        });
    }).change();
});
</script> 

<script>
    function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<body>
    
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
                        <span>Add User</span>
                    </div>";
                    }
                    if (isset($mode) && $mode='edit'){
                    echo "<div class='mws-panel-header'>
                        <span>Edit User</span>
                    </div>";   
                    }
                    ?>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" method="post" action="" enctype="multipart/form-data">
                            <div class="mws-form-inline">
                                <div class="mws-form-row ">
                                    <label class="mws-form-label">Display Name</label>
                                    <div class="mws-form-item">
                                        <input type="text" name="displayname" value="<?php echo $dispname?>" class="small">
                                    </div>
                                </div>

                                <div class="mws-form-row ">
                                    <label class="mws-form-label">User Name</label>
                                    <div class="mws-form-item">
                                        <input type="text" value="<?php echo $un ?>" name="username" class="small">
                                    </div>
                                </div>

                                <div class="mws-form-row ">
                                    <label class="mws-form-label">Password</label>
                                    <div class="mws-form-item">
                                        <input type="password" name="password" value="<?php echo $pass ?>" class="small" id="myInput"><br/>
                                    </div>
                                </div>
                                <div class="mws-form-row ">
                                    <div class="mws-form-item">
                                        <input type="checkbox" onclick="myFunction()">&nbsp;<b> Show Password</b>
                                    </div>
                                </div>

                                <div class="mws-form-row ">
                                    <label class="mws-form-label">User Level</label>
                                    <div class="mws-form-item">
                                        <select name="userlevel" id="status" class="mws-select2 small">
                                        <option value="admin"<?php
                                                if($userlevel == 'admin'){
                                                    echo "selected";
                                                } 
                                                ?>>Admin</option>
                                        <option value="staff"<?php
                                                if($userlevel == 'staff'){
                                                    echo "selected";
                                                } 
                                                ?>>Staff</option>
                                        <option value="client"<?php
                                                if($userlevel == 'client'){
                                                    echo "selected";
                                                } 
                                                ?>>Client</option>
                                        <option value="operator"<?php
                                                if($userlevel == 'operator'){
                                                    echo "selected";
                                                } 
                                                ?>>Operator</option>
                                        </select>   
                                    </div>
                                </div>
                                <div class="staff box">
                                    <div class="mws-form-row">
                                        <label class="mws-form-label">Select Staff</label>
                                        <div class="mws-form-item">
                                        <select name="ulstaff" class="small">
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
                                            <option value="<?php echo $option['staff_id']; ?>"<?php
                                            if ($ulstaff == $option['staff_id'])
                                            {
                                                echo "selected";
                                            }  
                                            ?>> <?php echo $option['staff_name']; ?></option>
                                            <?php }?>
                                        </select>
                                        </div>
                                    </div>
                                </div>          
                                <div class="client box">
                                    <div class="mws-form-row">
                                        <label class="mws-form-label">Select Client</label>
                                        <div class="mws-form-item">
                                        <select name="ulclient" class="small">
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

                                            if ($ulclient == $option['clint_id'])
                                            {
                                                echo "Selected";
                                            }  
                                            ?>> <?php echo $option['clint_name']; ?></option>
                                            <?php }?>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                        <label class="mws-form-label">Select Status</label>
                                    <div class="mws-form-item">
                                        <select name="userstatus" id="myselection" class="small">
                                            <option value="Is_System"<?php
                                                if($userstatus == 'Is_System'){
                                                    echo "selected";
                                                } 
                                                ?>>Is_System</option>
                                            <option value="Is_Suspend"<?php
                                                if($userstatus == 'Is_Suspend'){
                                                    echo "selected";
                                                }   
                                                ?>>Is_Suspend</option>        
                                        </select>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                        <label class="mws-form-label">Upload Image</label>
                                        <div class="mws-form-item">
                                            <input type="file" name="image" placeholder="select image" class="small"></br></br>
                                     <img src='upload/userimg/<?php echo $ui; ?>' width='30%'>   
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


            <?php include('include/footer.php'); ?>
        </div>
        
    </div>
    <?php include('include/jlinks.php'); ?>
    <script>

 
    </script> 
</body>
</html> 