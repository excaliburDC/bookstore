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
					<!-- start content -->
					<div id="content">
						<div class="post">
							<h1 class="title">My cart</h1>
							<div class="entry">
							<?php
								
									$link=mysqli_connect("localhost","root","")or die("Can't Connect...");
									mysqli_select_db($link,"shop") or die("Can't Connect to Database...");
									$query="select count(*) from cartdtls";
									$result=mysqli_query($link,$query);
									$row=mysqli_fetch_array($result);
									$rows=$row[0];
									if($rows>0)
									{
										$query="select * from cartdtls";
										$result=mysqli_query($link,$query);
										print "<table border='0' align='center' width='70%'>";
										print "<tr bgcolor='#CC3399'>";
										
										print "<td align='center' class='font1'><font color='white'>Item</font></td>";
										print "<td align='center' class='font1'><font color='white'>Preview</font></td>";
										print "<td align='center' class='font1'><font color='white'>Name</font></td>";
										print "<td align='center' class='font1'><font color='white'>Rate</font></td>";
										print "<td align='center' class='font1'><font color='white'>Quantity</font></td>";
										print "<td align='center' class='font1'><font color='white'>Amount</font></td>";
										print "<td align='center' class='font1'><font color='white'>Remove</font></td>";
										
										print "</tr>";
									
										
										$i = 1;
										$total=0;
										while($r=mysqli_fetch_array($result))
										{
											$id=$r[2];
											$q="select * from book where b_id=$id";
											$rs=mysqli_query($link,$q) or die("Wrong.....");
											while($row=mysqli_fetch_array($rs))
											{
												$amount=$r[5]*$r[6];
												$total=$total+$amount;	
												$image=$row[11];
												if($i%2==0)
												{	
													print "<tr bgcolor='#FF9999' >";
					print "<td align='center' class='font' width='10%'>$i</td>";
					print "<td align='center' class='font' width='10%'>"."<img src='$image' width='50' height='70'>"."</td>";
					print "<td align='center' class='font' width='15%'>$r[3]</td>";
					print "<td align='center' class='font' width='10%'>$r[5]</td>";
					print "<td align='center' class='font' width='10%'>$r[6]</td>";
					$amount=$r[5]*$r[6];
					print "<td align='center' class='font' width='10%'>$amount</td>";
					print "<td align='center' class='font' width='10%'><a href='remove_cart.php?id=$r[2]'>Remove</a></td>";
					print "</tr>";
												}
												else
												{	
													print "<tr bgcolor='#99FFFF'>";
					print "<td align='center' class='font'>$i</td>";
					print "<td align='center' class='font' width='10%'>"."<img src='$image' width='50' height='70'>"."</td>";
					print "<td align='center' class='font' width='15%'>$r[3]</td>";
					print "<td align='center' class='font' width='10%'>$r[5]</td>";
					print "<td align='center' class='font' width='10%'>$r[6]</td>";
					$amount=$r[5]*$r[6];
					print "<td align='center' class='font' width='10%'>$amount</td>";
					print "<td align='center' class='font' width='10%'><a href='remove_cart.php?id=$r[2]'>Remove</a></td>";
					print "</tr>";
											  }
											$i++;
										     }
										}
									print "<tr>";
		print "<td></td>";
		print "<td></td>";
		print "<td></td>";
		print "<td></td>";
		print "<td class='font'>Total Amount</td>";
		print "<td align='center' class='font' width='10%'>$total</td>";
		print "</tr>";
	
	print "</table>";
	}
	else
	{
	print "<table border='0' align='center' width='70%'>";
		print "<tr>";
		    print "<td align='center' class='font'><h2>Cart is empty!</h2></td>";
   		print "</tr>";
	print "</table>";
	}
							?>
							
							
							<br><br>
							
							<center>
							<a href="checkout.php"><img src="images/checkout.gif" /></a>
							</center>
						

							
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
