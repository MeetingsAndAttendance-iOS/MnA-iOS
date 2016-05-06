<?php
	session_start();
	try{
		$DBH = new PDO("mysql:host=localhost;dbname=bookswapperph","root","");

		$status = 2;

		$data = array('status' => $status, 'offer' => $_SESSION['offerID']);
		$STH = $DBH->prepare("UPDATE offers SET status = :status WHERE offerID = :offer");
		$STH->execute($data);

		$data = array('status' => $status, 'offer' => $_SESSION['offerTradID']);
		$STH = $DBH->prepare("UPDATE offertrade SET status = :status WHERE offerTradeID = :offer");
		$STH->execute($data);
		
		$DBH = null;
		header('Location: ../tempProfileViewBookAccept.php');
	}
	catch(PDOException $e)
	{	
		echo $e -> getMessage();
	}
?>