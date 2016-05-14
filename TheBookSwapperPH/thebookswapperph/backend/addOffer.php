<?php
	session_start();
	try
	{
		$status = 1;
		
		$DBH = new PDO("mysql:host=localhost;dbname=thebookswapperph", "root", "");
		
		$data = array('id' => $_SESSION['id'], 'library' => $_SESSION['libraryID']);
		$STH = $DBH->prepare("INSERT INTO trade (userID, libraryID) VALUES (:id, :library)");
		$STH->execute($data);
		
		$DBH = null;
		header('Location: ../tempOfferTrade.php');
		
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
?>