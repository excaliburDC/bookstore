<?php
	session_start();
	$user=$_SESSION['status'];
	if(!empty($_POST))
	{
		$msg="";		
		if(empty($_POST['add']))
		{
			$msg.="<li>Please enter your address";
		}
					
		else
		{
			$add=$_POST['add'];	
			$link=mysqli_connect("localhost","root","")or die("Can't Connect...");
			
			header("location:checkout.php?ok=1");
		}	}
?>	