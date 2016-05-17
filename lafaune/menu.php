<div id="entete">
	<h1> SITE LA FAUNE </h1>
	<a href="accueil.php">Accueil</a><br>
</div>

<nav>
	<ul>
	<h3> Nos produits </h3>

		<?php include("connexion.php"); /* connexion à la BDD */

		$reponse = $bdd->query('SELECT * FROM categorie');/* on recupere les informations */
		while ($donnees = $reponse->fetch())/* boucle qui permet d'afficher toute les informations recuperer */
		{
		?>

		<li>
		<a href="listePdt.php?categ=<?php echo $donnees['cat_code']; ?>"><?php echo $donnees['cat_libelle']; ?></a>
		</li> <!-- affichage de chaque lien -->

		<?php
		}
		$reponse->closeCursor(); // Termine le traitement de la requête
		?>
		
	</ul>
			<form action="panier.php" target="menu" method="get"> 
				<input type="submit" name="action" value="Vider le panier"/> <!-- creation du bouton vider le panier -->
			</form>
			<form action="commande.php" target="page" method="get"> <!-- creation du bouton commander -->
				<input type="submit" value="Commander"/>
			</form>
</nav>
