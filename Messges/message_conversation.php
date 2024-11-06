<?php
 session_start();

    // connect to ddb
  include_once('../Assets/connect.php');
  $conntr = new database();
  $ecommun = $conntr->connect("ecommunication");

  if (!isset($_SESSION['UserKey'])) { header('Location: ../login.html'); } else{$UserKey = $_SESSION['UserKey'];}

  //fetch public message 
  $membre_q = $conntr->Slecet($ecommun ,"employee","*","1=1"); // lazem nzidouha UserKey = User key elli fi session 
  //$membre_num = mysqli_num_rows($membre_q)

  $sql = "SELECT * FROM message_conversations 
            LEFT JOIN  employee ON message_conversations.UserKey_Recive = employee.UserKey
            WHERE message_conversations.UserKey_Start = '$UserKey' ;";
  $messages_e_q = mysqli_query($ecommun, $sql);
  $messages_e_num = mysqli_num_rows($messages_e_q);


  $sql = "SELECT * FROM message_conversations 
  LEFT JOIN  employee ON message_conversations.UserKey_Start = employee.UserKey
  WHERE   message_conversations.UserKey_Recive = '$UserKey'  ;";
  $messages_r_q = mysqli_query($ecommun, $sql);
  $messages_r_num = mysqli_num_rows($messages_r_q);


  ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
 
 
</script>
</head>
<body>
    <div class="card card-body shadow-sm rounded-0 border-0 fixed-top">
       <h4 class="text-secondary">LIste des Conversation <span class="bi bi-alarm"></span></h4> 
    </div>
    <br/>
    <br/>
    <br/>
    <br/>
    <div class='container-fluid'>
        <div class='row'>
            <div class='col-4'>
                <h5 class='text-secondary'>Message Reçue</h5>
                <?php

                    if ($messages_r_num == 0) { echo 'Pas de Conversation ';}   
                    while ($result = mysqli_fetch_assoc($messages_r_q)) {

                    echo '
                        <a href="message_privee.php?id='.$result['CID'].' ">
                        <div class="card p-2 border-2 mb-3" >
                            <h5>'.$result['Prenom'].' -- '.$result['Nom'].' </h5>
                        '.$result['StartedAt'].'  
                        </div>
                        </a>
                            ';
                    }

                ?>
            </div>
            <div class='col-4'>
                <h5 class='text-secondary'>Message Envoyeé</h5>
                <?php

                    if ($messages_e_num == 0) { echo 'Pas de Conversation ';}   
                    while ($result = mysqli_fetch_assoc($messages_e_q)) {

                    echo '
                        <a href="message_privee.php?id='.$result['CID'].' ">
                        <div class="card p-2 border-2 mb-3" >
                            <h5>'.$result['Prenom'].' -- '.$result['Nom'].' </h5>
                        '.$result['StartedAt'].'  
                        </div>
                        </a>
                            ';
                    }

                ?>
            </div>
            <div class='col-4'>
                <div class='card card-body shadow-sm mb-4 rounded'>
                    <h4>Ajouter Conversation  </h4>
                    <form action="ajouter_conversation.php"  method="post"  >
            
                    <select class="form-select" aria-label="Default select example" name='membre'>
                            <option selected>Selectionnez Un Membre </option>
                            <?php 
                                while ($result2 = mysqli_fetch_assoc($membre_q)) {
                                echo '<option name="membre" value='.$result2['UserKey'].'>'.$result2['Nom'].' '.$result2['Prenom'].'</option>';
                                }
                            ?>
                    </select>
                    <br />
                    <br />
                    <div class="d-grid gap-2">
                            <button type='submit' class="btn btn-primary" name = "AddConv" >Ajouter Conversation</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    
        
</div>
    <br />
    <br />
    <br />
    <br />
 
</div>
    
    <!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>