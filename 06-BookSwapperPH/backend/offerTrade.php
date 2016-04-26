<?php
	session_start();
	try
	{
		$DBH = new PDO("mysql:host=localhost;dbname=bookswapperph","root", "");
		
		$status = 1;		

		$data = array('id1' => $_SESSION['tempID'], 'id2' => $_SESSION['id'], 'bookToOffer' => $_POST['bookToOffer'], 'message' => $_POST['message'], 'status' => $status, 'book' => $_SESSION['bookID']);
		$STH = $DBH->prepare("INSERT INTO offers (userTradingToID, userTradingFromID, offerName, message, status, bookID) VALUES (:id1, :id2, :bookToOffer, :message, :status, :book)");		
        $STH->execute($data);
		$row1 = $DBH->lastInsertId();

		
		$data = array('id1' => $_SESSION['id'], 'id2' => $_SESSION['tempID'], 'bookToOffer' => $_POST['bookToOffer'], 'message' => $_POST['message'], 'status' => $status, 'book' => $_SESSION['bookID']);		
		$STH = $DBH->prepare("INSERT INTO offertrade (userTradingFromID, userTradingToID, offerTradeName, tmessage, status, bookID) VALUES (:id1, :id2, :bookToOffer, :message, :status, :book)");
		$STH->execute($data);
		$row2 = $DBH->lastInsertId();
		
		$data = array('row1' => $row1, 'row2' => $row2);
		$STH = $DBH->prepare("UPDATE offertrade SET offerID = :row1 WHERE offerTradeID = :row2");
		$STH->execute($data);
		
		$data = array('row2' => $row2, 'row1' => $row1);
		$STH = $DBH->prepare("UPDATE offers SET offerTradeID = :row2 WHERE offerID = :row1");
		$STH->execute($data);
		
	
		$data = array("id" => $_SESSION['id']);
		$STH = $DBH->prepare("DELETE FROM trade WHERE userID = :id");
		$STH->execute($data);
		
		$DBH = null;
		header('Location: ../index.php');
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
?>