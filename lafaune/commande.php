<?php
	session_start ();/* ouverture de la session */
    if (!isset($_SESSION["reference"]))/* on verifie si la variable reference est crée */
    {
        $_SESSION["reference"]=array();/* creation d'un tableau de variable reference */
        $_SESSION["quantite"]=array();/* creation d'un tableau de variable quantite */
    } 
    ?> 

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" /> <!-- On insère le css -->
        <title> Lafaune </title>
    </head>

    <?php include("menu.php"); /* on inclue le menu et on se connecte a la BDD */
    include ("connexion.php"); 
    ?>
    <body>
		<h2> Recapitulatif des articles commandes </h2>
    		
            <?php
            $n = 0;

            $nbElement  = count($_SESSION["reference"]); /* on compte le nombre d'element dans le tableau reference */
            if($nbElement == 0) /* condition pour verifier s'il ya qqch dans le tableau */
            {
    	           echo "Il n'y a aucun article";
            }
            else
            {
            ?> 
  
    	<div id="contenu">
    	<table>
        	<tr>
            	<td>Reference</td>
            	<td>Designation</td>
            	<td>Prix</td>
            	<td>Quantite</td>
            	<td>Montant</td>
        	</tr>

            <?php 
            while ($n<$nbElement)
            {
            ?>
            <?php
        	   $reponse = $bdd->prepare('SELECT * FROM produit WHERE pdt_ref = ? ');/* on recupere les informations */
               $reponse->execute(array($_SESSION["reference"][$j] ));/* prepare et execute permet une meilleur securisation des donnees que query */
	           $donnees = $reponse->fetch();
               $reponse->closeCursor();
            ?>
                    <tr>
                        <td><?php echo $_SESSION["reference"][$n]; ?></td> <!-- affichage -->
                        <td><?php echo $donnees['pdt_designation']; ?></td>
                        <td><?php echo $donnees['pdt_prix']. '€ '; ?></td>
                        <td><?php echo $_SESSION["quantite"][$n]; ?></td>
                    </tr>
                    <?php
                        $n = $n+1;
            }
                    ?>
            }

        <?php
        $reponse->closeCursor(); // Termine le traitement de la requête
        ?> 
        
    	</table>
		</div>
    </body>
    <?php include("pied.php"); ?>
</html>
<?php
}
?>