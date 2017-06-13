<?php
	session_start();
	if ($_SESSION["loggued_on_user"] == FALSE or $_SESSION["admin"] == FALSE)
		header("Location: ../index.php");
?>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="../css/login.css" />
	<link rel="stylesheet" type="text/css" href="../css/index.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
			if ($_SESSION["loggued_on_user"])
			{
				echo "<li id='right'><a class='link' href='./logout.php'>Logout</a></li>";
				echo "<li id ='right'><a class='link' href='./settings.php'>Account Settings</a></li>";
				echo "<li id ='right'><a class='link' href='../cart.php'><i id = 'cart' class='fa'>&#xf07a;</i></a></li>";
			}
		?>
	</ul>
	<form>
		Modify Products<br /><br />
		<?php
		if ($_SESSION["loggued_on_user"] and $_SESSION["admin"])
		{
				echo "<a href='./add_org.php' id='button'><input type='button' value='Add' id='back'/></a><br />";
				echo "<a href='./delete_org.php' id='button'><input type='button' value='Delete' id='back'/></a><br />";
				echo "<a href='./modif_org.php' id='button'><input type='button' value='Modify' id='back'/></a><br />";
		}
		?>
		<a href="./settings.php" id="button"><input type="button" name="back" value="Back" id="back"/></a>
	</form>
</body>
</html>