<?php
	 session_start();
?>

<script type="text/javascript">
function num_check(event)
{
   code=event.keyCode
   if(((code>=48 && code<=57)))
   {
	   alert("Enter Only Numbers"); 
	   event.keyCode=0
	}	
}
function empty(a)
{
	if(a=="")
	{
		document.getElementById("qty").focus();
	}
}

</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<link rel="stylesheet" href="lightbox.css" type="text/css" media="screen" />
	<script src="js/prototype.js" type="text/javascript"></script>
	<script src="js/scriptaculous.js?load=effects" type="text/javascript"></script>
	<script src="js/lightbox.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/java.js"></script>
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
<?php
	if(isset($_GET['id']))
	{
		$bid=$_GET['id'];	
		$link=mysqli_connect("localhost","root","")or die("Can't Connect...");
		mysqli_select_db($link,"shop") or die("Can't Connect to Database...");
		$q="select * from book where b_id=$bid";
		$rs=mysqli_query($link,$q) or die("Wrong.....");
		while($r=mysqli_fetch_array($rs))
		{
			print "<form action='add_cart.php' method='post'>";
		print "<table border='0' align='center' width='500'>";
		print "<tr>
			   <td align='center' rowspan=8>"."<img src='$r[11]' width='100' height='100'>"."</td>
			   <tr>";
		
		print "<tr>
			   <td class='font' >Name</td>
			   <td class='font' >$r[1]</td>
			   </tr>";
		print "<tr>
			   <td class='font' >Author</th>
			   <td class='font' >$r[4]</td>
			   </tr>";
		
		print "<tr>
			   <td class='font' >Price</th>
			   <td class='font' >$r[9]</td>
			   </tr>";
		print "<tr>
			   <td class='font' >Quantity</th>
		<td class='font' ><input id='qty' type='text' name='qty' onKeyPress='num_check(event)' onblur='empty(this.value)' class='font'></td>
			   </tr>";

		print "<input type='hidden' name='bookno' value=$bid>";
		print "<tr>
				<td><center><input type='submit' value='ADD TO CART'></center>
					
					</td>
				</tr>";
	print "</table>";
	print "</form>";
	}
	}
	else
	{
		echo "else";
	}
?>
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



























