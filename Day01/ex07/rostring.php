#!/usr/bin/php
<?php
$string = $argv[1];


$array = (preg_split('/\s+/ ', $string));


$num = count($array);
$oneless = $num - 1;


$first = array_slice($array, 1, $oneless);
$last = array_slice($array, 0, 1);
$result = array_merge($first, $last);

$print = implode(" ", $result);
echo "$print\n";
?>
