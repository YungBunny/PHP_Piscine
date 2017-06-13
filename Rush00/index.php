<?php
	session_start();
?>
<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="./css/index.css">
		<style> 
			a {
			text-decoration: none
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
					echo "<li id ='right'><a class='link' href='./accounts/login.php'>Login</a></li>";
					echo "<li id='right'><a class='link' href='./accounts/create.php'>Create account</a></li>";
				}
				else
				{
					echo "<li id='right'><a class='link' href='./accounts/logout.php'>Logout</a></li>";
					echo "<li id ='right'><a class='link' href='./accounts/settings.php'>Account Settings</a></li>";
					echo "<li id ='right'><a class='link' href='./cart.php'><i id = 'cart' class='fa'>&#xf07a;</i></a></li>";
				}
			?>
		</ul>
		<table>
			<TR>
				<div class = "row">
					<div class = "question">
						<p id="quest">Where will you spread some cheer?</p>
					</div>
			</div>
			</TR>
			<TR>
				<div class = "row">
					<a href="./animal.php">
						<div class = "animal">
							<div class= "cell">
								<p id = "type">ANIMAL RIGHTS</p>
							</div>
						</div>
					</a>
					<a href="./human.php">
						<div class = "humanity">
							<div class = "cell">
								<p id = "type">HUMANITY</p>
							</div>
						</div>
					</a>
					<a href="./earth.php">
						<div class = "sustain">
							<div class = "cell">
								<p id = "type">SUSTAINABILITY</p>
							</div>
						</div>
					</a>
				</div>
			</TR>
		</table>
	</body>
</html>
