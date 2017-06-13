<?php
	include "auth.php";
	session_start();
	if ($_POST["submit"])
	{
		if (auth($_POST["login"], $_POST["passwd"]))
		{
			$_SESSION["loggued_on_user"] = $_POST["login"];
			header("Location: ../index.php");
		}
		else
		{
			echo file_get_contents("http://e1z1r7p29:8080/rush00/accounts/error.php?msg=".urlencode("Invalid user or password"));
			return ;
		}
	}
?>
<html>

<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/login.css">
	<link rel="stylesheet" type="text/css" href="../css/index.css">
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
	<ul>
		<a href="../index.php"><li class="logo">CHEERITY</li></a>
		<li id = "left"><a href="../contact.php">Contact</a></li>
		<li id = "left"><a href="../about.php">About</a></li>
		<?php
			if ($_SESSION["loggued_on_user"] == NULL)
			{
				echo "<li id ='right'><a class='link' href='./login.php'>Login</a></li>";
				echo "<li id='right'><a class='link' href='./create.php'>Create account</a></li>";
			}
			else
			{
				echo "<li id='right'><a class='link' href='./logout.php'>Logout</a></li>";
				echo "<li id ='right'><a class='link' href='./settings.php'>Account Settings</a></li>";
				echo "<li id ='right'><a class='link' href='../cart.php'><i id = 'cart' class='fa'>&#xf07a;</i></a></li>";
			}
		?>
	</ul>
	<form method="POST">
		Login<br /><br />
		Username: <input type="text" name="login" required/>
		<br />
		Password: <input type="password" name="passwd" required/>
		<br /><br />
		<input type="submit" name="submit" value="Submit" id="submit"/>
		<br />
		<a href="../index.php" id="button"><input type="button" name="back" value="Back" id="back"/></a>
	</form>
</body>
</html>
