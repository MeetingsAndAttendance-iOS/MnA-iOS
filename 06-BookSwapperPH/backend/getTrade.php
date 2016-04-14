<?php
    function getTrade()
    {
        $DBH = new PDO("mysql:host=localhost;dbname=bookswapperph", "root", "");

        $data = array('id' => $_SESSION['id']);
    
        $STH = $DBH->prepare("SELECT * FROM trade join books using (bookID) WHERE userID = :id");

        $STH->execute($data);
        $trade = $STH->fetchAll(PDO::FETCH_OBJ);

        $DBH = null;

        return $trade;
    }
?>