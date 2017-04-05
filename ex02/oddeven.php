#!/usr/bin/php
<?php
	echo "Entrez un nombre: ";
	while ($a = fgets(STDIN))
	{
		$a = trim($a);
		if (is_numeric($a))
		{
			if ($a % 2 == 0)
				echo "Le chiffre $a est Pair\n";
			if ($a % 2 == 1)
				echo "Le chiffre $a est Impair\n";
		}
		else
		{
			echo "'$a' n'est pas un chiffre\n";
		}
		echo "Entrez un nombre: ";
	}
	echo "\n";
?>
