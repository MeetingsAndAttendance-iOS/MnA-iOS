<?php
	session_start();
	try
    {
        $DBH = new PDO("mysql:host=localhost;dbname=bookswapperph", "root", "");

        $name = $_POST['name'];
		$want = $_POST['want'];
		$author = $_POST['author'];
		$type = $_POST['type'];
		$genre = $_POST['genre'];
		$condition = $_POST['condition'];
		$comment = $_POST['comment'];
		
        $data = array('name' => $name, 'want' => $want, 'author' => $author, 'type' => $type, 'genre' => $genre, 'condition' => $condition, 'comment' => $comment, 'id' => $_SESSION['bookID']);

        $STH = $DBH->prepare("UPDATE books SET bookName = :name, bookWant = :want, bookAuthor = :author, type = :type, genre =:genre, bookCondition = :condition, addedComments = :comment WHERE bookID = :id");
        $STH->execute($data);

        $DBH = null;
        header("Location: ../tempViewBook.php");
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }	
?>