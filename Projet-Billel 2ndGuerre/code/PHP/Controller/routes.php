<?php
// Le fichier Route permet de gérer toutes les ouvertures de pages

//on definit les constantes qui permet de definir les chemins
if (!class_exists("Settings")) require "Settings.class.php";
Settings::init();
Define ( "adresseRoot" , $_SERVER["DOCUMENT_ROOT"].Settings::getAdresseRoot()) ;
Define ("serverRoot",Settings::getServerRoot());

// La fonction afficherPage, prend 3 paramètres
// Le chemin où trouver les pages, le nom de la partie contenu à afficher et le titre à donner à la page
function afficherPage($chemin, $page, $titre)
{
	require $chemin . "Header.php";
    require $chemin . $page;
    require $chemin . 'Footer.php';
}

// A l'include de la page Route, le code suivant est exécuté
// Si la variable $get existe, on exploite les informations pour afficher la bonne page
if (isset($_GET['action'])) {
    // En fonction de ce que contient la variable action de $_GET, on ouvre la page correspondante

    switch ($_GET['action']) {



		case 'connect':
		{
			afficherPage(adresseRoot . 'PHP/View/', 'pageConnexion.php', "Connexion");
			break;
        }


        
       
    }
} else { // Sinon, on affiche la page principale du site
    afficherPage(adresseRoot . 'PHP/View/', 'pagePrincipale.php', "Connexion");
}