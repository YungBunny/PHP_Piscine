<?php
	session_start();
	if ($_SESSION["loggued_on_user"])
	{
		if ($_SESSION["admin"])
		{
			echo file_get_contents("http://e1z1r7p29:8080/rush00/accounts/error.php?msg=".urlencode("Cannot delete admin"));
			echo "<a href='./settings.php'>Back</a>";
			return ;
		}
		if ($_POST["passwd"] != $_POST["confirm"])
		{
			echo file_get_contents("http://e1z1r7p29:8080/rush00/accounts/error.php?msg=".urlencode("Passwords do not match"));
			return ;
		}
		if ($_POST["submit"])
		{
			$contents = unserialize(file_get_contents("../private/usr"));
			foreach ($contents as &$arr)
				if ($arr["login"] == $_SESSION["loggued_on_user"])
					if (hash("sha256", $_POST["passwd"]) == $arr["passwd"])
					{
						$arr = NULL;
						file_put_contents("../private/usr", serialize($contents));
						$_SESSION["loggued_on_user"] = "";
						echo file_get_contents("http://e1z1r7p29:8080/rush00/accounts/error.php?msg=".urlencode("Account deleted"));
						return ;
					}
			echo file_get_contents("http://e1z1r7p29:8080/rush00/accounts/error.php?msg=".urlencode("Invalid Password"));
				return ;
		}
	}
	else
		header('Location: ../index.php');
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
		margin: auto;
	}
	input
	{
		box-sizing: border-box;
		display: block;
		text-align: center;
		margin: 0 auto;
	}
	a { text-decoration: none
					color:black; 
					}
	</style>
</head>
<body>
	<ul class="link">
		<a href="../index.php"><li class="logo">CHEERITY</li></a>
		<li id = "left"><a href="../contact.php">Contact</a></li>
		<li id = "left"><a href="../about.php">About</a></li>
		<?php
			echo "<li id='right'><a class='link' href='./logout.php'>Logout</a></li>";
			echo "<li id ='right'><a class='link' href='./settings.php'>Account Settings</a></li>";
			echo "<li id ='right'><a class='link' href='../cart.php'><i id = 'cart' class='fa'>&#xf07a;</i></a></li>";
		?>
	</ul>
	<form method="POST">
		Delete Account<br /><br /><br/>
		Password: <input type="password" name="passwd" required/><br />
		Re-enter: <input type="password" name="confirm" required/>
		<br />
		<br />
		<input type="submit" name="submit" value="Submit" id="submit"/>
		<br />
		<a href="./settings.php" id="button"><input type="button" name="back" value="Back" id="back"/></a>
	</form>
</body>
</html>