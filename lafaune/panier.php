<?php

session_start (); /* ouverture de la session */ 

    	if (!isset($_SESSION["reference"])) /* on verifie si la variable reference est crée */
    	{
        		$_SESSION["reference"]=array(); /* creation d'un tableau de variable reference */
        		$_SESSION["quantite"]=array(); /* creation d'un tableau de variable quantite */
    	}

        if (isset($_GET["action"]) AND isset($_GET["refPdt"]) AND isset($_GET["quantite"]) AND $_GET["action"] == "Ajouter au panier")
        {/* on verifie si lES methode get action, get refpdt, get quantite existent et si la methode get action est égale a ajouter au panier" */
            $nbElement  = count($_SESSION["reference"]); /* creation d'une variable nbElement pour compter le nombre d'element dans reference */
            $_SESSION["reference"][$nbElement] = $_GET["refPdt"]; /* ajout dans le tableau */
            $_SESSION["quantite"][$nbElement] = $_GET["quantite"]; /* ajout dans le tableau */
            $nbElement = $nbElement +1;
        }

        if(isset($_GET["action"]) AND $_GET["action"] == "Vider le panier")
        {/* on verifie si les methodes get action  existe et si get action est egale a vider le panier */
            session_destroy(); /* on detruit la session */
        }

        header("Location: accueil.php"); /* direction vers la page d'accueil */

?>

