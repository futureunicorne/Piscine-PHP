<?php
session_start();
?>
<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<?php
		if ($_GET['submit'] == "OK")
		{
			if ($_GET['login'])
				$_SESSION['login'] = $_GET['login'];
			else
				$S_SESSION['login'] = "";
			if ($_GET['passwd'])
				$_SESSION['passwd'] = $_GET['passwd'];
			else
				$S_SESSION['passwd'] = "";
		}
		?>
		<br/>
		<form method="get" action="index.php">
			Identifiant : hamza<input type="text" name="login" value="<?php echo $_SESSION['login']?>"/></br>
		 	Mot de passe : 42<input type="password" name="passwd" value="<?php echo $_SESSION['passwd']?>"/></br>
			<input type="submit" name="submit"  value="OK"/>
		</form>
	</body>
</html>
