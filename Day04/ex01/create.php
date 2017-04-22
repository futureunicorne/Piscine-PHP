<?php
	if ($_POST['submit'] == "OK")
	{
		if ($_POST['login'] && $_POST['passwd'])
		{
			$mdp = hash(whirlpool, $_POST['passwd'], false);
			$new = array("login" => $_POST['login'], "passwd" => $mdp);
			if (!file_exists("../private"))
			{
				mkdir("../private", 0777, true);
				$compte = array($new);
			}
			if (!file_exists("../private/passwd"))
			{
				$tmp1 = serialize($compte);
				file_put_contents("../private/passwd", $tmp1);
				echo "OK\n";
			}
			else
			{
				$compte = unserialize(file_get_contents("../private/passwd"));
				$val = 0;
				foreach ($compte as $key)
				{
					if ($key['login'] == $_POST['login'])
				 		$val = 1;
				}
				$compte [] = $new;
				if ($val == 1)
					echo "ERROR\n";
				else
				{
					$tmp1 = serialize($compte);
					file_put_contents("../private/passwd", $tmp1);
					echo "OK\n";
				}
			}
		}
		else
			echo "ERROR\n";
	}
	else
		echo "ERROR\n";
?>
