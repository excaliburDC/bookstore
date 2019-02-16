<?php	error_reporting(E_ALL);
	ini_set('display errors',1);
if(!empty($_POST))	
{		
$msg=array();		
if(empty($_POST['name']) || empty($_POST['isbn']))		{			
$msg[]="Please full fill all requirement";		
}		

		
if(!empty($msg))		{			
echo '<b>Error:-</b><br>';						
foreach($msg as $k)			{				
echo '<li>'.$k;			
}		
}		
else		{																		
$b_nm=$_POST['name'];			
$b_cat=$_POST['cat'];			
$b_isbn=$_POST['isbn'];			
$link=mysqli_connect("localhost","root","")or die("Can't Connect...");						
mysqli_select_db($link,"shop") or die("Can't Connect to Database...");	
$query="DELETE from book WHERE b_nm='$b_nm'";						
mysqli_query($link,$query) or die($query."Can't Connect to Query...");	
header("location:deletebook.php?ok=1");				
}	
}	
else	{		
header("location:index.php");	
}	?>		