<?php
	session_start();
	try{
		$DBH = new PDO("mysql:host=localhost;dbname=thebookswapperph", "root", "");
		
		$data = array("offer" => $_SESSION['offerID']);
		$STH = $DBH->prepare("DELETE FROM offers WHERE (offerID = :offer)");
		$STH->execute($data);	
		
		$DBH = null;
		header('Location: ../tempViewOffers.php');
	}
	catch(PDOException $e)
	{
		echo $e -> getMessage();
	}

?>