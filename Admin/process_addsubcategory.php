<?php	
if(!empty($_POST))	{		
$msg=array();		
if(empty($_POST['subcat']) || empty($_POST['parent']))		{			
$msg[]="Please full fill all requirement";		
}				
if(!empty($msg))		{			
echo '<b>Error:-</b><br>';						
foreach($msg as $k)			{				
echo '<li>'.$k;			
}		
}		
else		{					
$link=mysqli_connect("localhost","root","")or die("Can't Connect...");						
mysqli_select_db($link,"shop") or die("Can't Connect to Database...");					
$parent = $_POST['parent'];			
$subcat=$_POST['subcat'];						
$query="insert into subcat(parent_id, subcat_nm) values('$parent','$subcat')";						
mysqli_query($link,$query) or die("can't Execute...");						
mysqli_close($link);			
header("location:category.php?c=1");		
}	
}	
else	{		
header("location:index.php");	
}	?>		