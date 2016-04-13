<?php
/*
	Code from http://davidwalsh.name/php-calendar
*/
include 'getBooks.php';

function drawBooks()
{
	$table="";

	$books = getBooks($_SESSION['search']);

	foreach ($books as $temp) 
	{
		$table .= '<tr>';

		$table .= '<td>';	
		$table .= "<form action='tempViewBook.php' method='post'>";
		$table .= "<input type='hidden' name='tempID' value='$temp->bookID'>";
		$table .= "<input type='submit' class='btn btn-large btn-primary' value='$temp->bookName'>";
		$table .= "</form>";
		$table .= "</td>";

		$table .= '<td>';	
		$table .= $temp->bookAuthor;
		$table .= '</td>';	
		
		$table .= '<td>';	
		$table .= $temp->bookWant;
		$table .= '</td>';

		$table .= '<td>';	
		$table .= "<form action='tempProfileView.php' method='post'>";
		$table .= "<input type='hidden' name='tempID' value='$temp->userID'>";
		$table .= "<input type='submit' class='btn btn-large btn-primary' value='$temp->displayName'>";
		$table .= "</form>";
		$table .= "</td>";

		$table .= '</tr>';
	}
	
	return $table;

	/* draw table */
	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

	/* table headings */
	$headings = array('Book Name', 'Book Author', 'Book Condition', ' Added Comments',  'Trading For', 'Trader');
	$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

	$books = getbooks($_SESSION['search']);
	foreach($books as $temp)
	{
		$calendar .= "<tr class='calendar-row'>";

		$calendar .= "<td class='calendar-day'>";
		$calendar .= "<form action='tempProfileView.php' method='post'>";
		$calendar .= "<input type='hidden' name='tempID' value='$temp->bookID'>";
		$calendar .= "<input type='submit' name='submit' value='$temp->bookName'>";
		$calendar .= "</form>";
		$calendar .= "</td>";

		$calendar .= "<td class='calendar-day'>";
		$calendar .= $temp->bookAuthor;
		$calendar .= "</td>";
		
		$calendar .= "<td class='calendar-day'>";
		$calendar .= $temp->bookWant;
		$calendar .= "</td>";

		$calendar .= "<td class='calendar-day'>";
		$calendar .= "<form action='tempProfileView.php' method='post'>";
		$calendar .= "<input type='hidden' name='tempID' value='$temp->userID'>";
		$calendar .= "<input type='submit' name='submit' value='$temp->displayName'>";
		$calendar .= "</form>";
		$calendar .= "</td>";

		$calendar .= "</tr>";
	}

	/* end the table */
	$calendar.= '</table>';
	
	/* all done, return result */
	return $calendar;
}
?>