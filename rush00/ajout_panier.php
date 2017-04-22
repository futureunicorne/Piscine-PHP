<?PHP

session_start();
$id = $_GET["id"];
$_SESSION["cart"][] = array();
array_push($_SESSION["cart"], $id);
header('Location: index.php?action=added');

?>
