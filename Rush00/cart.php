<?php
	session_start();
	if ($_SESSION["loggued_on_user"] == FALSE)
		header("Location: ./index.php");
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
	#total
	{
		float: right;
	}
	</style>
</head>
<body>
	<ul class='link'>
		<a href="./index.php"><li class="logo">CHEERITY</li></a>
		<li id = "left"><a href="./contact.php">Contact</a></li>
		<li id = "left"><a href="./about.php">About</a></li>
		<?php
			echo "<li id='right'><a class='link' href='./accounts/logout.php'>Logout</a></li>";
			echo "<li id ='right'><a class='link' href='./accounts/settings.php'>Account Settings</a></li>";
			echo "<li id ='right'><a class='link' href='./cart.php'><i id = 'cart' class='fa'>&#xf07a;</i></a></li>";
?>
</ul>
	<div class="row"></div>
	<div class = shop>
<h3>Shopping Cart</h3>
	<section class="shopping-cart">
	<ol class= "ui-list shopping-cart--list" id="shopping-cart--list">
	<?php 
		if ($_SESSION["cart"])
		{
			$total = 0;
		// 	echo "<ol class= 'ui-list shopping-cart--list' id='shopping-cart--list'>";
			foreach ($_SESSION["cart"] as $item)
			{
					echo "<li class='_grid shopping-cart--list-item'>";
					echo "<div>";
					echo "<img class='_column product-image'";
					echo "src='".$item["url"]."'/>";
					echo "<div class='_column product-info'>";
					echo "<h4 class='product-name'>".$item["name"]."</h4>";
					echo "<p class='product-desc'>thanks</p>";
					echo "</div>";
					echo "<div class='_column product-modifiers'>";
					echo "<div class='_grid'></div>";
					echo "<div class='price product-total-price'>"."$".$item["amount"]."</div>";
					echo "</div>";
					echo "</div>";
					echo "</li>";
					$total += $item["amount"];
			}
			// echo "</ol>";
			echo "<h4 class='product-name' id='total'>"."Total: $".$total."</h4>";
		}
		else
			echo "Cart is empty";
		
	?>
	</ol>
</body>
</html>