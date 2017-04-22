<?PHP

function	ft_hash($password)
	{
		$salt = hash("whirlpool", "!p@4#x$4%6^0&z*e(y)l_l+~");
		$password = hash("whirlpool",$password);
		$hash_passwd = hash("whirlpool", $salt.$password);
		return ($hash_passwd);
	}

function	auth($login, $passwd)
{
	$password = ft_hash($passwd);
	$tab = file_get_contents("../private/passwd");
	$tab = unserialize($tab);
	foreach($tab as $elem)
	{
		if ($elem['login'] == $login && $elem['passwd'] == $password)
			return TRUE;
	}
	return FALSE;
}

?>
