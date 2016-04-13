<?php
    function getGenres()
    {
        $DBH = new PDO("mysql:host=localhost;dbname=bookswapperph", "root", "");
    
        $STH = $DBH->prepare("SELECT * FROM genres");

        $STH->execute();
        $genres = $STH->fetchAll(PDO::FETCH_OBJ);

        $DBH = null;

        return $genres;
    }
?>