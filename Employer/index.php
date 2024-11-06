<?php
	session_start();
	if (isset($_SESSION['UserKey'])) {
		header('Location: ../fonction.php');
		
	} else {
		header('Location: ../logIn.html');
	}
	
?>