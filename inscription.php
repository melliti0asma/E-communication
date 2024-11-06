<?php

if (isset($_POST['StartBtn'])) 
{


	// connect To db 
	include_once('Assets/connect.php');
  	$conntr = new database();
    $registration = $conntr->connect("ecommunication");
    

    // Get Data From Post 
	$username = mysqli_real_escape_string($registration, $_POST['username']);
	$name = mysqli_real_escape_string($registration, $_POST['name']);
	$naissance = mysqli_real_escape_string($registration, $_POST['naissance']);
	$genre = mysqli_real_escape_string($registration, $_POST['genre']);
	$tlf = mysqli_real_escape_string($registration, $_POST['tlf']);
	$cin = mysqli_real_escape_string($registration, $_POST['cin']);
	$email = mysqli_real_escape_string($registration, $_POST['email']);
	$cs = mysqli_real_escape_string($registration, $_POST['cs']);
	$password = mysqli_real_escape_string($registration, $_POST['password']);
	$text = mysqli_real_escape_string($registration, $_POST['text']);

	 
	// thabet idha l compt hadha mawjoud ou nn men num tel ??
	$sql = "SELECT * FROM employee WHERE Telephone = '$tlf';";
	$result = mysqli_query($registration, $sql);
	$resultCheck = mysqli_num_rows($result);

	if ($resultCheck > 0) {
		// donc mawjoud 
		header("Location: Assets/Errorlogin.php");
		exit();
	}
	else
	{
		/* Make The UID */
            /* Check if these Id already exist or not */
        $acceptable = false;
        do {
            /* genrate a random Id */
            $Id = mt_rand(1000000000, mt_getrandmax());
            $sql1 = " SELECT * FROM employee WHERE UserKey = '$Id';";
            $query1 = mysqli_query($registration,$sql1);
            $check = mysqli_num_rows($query1);

            if ($check == 0 ) {
                $UKEY = $Id;
                $acceptable = true;

            }
            else{
                $acceptable = false;
            }
        }while ($acceptable = false);

		// profile --> employee
		$dd = mysqli_query($registration,'SET NAMES utf8');
		$sql2 = "INSERT INTO employee (UserKey,Nom,Prenom,date_de_naissance,Genre,Telephone,Cin,Mail,Code,Mdp,Photo,message_Sent)
				 VALUES ('$UKEY','$name','$username','$naissance','$genre', $tlf , $cin ,'$email', $cs , $password ,'','$text');";
		$result2 = mysqli_query($registration, $sql2);

		// Open session
		session_start();
		$_SESSION['UserKey'] = $UKEY;

		// exit db and redirect to next page 
		if ($result2) {
			//exit();
			header("Location: fonction.php");
		} 
	} 
}
else 
{
		exit();
		header("Location: index.php");
}

?>