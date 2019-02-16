<?php		
if(!empty($_POST))	{		
$msg="";				
if(empty($_POST['fnm']) || empty($_POST['unm']) || empty($_POST['gender']) || empty($_POST['pwd']) || empty($_POST['cpwd']) || empty($_POST['mail'])|| empty($_POST['contact'])|| empty($_POST['add']) || empty($_POST['city']) || empty($_POST['state']))		{			
$msg.="<li>Please full fill all requirement";		
}				
if($_POST['pwd']!=$_POST['cpwd'])		{			
$msg.="<li>Please Enter your Password Again.....";		
}				
if(!preg_match("/^[^@]+@[^@]+\.[a-z]{2,6}$/i",$_POST['mail']))		{			
$msg.="<li>Please Enter Your Valid Email Address...";		
}						
if((strlen($_POST['contact'])>10) || (strlen($_POST['contact'])<10))		{			
$msg.="<li>Invalid Contact No....";		
}			
if(strlen($_POST['pwd'])>15)		{			
$msg.="<li>Please Enter Your Password in limited Format....";		
}			
if(is_numeric($_POST['fnm']))		{			
$msg.="<li>Name must be in String Format...";		
}				
if($msg!="")		{			
header("location:register.php?error=".$msg);		
}		
else		{			
$fnm=$_POST['fnm'];			
$unm=$_POST['unm'];			
$pwd=$_POST['pwd'];			
$gender=$_POST['gender'];			
$email=$_POST['mail'];			
$contact=$_POST['contact'];$add=$_POST['add'];			
$city=$_POST['city'];$state=$_POST['state'];											
$link=mysqli_connect("localhost","root","")or die("Can't Connect...");						
mysqli_select_db($link,"shop") or die("Can't Connect to Database...");						
$query="insert into user(u_fnm,u_unm,u_pwd,u_gender,u_email,u_contact,u_address,u_city,u_state) values   ('$fnm','$unm','$pwd','$gender','$email','$contact','$add','$city','$state')";mysqli_query($link,$query) or die("Can't Execute Query...");			
header("location:register.php?ok=1");		
}	
}	
else	{		
header("location:index.php");	
}?>