<?php session_start();
	$link=mysqli_connect("localhost","root","")or die("Can't Connect...");
			
	mysqli_select_db($link,"shop") or die("Can't Connect to Database...");
	
	$id=$_GET['id'];
	
	$q="select * from book where b_id=$id";
	
	$res=mysqli_query($link,$q) or die("Can't Execute Query..");
	$row=mysqli_fetch_assoc($res);
?>

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
									<h1 class="title"><?php echo $row['b_nm'];?></h1>
									<div class="entry">
										<?php
										
											echo '	<table border="0" width="100%">
												 <tr>
													<td><hr color="purple"></td>
												</tr>
												 <tr align="center" bgcolor="#EEE9F3">
													 <td>Item Details</td>
												</tr>
												<tr>
													<td><hr color="purple"></td>
												</tr>
											 </table>
											
											<table border="0"  width="100%" bgcolor="#ffffff">
												<tr> 
													
													<td width="15%" rowspan="3">
														<img src="'.$row['b_img'].'" width="100">
													
													</td>
												</tr>
											
												<tr> 
													<td width="50%" height="100%">
														<table border="0"  width="100%" height="100%">
															<tr valign="top">
																<td align="right" width="10%">NAME</td>
																<td width="6%">: </td>
																<td align="left">'.$row['b_nm'].'</td>
															</tr>

															
															<tr>
																<td align="right">ISBN</td>
																<td>: </td>
																<td align="left">'.$row['b_isbn'].'</td>
																
															</tr>
															
																					
															<tr>
																<td align="right">Author </td>
																<td>: </td>
																<td align="left">'.$row['b_author'].'</td>
																
															</tr>											
															
															<tr>
																<td align="right"> Edition</td>
																<td>: </td>
																<td align="left">'.$row['b_edition'].'</td>
																
															</tr>
															
															<tr>
																<td align="right">  PAGES</td>
																<td>: </td>
																<td align="left">'.$row['b_page'].'</td>
															</tr>
															
															<tr>
																<td align="right">ORIGINAL PRICE</td>
																<td>: </td>
																<td align="left"><s>'.$row['b_price'].'<s></td>
															</tr>

															
														<tr>
															<td align="right">BOOKSHOP DISCOUNT</td>
															<td>: </td>
															<td align="left">'.$row['b_discount'].'</td>
															</tr>
														</table>
										
														
													</td>
												</tr>
											</table>';
							if($row['b_qty']!=0)
							{
								echo ' <center><font size="5" color="red"><strong>'.$row['b_qty'].' left in stock</strong></font></center> ';
							}
							else {
								echo ' <center><font size="5" color="red"><strong>Out of stock</strong></font></center> ';
							}				
												echo ' <tr valign="bottom" >
												<a href="'.$row['b_img'].'" rel="lightbox"><img src="images/zoom.gif" ></a>
													
												</tr>
											
											<table border="0" width="100%">
												 <tr>
													<td><hr color="purple"></td>
												</tr>
												 <tr align="center" bgcolor="#EEE9F3">
													 <td>DESCRIPTION</td>
												</tr>
												<tr>
													<td><hr color="purple"></td>
												</tr>
												
																		
											 </table>
											 
											 '.$row['b_desc'].'

																			

											 
											 <tr><td colspan=2><hr color="purple"></td></tr>
									
											<table border="0" width="100%">
												
												 <tr align="center" bgcolor="#EEE9F3">';
												 
										 if(isset($_SESSION['status']))
										 {
											if($row['b_qty']!=0)
											{	
											echo '<form action="process_cart.php" method="post">';
											echo '<table border="0" align="center">';	
											echo '<tr>';

											echo '<td><a href="process_cart.php?id='.$row['b_id'].'"><img src="images/addcart.jpg" /></a></td>';
											
											echo '</tr>';
											echo '</table>';
											echo '</form>';
											}
											
	
												}
												else
												{
													echo '<td><img src="images/addcart.jpg"><br><a href="register.php"> <h4>Please Login..</h4></a></td>';
												}
												echo '</tr>
											</table>';
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
