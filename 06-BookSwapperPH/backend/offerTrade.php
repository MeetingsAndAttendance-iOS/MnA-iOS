<?php
	session_start();
	try
	{
		$DBH = new PDO("mysql:host=localhost;dbname=bookswapperph","root", "");

		$data = array('id' => $_SESSION['id']);
		$STH = $DBH->prepare("SELECT * FROM offerbooks WHERE userID = :id");
		$STH->execute($data);
		$book = $STH->fetchAll(PDO::FETCH_OBJ);
		
#<<<<<<<		
		$data = array('id1' => $_SESSION['tempID'], 'id2' => $_SESSION['id'], 'idb' => $book->bookID, 'bookToOffer' => $_POST['bookToOffer'], 'message' => $_POST['message']);
		$STH = $DBH->prepare("INSERT INTO offers (userTradingToID, userTradingFromID, bookID, offerName, message) VALUES (:id1, :id2, :idb, :bookToOffer, :message)");		
        $STH->execute($data);
		
#<<<<<<< HEAD
		
		$data = array('id1' => $_SESSION['id'], 'id2' => $_SESSION['tempID'], 'idb' => $book->bookID, 'bookToOffer' => $_POST['bookToOffer'], 'message' => $_POST['message']);		
		$STH = $DBH->prepare("INSERT INTO offertrade (userTradingFromID, userTradingToID, bookID, offerTradeName, tmessage) VALUES (:id1, :id2, :idb, :bookToOffer, :message)");
		$STH->execute($data);
		#$row = $DBH->lastInsertId();

#>>>>>>> 430fe3c1e87fd309c54236167978d0f45118347c
		#$data = array('id' => $_SESSION['id']);
		#$STH = $DBH->prepare("SELECT * FROM trade WHERE userID = :id");
		#$STH->execute($data);
		#$book = $STH->fetchAll(PDO::FETCH_OBJ);
		
		#$STH = $DBH->prepare("INSERT INTO offerbooks (bookID) VALUES (:id)");
		
		#$data = array('id' => $books->bookID);
		#$STH->execute($data);

		
		$data = array('id' => $_SESSION['id']);
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