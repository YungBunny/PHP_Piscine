<?php
	function auth($login, $passwd)
	{
		if (file_exists("../private") == FALSE or file_exists("../private/usr") == FALSE)
			return (FALSE);
		if ($file = unserialize(file_get_contents("../private/admin")))
			foreach ($file as $arr)
				if ($login == $arr["login"])
					if (hash("sha256", $passwd) == $arr["passwd"])
					{
						$_SESSION["admin"] = TRUE;
						return (TRUE);
					}
		if ($file = unserialize(file_get_contents("../private/usr")))
			foreach ($file as $arr)
				if ($login == $arr["login"])
					if (hash("sha256", $passwd) == $arr["passwd"])
					{
						$_SESSION["admin"] = FALSE;
						return (TRUE);
					}
		return (FALSE);
	}
?>
