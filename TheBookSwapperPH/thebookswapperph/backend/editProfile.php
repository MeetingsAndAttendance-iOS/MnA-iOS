<?php
	session_start();
	try
    {
        $DBH = new PDO("mysql:host=localhost;dbname=thebookswapperph", "root", "");

		$userName = $_POST['userName'];
        $displayName = $_POST['displayName'];
        $location = $_POST['location'];
        $contactNo = $_POST['contactNo'];
        $email = $_POST['email'];

        $data = array('userName' => $userName, 'displayName' => $displayName, 'location' => $location, 'contactNo' => $contactNo, 'email' => $email, 'id' => $_SESSION['id']);

        $STH = $DBH->prepare("UPDATE users SET userName = :userName, displayName = :displayName, location = :location, contactNo = :contactNo, email = :email WHERE userID = :id");
        $STH->execute($data);

        $DBH = null;
        header("Location: ../tempProfile.php");
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }	
?>