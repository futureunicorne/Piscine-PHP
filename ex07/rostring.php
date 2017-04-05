#!/usr/bin/php
<?php
	function ft_split($input)
	{
		$split = explode(' ', $input);
		$split = array_filter($split);
		$split = array_values($split);
		return ($split);
	}
	if ($argc > 1)
	{
		$str = ft_split($argv[1]);
		$b = array_shift($str);
		echo $b;
		foreach ($str as $s)
		{
			echo " ";
			echo ($s);
		}
		echo "\n";
	}
?>
