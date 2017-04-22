<?PHP
require_once "config.php";

if ($_GET["name"] !== NULL)
{
	$name = $_GET["name"];
	$conn = mysqli_connect(SERVER, USER, PASS, DBNAME);
	if (!$conn)
		die("Connection failed: " . mysqli_connect_error());
	$sql = "INSERT INTO Category (name)
	VALUES ('$name')";
	if (mysqli_query($conn, $sql))
		echo "New record created successfully";
	else
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	mysqli_close($conn);
}
else
	echo "entrez toutes les infos";

?>
