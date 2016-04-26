<?php
	session_start();
	try{
		$DBH = new PDO("mysql:host=localhost;dbname=bookswapperph", "root", "");
		
		$data = array("offer" => $_SESSION['offerTradeID']);
		$STH = $DBH->prepare("DELETE FROM offers WHERE (offerTradeID = :offer)");
		$STH->execute($data);

		$data = array("offer" => $_SESSION['offerTradeID']);
		$STH = $DBH->prepare("DELETE FROM offertrade WHERE (offerTradeID = :offer)");
		$STH->execute($data);	
		
		$DBH = null;
		header('Location: ../tempViewOffers.php');
	}
	catch(PDOException $e)
	{
		echo $e -> getMessage();
	}

?>