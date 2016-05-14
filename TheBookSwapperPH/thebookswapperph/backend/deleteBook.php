<?php
	session_start();
	try
    {
        $DBH = new PDO("mysql:host=localhost;dbname=thebookswapperph", "root", "");

        $data = array('id' => $_POST['libraryID']);

        $STH = $DBH->prepare("DELETE FROM library WHERE libraryID = :id");
        $STH->execute($data);

        $DBH = null;
        header("Location: ../tempLibrary.php");
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }	
?>