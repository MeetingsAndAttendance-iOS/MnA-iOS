<?php
    function getLibrary()
    {
        $DBH = new PDO("mysql:host=localhost;dbname=bookswapperph", "root", "");

        $data = array('id' => $_SESSION['tempID']);
    
        $STH = $DBH->prepare("SELECT * FROM library join products using (productID) WHERE userID = :id");

        $STH->execute($data);
        $users = $STH->fetchAll(PDO::FETCH_OBJ);

        $DBH = null;

        return $users;
    }
?>