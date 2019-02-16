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
			$link=mysqli_connect("localhost","root","")or die("Can't Connect...");								mysqli_select_db($link,"shop") or die("Can't Connect to Database...");								$query="update user set u_address='$add' where u_id='$user'";
			mysqli_query($link,$query) or die("Can't Execute Query...");			
			header("location:checkout.php?ok=1");		
		}	}
?>	