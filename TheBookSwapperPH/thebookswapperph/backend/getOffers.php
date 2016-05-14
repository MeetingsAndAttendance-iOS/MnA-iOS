<?php
include 'getBook.php';
function populate_table()
{
	$table="";

	$users = get_offers();
	
	foreach ($users as $user) 
	{
		
		if($user->status == 1)
		{
			$table .= '<tr>';
			
			$table .= '<td>';	
			$table .= "<form action = 'tempViewOfferBookOffers.php' method = 'post'>
							<input type='hidden' name= 'offerID' value=$user->offerID>
							<input type='submit' class = 'btn btn-link' name='submit' value=$user->offerID>
							</form> ";
			$table .= "</td>";
			
			$table .= '<td>';	
			$table .= $user->bookName;
			$table .= '</td>';

			$table .= '<td>';	
			$table .= $user->message;
			$table .= '</td>';

			$table .= '<td>';	
			$table .= $user->userName;
			$table .= '</td>';

			$table .= '<td>';	
			$table .= "Pending Response";
			$table .= '</td>';
			
			$table .= '</td>';

			$table .= '</tr>';			


		}
		elseif($user->status == 2)
		{
			$table .= '<tr>';
			
			$table .= '<td>';	
			$table .= "<form action = 'tempProfileViewBookAcceptFrom.php' method = 'post'>
							<input type='hidden' name= 'userTradingFromID' value=$user->userTradingFromID>
							<input type='submit' class = 'btn btn-link' name='submit' value=$user->offerID>
							</form> ";
			$table .= "</td>";	

			$table .= '<td>';	
			$table .= $user->bookName;
			$table .= '</td>';

			$table .= '<td>';	
			$table .= $user->message;
			$table .= '</td>';

			$table .= '<td>';	
			$table .= $user->userName;
			$table .= '</td>';
			
			$table .= '<td>';	
			$table .= "View User's Profile";
			$table .= '</td>';
			
			$table .= '</td>';

			$table .= '</tr>';			
		}
		else{
		
		}
		
		
		
	}
		
	return $table;
}

function get_offers()
{
	try
	{
		$DBH = new PDO("mysql:host=localhost;dbname=thebookswapperph","root","");
		
		$status = 1;
		
		$data = array("id" => $_SESSION['id']);
		$STH = $DBH->prepare("SELECT * FROM offers JOIN users JOIN library using (libraryID) JOIN books ON (books.bookID = library.bookWantID) WHERE ((users.userID = offers.userTradingFromID) AND (offers.userTradingToID = :id))");
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
		$DBH = new PDO("mysql:host=localhost;dbname=thebookswapperph", "root", "");
		
		$data = array("id" => $_SESSION['id']);
		$STH = $DBH->prepare("SELECT * FROM offers JOIN users JOIN library using (libraryID) JOIN books ON (books.bookID = library.bookWantID) WHERE ((users.userID = offers.userTradingToID) AND (offers.userTradingFromID = :id))");
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

		if($user->status == 0)
		{
		
		}
		elseif($user->status == 1)
		{
			$table .= '<tr>';

			$table .= '<td>';	
			$table .= "<form action = 'tempViewOfferMyTransactions.php' method = 'post'>
							<input type='hidden' name= 'offerID' value=$user->offerID>
							<input type='submit' class = 'btn btn-link' name='submit' value=$user->offerID>
							</form> ";
			$table .= "</td>";

			$table .= '<td>';	
			$table .= $user->bookName;
			$table .= '</td>';

			$table .= '<td>';	
			$table .= $user->message;
			$table .= '</td>';
			
			$table .= '<td>';	
			$table .= $user->userName;
			$table .= '</td>';
			
			$table .= '<td>';	
			$table .= "Pending";
			$table .= '</td>';
			
			$table .= '</td>';

			$table .= '</tr>';

		}
		elseif($user->status == 2)
		{
			$table .= '<tr>';

			$table .= '<td>';	
			$table .= "<form action = 'tempProfileViewBookAcceptTo.php' method = 'post'>
							<input type='hidden' name= 'userTradingToID' value=$user->userTradingToID>
							<input type='submit' class = 'btn btn-link' name='submit' value=$user->offerID>
							</form> ";
			$table .= "</td>";

			$table .= '<td>';	
			$table .= $user->bookName;
			$table .= '</td>';

			$table .= '<td>';	
			$table .= $user->message;
			$table .= '</td>';
			
			$table .= '<td>';	
			$table .= $user->userName;
			$table .= '</td>';
			
			$table .= '<td>';	
			$table .= "View User's Profile";
			$table .= '</td>';
			
			$table .= '</td>';

			$table .= '</tr>';

		}
		elseif($user->status == 3)
		{
			$table .= '<tr>';

			$table .= '<td>';	
			$table .= "<form action = 'tempViewOfferMyTransactions.php' method = 'post'>
							<input type='hidden' name= 'offerID' value=$user->offerID>
							<input type='submit' class = 'btn btn-link' name='submit' value=$user->offerID>
							</form> ";
			$table .= "</td>";

			$table .= '<td>';	
			$table .= $user->bookName;
			$table .= '</td>';

			$table .= '<td>';	
			$table .= $user->message;
			$table .= '</td>';
			
			$table .= '<td>';	
			$table .= $user->userName;
			$table .= '</td>';
			
			$table .= '<td>';	
			$table .= "Declined";
			$table .= '</td>';
			
			$table .= '</td>';

			$table .= '</tr>';

		}
	}
	
	return $table;
}

function get_offerbooks(){
	try{
		$DBH = new PDO("mysql:host=localhost;dbname=thebookswapperph", "root", "");

		$status = 1;
		
		$data = array("id1" => $_SESSION['id'], "status" => $status, "offer" => $_SESSION['offerID']);
		$STH = $DBH->prepare("SELECT * FROM offers JOIN library using (libraryID) JOIN books using (bookID) WHERE ((userTradingToID = :id1) AND (status = :status) AND (offerID = :offer))");
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
		$DBH = new PDO("mysql:host=localhost;dbname=thebookswapperph", "root", "");
		
		$data = array("id1" => $_SESSION['id'], "offer" => $_SESSION['offerID']);
		$STH = $DBH->prepare("SELECT * FROM offers JOIN library using (libraryID) JOIN books using (bookID) WHERE ((userTradingFromID = :id1) AND (offerID = :offer))");
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