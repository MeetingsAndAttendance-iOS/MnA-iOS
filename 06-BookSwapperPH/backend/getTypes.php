<?php
    function getTypes()
    {
        $DBH = new PDO("mysql:host=localhost;dbname=bookswapperph", "root", "");
    
        $STH = $DBH->prepare("SELECT * FROM type");

        $STH->execute();
        $types = $STH->fetchAll(PDO::FETCH_OBJ);

        $DBH = null;

        return $types;
    }
?>