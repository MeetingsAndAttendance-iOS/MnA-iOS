<?php
	session_start();
	try
	{
		$DBH = new PDO("mysql:host=localhost;dbname=bookswapperph", "root", "");

		$name = $_POST['name'];
		$want = $_POST['want'];
		$author = $_POST['author'];
		$type = $_POST['type'];
		$genre = $_POST['genre']
		$condition = $_POST['condition'];
		$comment = $_POST['comment'];
		
		$data = array('name' => $name, 'want' => $want, 'author' => $author, 'type' => $type, 'genre' => $genre, 'condition' => $condition, 'comment' => $comment);
		$STH = $DBH->prepare("INSERT INTO books (bookName, bookWant, bookAuthor, type, genre, bookCondition, addedComments) VALUES (:name, :want, :author, :type, :genre, :condition, :comment )");

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