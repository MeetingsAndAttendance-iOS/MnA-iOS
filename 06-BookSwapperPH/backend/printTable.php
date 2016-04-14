<?php
/*
	Code from http://davidwalsh.name/php-calendar
*/
include 'getTrade.php';
?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is a book trading website.">
    <meta name="author" content="Justin Balderas, Ma. Angelica Dino, Patrick Joy Dominguiano">

    <title>BookSwapperPH</title>

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
	$headings = array('Book Name','Book Author','Condtion','Trading For');
	$calendar.= '<tr class="calendar-row warning"><td class="calendar-day-head"><h5><b>'.implode('</b></h5></td><td class="calendar-day-head"><h5><b>',$headings).'</td></b></h5></tr>';

	$trade = getTrade();
	#$x = 1;
	foreach($trade as $temp)
	{
		$calendar .= "<tr class='calendar-row active'>";

		$calendar .= "<td class='calendar-day'>";
		$calendar .= "<h5> $temp->bookName </h5>";
		$calendar .= "</td>";

		$calendar .= "<td class='calendar-day'>";
		$calendar .= "<h5> $temp->bookAuthor </h5>";
		$calendar .= "</td>";

		$calendar .= "<td class='calendar-day'>";
		$calendar .= "<h5> $temp->bookCondition</h5>";
		$calendar .= "</td>";

		$calendar .= "<td class='calendar-day'>";
		$calendar .= "<h5> $temp->bookWant</h5>";
		$calendar .= "</td>";

		#$calendar .= "<td class='calendar-day'>";
		#$calendar .= "<form action='backend/deleteCart.php' method='post'>";
		#$calendar .= "<input type='hidden' name='id' value='$temp->bookID'>";
		#$calendar .= "<h5><input type='submit' class = 'btn' value='Delete'></h5>";
		#$calendar .= "</form>";
		#$calendar .= "</td>";

		$calendar .= "</tr>";

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
	$calendar .= "</td>";

	$calendar .= "</tr>";


	/* end the table */
	$calendar.= '</table>';
	
	/* all done, return result */
	return $calendar;
}
?>

