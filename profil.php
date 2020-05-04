<?php
session_start();

$bdd = new PDO('mysql: host=127.0.0.1;dbname=espace_membre2', 'root', '');

if(isset($_GET['id']) AND $_GET['id'] > 0)
{
	$getid = intval($_GET['id']);
	$requser = $bdd->prepare("SELECT * FROM membrepeda WHERE id = ?");
	$requser->execute(array($getid));
	$userinfo = $requser->fetch();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Profil</title>
		<meta charset="utf-8">
		<style type="text/css"> h1{color:purple ;
		font-size: 50px;
		font-family: Segoe Print;}</style>
		<style type="text/css"> body {background-color:pink ;}</style>
		<style type="text/css"> p {color:green </style>
		<style type="text/css"> a { color: blue; } </style>
	</head>
	<body>
		<div align="center">
			<h1>Profil de <?php echo$userinfo['pseudo']; ?></h1>
			<br /><br />
			<?php
			if(!empty($userinfo['avatar']))
			{
			?>
			<img src="membres/avatars/<?php echo $userinfo['avatar']; ?>" width="150">
			<?php
			}
			?>
			Pseudo de l'utilisateur: <?php echo$userinfo['pseudo']; ?>
			<br />
			Adresse mail de l'utilsateur: <?php echo$userinfo['mail']; ?>
			<br /><br />
			<p>Accès au trombinoscope des élèves:</p>
			<br /><br /><br /><a href="etudiant.php"> Trombinoscope des étudiants dans les Licences Informatiques. </a><br />
			<br /><br />
			<a href="deconnexion.php"> Se déconnecter </a><br/>
			<br /><a href="editionprofil.php">Modifier mon profil</a>
		</div>
</body>
</html>
<?php
}
?>