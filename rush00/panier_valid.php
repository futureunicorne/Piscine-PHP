<?PHP

session_start();
$total = intval($_GET["cart"]);
if ($_SESSION["loggued_on_user"] !== NULL && $total !== NULL)
{
	$login = $_SESSION["loggued_on_user"];
	$conn = mysqli_connect("localhost", "root", "root", "chicha_shop");
	if (!$conn)
		die("Connection failed: " . mysqli_connect_error());
	$sql = "INSERT INTO Orders (login, total)
		VALUES ('$login', '$total');";
	if (mysqli_query($conn, $sql))
		echo "Your order is confirmed\n";
	else
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	mysqli_close($conn);
	$_SESSION["cart"] = NULL;
}
else
	echo "Veuillez vous connecter pour valider vos achats";

?>
