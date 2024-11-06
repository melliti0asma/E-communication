<?php
session_start();

if (isset($_POST['AddConge'])) 
{


	// connect To db 
	include_once('../Assets/connect.php');
  	$conntr = new database();
    $registration = $conntr->connect("ecommunication");
    

    // Get Data From Post 


	$nb_jour = mysqli_real_escape_string($registration, $_POST['nb_jour']);
	$de = mysqli_real_escape_string($registration, $_POST['de_date']);
	$vers = mysqli_real_escape_string($registration, $_POST['vers_date']);
	$UserKey = $_SESSION['UserKey'];
    



            // profile --> employee
            $dd = mysqli_query($registration,'SET NAMES utf8');
            $sql2 = "INSERT INTO conge (NB_Jour, User_key, De_Date, Vers_Date)
                    VALUES ('$nb_jour' ,'$UserKey', '$de', '$vers' );";
            $result2 = mysqli_query($registration, $sql2);

            // exit db and redirect to next page 
            if ($result2) {
                //exit();
                header("Location:Listes_des_conge.php");
            }
           

		} 
else{
		// the logbtn is not subbmited
		header("Location: ../index.html");
		exit();
}

?>