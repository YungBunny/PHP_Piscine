#!/usr/bin/php
<?php
if ($argc != 2)
{
	print("Only takes one argument breh.\n");
	exit;
}
$argv[1] = rtrim($argv[1]);
$argv[1] = trim($argv[1]);
print(preg_replace('!\s+!', ' ', $argv[1]));
?>
