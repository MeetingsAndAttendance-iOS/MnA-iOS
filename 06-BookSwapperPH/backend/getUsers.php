<?php
    function getUsers($search = NULL)
    {
        $DBH = new PDO("mysql:host=localhost;dbname=bookswapperph", "root", "");

        if($search == NULL)
        {
        	$STH = $DBH->prepare("SELECT * FROM users WHERE isAdmin = 0");
        	$STH->execute();
        }
        else
        {
        	$data = array('search' => $search);
        	$STH = $DBH->prepare("SELECT * FROM users WHERE isAdmin = 0 AND (displayName = :search or location = :search or contactNo = :search or email = :search)");
        	$STH->execute($data);
        }
    
        
        $users = $STH->fetchAll(PDO::FETCH_OBJ);

        $DBH = null;

        return $users;
    }
?>