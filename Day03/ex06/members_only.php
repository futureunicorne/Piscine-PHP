<?PHP
$user = "zaz";
$pw = "jaimelespetitsponeys";

if ($_SERVER['PHP_AUTH_USER'] == $user && $_SERVER['PHP_AUTH_PW'] == $pw)
{
?>
<html><body>
Bonjour Zaz<br />
<?PHP
	echo "<img src='data:image/png;base64,";
	$file = base64_encode(file_get_contents("../img/42.png"));
	echo $file;
	echo "'>\n";
?>
</body></html>
<?PHP
}
else
{
	header('WWW-Authenticate: Basic realm="Espace membres"');
	header('HTTP/1.0 401 Unauthorized');


?>
<html><body>Cette zone est accessible uniquement aux membres du site</body></html>
<?PHP
}
?>
