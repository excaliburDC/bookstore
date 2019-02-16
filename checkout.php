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
							<h1 class="title">Shipping Details</h1>
							<div class="entry">
							
							
						  <table border="1" align="center" width="60%" bordercolor="#CC6600"> 

  <?php
	
	if(isset($_GET['ok']))
	{
		echo '<font color="blue">Address successfully changed..</font>';
		echo '<br><br>';
	}
	$user=$_SESSION['unm'];
	$link=mysqli_connect("localhost","root","")or die("Can't Connect...");
	mysqli_select_db($link,"shop") or die("Can't Connect to Database...");
	$query="select * from orderdtls where order_custid='$user'";
	$result=mysqli_query($link,$query) or die("Wrong.....");
	while($rs=mysqli_fetch_array($result))
	{		
		$orderid=$rs[0];
		$payment=$rs[3];
		$fnm=$rs[4];
		$add=$rs[5];
		$con=$rs[6];
		$city=$rs[7];
		$state=$rs[8];
	}
?>
          
	
      	<font face="Comic sans MS" size="5" color="green"><strong><?php $today=date("F j, Y");echo "Order Date: " .$today;?></strong></font>
        <br><br>
	<font face="Comic sans MS" size="5" color="green"><strong><?php echo "Customer Name: " .$fnm; ?></strong></font>
        <br><br>
        <font face="Comic sans MS" size="5" color="green"><strong><?php echo "Contact No: ".$con; ?></strong></font>
	<br><br>
	<font face="Comic sans MS" size="5" color="green"><strong><?php echo "Shipping Address: ".$add; ?></strong></font>
	<br>
	<form action="change_address.php" method="post"><input type="submit" value="CHANGE ADDRESS"></form>
	<br><br>
 	<font face="Comic sans MS" size="5" color="green"><strong><?php echo "City: ".$city; ?></strong></font>
	<br><br>
 	<font face="Comic sans MS" size="5" color="green"><strong><?php echo "State: ".$state; ?></strong></font>
	<br><br>
	<font face="Comic sans MS" size="5" color="green"><strong><?php echo "Payment Mode: ".$payment; ?></strong></font>
	
	
	  	
    <table border="0" align="center" width="100%">
	<br><br>
    	<tr><td colspan="5" class="font" align="center"><font face="Verdana" size="6" color="brown"><strong>ORDER DETAILS</strong></font></td></tr>
    	<tr bgcolor="green">
        <td height="32" class="font1"><font size="4" color="white">Name</font></td>
        <td class="font1"><font size="4" color="white">Price</font></td>
        <td class="font1"><font size="4" color="white">Quantity</font></td>
        <td class="font1"><font size="4" color="white">Amount</font></td>
        </tr>
	
    	<?php	
		$ses=session_id();
		$grand=0;			
//     		$query="select * from deliverydtls where order_id=$orderid";
     		$query="select * from cartdtls";
			$result=mysqli_query($link,$query) or die("Wrong.....");
			while($r=mysqli_fetch_array($result))
			{		
				$bknm=$r[3];
				$price=$r[5];
				$bkqty=$r[6];
				
				echo "<tr>";
		        echo "<td class='font'>$bknm</td>";
    	   		echo "<td class='font'>$price</td>";
			    echo "<td class='font'>$bkqty</td>";
				$tot=$price*$bkqty;
    	   		$grand=$tot+$grand;
				echo "<td class='font'>$tot</td>";
		        echo "</tr>";
		
	
    		}
		?>    
        <tr>
        <td></td>
        <td></td>
        <td></td>
        <td class="font1" bgcolor="blue"><font face="Comic sans MS" size="4" color="white">Total Amount:<?php echo $grand; ?></font></td>
        </tr>
	</table>


			
							<br><br>
							
							<center>
							<a href="order_confirmed.php"><img src="images/placeorder.png" /></a>
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
</body>
</html>