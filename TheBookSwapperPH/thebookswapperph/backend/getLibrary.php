<?php
    function getLibrary()
    {
        $DBH = new PDO("mysql:host=localhost;dbname=thebookswapperph", "root", "");

		$availability = 1;
		
        $data = array('id' => $_SESSION['tempID'], 'availability' => $availability);
    
        $STH = $DBH->prepare("SELECT * FROM library join books using (bookID) WHERE ((userID = :id) and (availability = :availability))");

        $STH->execute($data);
        $libs = $STH->fetchAll(PDO::FETCH_OBJ);

        $DBH = null;

        return $libs;
    }
	
    function getOtherLibrary()
    {
        $DBH = new PDO("mysql:host=localhost;dbname=thebookswapperph", "root", "");

		$availability = 1;
		
        $data = array('id' => $_SESSION['tempID'], 'availability' => $availability);
    
        $STH = $DBH->prepare("SELECT * FROM library join books WHERE ((userID = :id) and (availability = :availability) and (library.bookWantID = books.bookID))");

        $STH->execute($data);
        $otherlibs = $STH->fetchAll(PDO::FETCH_OBJ);

        $DBH = null;

        return $otherlibs;
    }
	
	function getMyLibrary()
    {
        $DBH = new PDO("mysql:host=localhost;dbname=thebookswapperph", "root", "");

		$availability = 1;
		
        $data = array('id' => $_SESSION['id'], 'availability' => $availability);
    
        $STH = $DBH->prepare("SELECT * FROM library join books WHERE ((userID = :id) and (availability = :availability) and (library.bookWantID = books.bookID))");

        $STH->execute($data);
        $otherlibs = $STH->fetchAll(PDO::FETCH_OBJ);

        $DBH = null;

        return $otherlibs;
    }	
?>