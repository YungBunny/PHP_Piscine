#!/usr/bin/php
<?php
$count = 0;
$newnew = array();
if ($argc < 1)
{
	print("Need argument(s) plzthx\n");
	exit;
}
foreach($argv as $value)
{
	if ($count++ != 0)
	{
		$string = preg_replace('!\s+!', ' ', trim($value));
		$array = explode(" ", $string);
		$newnew = array_merge($newnew, $array);
	}
}
sort($newnew);
foreach($newnew as $word)
{
	echo "$word\n";
}
?>
