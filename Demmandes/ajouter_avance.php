<?php
session_start();

if (isset($_POST['AddAvance'])) 
{


	// connect To db 
	include_once('../Assets/connect.php');
  	$conntr = new database();
    $registration = $conntr->connect("ecommunication");
    

    // Get Data From Post 


	$valeur = mysqli_real_escape_string($registration, $_POST['valeur']);
	$UserKey = $_SESSION['UserKey'];
    


            $gen_Date = date('Y-m-d');


            // profile --> employee
            $dd = mysqli_query($registration,'SET NAMES utf8');
            $sql2 = "INSERT INTO avances (AV_Valeur, User_key, AV_Date)
                    VALUES ('$valeur' ,'$UserKey', '$gen_Date' );";
            $result2 = mysqli_query($registration, $sql2);

            // exit db and redirect to next page 
            if ($result2) {
                //exit();
                header("Location:Listes_des_avances.php");
            }
           

		} 
else{
		// the logbtn is not subbmited
		header("Location: ../index.html");
		exit();
}

?>