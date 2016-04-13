<?php
	session_start();
	try
    {
        $DBH = new PDO("mysql:host=localhost;dbname=bookswapperph", "root", "");

        $data = array('id' => $_SESSION['bookID']);

        $STH = $DBH->prepare("DELETE FROM books WHERE bookID = :id");
        $STH->execute($data);

        $DBH = null;
        header("Location: ../tempLibrary.php");
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }	
?>