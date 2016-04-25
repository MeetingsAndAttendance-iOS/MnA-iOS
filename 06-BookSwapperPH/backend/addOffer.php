<?php
	session_start();
	try
	{
		$status = 1;
		
		$DBH = new PDO("mysql:host=localhost;dbname=bookswapperph", "root", "");
		
		$data = array('id' => $_SESSION['id'], 'book' => $_SESSION['bookID']);
		$STH = $DBH->prepare("INSERT INTO trade (userID, bookID) VALUES (:id, :book)");
		$STH->execute($data);

		$data = array('id1' => $_SESSION['id'], 'book' => $_SESSION['bookID'], 'id2' => $_SESSION['tempID'], 'status' => $status);
		$STH = $DBH->prepare("INSERT INTO offerbooks (userTradingFromID, bookID, userTradingToID, status) VALUES (:id1, :book, :id2, :status)");
		$STH->execute($data);
		
		$DBH = null;
		header('Location: ../tempOfferTrade.php');
		
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
?>