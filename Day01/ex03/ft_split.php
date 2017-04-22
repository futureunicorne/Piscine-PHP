<?php
	function ft_split($input)
	{
		$split = explode(' ', $input);
		$split = array_filter($split);
		$split = array_values($split);
		sort($split);
		return ($split);
	}
?>
