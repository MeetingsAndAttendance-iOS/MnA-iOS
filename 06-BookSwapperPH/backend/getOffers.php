<?php

function populate_table()
{
	$table="";

	$users = get_offers();
	
	foreach ($users as $user) 
	{
		$table .= '<tr>';

		$table .= '<td>';	
		$table .= "<form action = 'tempViewOffer.php' method = 'post'>
						<input type='hidden' name= 'offerID' value=$user->offerID>
						<input type='submit' class = 'btn btn-link' name='submit' value=$user->offerID>
						</form> ";
		$table .= "</td>";

		$table .= '<td>';	
		$table .= $user->offerName;
		$table .= '</td>';

		$table .= '<td>';	
		$table .= $user->tmessage;
		$table .= '</td>';

		$table .= '</td>';

		$table .= '</tr>';
	}
	
	return $table;
}

function get_offers()
{
	try
	{
		$DBH = new PDO("mysql:host=localhost;dbname=bookswapperph","root","");
		
		$data = array("id" => $_SESSION['id']);
		$STH = $DBH->prepare("SELECT * FROM offers WHERE userID = :id");
		$STH->execute($data);
		$users = $STH->fetchALL(PDO::FETCH_OBJ);
		
		$DBH = null;
		return $users;
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}

}


function get_other_offers(){
	try
	{
		$DBH = new PDO("mysql:host=localhost;dbname=bookswapperph", "root", "");
		
		$data = array("id" => $_SESSION['id']);
		$STH = $DBH->prepare("SELECT * FROM offertrade WHERE userID = :id");
		$STH->execute($data);
		$users = $STH->fetchALL(PDO::FETCH_OBJ);
		
		$DBH = null;
		return $users;
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
}

function other_populate_table()
{
	$table="";

	$users = get_other_offers();
	
	foreach ($users as $user) 
	{
		$table .= '<tr>';

		$table .= '<td>';	
		$table .= "<form action = 'tempViewOffer.php' method = 'post'>
						<input type='hidden' name= 'offerID' value=$user->offerID>
						<input type='submit' class = 'btn btn-link' name='submit' value=$user->offerID>
						</form> ";
		$table .= "</td>";

		$table .= '<td>';	
		$table .= $user->offerName;
		$table .= '</td>';

		$table .= '<td>';	
		$table .= $user->message;
		$table .= '</td>';

		$table .= '</td>';

		$table .= '</tr>';
	}
	
	return $table;
}

function get_offerbooks(){
	try{
		$DBH = new PDO("mysql:host=localhost;dbname=bookswapperph", "root", "");

		$data = array("id" => $_POST['offerID']);
		$STH = $DBH->prepare("SELECT * FROM offerbooks JOIN books on (offerbooks.bookID = books.bookID) WHERE offerID = :id");
		$STH -> execute($data);
		$offers = $STH->fetchAll(PDO::FETCH_OBJ);

		$DBH = null;
		return $offers;
	}

	catch(PDOException $e){
		echo $e->getMessage();
	}
}

?>