<?php
/*
	Code from http://davidwalsh.name/php-calendar
*/

function draw_calendar()
{
	/* draw table */
	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

	/* table headings */
	$headings = array('OrderID','UserName','OrderDate','DeliveryDate','Address', 'Repeat', '');
	$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

	$offer = getOffer();
	foreach($offer as $temp)
	{
		$calendar .= "<tr class='calendar-row'>";

		$calendar .= "<td class='calendar-day'>";
		$calendar .= $temp->offerID;
		$calendar .= "</td>";

		$calendar .= "<td class='calendar-day'>";
		$calendar .= $temp->displayName;
		$calendar .= "</td>";

		$calendar .= "<td class='calendar-day'>";
		$calendar .= $temp->orderDate;
		$calendar .= "</td>";

		$calendar .= "<td class='calendar-day'>";
		$calendar .= $temp->name;
		$calendar .= "</td>";

		$calendar .= "</tr>";
	}

	/* end the table */
	$calendar.= '</table>';
	
	/* all done, return result */
	return $calendar;
}


?>