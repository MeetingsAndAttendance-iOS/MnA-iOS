<?php
    function getBooks($search)
    {
        $DBH = new PDO("mysql:host=localhost;dbname=thebookswapperph", "root", "");

        $data = array('search' => $search);
        $STH = $DBH->prepare("SELECT * FROM books JOIN library using (bookID) JOIN users using (userID) WHERE bookName = :search or bookAuthor = :search or bookWant = :search");

        $STH->execute($data);
        $books = $STH->fetchAll(PDO::FETCH_OBJ);

        $DBH = null;

		return $books;
    }
?>