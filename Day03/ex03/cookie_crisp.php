<?php
$name = "plat";
$val = "choucroute";
foreach($_GET as $key => $value)
{
	if ($key == "action" && $value == "set")
		setcookie($name, $val, time() + (86400 * 30), "/");
	if ($key == "action" && $value == "get")
	{
		if ($_COOKIE[$name]) 
		{
			echo $_COOKIE[$name];
			echo "\n";
		}
	}
	if ($key == "action" && $value == "del")
		setcookie($name, "", time() - 3600, "/");
}
?>
