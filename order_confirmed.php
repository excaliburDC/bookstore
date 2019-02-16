<?php session_start();?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<?php
			include("includes/head.inc.php");
		?>
</head>

<body>
			<!-- start header -->
				<div id="header">
					<div id="menu">
						<?php
							include("includes/menu.inc.php");
						?>
					</div>
				</div>
				<div id="logo-wrap">
				<div id="logo">
						<?php
							include("includes/logo.inc.php");
						?>
				</div>
				</div>
			<!-- end header -->
			<!-- start page -->

				<div id="page">
					
			<?php
				$today=date("F j, Y",strtotime("+1 week"));
				$user=$_SESSION['status'];
				echo"<center>";
				echo"<br>";
				echo"<br>";
				echo"<font face='Comic sans MS' size='5' color='blue'><strong>Your order has been placed successfully</strong></font>";
				echo"<br>";
				echo"<br>";
				echo"<font face='Comic sans MS' size='5' color='blue'><strong>It will reach you on or before " .$today;
				echo"<br>";
				echo"<br>";
				echo"<font face='Comic sans MS' size='5' color='blue'><strong>Thank You for shopping with BookShop.com</strong></font>";
				echo"</center>";
				$link=mysqli_connect("localhost","root","")or die("Can't Connect...");
				mysqli_select_db($link,"shop") or die("Can't Connect to Database...");
				$q="select * from cartdtls where u_id='$user'";
				$rs=mysqli_query($link,$q) or die("Wrong.....");
				while($r=mysqli_fetch_array($rs))
				{
					$bkid=$r[2];
					$bkqty=$r[6];
				}

				$query="update book set b_qty=b_qty-'$bkqty' where b_id='$bkid'";
				mysqli_query($link,$query) or die("Wrong.....");
				$query1="delete from cartdtls where u_id=$user";
				mysqli_query($link,$query1) or die("Wrong.....");




				?>
							</div>
							
						</div>
						
					</div>
					<!-- end content -->
					<!-- start sidebar -->
					
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




