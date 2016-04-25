<?php
	session_start();
	try
    {
        $DBH = new PDO("mysql:host=localhost;dbname=bookswapperph", "root", "");

		$data = array("id" => $_SESSION['bookID']);
		$STH = $DBH->prepare("DELETE FROM trade WHERE bookID = :id");
		$STH->execute($data);

		$data = array("id" => $_SESSION['bookID']);
		$STH = $DBH->prepare("DELETE FROM offerbooks WHERE bookID = :id");
		$STH->execute($data);
		
        $DBH = null;
        header("Location: ../tempViewBook.php");
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }	
?>