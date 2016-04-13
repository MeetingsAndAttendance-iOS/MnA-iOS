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
		$table .= $user->orderDate;
		$table .= '</td>';

		$table .= '<td>';	
		$table .= $user->deliveryDate;
		$table .= '</td>';

		$table .= '<td>';	
		$table .= $user->address;
		$table .= '</td>';

		$table .= '<td>';	
		$table .= $user->name;
		$table .= '</td>';

		$table .= '</td>';

		$table .= '</tr>';
	}
	
	return $table;
}

function get_orders()
{
	try
    {
        $DBH = new PDO("mysql:host=localhost;dbname=bookswapperph", "root", "");

        $data = array("id" => $_SESSION['id']);
        $STH = $DBH->prepare("SELECT * FROM offers JOIN autoorder on (orders.autoOrder = autoorder.autoOrderID) WHERE userID = :id");
        $STH->execute($data);
        $users = $STH->fetchAll(PDO::FETCH_OBJ);

        $DBH = null;
        return $users;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
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