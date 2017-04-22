<?PHP

if ($_POST["login"] !== NULL)
{
	$tab_accounts = unserialize(file_get_contents("./private/passwd"));
	foreach ($tab_accounts as $key => $elem)
	{
		$login = key($elem);
		if ($login === $_POST["login"])
			unset($tab_accounts[$key]);
	}
	file_put_contents("./private/passwd", serialize($tab_accounts));
	header('Location: index.php');
}
else
	echo ("ERROR\n");
?>
