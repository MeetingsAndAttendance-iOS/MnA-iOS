<?php
	session_start();
	try
	{
		$DBH = new PDO("mysql:host=localhost;dbname=bookswapperph", "root", "");
		
		$data = array('id' => $_POST['id'], 'book' => $_POST['bookID']);
		$STH = $DBH->prepare("INSERT INTO trade (userID, bookID) VALUES (:id, :book)");

		$STH->execute($data);

		$DBH = null;
		header('Location: ../tempOfferTrade.php');
		
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
?>