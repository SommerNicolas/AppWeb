<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 03.05.2016
 * Time: 18:39
 */
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
    <meta charset="utf-8"/>
    <style>
        *{
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        html{
            height: 100%;
        }
        body{
            position: relative;
            min-height: 100%;
            margin: 0;
            padding 0;
        }
        #titreAccueil{
            text-align:center;
        }
        #Global #gauche{
            float:left;
            margin-right: auto;
            width:25%;
        }
        #Global #centre{
            float:left;
            margin-left:auto;
            margin-right:auto;
            width:50%;
        }
        #Global #droite{
            float: left;
            margin-left: auto;
            width:25%
        }
        #haut{
            text-align: center;
        }
        footer{
            position:absolute;
            bottom:0;
            left:0;
            right:0;
        }
    </style>
</head>
<body>
<h1 id="titreAccueil">Accueil du projet SandBoxLearn</h1>
<div id="haut">
    <?php
    if(isset($_SESSION['user'])) {
        echo '<a href="">'.$_SESSION['user'].' '.'</a>';
        echo '<a href="auth/disconnect.php">Deconnexion </a>';
        echo '<a href="questionnary/insert-list.php">Création de questionnaire</a>';
    }else {
        echo '<a href = "auth/login.php" > Connexion</a >';
        echo '<a href="auth/login.php">Inscription</a>';
    }
    ?>

    <a href="">Rechercher un quizz</a>


</div>
<div id="Global">
    <div id="droite">
        <h2>Baniere droite</h2>
        <p>
            <textarea id = width="40" height="20">Ceci contiendra les tags</textarea>
        </p>
        <p>
            <textarea id = "ChatBox" width="80" height="40">Chatbox</textarea>
        </p>
    </div>
    <div id="centre">

        <h2>Qu'est ce que SandBoxLearn</h2>
        <p>SandBoxLearn est une application sur le web permettant l'apprentissage via des questionnaires que chaque utilisateur peut créer selon ses envies.</p>
    </div>
    <div id="gauche">
        <h2>Baniere gauche</h2>
        <p>
            <textarea id = width="40" height="20">Ceci contiendra les tags</textarea>
        </p>
        <p>
            <textarea id = "ChatBox" width="80" height="40">Chatbox</textarea>
        </p>
    </div>
</div>
<footer>
    <h3>pied de page</h3>
    <p>On peut mettre ici les crédits</p>
</footer>


</body>
</html>