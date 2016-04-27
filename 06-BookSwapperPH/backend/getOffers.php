<?php
include 'getBook.php';
function populate_table()
{
	$table="";

	$users = get_offers();
	
	foreach ($users as $user) 
	{
		
		$table .= '<tr>';

		$table .= '<td>';	
		$table .= "<form action = 'tempViewOfferBookOffers.php' method = 'post'>
						<input type='hidden' name= 'offerID' value=$user->offerID>
						<input type='hidden' name= 'offer_userID' value=$user->userTradingFromID>
						<input type='submit' class = 'btn btn-link' name='submit' value=$user->offerID>
						</form> ";
		$table .= "</td>";

		$table .= '<td>';	
		$table .= $user->offerName;
		$table .= '</td>';

		$table .= '<td>';	
		$table .= $user->message;
		$table .= '</td>';
		
		$table .= '<td>';	
		$table .= $user->userName;
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
		
		$status = 1;
		
		$data = array("id" => $_SESSION['id']);
		$STH = $DBH->prepare("SELECT * FROM offers JOIN users WHERE ((users.userID = offers.userTradingFromID) AND (offers.userTradingToID = :id))");
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
		$STH = $DBH->prepare("SELECT * FROM offertrade JOIN users WHERE ((users.userID = offertrade.userTradingToID) AND (offertrade.userTradingFromID = :id))");
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
		$table .= "<form action = 'tempViewOfferMyTransactions.php' method = 'post'>
						<input type='hidden' name= 'offerTradeID' value=$user->offerTradeID>
						<input type='submit' class = 'btn btn-link' name='submit' value=$user->offerTradeID>
						</form> ";
		$table .= "</td>";

		$table .= '<td>';	
		$table .= $user->offerTradeName;
		$table .= '</td>';

		$table .= '<td>';	
		$table .= $user->tmessage;
		$table .= '</td>';
		
		$table .= '<td>';	
		$table .= $user->userName;
		$table .= '</td>';
		

		$table .= '</td>';

		$table .= '</tr>';
	}
	
	return $table;
}

function get_offerbooks(){
	try{
		$DBH = new PDO("mysql:host=localhost;dbname=bookswapperph", "root", "");

		$status = 1;
		
		$data = array("id1" => $_SESSION['id'], "status" => $status, "offer" => $_SESSION['offerID']);
		$STH = $DBH->prepare("SELECT * FROM offers JOIN books ON (offers.bookID = books.bookID) WHERE ((userTradingToID = :id1) AND (status = :status) AND (offerID = :offer))");
		$STH -> execute($data);
		$offers = $STH->fetchAll(PDO::FETCH_OBJ);
		$DBH = null;
		return $offers;
	}

	catch(PDOException $e){
		echo $e->getMessage();
	}
}

function get_my_offerbooks(){
	try{
		$DBH = new PDO("mysql:host=localhost;dbname=bookswapperph", "root", "");
		
		$data = array("id1" => $_SESSION['id'], "offer" => $_SESSION['offerTradeID']);
		$STH = $DBH->prepare("SELECT * FROM offertrade JOIN books ON (offertrade.bookID = books.bookID) WHERE ((userTradingFromID = :id1) AND (offerTradeID = :offer))");
		$STH -> execute($data);
		$myOffers = $STH->fetchALL(PDO::FETCH_OBJ);

		$DBH = null;
		return $myOffers;
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
}

?>