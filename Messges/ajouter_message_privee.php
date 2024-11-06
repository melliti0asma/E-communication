<?php
session_start();

if (isset($_POST['SaveMessageBtn'])) 
{


	// connect To db 
	include_once('../Assets/connect.php');
  	$conntr = new database();
    $registration = $conntr->connect("ecommunication");
    

    // Get Data From Post 


	$sujet = mysqli_real_escape_string($registration, $_POST['sujet']);
	$contenue = mysqli_real_escape_string($registration, $_POST['contenue']);
	$CID = mysqli_real_escape_string($registration, $_POST['cid']);
    


            $gen_Date = date('Y-m-d');
            $gen_Time = date('H:i:s') ;     

            // profile --> employee
            $dd = mysqli_query($registration,'SET NAMES utf8');
            $sql2 = "INSERT INTO message_contents (CID, type, M_Message, M_Subject, Genre, M_Date, M_Time)
                    VALUES ('$CID','privee','$sujet','$contenue','Genre','$gen_Date','$gen_Time' );";
            $result2 = mysqli_query($registration, $sql2);

            // exit db and redirect to next page 
            if ($result2) {
                //exit();
                header("Location: message_privee.php?id=$CID");
            }
           

		} 
else{
		// the logbtn is not subbmited
		header("Location: ../index.html");
		exit();
}

?>