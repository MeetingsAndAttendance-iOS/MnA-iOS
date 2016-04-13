<?php
    function getOffer()
    {
        $DBH = new PDO("mysql:host=localhost;dbname=bookswapperph", "root", "");

        $data = array('id' => $_SESSION['id']);
    
        $STH = $DBH->prepare("SELECT * FROM offers join books using (bookID) WHERE userID = :id");

        $STH->execute($data);
        $offer = $STH->fetchAll(PDO::FETCH_OBJ);

        $DBH = null;

        return $offer;
    }
?>