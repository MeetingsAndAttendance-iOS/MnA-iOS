<?php
    function getBookNames()
    {
        $DBH = new PDO("mysql:host=localhost;dbname=thebookswapperph", "root", "");
    
        $STH = $DBH->prepare("SELECT * FROM books");

        $STH->execute();
        $bookNames = $STH->fetchAll(PDO::FETCH_OBJ);

        $DBH = null;

        return $bookNames;
    }
?>