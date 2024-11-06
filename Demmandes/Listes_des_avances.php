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

  $sql = "SELECT * FROM avances 
            LEFT JOIN  employee ON avances.User_key = employee.UserKey
            WHERE avances.User_key = '$UserKey' ;";
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
            <div class='col-8'>
                <h5 class='text-secondary'>Listes des Avances </h5>
                <?php

                    if ($messages_r_num == 0) { echo 'Pas de Conversation ';}   
                    while ($result = mysqli_fetch_assoc($messages_r_q)) {

                    echo '
                        
                        <div class="card p-2 border-2 mb-3" >
                            <h5>'.$result['Prenom'].' -- '.$result['Nom'].' </h5>
                        '.$result['AV_Date'].'  --> '.$result['AV_Valeur'].' D.T
                        </div>
                      ';
                    }

                ?>
            </div>
            <div class='col-4'>
                <div class='card card-body shadow-sm mb-4 rounded'>
                    <h4>Ajouter Avcances  </h4>
                    <form action="ajouter_avance.php"  method="post"  >
            
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="text" class="form-control" placeholder="valeur " name='valeur' aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <br />
                    <br />
                    <div class="d-grid gap-2">
                            <button type='submit' class="btn btn-primary" name = "AddAvance" >Ajouter Avance</button>
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