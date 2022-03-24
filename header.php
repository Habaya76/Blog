<?php


session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <script src="https://kit.fontawesome.com/f00c55aea5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css">
</head>
<header>
    <nav>
        <ul>
            <li><a href="index.php">Acceuil</a></li>
            <li><a href="liste_recettes.php">Recettes</a></li>
            <li><a href="apropos.php">A Propos</a></li>
            <li><a href="contact.php">Contact</a></li>
            <!-- <li><a href="connexion.php">Connexion</a></li>   -->


            <?php if (!empty($_SESSION['role'] && $_SESSION['role'] == 'user')) {
                echo  '<li><a href="deconnexion.php">Déconnexion</a></li>';
            } elseif (!empty($_SESSION['role'] && $_SESSION['role'] == 'admin')) {
                echo  ' <li><a href="admin.php">Admin</a></li>';
                echo  '<li><a href="deconnexion.php">Déconnexion</a></li>';
            } elseif (!isset($_SESSION['role'])) {
                echo '<li><a href="connexion.php">Connexion</a></li>';
            }

            ?>
        </ul>
    </nav>
    <img src="images/logo.png" alt="logo">
    <h1>Aventures Gustatives</h1>
    <hr>
</header>

<body>