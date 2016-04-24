<?php
	session_start();
	try
	{
		$DBH = new PDO("mysql:host=localhost;dbname=bookswapperph","root", "");
		
#<<<<<<<		
		$data = array('id1' => $_SESSION['tempID'], 'id2' => $_SESSION['id'], 'bookToOffer' => $_POST['bookToOffer'], 'message' => $_POST['message']);
		$STH = $DBH->prepare("INSERT INTO offers (userTradingToID, userTradingFromID, offerName, message) VALUES (:id1, :id2, :bookToOffer, :message)");		
        $STH->execute($data);
		$row = $DBH->lastInsertId();
#<<<<<<< HEAD
		
		$data = array('id1' => $_SESSION['id'], 'id2' => $_SESSION['tempID'], 'bookToOffer' => $_POST['bookToOffer'], 'message' => $_POST['message']);		
		$STH = $DBH->prepare("INSERT INTO offertrade (userTradingFromID, userTradingToID, offerTradeName, tmessage) VALUES (:id1, :id2, :bookToOffer, :message)");
		$STH->execute($data);
		
#>>>>>>> 430fe3c1e87fd309c54236167978d0f45118347c
		
		$data = array('row' => $row, 'id' => $_SESSION['id']);
		$STH = $DBH->prepare("UPDATE offerbooks SET offerID = :row WHERE userTradingFromID = :id");
		$STH->execute($data);
		
		#$data = array('id' => $_SESSION['id']);
		#$STH = $DBH->prepare("SELECT * FROM offertrade JOIN offers WHERE ((offertrade.userTradingFromID = :id) && (offers.userTradingFromID =:id))");
		#$STH->execute($data);
        #$offers = $STH->fetchAll(PDO::FETCH_OBJ);
	
		#$data = array('id' => $_SESSION['id'], 'offer_id' => $offers->offerID, 'offer_trade_id' => $offers->offerTradeID);
		#$STH = $DBH->prepare("UPDATE offerbooks SET offerTradeID = :offer_trade_id, offerID = :offer_id WHERE userID = :id");
		#$STH->execute($data);
	
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