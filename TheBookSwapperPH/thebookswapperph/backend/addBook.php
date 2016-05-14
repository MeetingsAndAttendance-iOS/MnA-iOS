<?php
	session_start();
	try
	{
		$DBH = new PDO("mysql:host=localhost;dbname=thebookswapperph", "root", "");
		
		$book = $_POST['book'];
		$want = $_POST['want'];
		$availability = 1;
		
		if(($book ==1) && ($want)){
			
		}else{
			$data = array('id' => $_SESSION['id'], 'availability' => $availability, 'book' => $book, 'want' => $want);
			
			$STH = $DBH->prepare("INSERT INTO library (userID, availability, bookID, bookWantID) VALUES (:id, :availability, :book, :want)");

			$STH->execute($data);
		}
		$DBH = null;
		header('Location: ../tempLibrary.php');
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
?>