<?php
	session_start();
?>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel='stylesheet' type='text/css' href='./css/login.css'>
	<link rel='stylesheet' type='text/css' href='./css/index.css'>
	<style>
	form
	{
		display: block;
		text-align: center;
		width: auto;
		padding-top: 20vw;
	}
	a { text-decoration: none
					color:black; 
					}
	</style>
</head>
<body>
	<ul class='link'>
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
				echo "<li id ='right'><a class='link' href='.                                 /cart.php'><i id = 'cart' class='fa'>&#xf07a;</i></a></li>";
			}
 			echo "</ul>";
 			echo "<form method='POST'>";
			echo $_GET["msg"]
		?>
		<br /><br /><br />
		<a href="./accounts/login.php" id="button"><input type="button" name="back" value="Login" id="back"/></a>
		<br />
		<a href="./accounts/create.php" id="button"><input type="button" name="back" value="Create Account" id="back"/></a>
	</form>
</body>
</html>

<!-- 
	<form method="POST">
		Change Password<br /><br />
		Old Password: <input type="password" name="oldpw" required/>
		<br />
		New Password: <input type="password" name="newpw" required/>
		<br /><br />
		<input type="submit" name="submit" value="Submit" id="submit"/>
		<br />
		<a href="./settings.php" id="button"><input type="button" name="back" value="Back" id="back"/></a>
	</form> -->