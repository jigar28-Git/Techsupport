<?php
    include("include/config.inc.php");

?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<?php include('include/head.php'); ?>

<title><?php echo $_SESSION['title']; ?> Client Master</title>
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
                                <a href="add_client.php?mode2=add" class="btn"><i class="icol-add"></i> Add Client</a>
                                
                            </div>
                        </div>
                    </div>                    
                    <div class="mws-panel-body no-padding">
                        <table class="mws-datatable-fn mws-table">
                            <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>Client Name</th>
                                    <th>city</th>
                                    <th>pin</th>
                                    <th>State</th>
                                    <th>address</th>
                                    <th>website</th>
                                    <th>Gst Number</th>
                                    <th>Remark</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                    <?php 
                                    $i=0;
                                    $q="SELECT clint_master.*, state_master.state_name FROM clint_master
                                        LEFT JOIN state_master ON clint_master.state_id = state_master.state_id";
                                    $result=mysqli_query($con,$q);
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $i++;
                                ?>
                                <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row['clint_name']; ?></td>
                                <td><?php echo $row['city']; ?></td>
                                <td><?php echo $row['pin']; ?></td>
                                <td><?php echo $row['state_name']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td><?php echo $row['website']; ?></td>
                                <td><?php echo $row['gst_no']; ?></td>
                                <td><?php echo $row['remarks'];?></td>
                                <td>
                                <span class="btn-group">
                                    <a href="add_client.php?id=<?php echo $row['clint_id'];?>&mode=edit" class="btn btn-success btn-small"><i class="icon-pencil"></i></a>
                                    <a href="add_client.php?id=<?php echo $row['clint_id']; ?>&mode1=delete" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-small"><i class="icon-trash"></i></a>
                                </span>
                                </td>
                                </tr>
                                <?php } ?>

                            </tbody>
                        </table>
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