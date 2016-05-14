<?php
	session_start();
	try
    {
		$DBH = new PDO("mysql:host=localhost;dbname=thebookswapperph", "root", "");

		$book = $_POST['book'];
		$want = $_POST['want'];

		$data = array('book' => $book, 'want' => $want, 'id' => $_POST['libraryID']);

		$STH = $DBH->prepare("UPDATE library SET bookID = :book, bookWantID = :want WHERE (libraryID = :id)");
		
		$STH -> execute($data);
		
		$DBH = null;
		header("Location: ../tempViewBook.php");
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }	
?>