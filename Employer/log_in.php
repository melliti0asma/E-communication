<?php
session_start();

if (isset($_POST['StartBtn'])) 
{


	// connect To db 
	include_once('../Assets/connect.php');
  	$conntr = new database();
    $registration = $conntr->connect("ecommunication");
    

    // Get Data From Post 


	$tlf = mysqli_real_escape_string($registration, $_POST['tlf']);
	$password = mysqli_real_escape_string($registration, $_POST['password']);
	

	 
			$dd = mysqli_query($registration,'SET NAMES utf8');
			$sql = "SELECT * FROM employee WHERE Telephone = $tlf ";
			$result = mysqli_query($registration, $sql);
			$resultCheck = mysqli_num_rows($result);

			//if the user dosn't existe 
			if ($resultCheck < 1) 
			{
				
				header("Location: ../Assets/Errorlogin.php");
				exit();
			} 
			// if the usr exist
			else{
						$row = mysqli_fetch_assoc($result);
						$stored = $row['Mdp'];

						//but  the pasword is incorect
						if ($password != $stored) 
						{
							header("Location: Assets/Errorlogin.php");
							exit();
						} 

						// and the pasword is correct
						elseif ($password = $stored) 
						{
							// login the user here 
							$uid = $row['UserKey'];
							$dd = mysqli_query($registration,'SET NAMES utf8');
							$sql = "SELECT * FROM employee WHERE UserKey = '$uid'";
							$query2 = mysqli_query($registration, $sql);
							$result2 = mysqli_fetch_assoc($query2);


							$_SESSION['UserKey'] = $result2['UserKey'];

									
							header("Location: ../fonction.php");
							exit();
						}
					
				}			
		} 
		else{
				// the logbtn is not subbmited
				header("Location: ../index.php");
				exit();
			}

?>