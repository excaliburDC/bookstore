<?php	error_reporting(E_ALL);
	ini_set('display errors',1);
if(!empty($_POST))	
{		
$msg=array();		
if(empty($_POST['name']) || empty($_POST['description']) || empty($_POST['author']) || empty($_POST['edition']) || empty($_POST['isbn']) || empty($_POST['pages']) || empty($_POST['price']) || empty($_POST['disc']) || empty($_POST['qty']))		{			
$msg[]="Please full fill all requirement";		
}		
if(!(is_numeric($_POST['price'])))		{			
$msg[]="Price must be in Numeric  Format...";		
}		
if(!(is_numeric($_POST['disc'])))		{			
$msg[]="Discount Price must be in Numeric  Format...";		
}		

if(!(is_numeric($_POST['qty'])))		{			
$msg[]="Quantity must be in Numeric  Format...";		
}		
if(!(is_numeric($_POST['pages'])))		{			
$msg[]="Page must be in Numeric  Format...";		
}				
if(empty($_FILES['img']['name']))		
$msg[] = "Please provide a file";			
if($_FILES['img']['error']>0)		
$msg[] = "Error uploading file";								
if(!(strtoupper(substr($_FILES['img']['name'],-4))==".JPG" || strtoupper(substr($_FILES['img']['name'],-5))==".JPEG"|| strtoupper(substr($_FILES['img']['name'],-4))==".GIF"))			
$msg[] = "wrong file  type";					
if(file_exists("../upload_image/".$_FILES['img']['name']))			
$msg[] = "File already uploaded. Please do not update with same name";								
if(!empty($msg))		{			
echo '<b>Error:-</b><br>';						
foreach($msg as $k)			{				
echo '<li>'.$k;			
}		
}		
else		{			
move_uploaded_file($_FILES['img']['tmp_name'],"../upload_image/".$_FILES['img']['name']);			
$b_img = "upload_image/".$_FILES['img']['name'];															
$b_nm=$_POST['name'];			
$b_cat=$_POST['cat'];			
$b_desc=$_POST['description'];			
$b_edition=$_POST['edition'];			
$b_author=$_POST['author'];						
$b_isbn=$_POST['isbn'];			
$b_pages=$_POST['pages'];			
$b_price=$_POST['price'];
$b_discount=$_POST['disc'];
$b_qty=$_POST['qty'];											
$link=mysqli_connect("localhost","root","")or die("Can't Connect...");						
mysqli_select_db($link,"shop") or die("Can't Connect to Database...");						
$query="insert into book(b_nm,b_subcat,b_desc,b_edition,b_author,b_isbn,b_page,b_price,b_discount,b_qty,b_img)			values('$b_nm','$b_cat','$b_desc','$b_edition','$b_author','$b_isbn',$b_pages,$b_price,'$b_discount','$b_qty','$b_img')";						
mysqli_query($link,$query) or die($query."Can't Connect to Query...");			
header("location:addbook.php?ok=1");				
}	
}	
else	{		
header("location:index.php");	
}	?>		