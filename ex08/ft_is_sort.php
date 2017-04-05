<?php
function ft_is_sort($tab)
{
	$array = $tab;
	sort($array);
	$reverse = $tab;
	array_reverse($reverse);
	if (($tab == $reverse) || ($tab == $array))
		return (1);
	else
		return (0);
}
?>
