<?php
	session_start();
	if ($_SESSION["loggued_on_user"])
	{
		if ($_POST["submit"])
		{
			if ($_POST["donation"])
			$msg = $_POST["donation"]."$ successfully added to cart";
			$name = $_GET["name"];
			$img = $_GET["img"];
			if ($_SESSION["cart"])
			{
				foreach ($_SESSION["cart"] as &$product)
					if ($product["name"] == $_GET["name"])
					{
						$product["amount"] += $_POST["donation"];
						header("Location: ./purchase.php?msg=".$msg."&name=".$name."&img=".$img."&cat=".$_GET["cat"]);
						return ;
					}
					$_SESSION["cart"][] = array("name" => $_GET["name"], "amount" => $_POST["donation"], "url" => $_GET["img"]);
					header("Location: ./purchase.php?msg=".$msg."&name=".$name."&img=".$img."&cat=".$_GET["cat"]);
					return ;
			}
			else
			{
				$_SESSION["cart"] = array();
				$_SESSION["cart"][] = array("name" => $_GET["name"], "amount" => $_POST["donation"], "url" => $_GET["img"]);
				header("Location: ./purchase.php?msg=".$msg."&name=".$name."&img=".$img."&cat=".$_GET["cat"]);
				return ;
			}
		}
	}
	else
	{
		echo file_get_contents("http://e1z1r7p29:8080/rush00/purch_error.php?msg=".urlencode("You must be logged in to make a donation"));
		return ;
	}
?>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./css/login.css">
	<link rel="stylesheet" type="text/css" href="./css/index.css">
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
		<a href="./index.php"><li class="logo">CHEERITY</li></a>
		<li id = "left"><a href="./contact.php">Contact</a></li>
		<li id = "left"><a href="./about.php">About</a></li>
		<?php
			echo "<li id='right'><a class='link' href='./accounts/logout.php'>Logout</a></li>";
			echo "<li id ='right'><a class='link' href='./accounts/settings.php'>Account Settings</a></li>";
			echo "<li id ='right'><a class='link' href='./cart.php'><i id = 'cart' class='fa'>&#xf07a;</i></a></li>";
		?>
	</ul>
	<form method="POST">
		<?php echo $_GET["msg"];
			echo "<br /> <br />"
			?>
		Make a donation to <?php echo $_GET["name"];?> <br /><br />
		<img src=<?php echo $_GET["img"];?> height=300 width=300>
		<br />
		<input type="number" name="donation" maxlength="5" required/>
		<br /><br />
		<input type="submit" name="submit" value="Submit" id="submit"/>
		<br />
		<?php 
			echo "<a href='./".$_GET["cat"].".php' id='button'>";
		?>
		<input type="button" name="back" value="Back" id="back"/></a>
	</form>
</body>
</html>