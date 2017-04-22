<?PHP
session_start();
if ($_GET["action"] === "added")
	echo "<div class='added'><h1>Ajouté au panier</h1></div>";
?>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Chicha_shop : Chicha en ligne </title>
		<link rel="stylesheet" type="text/css" href="Charbons.css">
	</head>
	<body>
		<div id="log">
			<table>
				<tr>
					<td>Identifiant </td>
					<td><input type="text" name="login" value=""/></td>
				</tr>
				<tr>
					<td>Mot de passe </td>
					<td><input type="password" name="passwd" value=""/></td>
				</tr>
			</table>
		</div>
		<div id="log_new">
			<a href="creation.html"> Creer un compte</a>
			<a href="modif.html"> Mot de passe oublie</a><br/>
		</div>
		<div id="panier1">
			<img src ="http://icon-icons.com/icons2/933/PNG/512/shopping-cart_icon-icons.com_72552.png" class="panier"><br/>
			<a href="chariot.php"> Votre panier<a/>
		</div>
		<div id="user">
			<img src ="https://cdn2.iconfinder.com/data/icons/ios-7-icons/50/user_male2-512.png" class="user1"><br/>
			<?php
				if ($_SESSION["loggued_on_user"] != NULL)
				{
					echo "Bonjour <div class='ligne'>".$_SESSION["loggued_on_user"]."</div>";
					echo "<form action='logout.php'><button class='button' name='logout'>Logout</button></form></div>";
				}
			?>
		</div>
		<div id="coteg">
			<img src="chicha.svg">
		</div>
		<div id="del">
			<img src ="https://cdn3.iconfinder.com/data/icons/google-material-design-icons/48/ic_delete_48px-128.png" class="delete"><br/>
			<a href="delete.html"> Supprimer compte </a>
		</div>

		<br/><h1> Chicha Store : La reference en matiere de Chicha </h1><br/>
		<div id="menu">
			<ul id="menu-deroulant">
				<?PHP
					require_once "config.php";

					$connexion = mysqli_connect(SERVER, USER, PASS, DBNAME);
					$sql = "SELECT id, name FROM Category";
					$result = mysqli_query($connexion, $sql);
					if (mysqli_num_rows($result) > 0)
					{
						 while ($row = mysqli_fetch_assoc($result))
						 {
							 $nom= $row["name"];
							 echo "<li class='menu-deroulant'><a href=$nom.php?cat=".$row["id"].">".$row["name"]."</a></li>";
						}
					}
				?>
			</ul>
		</div>
		<div id="prod">
		<?php
			require_once "config.php";
			$conn = mysqli_connect(SERVER, USER, PASS, DBNAME);
			$sql = "SELECT id, name, price, img_url, type FROM Produits WHERE type='Charbons'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0)
			{
				 while ($row = mysqli_fetch_assoc($result))
					 echo "<div class='produits'> <IMG ALT='image' SRC=".$row["img_url"]." HEIGHT='300' WIDHT='300'>
					 <h1>".$row["name"]."</h1><h2>".$row["price"].
					 "$</h2><form action='ajout_panier.php' method='get'><input name='id' value=".$row["id"]." type='hidden'/><button class='button' type='submit'>Ajouter au panier</button></form></div>";
			}
		?>
	</div>
	<div id="retour">
		<a href="index.php" class="lien">Retour à la page d'acceuil</a>
	</div>
	<div id="barre"></div>
	</body>
<html>
