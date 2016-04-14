<?php
	try
    {
        $DBH = new PDO("mysql:host=localhost;dbname=bookswapperph", "root", "");

        $data = array('id' => $_POST['id']);

        $STH = $DBH->prepare("DELETE FROM trade WHERE bookID = :id");
        $STH->execute($data);

        $DBH = null;
        header("Location: ../tempOfferTrade.php");
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }	
?>