<?php
	session_start();
	try{
		$DBH = new PDO("mysql:host=localhost;dbname=thebookswapperph","root","");

		$status = 2;
		$data = array('status' => $status, 'offer' => $_SESSION['offerID']);
		$STH = $DBH->prepare("UPDATE offers SET status = :status WHERE offerID = :offer");
		$STH->execute($data);
		
		$availability = 0;
		$data = array('availability' => $availability, 'library' => $_POST['libraryID']);
		$STH = $DBH->prepare("UPDATE library SET availability = :availability WHERE (libraryID = :library)");
		$STH->execute($data);
		
		
		$DBH = null;
		header('Location: ../tempProfileViewBookAcceptFrom.php');
	}
	catch(PDOException $e)
	{	
		echo $e -> getMessage();
	}
?>