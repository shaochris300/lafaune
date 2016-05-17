<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" /> <!-- On insère le css -->
        <title> Lafaune </title>
    </head>

    <?php include("menu.php");
    include("connexion.php"); ?>

    <body>
    	<h2> </h2>

    <div id="contenu">
    <table>
        <tr>
            <td>Photo</td>
            <td>Reference</td>
            <td>Designation</td>
            <td>Prix</td>
        </tr>

        <?php  
        $reponse = $bdd->prepare('SELECT * FROM produit WHERE pdt_categorie = ?'); /* on recupere les informations */
        $reponse->execute(array($_GET["categ"] )); /* prepare et execute permet une meilleur securisation des donnees que query */
        while ($donnees = $reponse->fetch()) /* boucle qui permet d'afficher toute les informations recuperer */
        {
        ?>
                <tr>
                    <td> 
                        <img src="../Version3bis/Images/<?php echo $donnees['pdt_image']; ?>"  /> <!-- On insère une image -->

                     </td>
                    <td> <p><?php echo $donnees['pdt_ref']; ?></p> </td>
                    <td> <p> <?php echo $donnees['pdt_designation']; ?> </p> </td>
                    <td> <p> <?php echo $donnees['pdt_prix']; ?> </p> </td>
                </tr>

        <?php
        }
        $reponse->closeCursor(); // Termine le traitement de la requête
        ?>

    </table>
    
    <?php
            echo'<form action="panier.php" target="menu" method="get">';
                echo'<select name="pdt_designation" size="1">';
                $reponse = $bdd->prepare('SELECT * FROM produit WHERE pdt_categorie = ?'); /* on recupere les donnees */
                $reponse->execute(array($_GET["categ"] )); /* prepare et execute permet une meilleur securisation des donnees que query */
                while ($donnees = $reponse->fetch())/* boucle qui permet d'afficher toute les informations recuperer */
                    {
                        echo '<option> '.$donnees['pdt_designation']; 
                    }
                $reponse->closeCursor();
                echo'</select>';
                echo'&nbsp&nbsp&nbsp';
                echo'Quantité :';
                echo'<inpust type="text" name="quantite" size="5" value="1"/>';
                echo'<p><input type="submit" name="action" value="Ajouter au panier"/>';
            echo'</form>';
    ?>
    </div>
    </body>
    <?php include("pied.php"); ?> <!-- pied de page -->
</html>

