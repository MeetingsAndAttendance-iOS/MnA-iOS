<?php
	session_start();
	try
	{
		$DBH = new PDO("mysql:host=localhost;dbname=bookswapperph", "root", "");

		$name = $_POST['name'];
		$description = $_POST['description'];
		$want = $_POST['want'];

		$data = array('name' => $name, 'description' => $description, 'want' => $want);
		$STH = $DBH->prepare("INSERT INTO books (bookName, bookDescription, bookwant) VALUES (:name, :description, :want)");

		$STH->execute($data);

		$row = $DBH->lastInsertId();
		$data = array('row' => $row, 'id' => $_SESSION['id']);
		$STH = $DBH->prepare("INSERT INTO library (userID, bookID) VALUES (:id, :row)");

		$STH->execute($data);

		$DBH = null;
		header('Location: ../tempLibrary.php');
		
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
?>