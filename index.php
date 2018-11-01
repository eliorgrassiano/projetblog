

<?php
        //recuperation des données
			try {
				$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
			} catch(Exception $e) {
				// En cas d'erreur, on affiche un message et on arrête tout
        		die('Erreur de connexion à la base de donnée : '.$e->getMessage());
			}


			$requete = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, "%d/%c/%Y à %Hh%imin%Ss") as date_fr, DATE_FORMAT(date_creation, "%c/%d/%Y at %Hh%imin%Ss") as date_en FROM billets ORDER BY date_creation DESC LIMIT 0, 5');



?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">	
		<title>Mon premier blog</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	
	<body>
		<h1>Mon super blog !</h1>
		<p>
			Derniers billets du blog :
		</p>

		<?php

			while ($donnee = $requete->fetch()) {
				?>
				<div class="news">
					<h3>
				<?php
					echo $donnee['titre'].' <em>le '.$donnee['date_fr'].'</em>';
				?>
					</h3>
					<p>
					<?php
						echo $donnee['contenu'];		
					?>
					<br/>
					<a href="commentaires.php?billet=<?php echo $donnee['id']; ?>">Commentaire</a>
					</p>
				</div>
				<?php
				
			}
		?>


	</body>
</html>