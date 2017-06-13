<?php
	if ($_POST["submit"] == "Submit")
	{
		if ($_POST["passwd"] == NULL)
		{
			echo ("ERROR\n");
			return ;
		}
		if (file_exists("../private") == FALSE)
			mkdir("../private");
		$admin = unserialize(file_get_contents("../private/admin"));
		foreach($admin as $arr)
			if ($_POST["login"] == $arr["login"])
			{
				echo file_get_contents("http://e1z1r7p29:8080/rush00/accounts/error.php?msg=".urlencode($_POST["login"]." already exists<br /><br />"));
				return ;
			}
		if (file_exists("../private/usr") == FALSE)
			file_put_contents("../private/usr", "");
		if (($file = unserialize(file_get_contents("../private/usr"))))
		{
			foreach ($file as $arr)
				if ($_POST["login"] == $arr["login"])
				{
					echo file_get_contents("http://e1z1r7p29:8080/rush00/accounts/error.php?msg=".urlencode($_POST["login"]." already exists<br /><br />"));
					return ;
				}
		}
		else
			$file = array();
		$file[] = array("login" => $_POST["login"], "passwd" => hash("sha256", $_POST["passwd"]));
		file_put_contents("../private/usr", serialize($file));
		echo file_get_contents("http://e1z1r7p29:8080/rush00/accounts/error.php?msg=".urlencode($_POST["login"]." sucessfully created<br /><br />"));
		return ;
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
		Create account<br /><br />
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
