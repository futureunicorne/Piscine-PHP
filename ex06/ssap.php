#!/usr/bin/php
<?php
function ft_split($input)
{
	$split = explode(' ', $input);
	$split = array_filter($split);
	$split = array_values($split);
	sort($split);
	return ($split);
}
$a = array();
foreach ($argv as $arg)
{
	if ($arg != $argv[0])
	{
		$str = ft_split($arg);
		$a = array_merge($a, $str);
	}
}
sort($a);
foreach ($a as $ele)
{
	echo $ele;
	echo "\n";
}
?>
