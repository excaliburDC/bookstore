<?php
	session_start();
?>
<?php
	$today=date("Ymd");
	$link=mysqli_connect("localhost","root","")or die("Can't Connect...");
	mysqli_select_db($link,"shop") or die("Can't Connect to Database...");
	$user=$_SESSION['unm'];
	$q="select * from user where u_unm='$user'";
	$rs=mysqli_query($link,$q) or die("Wrong.....");
	while($r=mysqli_fetch_array($rs))
	{
		$ufnm=$r[1];
		$con=$r[6];
		$add=$r[7];
		$ucity=$r[8];
		$ustate=$r[9];
		
	}
   	$inorder="insert into orderdtls  
		(order_custid,order_date,order_paymentmode,del_name,del_add,del_cont,del_city,del_state,shipping_date)
		values('$user','$today','Cash On Delivery','$ufnm','$add','$con','$ucity','$ustate','$today')";

	$inor=mysqli_query($link,$inorder);
	

	$cust=$_SESSION['status'];
	$q="select * from cartdtls where u_id='$cust'";
	$rs=mysqli_query($link,$q) or die("Wrong.....");
	while($r=mysqli_fetch_array($rs))
	{
		$bkid=$r[2];
		$bkqty=$r[6];
	}
   	$query="select MAX(order_id) from orderdtls";
	$result=mysqli_query($link,$query);
	$row=mysqli_fetch_array($result);
	$rows=$row[0];

	$indelivery="insert into deliverydtls (order_id,bk_id,bk_qty) values ('$rows','$bkid','$bkqty')";  
	$inde=mysqli_query($link,$indelivery);
	
?>
