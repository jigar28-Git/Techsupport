<?php	
		error_reporting(E_ALL); // Debugging
		error_reporting(E_ERROR);
		session_start();
		session_name($_SESSION["app_cmpname"]);
		ini_set('memory_limit', '1024M'); // 1GB
		ini_set('max_execution_time', 0); // unlimited


		$servername="localhost";
		$username="root";
		$password="";
		$dbname = "ticketing1";
		$con= new mysqli($servername,$username,$password,$dbname);
		
		//echo '<pre>'; print_r($_SERVER); echo '</pre>'; exit;

?>