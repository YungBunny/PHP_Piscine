<?php
	if ($_POST["submit"])
	{
		$admin = unserialize(file_get_contents("../private/admin"));
		foreach($admin as $arr)
			if ($_POST["login"] == $arr["login"])
			{
				echo file_get_contents("http://e1z1r7p29:8080/rush00/accounts/error.php?msg=".urlencode($_POST["login"]." is already an admin<br /><br />"));
				return ;
			}
		if (($usr = unserialize(file_get_contents("../private/usr"))))
		{
			foreach ($usr as &$arr)
				if ($_POST["login"] == $arr["login"])
				{
					$admin[] = $arr;
					file_put_contents("../private/admin", serialize($admin));
					$arr = NULL;
					file_put_contents("../private/usr", serialize($usr));
					echo file_get_contents("http://e1z1r7p29:8080/rush00/accounts/error.php?msg=".urlencode($_POST["login"]." is now an admin<br /><br />"));
					return ;
				}
		}
		echo file_get_contents("http://e1z1r7p29:8080/rush00/accounts/error.php?msg=".urlencode($_POST["login"]." does not exist<br /><br />"));
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
		Grant admin privileges<br /><br />
		User: <input type="text" name="login" required/>
		<br />
		<br />
		<input type="submit" name="submit" value="Submit" id="submit"/>
		<br />
		<a href="./settings.php" id="button"><input type="button" name="back" value="Back" id="back"/></a>
	</form>
</body>
</html>