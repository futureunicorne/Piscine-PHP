<?PHP
session_start();
?>

<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Page Admin</title>
		<link rel="stylesheet" type="text/css" href="admin_page.css">
	</head>
	<body>
		<table class="order">
			<tr>
			<td class="line">Order no</td>
			<td class="line">Name</td>
			<td class="line">Total</td>
			</tr>
			<?php
			require_once "config.php";
			$conn = mysqli_connect(SERVER, USER, PASS, DBNAME);
			$sql = "SELECT id, login, total FROM Orders";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0)
			{
				 while ($row = mysqli_fetch_assoc($result))
					 echo "<tr><h3><td>".$row["id"]."</td><td>".$row["login"].
					 "</td><td>".$row["total"]."$</td></h3></tr>";
			}
			?>
		</table>
		<div class="columns">
			<div class="container">
				<section class="present">
					<H2>Ajouter un compte client</H2><br />
					<form action="creation1.php" method="post">
						Identifiant: <input type="text" name="login" value=""><br /><br />
						Mot de passe: <input type="password" name="passwd" value="">
						<input type="submit" value="OK"/>
					</form>
				</section>
				<section class="present">
					<form action="admin_modif.php" method="post">
					<H2>Modifier compte client</H2><br />
						Identifiant: <input type="text" name="login" value=""><br /><br />
						Nouveau mot de passe: <input type="password" name="newpw" value="">
						<input type="submit" value="OK"/>
					</form>
				</section>
				<section class="present">
					<H2>Supprimer un compte client</H2><br />
					<form action="admin_del.php" method="post">
						<label for="name1">Identifiant: </label><input type="text" name="login" value="">
						<input type="submit" value="Supprimer"/>
					</form>
				</section>
			</div>
			<div class="container">
				<section class="present">
					<H2>Ajouter des produits</H2><br />
					<form action="ajout_prod.php" method="get">
						Nom: <input type="text" name="name" value=""><br /><br />
						Prix: <input type="text" name="price" value=""><br /><br />
						Image: <input type="text" name="img_url" value=""></br></br>
						Type: <input type="text" name="type" value=""><br/>
						<input type="submit" value="OK"/>
					</form>
				</section>
				<section class="present">
					<H2>Modifier des produits</H2><br />
					<form action="modif_prod.php" method="get">
						Nom: <input type="text" name="oldname" value=""><br /><br />
						Nouveau Nom: <input type="text" name="newname" value=""><br /><br />
						Nouveau Prix: <input type="text" name="newprice" value=""><br /><br />
						Nouvelle Image: <input type="text" name="newimg_url" value="">
						<input type="submit" value="OK"/>
					</form>
				</section>
				<section class="present">
					<H2>Supprimer des produits</H2><br />
					<form action="del_prod.php" method="get">
						Nom: <input type="text" name="name" value="">
						<input type="submit" value="Supprimer"/>
					</form>
				</section>
			</div>
			<div class="container">
				<section class="present">
					<H2>Ajouter des categories</H2><br />
					<form action="ajout_cat.php" method="get">
						Nom: <input type="text" name="name" value="">
						<input type="submit" value="OK"/>
					</form>
				</section>
				<section class="present">
					<H2>Modifier des categories</H2><br />
					<form action="modif_cat.php" method="get">
						Ancien Nom: <input type="text" name="oldname" value=""><br /><br />
						Nouveau Nom: <input type="text" name="newname" value="">
						<input type="submit" value="OK"/>
					</form>
				</section>
				<section class="present">
					<H2>Supprimer des categories</H2><br />
					<form action="admin.php" method="get">
						Nom: <input type="text" name="name" value="">
						<input type="submit" value="Supprimer"/>
					</form>
				</section>
			</div>
		</div>
		<div id="retour">
			<a href="index.php" class="lien">Retour à la page d'acceuil</a>
		</div>
		<div id="barre"></div>

	</body>
</html>
