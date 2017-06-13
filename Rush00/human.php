<?php
	session_start();
?>
<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="./css/index.css">
		<style> a { text-decoration: none
					color:black; 
					}
				</style>
	</head>
	<body>
		<ul>
			<a href="./index.php"><li class="logo">CHEERITY</li></a>
			<li id = "left"><a href="./contact.php">Contact</a></li>
			<li id = "left"><a href="./about.php">About</a></li>
			<?php
			if ($_SESSION["loggued_on_user"] == NULL)
				{
					echo "<li id ='right'><a class='link' href='./accounts/login.php'>Login</a></li>";
					echo "<li id='right'><a class='link' href='./accounts/create.php'>Create account</a></li>";
				}
				else
				{
					echo "<li id='right'><a class='link' href='./accounts/logout.php'>Logout</a></li>";
					echo "<li id ='right'><a class='link' href='./accounts/settings.php'>Account Settings</a></li>";
					echo "<li id ='right'><a class='link' href='./cart.php'><i id = 'cart' class='fa'>&#xf07a;</i></a></li>";
				}
			?>
		</ul>
		<table>
			<tr>
				<div class = "row">
					<div class = "question">
						<p id="quest">Save Us</p>
					</div>
				</div>
			</tr>
			<?php
				$orgs = unserialize(file_get_contents("./products/human"));
				if ($orgs)
				{
					$i = 0;
					echo "<form>";
					foreach ($orgs as $org)
					{
						if ($org)
						{
						if ($i == 0)
						{
							echo "<tr>";
							echo "<div class='row'>";
						}
						echo "<div class='org'>";
						echo "<a href='./purchase.php?cat=human&name=".$org["name"]."&img=".$org["img"]."'>";
						echo "<img src='".$org['img']."'>";
						echo "</a>";
						echo "</div>";
						if ($i == 2)
						{
							echo "</div>";
							echo "</tr>";
							$i = 0;
						}
						else
							$i += 1;
						}
					}
					echo "</form>";
				}
			?>
		</table>
	</body>
</html>
