<?php
function ft_split($arg)
{
	$array = (preg_split('/\s+/ ', $arg));
	return $array;
}
?>
