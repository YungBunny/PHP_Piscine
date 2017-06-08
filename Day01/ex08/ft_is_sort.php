<?php
function ft_is_sort($arg)
{
	$new = array();
	foreach ($arg as $k => $v)
	{
		$new[$k] = $v;
	}
	array_multisort($new);
	$newnew = array_diff($arg, $new);
	$newnewnew = array_diff($new, $arg);
	if ($new == $arg)
		return 1;
	else
		return 0;
}
?>
