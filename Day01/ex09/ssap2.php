#!/usr/bin/php
<?PHP
	function    big($val)
	{
    	return($val != "");
	}

	function select($str, $str2)
	{
    	$i = 0;
    	$e = strlen($str);
    	$f = strlen($str2);
    	$e = ($e >= $f) ? $e : $f;
    	while($i < $e)
    	{
        	if ($i >= strlen($str))
        	{
            	return (-1);
        	}
        	else if ($i >= strlen($str2))
            	return(1);
        	$a = strtolower($str[$i]);
        	$b = strtolower($str2[$i]);
        	if ((ctype_alpha($a) && ctype_alpha($b)) ||
            (ctype_digit($a) && ctype_digit($b)))
        	{
            	if ($a < $b)
                	return (-1);
            	else if ($a > $b)
                	return (1);
        	}
        	else if (ctype_digit($a) && ctype_alpha($b))
            	return (1);
        	else if (ctype_alpha($a) && ctype_digit($b))
            	return (-1);
        	if (!ctype_alpha($a) && !ctype_digit($a) && !ctype_alpha($b) && !ctype_digit($b))
        	{
            	if ($a < $b)
                	return (-1);
            	else if ($a > $b)
                	return (1);
        	}

        	if ($a == $b);
        	else if (ctype_alpha($a) || ctype_digit($a))
            	return (-1);
        	else if (ctype_alpha($b) || ctype_digit($b))
            	return(1);
        	$i++;
    	}
    	return (-1);
	}
	if ($argc >= 2)
	{
    	$array = implode(' ', $argv);
    	$array = explode(' ', $array);
    	$array = array_filter($array, "big");
    	unset($array[0]);
    	usort($array, "select");
    	$array = implode("\n", $array);
    	echo "$array\n";
	}
?>
