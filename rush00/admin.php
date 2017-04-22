<?PHP

include 'admin_auth.php';
if (admin_auth($_SERVER["PHP_AUTH_USER"], $_SERVER["PHP_AUTH_PW"]) === TRUE)
{
	$_SESSION["admin"] = "OK";
	header('Location: pannel.php');
}
else
{
	header('WWW-Authenticate: Basic realm="Test auth"');
	header("HTTP/1.0 401 Unauthorized");
	$_SESSION["admin"] = "";
}
?>
