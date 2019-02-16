<?php session_start();
		$user=$_SESSION['status'];
		$link=mysqli_connect("localhost","root","")or die("Can't Connect...");
		mysqli_select_db($link,"shop") or die("Can't Connect to Database...");
		$query1="delete from cartdtls where u_id=$user";
		mysqli_query($link,$query1) or die("Wrong.....");
		$_SESSION=array();		//session_destroy();			
		header("location:register.php");
	
					
?>

	
	
	
