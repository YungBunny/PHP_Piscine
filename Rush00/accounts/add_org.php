<?php
	session_start();
	if ($_SESSION["loggued_on_user"] and $_SESSION["admin"])
	{
		if ($_POST["submit"])
		{
			if (file_exists("../products/".$_POST["cat"]) == FALSE)
			{
				header("Location: "."./add_org.php?msg=".$_POST["cat"]." is not a category");
				return ;
			}
			if (($file = unserialize(file_get_contents("../products/".$_POST["cat"]))))
				foreach ($file as $org)
					if ($org["name"] == $_POST["name"])
						{
							header("Location: "."./add_org.php?msg=".$_POST["name"]." already exists");
							return ;
						}
			$file[] = array("name" => $_POST["name"], "img" => $_POST["url"]);
			file_put_contents("../products/".$_POST["cat"], serialize($file));
			header("Location: "."./add_org.php?msg=".$_POST["name"]." successfully added");
		}
	}
	else
		header("Location: ./index.php");
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
			echo "<li id ='right'><a class='link' href='./cart.php'><i id = 'cart' class='fa'>&#xf07a;</i></a></li>";
		?>
	</ul>
	<form method="POST">
		<?php
		if ($_GET["msg"])
		{
			echo $_GET["msg"];
			echo "<br/><br />";
		}
		?>
		Add Organization<br /><br />
		Category: <input type="text" name="cat" required/>
		<br />
		Name: <input type="text" name="name" required/>
		<br />
		Image: <input type="url" name="url" required/>
		<br /><br />
		<input type="submit" name="submit" value="Submit" id="submit"/>
		<br />
		<a href="./modif_cat.php" id="button"><input type="button" name="back" value="Back" id="back"/></a>
	</form>
</body>
</html>