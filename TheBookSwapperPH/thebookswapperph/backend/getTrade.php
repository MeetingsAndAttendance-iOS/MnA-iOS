<?php
    function getTrade()
    {
        $DBH = new PDO("mysql:host=localhost;dbname=thebookswapperph", "root", "");

        $data = array('id' => $_SESSION['libraryID']);
    
        $STH = $DBH->prepare("SELECT * FROM trade JOIN library using (libraryID) JOIN books using (bookID) WHERE libraryID = :id");

        $STH->execute($data);
        $trade = $STH->fetchAll(PDO::FETCH_OBJ);

        $DBH = null;

        return $trade;
    }
	
	  function getOtherTrade()
    {
        $DBH = new PDO("mysql:host=localhost;dbname=thebookswapperph", "root", "");

        $data = array('id' => $_SESSION['libraryID']);
    
        $STH = $DBH->prepare("SELECT * FROM trade JOIN library using (libraryID) JOIN books ON (books.bookID = library.bookWantID) WHERE libraryID = :id");

        $STH->execute($data);
        $othertrade = $STH->fetchAll(PDO::FETCH_OBJ);

        $DBH = null;

        return $othertrade;
    }
	
?>