<?php
	function getProfile()
	{
		$DBH = new PDO("mysql:host=localhost;dbname=bookswapperph", "root", "");

		$data = ["id" => $_SESSION['id']];

	    $STH = $DBH->prepare("SELECT * FROM users WHERE userID = :id");
	    $STH->execute($data);

	    $event = $STH->fetchAll(PDO::FETCH_OBJ);

	    $DBH = null;
	    return $event[0];
	}
?>