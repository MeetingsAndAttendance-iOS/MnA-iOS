<?php
	session_start();
	try
	{
		$DBH = new PDO("mysql:host=localhost;dbname=bookswapperph","root", "");
		
		$data = array('id' => $_SESSION['id'], 'bookToOffer' => $_POST['bookToOffer'], 'message' => $_POST['message']);
		
<<<<<<< HEAD
		$STH = $DBH->prepare("INSERT INTO offers (userID, offerName, message) VALUES (:id, :bookToOffer, :message)");
=======

		$STH = $DBH->prepare("INSERT INTO offers (userID, offerName, message) VALUES (:id, :bookToOffer, :message)");

>>>>>>> 430fe3c1e87fd309c54236167978d0f45118347c
        $STH->execute($data);

        $row = $DBH->lastInsertId();
<<<<<<< HEAD
		
		$data = array('id' => $_SESSION['tempID'], 'bookToOffer' => $_POST['bookToOffer'], 'message' => $_POST['message']);
		
		$STH = $DBH->prepare("INSERT INTO offertrade (userID, offerTradeName, tmessage) VALUES (:id, :bookToOffer, :message)");
        $STH->execute($data);
		
		
=======

        //to accepter side
        $data = array('id' => $_SESSION['tempID'], 'bookToOffer' => $_POST['bookToOffer'], 'message' => $_POST['message']);

		$STH = $DBH->prepare("INSERT INTO offers (userID, offerName, message) VALUES (:id, :bookToOffer, :message)");

        $STH->execute($data);

        //
        
>>>>>>> 430fe3c1e87fd309c54236167978d0f45118347c
		$data = array('id' => $SESSION['id']);
		
		$STH = $DBH->prepare("SELECT * FROM trade WHERE userID = :id");
		$STH->execute($data);
		
		$books = $STH->fetchAll(PDO::FETCH_OBJ);
		
		$STH = $DBH->prepare("INSERT INTO offerbooks (offerID, bookID) VALUES (:row, :id)");
		
		foreach($books as $book)
		{
			$data = array('row' => $row, 'id' => $book->bookID);
			$STH->execute($data);
		
		}
		
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