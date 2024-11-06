<?php
 session_start();

    // connect to ddb
  include_once('Assets/connect.php');
  $conntr = new database();
  $ecommun = $conntr->connect("ecommunication");

  if (!isset($_SESSION['UserKey'])) { header('Location: login.html'); } else{$UserKey = $_SESSION['UserKey'];}

  //fetch public message 
  $membre_q = $conntr->Slecet($ecommun ,"employee","*","UserKey='$UserKey'"); // lazem nzidouha UserKey = User key elli fi session 
  $membre_data = mysqli_fetch_assoc($membre_q);


  $avances_q = $conntr->Slecet($ecommun ,"avances","*","User_Key = '$UserKey'"); 
  $avances_num = mysqli_num_rows($avances_q);

  $conge_q = $conntr->Slecet($ecommun ,"conge","*","User_Key = '$UserKey'"); 
  $conge_num = mysqli_num_rows($conge_q);

  $mp_q = $conntr->Slecet($ecommun ,"message_contents","*","M_Sender = '$UserKey'");  
  $mp_num = mysqli_num_rows($mp_q);

  $mpb_q = $conntr->Slecet($ecommun ,"message_contents","*","type = 'public'");  
  $mpb_num = mysqli_num_rows($avances_q);

  ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Fonctions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
/* Styles généraux */

    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5;
    }

    .menu {
        background-color: #333;
        color: #fff;
    }

    .menu ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    .menu ul li {
        display: inline-block;
        padding: 15px 20px;
    }

    .menu ul li a {
        text-decoration: none;
        color: #fff;
    }

    .menu ul li ul {
        display: none;
        position: absolute;
        background-color: #333;
        min-width: 150px;
    }

    .menu ul li:hover ul {
        display: block;
    }

    .menu ul li ul li {
        display: block;
        padding: 10px;
    }

    .menu ul li ul li a {
        color: #fff;
    }

    

    

    /* Par exemple, pour styliser la section Nouveauté */
    .nouveaute {
        padding: 20px;
        background-color: #fff;
        margin: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

</style>
<script>// Fonction pour afficher un message d'accueil
    function afficherMessageAccueil(fonctionnalite) {
        alert("Bienvenue sur la fonctionnalité " + fonctionnalite + " !");
    }
    
    // Ajouter des écouteurs d'événements à tous les liens du menu
    document.querySelectorAll('.menu ul li a').forEach(item => {
        item.addEventListener('click', event => {
            // Empêcher le comportement par défaut des liens
            event.preventDefault();
            // Récupérer le texte du lien cliqué
            const fonctionnalite = item.textContent;
            // Afficher un message d'accueil pour la fonctionnalité correspondante
            afficherMessageAccueil(fonctionnalite);
        });
    });
    
    // Simuler une déconnexion lorsque l'utilisateur clique sur le lien "Déconnexion"
    document.querySelector('.menu ul li a[href="deconnexion.php"]').addEventListener('click', event => {
        // Empêcher le comportement par défaut du lien
        event.preventDefault();
        // Afficher un message de confirmation
        if (confirm("Êtes-vous sûr de vouloir vous déconnecter ?")) {
            // Rediriger vers la page de déconnexion
            window.location.href = "deconnexion.php";
        }
    });
    </script>
</head>
<body>
<div class='row bg-dark'>
    <div class='col-10'>
        <div class="menu">
            <ul>
                <li><a href="Employer/nouveaute.php">Nouveauté</a></li>
                <li><a href="#">Messagerie</a>
                    <ul>
                        <li><a href="Messges/message_publique.php">Messages Publique </a></li>
                        <li><a href="Messges/message_conversation.php">Messages Priveé</a></li>
                    </ul>
                </li>
                <li><a href="#">Demande en Ligne</a>
                    <ul>
                        <li><a href="Demmandes/Listes_des_avances.php">Demande d'avances </a></li>
                        <li><a href="Demmandes/Listes_des_conge.php">Titre de Congé</a></li>
                    </ul>
                </li>
                <li><a href="Employer/log_out.php">Déconnexion</a></li>
            </ul>
            
        </div>
    </div>
    <div class='col-2 bg-dark align-self-center'><span class='text-white'><?php echo $membre_data['Nom'] ?></span> </div>
</div>
<br>
<br>
<br>
<br>

<div class='container'>
    <div class='row'>
        <div class='col-3'>
            <div class='card card-body shadow-sm mb-4 rounded text-center h-100'>
               <h1 class='text-primary'><?php echo $avances_num ?> </h1>
               <h5>Avances</h5> 
            </div>
        </div>
        <div class='col-3'>
            <div class='card card-body shadow-sm mb-4 rounded text-center h-100'>
               <h1 class='text-primary'><?php echo $conge_num ?> </h1>
               <h5>Congeé</h5> 
            </div>
        </div>
        <div class='col-3'>
            <div class='card card-body shadow-sm mb-4 rounded text-center h-100'>
               <h1 class='text-primary'><?php echo $mp_num ?> </h1>
               <h5>Messages Priveé</h5> 
            </div>
        </div>
        <div class='col-3'>
            <div class='card card-body shadow-sm mb-4 rounded text-center h-100'>
               <h1 class='text-primary'><?php echo $mpb_num ?> </h1>
               <h5>Messages Publiques</h5> 
            </div>
        </div>
    </div>
</div>

<script src="script.js"></script>
</body>
</html>