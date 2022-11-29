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

<title><?php echo $_SESSION['title']; ?> Product Categories</title>
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
                        <span><i class="icon-table"></i> Product Category</span>
                    </div>
                    <div class="mws-panel-toolbar">
                        <div class="btn-toolbar">
                            <div class="btn-group">
                                <a href="add_productcat.php?mode2=add" class="btn"><i class="icol-add"></i> Add Product Category</a>     
                            </div>
                        </div>
                    </div> 
                    <div class="mws-panel-body no-padding">
                        <table class="mws-table mws-datatable">
                            <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>product_category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php include "include/connect_db.php";
                                    $i=0;
                                    $q="SELECT *  FROM product_category";
                                    $result=mysqli_query($con,$q)
                            ?>   
                            <?php
                                while($row=mysqli_fetch_assoc($result))
                                {
                                    $i++;
                            ?>
                            <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['p_category']; ?></td>
                            <td>
                            <span class="btn-group">
                                <a href="add_productcat.php?id=<?php echo $row['product_cat_id'];?>&mode=edit" class="btn btn-success btn-small"><i class="icon-pencil"></i></a>
                                <a href="add_productcat.php?id=<?php echo $row['product_cat_id'];?>&mode1=delete" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-small"><i class="icon-trash"></i></a>
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