<?php
/*
	Code from http://davidwalsh.name/php-calendar
*/

include 'getUsers.php';

function drawUsers()
{
	$table="";

	$users = getUsers($_SESSION['search']);

	foreach ($users as $user) 
	{
		$table .= '<tr>';

		$table .= '<td>';	
		$table .= "<form action='tempProfileView.php' method='post'>";
		$table .= "<input type='hidden' name='tempID' value='$user->userID'>";
		$table .= "<input type='submit' class='btn btn-large btn-primary' value='$user->displayName'>";
		$table .= "</form>";
		$table .= "</td>";

		$table .= '</td>';

		$table .= '</tr>';
	}
	
	return $table;
}
?>