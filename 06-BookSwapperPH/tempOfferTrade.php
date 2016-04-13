<?php
	session_start();
	include 'backend/printTable.php';
	include 'backend/getUser.php';
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
</head>

<body class="full">
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="index.php">BookSwapperPH</a>

                <!-- SearchBar and Submit Button -->
                <form class="navbar-form navbar-left" action="tempSearch.php" method="post" role="search">
                    <div class="form-group">
                        <input type="search" style="width:150px" name="search" class="form-control" placeholder="Search">
                        <button type="submit" value="Search" class="btn btn-default">Submit</button>
                    </div>
                </form>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            	<div>

	                <ul class="nav navbar-nav navbar-right">

	 					<li>
							
							<a href="javascript: submitViewUserForm()">View Users</a>
						</li>

						<?php
							if(isset($_SESSION['isLoggedIn']))
							{
								$user = getUser();
						?>
						
						<li>
							<a href="javascript: submitLibraryForm()">Library</a>
						</li>
						
						<?php
							
							if($_SESSION['isAdmin'] == 1)
								{
									?>
										<li><a href="tempAdmin.php">Admin Stuff</a></li>
									<?php
								}

						?>
						
						<li>
							<a href="tempProfile.php"><?php echo $_SESSION['name'];?></a>
						</li>
															
						<li>
							<a href="javascript: submitLogoutForm()">Log Out</a>
						</li>

						<form name="logoutForm" action="backend/logout.php" method="post">
							<input type="hidden" name="tempID" value="<?php echo $_SESSION['id']; ?>">
						</form>

						<form name="offerTradeForm" action="tempOfferTrade.php" method="post">							
							<input type="hidden" name="tempID" value="<?php echo $_SESSION['id']; ?>">
						</form>
							

						<form name="viewUserForm" action="tempViewUsers.php" method="post">
							<input type="hidden" name="tempID" value="<?php echo $_SESSION['id']; ?>">
						</form>

						<form name="libraryForm" action="tempLibrary.php" method="post">
							<input type="hidden" name="tempID" value="<?php echo $_SESSION['id']; ?>">
						</form>
						
						<?php
							}
							else
							{
						?>
						
						<li>
							<a href="tempSignup.html">Sign Up</a>
						</li>
						
						<li>
							<form name="loginForm" action="tempLogin.html" method="post"></form>
							<a href="javascript: submitLoginForm()">Log In</a>
						</li>
						
						<?php
							}
						?>

	                </ul>
	            </div>
	            <!-- /.navbar-collapse -->
	        </div>
	    </div>
        <!-- /.container-fluid -->
    </nav>

    <div id = "userbody" style = "margin: auto; padding: 1px; width: 85%">
    	<div style = "color: #595959; margin-bottom: 15px; margin-top:40px; background-color: #f2f2f2; padding: 10px; padding-bottom: 45px">
			
	    	<div class = "row">
	    		<div class = "col-md-12">
					<?php
						echo draw_calendar();
					?>


					<form action="backend/offerTrade.php" method="post">
						<h5> Book to Offer: 
						<input type="text" class = "form-control" name="bookToOffer">
						</h5>
						<h5> Message: 
						<input type="text" class = "form-control" name="message">
						</h5>
						<input class = "pull-right btn btn-success" type="submit" value="Offer">
					</form>

					<form action="index.php" method="post">
						<input class = "pull-left btn" type="submit" value="Back">
					</form>
				</div>
			</div>
		</div>
	</div>
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.fittext.js"></script>
    <script src="js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/creative.js"></script>

		<!-- Script for enabling links to submit form !-->
		<script type="text/javascript">
		function submitViewUserForm(){
			  document.viewUserForm.submit();
		}
		function submitOfferTradeForm(){
				document.offerTradeForm.submit();
		}
		function submitLibraryForm(){
			  document.libraryForm.submit();
		}
		function submitLogoutForm(){
			  document.logoutForm.submit();
		}
		function submitLoginForm(){
			  document.loginForm.submit();
		}

		</script>

</body>
</html>