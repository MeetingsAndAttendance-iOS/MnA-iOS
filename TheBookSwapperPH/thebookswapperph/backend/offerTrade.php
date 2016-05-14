<?php
	session_start();
	try
	{
		$DBH = new PDO("mysql:host=localhost;dbname=thebookswapperph","root", "");
		
		$status = 1;		

		$data = array('id1' => $_SESSION['tempID'], 'id2' => $_SESSION['id'], 'message' => $_POST['message'], 'status' => $status, 'library' => $_SESSION['libraryID']);
		$STH = $DBH->prepare("INSERT INTO offers (userTradingToID, userTradingFromID, message, status, libraryID) VALUES (:id1, :id2, :message, :status, :library)");		
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