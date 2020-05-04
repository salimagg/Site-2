<?php

$bdd = new PDO('mysql: host=127.0.0.1;dbname=espace_membre2', 'root', '');

$pdoStat = $bdd->prepare('SELECT * FROM membre ORDER BY pseudo ASC');
// exédution de la requête

$executeIsOk = $pdoStat->execute();

//récupération des résultats en une seulle fois

$membres = $pdoStat->fetchAll();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<style type="text/css"> h1{color:purple ;
		font-size: 50px;
		font-family: Segoe Print;}</style>
		<style type="text/css"> body {background-color:pink ;}</style>
		<style type="text/css"> p {color:green </style>
		<style type="text/css"> a { color: blue; } </style>
	<title>Trombinoscope</title>
</head>
<body>

	<h1>Trombinoscope des étudiants</h1>

	<ul>
		<?php foreach ($membres as $membre); ?>
		<li>
			<?= $membre['pseudo'] ?> - <?= $membre['mail'] ?>  <?= $membre['avatar'] ?> <?= $membre['fillière'] ?>  <?= $membre['groupe'] ?>
		</li>

	</ul>
	<br /><br /> <a href="deconnexion.php"></a>

</body>
</html>