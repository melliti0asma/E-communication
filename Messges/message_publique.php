<?php
    // connect to ddb
  include_once('../Assets/connect.php');
  $conntr = new database();
  $ecommun = $conntr->connect("ecommunication");

  //fetch public message 
  //$messages_q = $conntr->Slecet($ecommun ,"message_contents","*","type='public'");
  //$messages_num = mysqli_num_rows($messages_q)

  $sql = "SELECT * FROM message_contents 
            LEFT JOIN  employee ON message_contents.M_Sender = employee.UserKey
            WHERE message_contents.type='public' ;";
  $messages_q = mysqli_query($ecommun, $sql);
  $messages_num = mysqli_num_rows($messages_q);

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
       <h4 class="text-secondary">Message Publique <span class="bi bi-alarm"></span></h4> 
    </div>
    <br/>
    <br/>
    <br/>
    <br/>
    <div class='container-fluid'>
        <div class='row'>
            <div class='col-8'>
            <?php

                if ($messages_num == 0) { echo 'Pas de messages ';}   
                while ($result = mysqli_fetch_assoc($messages_q)) {

                echo '
                    <div class="card p-2 border-2 mb-3" >
                        <h5>'.$result['Nom'].' '.$result['Prenom'].' : '.$result['M_Date'].' -- '.$result['M_Time'].' </h5>
                    '.$result['M_Subject'].' : '.$result['M_Message'].'
                    </div>
                        ';
                }

            ?>
            </div>
            <div class='col-4'>
                <div class='card card-body shadow-sm mb-4 rounded'>
                    <h4>Ajouter Messages </h4>
                    <form action="ajouter_message_publique.php"  method="post"  >
            
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="text" class="form-control" placeholder="Sujet " name='sujet' aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Leave a comment here" name='contenue' id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Comments</label>
                    </div>
                    <div class="d-grid gap-2">
                            <button type='submit' class="btn btn-primary" name = "SaveMessageBtn" >Ajouter </button>
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