<?PHP
require_once "config.php";

session_start();
if (count($_SESSION["cart"]) > 0)
{
	$total = 0;
	$cart_items = array();
	$conn = mysqli_connect(SERVER, USER, PASS, DBNAME);
	$sql = "SELECT id, name, price FROM Produits";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0)
	{
		while ($row = mysqli_fetch_assoc($result))
		{
			foreach($_SESSION["cart"] as $key => $id)
			{
				if ($id == $row["id"])
				{
					$cart_items[] = $id;
					$total += $row["price"];
				}
			}
		}
	}
}

?>

<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Creation de compte </title>
		<link rel="stylesheet" type="text/css" href="creation.css">
	</head>
	<body>
		<div id="order">
			<?PHP
				require_once "config.php";
				if (count($_SESSION["cart"]) > 0)
				{
					echo "<table class='order'>
						<tr>
						<td class='line'>Name</td>
						<td class='line'>Price</td>
						<td class='line'>Quantity</td>
						</tr>";
					$item = array_unique($cart_items);
					$item_count = array_count_values($cart_items);
					$conn = mysqli_connect(SERVER, USER, PASS, DBNAME);
					$sql = "SELECT id, name, price FROM Produits";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0)
					{
						while ($row = mysqli_fetch_assoc($result))
						{
							foreach ($item as $id)
							{
								if ($id === $row["id"])
									echo "<tr><td>".$row["name"]."</td><td>".$row["price"]."$</td><td>$item_count[$id]</td></tr>";
							}
						}
						echo "<tr><td><u>Total : ".$total."$</u></td><tr></table>";
						echo "<div><form action='panier_valid.php' method='get'><input name='cart' value='$total' type='hidden'/><button class='button cart' type='submit'>Valider</button></form></div>";
					}
				}
				else
					echo "<table class='order'><div id='hypersmoke'><h1>Panier vide</div></h1></table>";
		?>
	</div>
	<div id="retour">
		<a href="index.php" class="lien">Retour à la page d'acceuil</a>
	</div>
		<div id="rectangle">
			<p class="text"> Vous trouverez ci dessous un compte un recapitulatif de vos achats.<br/></br>
				Cliquez sur le boutons 'Valider' pour finaliser votre acquisition </p>
		</div>

		<div id="coteg">
			<img src="chicha.svg">
		</div>

		<br/><h1> Chicha Store : La reference en matiere de Chicha  </h1><br/>
		<div id="barre"></div>
	</body>
</html>
