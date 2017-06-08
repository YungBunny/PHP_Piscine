#!/usr/bin/php
<?php
$answer = NULL;
print("Enter a number: ");
while ($answer = fgets(STDIN))
{
	$answer = rtrim($answer);
	if (!(ctype_digit($answer)))
		echo "'$answer' is not a number\n";
	else
	{
		if ($answer % 2 == 0)
			echo "The number $answer is even\n";
		else if ($answer % 2 != 0)
			echo "The number $answer is odd\n";
	}
	echo("Enter a number: ");
}
?>
