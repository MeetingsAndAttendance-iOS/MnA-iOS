<?php
/*
	Code from http://davidwalsh.name/php-calendar
*/

include 'getOffer.php';
?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is a wholesaler website.">
    <meta name="author" content="Dominic Truelen, Justin Balderas, Patricia Regarde, Patrick Dominguiano, Cyan Villarin">

    <title>WholesalerPH</title>

   <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/creative.css" type="text/css">
    <link href="css/shop-homepage.css" rel="stylesheet" type = "text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="css/styles.css" type="text/css">

    <link rel="stylesheet" href="css/creative.css" type="text/css">
</head>
</html>

<?php

function draw_calendar()
{
	/* draw table */
	$calendar = '<table cellpadding="0" cellspacing="0" class="table table-condensed">';

	/* table headings */
	$headings = array('No.','Product Name','Price','Quantity','Total', '');
	$calendar.= '<tr class="calendar-row warning"><td class="calendar-day-head"><h5><b>'.implode('</b></h5></td><td class="calendar-day-head"><h5><b>',$headings).'</td></b></h5></tr>';

	$cart = getOffer();
	$final = 0;
	$x = 1;
	foreach($cart as $temp)
	{
		$calendar .= "<tr class='calendar-row active'>";

		$calendar .= "<td class='calendar-day'>";
		$calendar .= "<h5> $x </h5>";
		$calendar .= "</td>";

		$calendar .= "<td class='calendar-day'>";
		$calendar .= "<h5> $temp->productName </h5>";
		$calendar .= "</td>";

		$calendar .= "<td class='calendar-day'>";
		$calendar .= "<h5> $temp->price </h5>";
		$calendar .= "</td>";

		$calendar .= "<td class='calendar-day'>";
		$calendar .= "<h5> $temp->quantity </h5>";
		$calendar .= "</td>";

		$total = $temp->price * $temp->quantity;
		$final += $total;

		$calendar .= "<td class='calendar-day'>";
		$calendar .= "<h5> $total </h5>";
		$calendar .= "</td>";

		$calendar .= "<td class='calendar-day'>";
		$calendar .= "<form action='backend/deleteCart.php' method='post'>";
		$calendar .= "<input type='hidden' name='id' value='$temp->productID'>";
		$calendar .= "<h5><input type='submit' class = 'btn' value='Delete'></h5>";
		$calendar .= "</form>";
		$calendar .= "</td>";

		$calendar .= "</tr>";

		$x ++;
	}

	$calendar .= "<tr class='calendar-row active'>";

	$calendar .= "<td class='calendar-day'>";
	$calendar .= "</td>";
	$calendar .= "<td class='calendar-day'>";
	$calendar .= "</td>";
	$calendar .= "<td class='calendar-day'>";
	$calendar .= "</td>";
	$calendar .= "<td class='calendar-day'>";
	$calendar .= "</td>";

	$calendar .= "<td class='calendar-day'>";
	$calendar .= "<h5>$final</h5>";
	$calendar .= "</td>";

	$calendar .= "<td class='calendar-day'>";
	$calendar .= "</td>";

	$calendar .= "</tr>";


	/* end the table */
	$calendar.= '</table>';
	
	/* all done, return result */
	return $calendar;
}
?>

