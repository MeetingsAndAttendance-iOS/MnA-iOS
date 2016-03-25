<?php
    function getUser($id = NULL)
    {
        $DBH = new PDO("mysql:host=localhost;dbname=bookswapperph", "root", "");

        if($id)
        {
            $data = array('id' => $id);
            $STH = $DBH->prepare("SELECT * FROM users WHERE userID = :id");
        }
        else
        {
            $data = array('id' => $_SESSION['id']);
            $STH = $DBH->prepare("SELECT * FROM users WHERE userID = :id");
        }

        $STH->execute($data);
        $users = $STH->fetchAll(PDO::FETCH_OBJ);

        $DBH = null;

        return $users[0];
    }
?>