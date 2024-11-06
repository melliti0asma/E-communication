<?php

session_start();

if (isset($_POST['AddConv'])) 
{


	// connect To db 
	include_once('../Assets/connect.php');
  	$conntr = new database();
    $registration = $conntr->connect("ecommunication");
    

    // Get Data From Post 


	$membre = mysqli_real_escape_string($registration, $_POST['membre']);
	//$contenue = mysqli_real_escape_string($registration, $_POST['contenue']);
    $UserKey = $_SESSION['UserKey'];

	 
            /* $acceptable = false;*/
            do {
                /* genrate a random Id */
                $Id = mt_rand(1000000000, mt_getrandmax());
                $sql1 = " SELECT * FROM message_conversations WHERE CID = '$Id';";
                $query1 = mysqli_query($registration,$sql1);
                $check = mysqli_num_rows($query1);

                if ($check == 0 ) {
                    $CID = $Id;
                    $acceptable = true;

                }
                else{
                    $acceptable = false;
                }
            }while ($acceptable = false);

            $gen_Date = date('Y-m-d');    

            // profile --> employee
            $dd = mysqli_query($registration,'SET NAMES utf8');
            $sql2 = "INSERT INTO message_conversations (CID, UserKey_Start, UserKey_Recive,StartedAt)
                    VALUES ('$CID','$UserKey','$membre','$gen_Date');";
            $result2 = mysqli_query($registration, $sql2);

            // exit db and redirect to next page 
            if ($result2) {
                //exit();
                header("Location: message_conversation.php");
            }
            

		} 
else{
		// the logbtn is not subbmited
		header("Location: ../index.html");
		exit();
}

?>