<?php
	session_start();
	if ($_SESSION["loggued_on_user"] == FALSE)
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
		Account Settings<br /><br />
		<?php
		if ($_SESSION["loggued_on_user"])
		{
			if ($_SESSION["admin"] == FALSE)
				echo "<a href='./delete.php' id='button'><input type='button' value='Delete Account' id='back'/></a><br />";
			echo "<a href='./modif.php' id='button'><input type='button' value='Change Password' id='back'/></a><br />";
			if ($_SESSION["admin"])
			{
				echo "<a href='./make_admin.php' id='button'><input type='button' value='Make Admin' id='back'/></a><br />";
				echo "<a href='./remove_usr.php' id='button'><input type='button' value='Remove User' id='back'/></a><br />";
				echo "<a href='./modif_cat.php' id='button'><input type='button' value='Modify Products' id='back'/></a><br />";
			}
		}
		?>
		<a href="../index.php" id="button"><input type="button" name="back" value="Back" id="back"/></a>
	</form>
</body>
</html>