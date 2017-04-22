<?PHP

if ($_GET["oldname"] !== NULL || $_GET["newname"] !== NULL || $_GET["newprice"] !== NULL || $_GET["newimg_url"] !== NULL)
{
	$name = $_GET["oldname"];
	$newname = $_GET["newname"];
	$newprice = $_GET["newprice"];
	$newimg = $_GET["newimg_url"];
	$conn = mysqli_connect("localhost", "root", "root", "chicha_shop");
	if (!$conn)
		die("Connection failed: " . mysqli_connect_error());
	$sql = "UPDATE Produits SET name='$newname', price='$newprice', img_url='$newimg' WHERE name='$name'";
	if (mysqli_query($conn, $sql))
		echo "New record created successfully";
	else
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	mysqli_close($conn);
}
else
	echo "entrez toutes les infos";

?>
