
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<title>Untitled Document</title>
</head>
<body>
<?php
	session_start();
	$qty=$_POST['qty'];
	$bookid=$_POST['bookno'];
	$ses=session_id();		
	$logid=$_SESSION['status'];
	if($qty!="")
	{
		$qty=$_POST['qty'];
		$link=mysqli_connect("localhost","root","")or die("Can't Connect...");
		mysqli_select_db($link,"shop") or die("Can't Connect to Database...");
		$q="select * from book where b_id=$bookid";
		$rs=mysqli_query($link,$q) or die("Wrong.....");
		while($r=mysqli_fetch_array($rs))
		{
			$nm=$r[1];
			$au=$r[4];
			$dis=$r[9];
		}

	$inqy="insert into cartdtls values('$ses','$logid','$bookid','$nm','$au','$dis','$qty','')";
	$res=mysqli_query($link,$inqy);
	
	include ("complete_cart.php");

	echo "<script>window.location='viewcart.php?bkid=$bookid';</script>";
	

}
else
{
	$bookid=$_POST['bookno'];
	echo "<script>window.location='process_cart.php?bkid=$bookid';</script>";
	}
?>
</body>
</html>


								</div>
							</div>
			
						</div>
						<!-- end content -->

							<!-- start sidebar -->
							<div id="sidebar">
									<?php
										include("includes/search.inc.php");
									?>
							</div>
							<!-- end sidebar -->
								<div style="clear: both;">&nbsp;</div>
				
				</div> 
			<!-- end page -->
						<!-- start footer -->
						<div id="footer">
									<?php
										include("includes/footer.inc.php");
									?>
						</div>
						<!-- end footer -->
</body>
</html>







