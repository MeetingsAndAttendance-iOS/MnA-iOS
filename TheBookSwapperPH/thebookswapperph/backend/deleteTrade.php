<?php
	session_start();
	try
    {
        $DBH = new PDO("mysql:host=localhost;dbname=thebookswapperph", "root", "");

		$data = array("id" => $_SESSION['libraryID']);
		$STH = $DBH->prepare("DELETE FROM trade WHERE libraryID = :id");
		$STH->execute($data);
		
        $DBH = null;
        header("Location: ../tempViewBook.php");
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }	
?>