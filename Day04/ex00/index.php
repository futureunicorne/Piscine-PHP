<html>
		<head>
			<meta charset="utf-8">
			<title>Change Password</title>
		</head>
		<body>
			<?php
			session_start();
			if ($_GET['submit'] == "OK")
			{
				if ($_GET['login'])
					$_SESSION['login'] = $_GET['login'];
				else
					$S_SESSION['login'] = "";

				if $_GET['passwd']
					$_SESSION['passwd'] = $_GET['passwd'];
				else
					$S_SESSION['passwd'] = "";
			}
			?>
			<form method="get" action="index.php">
				Identifiant : <input type="text" name="login" value="<?php echo $_SESSION['login'] ?>"/></br>
			 	Mot de passe : <input type="password" name="passwd" value="<?php echo $_SESSION['passwd'] ?>"/></br>
				<input type="submit" name="submit"  value="OK"/>
			</form>
		</body>
</html>
