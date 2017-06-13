<?php
	session_start();
?>
<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="./css/index.css">
		<style> a { text-decoration: none
				color:black; 
			}
		</style>
	</head>
	<body>
		<ul>
			<a href="./index.php"><li class="logo">CHEERITY</li></a>
			<li id = "left"><a href="./contact.php">Contact</a></li>
			<li id = "left"><a href="./about.php">About</a></li>
			<?php
				if ($_SESSION["loggued_on_user"] == NULL)
				{
					echo "<li id = 'right'><a class = 'link' href='./accounts/login.php'>Login</a></li>";
					echo "<li id = 'right'><a class = 'link' href='./accounts/create.php'>Create account</a></li>";
				}
				else
				{
					echo "<li id = 'right'><a class = 'link' href='./accounts/logout.php'>Logout</a></li>";
					echo "<li id = 'right'><a class = 'link' href='./accounts/settings.php'>Account Settings</a></li>";
					echo "<li id = 'right'><a class = 'link' href='./cart.php'><i id = 'cart' class='fa'>&#xf07a;</i></a></li>";
				}
			?>
		</ul>
		<table>
			<tr>
				<div class = "row"></div>
				<div class = "rowcontact">
					<div class = "about">
					<p id = "about">Cheerity was started by two students from 42, Chanel Fu and Ryan Le. Hoping to spread some cheer and create positive change in the world, they are studying software engineering, a powerful tool of the present and the future. This philanthropic spirit parallels with Xavier Niel's grand plan to revolutionize the classist system that has become of education in America. They currently reside in Fremont, CA, in the heart of the tech mecca of the world.</p>
					</div>
				</div>
			</tr>
		</table>
	</body>
</html>

<!-- 	<?php
		if ($_SESSION["loggued_on_user"])
		{
			echo "Hello, ";
			echo $_SESSION['loggued_on_user'];
			if ($_SESSION["admin"])
				echo " (admin)";
			echo "<br /><br />";
		}
	?> -->
