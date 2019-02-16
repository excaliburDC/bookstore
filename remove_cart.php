<?php
	session_start();
?>

<html>
<head>

<title>Untitled Document</title>
</head>
<body>
<?php
$link=mysqli_connect("localhost","root","")or die("Can't Connect...");
mysqli_select_db($link,"shop") or die("Can't Connect to Database...");
$id=$_GET['id'];
$query="delete from cartdtls where b_id=$id";
mysqli_query($link,$query) or die("Error........!!!!!");
echo "<script>window.location='viewcart.php';</script>";

?>
</body>
</html>
