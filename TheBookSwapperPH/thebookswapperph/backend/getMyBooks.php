<?php
    function getMyBooks()
    {
        $DBH = new PDO("mysql:host=localhost;dbname=thebookswapperph", "root", "");
    
		$availability = 1;
		
		$data = array('id1' => $_SESSION['tempID'], 'id2' => $_SESSION['id'], 'availability' => $availability);
        $STH = $DBH->prepare("SELECT * FROM books JOIN library WHERE (books.bookID = library.bookID)");

        $STH->execute();
        $myBooks = $STH->fetchAll(PDO::FETCH_OBJ);

        $DBH = null;

        return $myBooks;
    }
?>