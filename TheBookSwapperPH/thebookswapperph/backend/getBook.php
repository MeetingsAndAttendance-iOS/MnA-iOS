<?php
    function getBook()
    {
        $DBH = new PDO("mysql:host=localhost;dbname=thebookswapperph", "root", "");

        $data = array('id' => $_SESSION['libraryID']);
        $STH = $DBH->prepare("SELECT * FROM books JOIN library WHERE ((libraryID = :id) and (library.bookID = books.bookID))");

        $STH->execute($data);
        $books = $STH->fetchAll(PDO::FETCH_OBJ);

        $DBH = null;

        return $books[0];
    }
	
	function getOtherBook()
    {
        $DBH = new PDO("mysql:host=localhost;dbname=thebookswapperph", "root", "");

        $data = array('id' => $_SESSION['libraryID']);
		$STH = $DBH->prepare("SELECT * FROM books JOIN library WHERE ((libraryID = :id) and (library.bookWantID = books.bookID))");

		$STH->execute($data);
		$otherbooks = $STH->fetchAll(PDO::FETCH_OBJ);
		
		$DBH = null;
		
		return $otherbooks[0];

	}
?>