<?php
	include("include/config.inc.php");
?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<head>
    <?php include('include/head.php'); ?>

<title><?php echo $_SESSION['title']; ?> Complaint Master</title>
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
                <?php include('include/records.php'); ?>
                <div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span><i class="icon-table"></i> Client Register</span>
                    </div>
                    <div class="mws-panel-toolbar">
                        <div class="btn-toolbar">
                            <div class="btn-group">
                                <a href="add_complaint.php?mode2=add" class="btn"><i class="icol-add"></i> &nbsp;Add Complaint</a>
                            </div>
                        </div>
                    </div>                    
                    <div class="mws-panel-body no-padding">
                        <table class="mws-datatable-fn mws-table">
                            <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>Complaint_No</th>
                                    <th>Complaint Date</th>
                                    <th>Complain Time</th>
                                    <th>client Name</th>
                                    <th>Product Name</th>
                                    <th>problem Name</th>
                                    <th>Complaint Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                    <?php 
                                    $i=0;
                                    $q="SELECT * FROM complaint_master 
                                    INNER JOIN clint_master ON complaint_master.clint_id = clint_master.clint_id
                                    INNER JOIN product_master ON complaint_master.product_id = product_master.product_id
                                    INNER JOIN problem_master ON complaint_master.prob_id = problem_master.prob_id
                                    ORDER BY complaint_date ASC";
                                    $result=mysqli_query($con,$q);
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $i++;
                                ?>
                                <tr>
                                <td><?php echo $i; ?></td>
                                <td><b><?php echo $row['complaint_no'];?></b></td>
                                <td><?php echo $row['complaint_date']; ?></td>
                                <td><?php echo $row['complaint_time']; ?></td>
                                <td><?php echo $row['clint_name']; ?></td>
                                <td><?php echo $row['product_name']; ?></td>
                                <td><?php echo $row['prob_name']; ?></td>
                                <td>
                                    <?php 
                                        if($row['complaint_status'] == "Pending") { 
                                        echo "<span class='badge badge-important'> $row[complaint_status]</span>";
                                        }else{
                                            echo "<span class='badge badge-success'> $row[complaint_status]</span>";
                                        }
                                    ?>  
                                </td>
                                <td>
                                <span class="btn-group">
                                    <a href="add_complaint.php?id=<?php echo $row['complaint_id'];?>&mode=edit" class="btn btn-success btn-small"><i class="icon-pencil"></i></a>
                                    <a href="add_complaint.php?id=<?php echo $row['complaint_id']; ?>&mode1=delete" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-small"><i class="icon-trash"></i></a>
                                </span>
                                </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>         
            </div>
            </div>
            <?php include('include/footer.php'); ?>
            
        </div> 
    </div>
	<?php include('include/jlinks.php');?>
    <script>

 
 	</script> 
</body>
</html>