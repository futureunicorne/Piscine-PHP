<?php
$file = '../img/42.png';

	if (file_exists($file))
	{
    	header('content-type: image/png');
    	readfile($file);
    exit;
}
?>
