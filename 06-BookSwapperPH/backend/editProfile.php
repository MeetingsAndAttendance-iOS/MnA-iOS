<?php
	session_start();
	try
    {
        $DBH = new PDO("mysql:host=localhost;dbname=bookswapperph", "root", "");

        $name = $_POST['displayName'];
        $location = $_POST['location'];
        $contactNo = $_POST['contactNo'];
        $email = $_POST['email'];

        $data = array('name' => $name, 'location' => $location, 'contactNo' => $contactNo, 'email' => $email, 'id' => $_SESSION['id']);

        $STH = $DBH->prepare("UPDATE users SET displayName = :name, location = :location, contactNo = :contactNo, email = :email WHERE userID = :id");
        $STH->execute($data);

        $DBH = null;
        header("Location: ../tempProfile.php");
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }	
?>