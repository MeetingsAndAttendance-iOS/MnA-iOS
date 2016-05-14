<?php
	session_start();
	try{
		$DBH = new PDO("mysql:host=localhost;dbname=thebookswapperph","root","");
		
		$status = 0;
		
		$data = array('status' => $status, 'offer' => $_SESSION['offerID']);
		$STH = $DBH->prepare("UPDATE offers SET status = :status WHERE (offerID = :offer)");
		$STH->execute($data);		
		
		$DBH = null;
		header('Location: ../tempViewOffers.php');
	}
	catch(PDOException $e)
	{	
		echo $e -> getMessage();
	}
?>