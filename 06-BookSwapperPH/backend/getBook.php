<?php
    function getBook()
    {
        $DBH = new PDO("mysql:host=localhost;dbname=bookswapperph", "root", "");

        $data = array('id' => $_SESSION['bookID']);
        $STH = $DBH->prepare("SELECT * FROM books WHERE bookID = :id");

        $STH->execute($data);
        $books = $STH->fetchAll(PDO::FETCH_OBJ);

        $DBH = null;

        return $books[0];
    }
?>