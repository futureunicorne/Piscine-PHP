<?PHP
session_start();
if ($_GET["action"] === "added")
	echo "<div class='added'><h1>Ajouté au panier</h1></div>";
?>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Chicha_shop : Chicha en ligne </title>
		<link rel="stylesheet" type="text/css" href="store.css">
	</head>
	<body>
		<div id="admin">
			<img src ="https://cdn3.iconfinder.com/data/icons/gray-user-toolbar/512/oficcial-512.png" class="panier"><br/>
			<a href="admin_auth.php" class="admin1"> Compte Admin	<a/>
		</div>
		</div>
		<form action="login.php" method="post" class="show">
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
			<div id="bouton">
				<input type="submit" name="submit" value="Valider"/>
				<input type="reset" name="reset" value="Recommencer"/>
			</div>
		</form>
		<div id="coteg">
			<img src="chicha.svg">
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

		<div id="del">
			<img src ="https://cdn3.iconfinder.com/data/icons/google-material-design-icons/48/ic_delete_48px-128.png" class="delete"><br/>
			<a href="delete.html"> Supprimer compte </a>
		</div>
		<div id="rectangle"><br/><br/><br/><br/>
			<p class="titre_text"> Bienvenue sur le Site de Chicha_Shop.fr </p>
			<p class="text"> Le site internet Chicha Shop est specialiste, depuis plusieurs années,
				dans le domaine des	 Narguilés et ses accessoires. <br/> <br/>Nous vous invitons a creer un compte afin de profiter
				au mieux de vos achats sur notre site.</p>
			<p class="text"> Bonne Session :) </p>
		</div>
		<br/><h1> Chicha Store : La reference en matiere de Narguiles  </h1><br/>
		<div id="menu">
			<ul id="menu-deroulant">
				<?PHP
					$connexion = mysqli_connect("localhost", "root", "root", "chicha_shop");
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
		<div id="barre"></div>
	</body>
<html>
