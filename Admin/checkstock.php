<?php 
session_start();
	
	$link=mysqli_connect("localhost","root","")or die("Can't Connect...");		
	mysqli_select_db($link,"shop") or die("Can't Connect to Database...");
	$q="select b_id,b_nm,b_subcat,b_isbn,b_img,b_qty from book ORDER BY b_qty asc";
	$res=mysqli_query($link,$q) or die("Can't Execute Query...");

	mysqli_close($link);
	?>

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
			<h1 class="title"></h1>
			<div class="entry">
				
					<table border='1' WIDTH='100%'>
						<tr>
								<td WIDTH='10%'><b><u>BOOK ID</u></b>
								<TD WIDTH='20%'><b><u>BOOK NAME</u></b>
								<TD WIDTH='20%'><b><u>BOOK CATEGORY</u></b>
								<TD WIDTH='50%'><b><u>BOOK ISBN NO</u></b>
								<TD WIDTH='25%'><b><u>BOOK QUANTITY</u></b>
							
						</tr>
						<?php
							$count=1;
							while($row=mysqli_fetch_assoc($res))
							{
							echo '<tr>
										<td>'.$row['b_id'].'
										<td>'.$row['b_nm'].'
										<td>'.$row['b_subcat'].'
										<td>'.$row['b_isbn'].'
										<td>'.$row['b_qty'].'
	
												
									
									</tr>';
									$count++;
							}
						?>

					</TABLE>
				
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
