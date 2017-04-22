<?PHP

if ($_GET["name"] !== NULL)
{
	$name = $_GET["name"];
	$conn = mysqli_connect("localhost", "root", "root", "chicha_shop");
	if (!$conn)
		die("Connection failed: " . mysqli_connect_error());
	$sql = "DELETE FROM Produits WHERE name = '$name'";
	if (mysqli_query($conn, $sql))
		echo "Record deleted successfully";
	else
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	mysqli_close($conn);
}
else
	echo "entrez toutes les infos";

?>
