<?php
	function link_prod_cat($prodname, $catname)
	{
		$conn = mysqli_connect("localhost", "root", "root", "eshop");
		if (!$conn)
			die("Connection failed: " . mysqli_connect_error()) . "\n";
		$prodname = mysqli_real_escape_string($conn, $prodname);
		$catname = mysqli_real_escape_string($conn, $catname);
		$sql = "SELECT * FROM Products WHERE name='$prodname';";
		if (($array = mysqli_query($conn, $sql)) == NULL)
			echo "Error : " . mysqli_error($conn);
		if (($row = mysqli_fetch_assoc($array)) != NULL)
			$prod_id = $row['id'];

		$sql = "SELECT id FROM Category WHERE name='$catname';";
		if (($array = mysqli_query($conn, $sql)) == NULL)
			echo "Error : " . mysqli_error($conn);
		if (($row = mysqli_fetch_assoc($array)) != NULL)
			$cat_id = $row['id'];

		$sql = "INSERT INTO Cross_Table (prod_id, cat_id)
		VALUES ('"
			. $prod_id . "','"
			. $cat_id
			. "');";
		if (!mysqli_query($conn, $sql))
			echo "Error : " . mysqli_error($conn);
		if (($row = mysqli_fetch_assoc($array)) != NULL)
			$prod_id = $row['id'];
		mysqli_close($conn);
}
	require_once "config.php";

	// $connect = mysqli_connect(SERVER, USER, PASS, DBNAME);
	// mysqli_query($connect, "DROP DATABASE ".DBNAME);

	//Creation des comptes admin et users
	if (!file_exists("private"))
		mkdir("./private", 0777);
	$mdp_su = "oduman5";
	$mdp_su = hash(whirlpool, $mdp_su, false);
	$admin = ["hypersmoke" => $mdp_su];
	$tab_admin[] = $admin;
	file_put_contents("./private/admin", serialize($tab_admin));
	$mdp = hash(whirlpool, $mdp = "oduman5", false);
	$account = ["hypersmoke" => $mdp];
	$tab_account[] = $account;
	file_put_contents("./private/passwd", serialize($tab_account));

	// creation de la data base
	$connexion = mysqli_connect(SERVER, USER, PASS);
	if (!$connexion)
		die ("connexion failed: " . mysqli_connect_error());
	$sql = "CREATE DATABASE chicha_shop";
	if (mysqli_query($connexion, $sql))
		echo "Database Created <br />";
	else
		die ("".mysqli_error($connexion));
	mysqli_close($connexion);

	// Creation des produits
	$connexion = mysqli_connect(SERVER, USER, PASS, DBNAME);
	if (!$connexion)
		die ("Connexion Failed: " . mysqli_connect_error());
	$sql = "CREATE TABLE produits (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		name VARCHAR(25) NOT NULL,
		price VARCHAR(9) NOT NULL,
		img_url VARCHAR(500) NOT NULL,
		type SET('Chichas', 'Charbons', 'Tuyaux', 'Kaloud')
	)";
	if (mysqli_query($connexion, $sql))
		echo " Products Created <br />";
	else
		echo "Error: creating table failed" . mysqli_error($connexion);
	mysqli_close($connexion);

	$conn = mysqli_connect(SERVER, USER, PASS, DBNAME);
	if (!$conn)
		die("Connection failed: " . mysqli_connect_error());
	$sql = "CREATE TABLE Cross_Table (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		prod_id VARCHAR(30) NOT NULL,
		cat_id VARCHAR(30) NOT NULL
		)";
	if (mysqli_query($conn, $sql))
		echo "Table Cross_Table created successfully<br />
	";
	else
		echo "Error creating table: " . mysqli_error($conn);
	mysqli_close($conn);

	$connexion = mysqli_connect(SERVER, USER, PASS, DBNAME);
	if (!$connexion)
		die ("connexion failed: " . mysqli_connect_error());
	$sql = "INSERT INTO produits (name, price, img_url, type)
		VALUES ('Mya Vento', '49.90', 'https://www.el-badia.com/1892-thickbox_default/chicha-vento.jpg', 'Chichas');";
	$sql .= "INSERT INTO produits (name, price, img_url, type)
		VALUES ('Celeste', '49.90', 'https://www.el-badia.com/1892-thickbox_default/chicha-vento.jpg', 'Chichas');";
	$sql .= "INSERT INTO produits (name, price, img_url, type)
		VALUES ('Oduman N5', '179.90', 'https://www.el-badia.com/2803-thickbox_default/chicha-oduman-n5.jpg', 'Chichas');";
	$sql .= "INSERT INTO produits (name, price, img_url, type)
		VALUES ('Fumo Tank', '249.90', 'https://www.el-badia.com/2874-thickbox_default/chicha-fumo-tank-.jpg', 'Chichas');";
	$sql .= "INSERT INTO produits (name, price, img_url, type)
		VALUES ('Meduse', '759.90', 'https://www.el-badia.com/3169-thickbox_default/chicha-dschinni-tripod.jpg', 'Chichas');";
	$sql .= "INSERT INTO produits (name, price, img_url, type)
		VALUES ('Kaloud Oduman', '39.90', 'https://www.el-badia.com/2804-thickbox_default/oduman-ignis.jpg', 'Kaloud');";
	$sql .= "INSERT INTO produits (name, price, img_url, type)
		VALUES ('kaloud Lotus', '49.90', 'https://www.el-badia.com/2896-thickbox_default/kaloud-lotus.jpg', 'Kaloud');";
	$sql .= "INSERT INTO produits (name, price, img_url, type)
		VALUES ('Kaloud Samsaris', '29.90', 'https://www.el-badia.com/3647-thickbox_default/kaloud-samsaris-vitria-ii.jpg', 'Kaloud');";
	$sql .= "INSERT INTO produits (name, price, img_url, type)
		VALUES ('Tuyaux Marrakech', '10.00', 'https://www.el-badia.com/3030-thickbox_default/tuyau-marrakech-xl-30.jpg', 'Tuyaux');";
	$sql .= "INSERT INTO produits (name, price, img_url, type)
		VALUES ('Tuyaux Silicone', '15.90', 'https://www.el-badia.com/555-thickbox_default/tuyau-silicone.jpg', 'Tuyaux');";
	$sql .= "INSERT INTO produits (name, price, img_url, type)
		VALUES ('Tuyaux Verres', '49.90', 'https://www.el-badia.com/3410-thickbox_default/tuyau-sword-glass.jpg', 'Tuyaux');";
	$sql .= "INSERT INTO produits (name, price, img_url, type)
		VALUES ('Charbons Three Kings', '8.90', 'https://www.el-badia.com/2638-thickbox_default/charbons-three-kings-33mm-boite-de-100-.jpg', 'Charbons');";
	$sql .= "INSERT INTO produits (name, price, img_url, type)
		VALUES ('Charbon Tom Cococha 1 kg', '7.90', 'https://www.el-badia.com/2659-thickbox_default/charbons-tom-cococha-1kg-gold-.jpg', 'Charbons');";
	$sql .= "INSERT INTO produits (name, price, img_url, type)
		VALUES ('Charbon Tom Cococha 3 kg', '15.90', 'https://www.el-badia.com/2658-thickbox_default/charbons-tom-cococha-3kg-gold-.jpg', 'Charbons');";
	$sql .= "INSERT INTO Products (name, price, img_url, type)
		VALUES ('Charbon Cocobricko', '6.00', 'https://www.el-badia.com/1789-thickbox_default/charbons-tom-cococha-1kg-bleu-.jpg', 'Charbons');";
	if (mysqli_multi_query($connexion, $sql))
		echo "Add products Success<br />";
	else
		echo "Error: " . $sql . "<br>" . mysqli_error($connexion);
	mysqli_close($connexion);

	//creation category
	$connexion = mysqli_connect(SERVER, USER, PASS, DBNAME);
	if (!$connexion)
		die("Connection failed: " . mysqli_connect_error());
	$sql = "CREATE TABLE Category (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		name VARCHAR(30) NOT NULL

		)";
	if (mysqli_query($connexion, $sql))
		echo "Table Category created successfully<br />";
	else
		echo "Error creating table: " . mysqli_error($connexion);
	mysqli_close($connexion);

	$connexion = mysqli_connect(SERVER, USER, PASS, DBNAME);
	if (!$connexion)
		die("Connection failed: " . mysqli_connect_error());
	$sql = "INSERT INTO Category (name)
		VALUES ('Chichas');";
	$sql .= "INSERT INTO Category (name)
		VALUES ('Tuyaux');";
	$sql .= "INSERT INTO Category (name)
		VALUES ('Kaloud');";
	$sql .= "INSERT INTO Category (name)
		VALUES ('Charbons');";
	$sql .= "INSERT INTO Category (name)
		VALUES ('Accessoires');";
	if (mysqli_multi_query($connexion, $sql))
		echo "Products added successfully<br />";
	else
		echo "Error: " . $sql . "<br>" . mysqli_error($connexion);
	mysqli_close($connexion);

	// creation Cross Table
	$connexion = mysqli_connect(SERVER, USER, PASS, DBNAME);
	if (!$connexion)
		die("Connection failed: " . mysqli_connect_error());
	$sql = "CREATE TABLE Orders (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		login VARCHAR(30) NOT NULL,
		total VARCHAR(10) NOT NULL
		)";
	if (mysqli_query($connexion, $sql))
		echo "Table Orders created successfully<br />";
	else
		echo "Error creating table: " . mysqli_error($connexion);
	mysqli_close($connexion);

	link_prod_cat("Mya Vento", "Chichas");
    link_prod_cat("Celeste", "Chichas");
    link_prod_cat("Oduman N5", "Chichas");
    link_prod_cat("Fumo Tank", "Chichas");
	link_prod_cat("Meduse", "Chichas");
    link_prod_cat("Kaloud Oduman", "Kaloud");
    link_prod_cat("Kaloud Lotus", "Kaloud");
	link_prod_cat("Kaloud Samsaris", "Kaloud");
	link_prod_cat("Tuyaux Marrakech", "Tuyaux");
	link_prod_cat("Tuyaux Silicone", "Tuyaux");
	link_prod_cat("Tuyaux Verres", "Tuyaux");
	link_prod_cat("Charbon Three Kings", "Charbons");
	link_prod_cat("Charbon Tom Cococha 1 kg", "Charbons");
	link_prod_cat("Charbon Tom Cococha 3 kg", "Charbons");

?>
