<ul>
			<li class="current_page_item"><a href="index.php">Home</a></li>
			<li><a href="checkstock.php">Check Stock</a></li>
			<li><a href="category.php">Category</a></li>
			<li><a href="addbook.php">Add Book</a></li>
			<li><a href="deletebook.php">Delete Book</a></li>
			<li><a href="updatebook.php">Update</a></li>
			<li class="last"><a href="contact.php">Contact</a></li>
			
			<?php
				if(isset($_SESSION['status'])&& $_SESSION['unm']=="admin")
				{
					echo '<li><a href="../logout.php">Logout</a></li>';
				}
				else
				{
					echo '<li><a href="../register.php">Register</a></li>';
				}
			?>
			
		</ul>