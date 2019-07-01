<!DOCTYPE html>
<html lang="fr">

<head>

<?php

function chargerClasse($classe)
{
    if (file_exists(adresseRoot . "Php/Controller/" . $classe . ".class.php")) {
        require adresseRoot . "Php/Controller/" . $classe . ".class.php";
    }

    if (file_exists(adresseRoot . "Php/Model/" . $classe . ".class.php")) {
        require adresseRoot . "Php/Model/" . $classe . ".class.php";
    }

}
spl_autoload_register("chargerClasse");

// initialise une connection
DbConnect::init();
session_start();
//Si le titre est indiqué, on l'affiche entre les balises <title>
echo (!empty($titre)) ? '<title>' . $titre . '</title>' : '<title> Forum </title>';
?>
    <meta charset='utf-8'>
    <title>Opération Wellhit</title>
    <link href="https://fonts.googleapis.com/css?family=Special+Elite&display=swap" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="style.css" type='text/css'>
</head>

<body>
    <header>
        <h1>Opération Wellhit</h1>
        <nav>
            <ul id="menu">
                <li class="btn"><a href="#accueil">Accueil</a></li>
                <li class="btn"><a href="#histoire">Histoire & Politique</a>
                    <ul class="sousMenu">
                        <li><a href="#">L'Avant-Guerre</a></li>
                        <li><a href="#">La Seconde Guerre mondiale</a></li>
                        <li><a href="#">Les Pays Impliqués</a></li>
                        <li><a href="#">Bilan Humain et Matériel</a></li>
                    </ul>
                </li>
                <li class="btn"><a href="#evenements">Événements Militaires</a>
                    <ul class="sousMenu">
                        <li><a href="#">17 Septembre 1944</a></li>
                        <li><a href="#">18 Septembre 1944</a></li>
                        <li><a href="#">19 Septembre 1944</a></li>
                        <li><a href="#">20 Septembre 1944</a></li>
                        <li><a href="#">21 Septembre 1944</a></li>
                        <li><a href="#">22 Septembre 1944</a></li>
                    </ul>
                </li>
                <li class="btn"><a href="#uniformes">Uniformes</a>
                    <ul class="sousMenu">
                        <li><a href="#">Allemand</a></li>
                        <li><a href="#">Anglais</a></li>
                        <li><a href="#">Canadien</a></li>
                    </ul>
                </li>
                <li class="btn"><a href="#forum">Forum</a></li>
            </ul>
        </nav>
    </header>
    <body>