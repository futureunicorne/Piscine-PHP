<?php
	if ($_POST['submit'] == "OK")
	{
		if ($_POST['login'] && $_POST['oldpw'] && $_POST["newpw"])
		{
			$mdp_old = hash(whirlpool, $_POST['oldpw'], false);
			$mdp_new = hash(whirlpool, $_POST['newpw'], false);
			$compte = unserialize(file_get_contents("../private/passwd"));
			$val = 0;
			foreach ($compte as &$key)
			{
				if ($key['login'] == $_POST['login'])
				{
					if ($key['passwd'] == $mdp_old)
					{
						$key['passwd'] = $mdp_new;
							$compte = serialize($compte);
						file_put_contents("../private/passwd", $compte);
						$val = 1;
						echo "OK\n";
						return ;
					}
				}
			}
			if ($val == 0)
				echo "ERROR\n";
		}
		else
			echo "ERROR\n";
	}
	else
		echo "ERROR\n";
?>
