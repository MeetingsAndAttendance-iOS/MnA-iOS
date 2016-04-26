<?php
    function getLibrary()
    {
        $DBH = new PDO("mysql:host=localhost;dbname=bookswapperph", "root", "");

		$availability = 1;
		
        $data = array('id' => $_SESSION['tempID'], 'availability' => $availability);
    
        $STH = $DBH->prepare("SELECT * FROM library join books using (bookID) WHERE ((userID = :id) and (availability = :availability))");

        $STH->execute($data);
        $users = $STH->fetchAll(PDO::FETCH_OBJ);

        $DBH = null;

        return $users;
    }
?>