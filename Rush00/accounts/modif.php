<?php
	session_start();
	if ($_SESSION["loggued_on_user"])
	{
		if ($_POST["submit"])
		{
			if ($_POST["oldpw"] == $_POST["newpw"])
			{
				echo file_get_contents("http://e1z1r7p29:8080/rush00/accounts/error.php?msg=".urlencode("Passwords cannot match"));
				return ;
			}
			if ($_SESSION["admin"])
				$contents = unserialize(file_get_contents("../private/admin"));
			else
				$contents = unserialize(file_get_contents("../private/usr"));
			foreach ($contents as &$content)
				if ($_SESSION["loggued_on_user"] == $content["login"])
				{
					if (hash("sha256", $_POST["oldpw"]) == $content["passwd"])
					{
						$content["passwd"] = hash("sha256", $_POST["newpw"]);
						if ($_SESSION["admin"])
							file_put_contents("../private/admin", serialize($contents));
						else
							file_put_contents("../private/usr", serialize($contents));
						echo file_get_contents("http://e1z1r7p29:8080/rush00/accounts/error.php?msg=".urlencode("Password changed sucessfully<br /><br />"));
						return ;
					}
				}
			echo file_get_contents("http://e1z1r7p29:8080/rush00/accounts/error.php?msg=".urlencode("Wrong Password"));
			return ;
		}
	}
	else
		header("Location: ../index.php");
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
		Change Password<br /><br />
		Old Password: <input type="password" name="oldpw" required/>
		<br />
		New Password: <input type="password" name="newpw" required/>
		<br /><br />
		<input type="submit" name="submit" value="Submit" id="submit"/>
		<br />
		<a href="./settings.php" id="button"><input type="button" name="back" value="Back" id="back"/></a>
	</form>
</body>
</html>