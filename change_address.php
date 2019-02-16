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
							<h1 class="title">Change your address</h1>
							<div class="entry">
					<?php
					if(isset($_GET['ok']))
					{
						echo '<font color="blue">Address successfully changed..</font>';
						echo '<br><br>';
					}
					?>		
							<form action="process_add.php" method="post">
							<tr>
							<td><b>Enter your new Address:</b>&nbsp;&nbsp;</td>
							<td>
							<textarea rows="5" cols="27" name="add"></textarea>
							</tr>
							<tr><td>&nbsp;</tr>
							<br><br>
							<center>
							<input type="submit" value="SUBMIT">
							</center>
							</form>

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