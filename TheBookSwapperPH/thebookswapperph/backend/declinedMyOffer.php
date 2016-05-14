<?php
	session_start();
	try{
		$DBH = new PDO("mysql:host=localhost;dbname=thebookswapperph","root","");
		
		$status = 0;
		
		$data = array('status' => $status, 'offer' => $_SESSION['offerID']);
		$STH = $DBH->prepare("DELETE FROM offers WHERE ((offerID = :offer) AND (status = :status))");
		$STH->execute($data);
		
		$data = array('status' => $status, 'offer' => $_SESSION['offerID']);
		$STH = $DBH->prepare("DELETE FROM offertrade WHERE ((offerID = :offer) AND (status = :status))");
		$STH->execute($data);
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
?>