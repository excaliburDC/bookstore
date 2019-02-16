<?php	error_reporting(E_ALL);
	ini_set('display errors',1);
if(!empty($_POST))	
{		
$msg=array();		
if(empty($_POST['name']) || empty($_POST['qty']))		{			
$msg[]="Please full fill all requirement";		
}	

if(!(is_numeric($_POST['qty'])))		{			
$msg[]="Quantity must be in Numeric  Format...";		
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
$b_qt=$_POST['qty'];			
$link=mysqli_connect("localhost","root","")or die("Can't Connect...");						
mysqli_select_db($link,"shop") or die("Can't Connect to Database...");	
$query="UPDATE book set b_qty=b_qty+'$b_qt' where b_nm='$b_nm'";						
mysqli_query($link,$query) or die($query."Can't Connect to Query...");	
header("location:updatebook.php?ok=1");				
}	
}	
else	{		
header("location:index.php");	
}	?>		