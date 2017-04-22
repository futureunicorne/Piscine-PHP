<?PHP
require_once "config.php";

if ($_GET["name"] !== NULL || $_GET["price"] !== NULL || $_GET["img_url"] !== NULL)
{
	$name = $_GET["name"];
	$price = $_GET["price"];
	$img = $_GET["img_url"];
	$type = $_GET["type"];
	$conn = mysqli_connect(SERVER, USER, PASS, DBNAME);
	if (!$conn)
		die("Connection failed: " . mysqli_connect_error());
	$sql = "INSERT INTO Produits (name, price, img_url, type)
	VALUES ('$name', '$price', '$img', '$type')";
	if (mysqli_query($conn, $sql))
		echo "New record created successfully";
	else
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	mysqli_close($conn);
}
else
	echo "entrez toutes les infos";
?>
