<?php
	session_start();
	include 'backend/getUsers.php';
	include 'backend/getUser.php';
	if(isset($_SESSION['tempID']))
    {
        unset($_SESSION['tempID']);
    }
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
    <style>
		#popup {
				width:100%;
				height:100%;
				opacity:.95;
				top:0;
				left:0;
				display:none;
				position:fixed;
				background-color:#313131;
				-webkit-animation: fadein 0.5s; /* Safari, Chrome and Opera > 12.1 */
				 -moz-animation: fadein 0.5s; /* Firefox < 16 */
					-ms-animation: fadein 0.5s; /* Internet Explorer */
					 -o-animation: fadein 0.5s; /* Opera < 12.1 */
							animation: fadein 0.5s;
		}

		#popup1 {
				width:100%;
				height:100%;
				opacity:.95;
				top:0;
				left:0;
				display:none;
				position:fixed;
				background-color:#313131;
				-webkit-animation: fadein 0.5s; /* Safari, Chrome and Opera > 12.1 */
				 -moz-animation: fadein 0.5s; /* Firefox < 16 */
					-ms-animation: fadein 0.5s; /* Internet Explorer */
					 -o-animation: fadein 0.5s; /* Opera < 12.1 */
							animation: fadein 0.5s;
		}

		@keyframes fadein {
				from { opacity: 0; }
				to   { opacity: .95; }
		}

		/* Firefox < 16 */
		@-moz-keyframes fadein {
				from { opacity: 0; }
				to   { opacity: .95; }
		}

		/* Safari, Chrome and Opera > 12.1 */
		@-webkit-keyframes fadein {
				from { opacity: 0; }
				to   { opacity: .95; }
		}

		/* Internet Explorer */
		@-ms-keyframes fadein {
				from { opacity: 0; }
				to   { opacity: .95; }
		}

		/* Opera < 12.1 */
		@-o-keyframes fadein {
				from { opacity: 0; }
				to   { opacity: .95; }
		}


        #popupForm {
            background-color:#fff;
            position:relative;
            text-align: center;
            top: 15%;
            margin:0 auto;
            padding-bottom: 50px;
        }
        #exit {
             line-height: 12px;
             width: 18px;
             font-size: 10pt;
             margin-top: 1px;
             margin-right: 2px;
             position:absolute;
             top:0;
             right:0;
         }
    </style>
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
                        <button type="submit" value="Search" class="btn btn-default">Search</button>
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

						<li><a onclick="div_show1()">Sign Up</a></li>
						<li><a onclick="div_show()">Log In</a></li>

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

	<div id = "userbody" style = "margin:auto; padding: 1px; width: 30%">
		<div style = "color: #595959; margin-top:40px; background-color: #f2f2f2; padding: 10px; padding-bottom: 45px">

			<div class = "row">
				<div class = "col-md-12">
					<div class = "panel panel-warning">
						<div class = "panel-heading">
							<h2>BookSwapperPH Users</h2>
						</div>
						<div class = "panel-body">

							<?php
								$users = getUsers();
								foreach($users as $user)
								{
									?>

									<form action="tempProfileView.php" method="post">

										<input type="hidden" class = "no-border-btn btn-block" name="tempID" value="<?php echo $user->userID; ?>">
										<input type="submit" class = "no-border-btn btn-block" name="submit" value="<?php echo $user->displayName; ?>">

									</form>
									<?php
								}
							?>
						</div>
					</div>
				</div>
			</div>

			<div style = "float: left; text-align: left; width: 50%">
				<form action="index.php" method="post">
					<input type="submit" class = "btn btn-warning" value="Back">
				</form>
			</div>

		</div>
	</div>

	<div class="container">
        <div id="popup">
            <div class="row" id="popupForm">
                <button id="exit" class="btn btn-primary" style="padding-right:20px;" onclick="div_hide()">X</button>
                <div class="col-md-6 col-md-offset-3">
                    <h1>Log In</h1>
                    <form action="backend/login.php" method="post">
                    <input type="text" name="username" class="form-control" style="margin: 5px" placeholder="Username">
                    <input type="password" name="password" class="form-control" style="margin: 5px" placeholder="Password">

                    <div class="row">
                        <div class="col-md-3">
                            <a class="btn btn-large btn-primary" href="index.php">Back</a>
                        </div>

                        <div class="col-md-3 col-md-offset-6">
                          <button class="btn btn-large btn-primary" type="submit">Log in</button>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>

    <div class="container">
        <div id="popup1">
            <div class="row" id="popupForm">
                <button id="exit" class="btn btn-primary" style="padding-right:20px;" onclick="div_hide1()">X</button>
                <div class="col-md-6 col-md-offset-3">
                    <h1>Sign Up</h1>
                    <form action="backend/signup.php" method="post">

                    <input type="text" name="username" class="form-control" style="margin: 5px" placeholder="Username" required >
                    <input type="text" name="email" class="form-control" style="margin: 5px" placeholder="Email Address" required >
					<input type="password" name="password1" class="form-control" style="margin: 5px" placeholder="Password" required >
                    <input type="password" name="password2" class="form-control" style="margin: 5px" placeholder="Confirm Password" required >
					<input type="text" name="location" class="form-control" style="margin: 5px" placeholder="Location/Address" required >
					<input type="number" size="11" name="contactno" class="form-control" style="margin: 5px" placeholder="Contect Number" required >

                    <div class="row">
                        <div class="col-md-3">
                            <a class="btn btn-large btn-primary" href="index.php">Back</a>
                        </div>

                        <div class="col-md-3 col-md-offset-6">
                          <button class="btn btn-large btn-primary" type="submit">Sign Up</button>
                        </div>
                    </div>
                </div>
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

	<script type="text/javascript">
    function div_show()
    {
        document.getElementById('popup').style.display = "block";
        div_hide1();
    }

    function div_hide()
    {
        document.getElementById('popup').style.display = "none";
    }

    function div_show1()
    {
        document.getElementById('popup1').style.display = "block";
        div_hide();
    }

    function div_hide1()
    {
        document.getElementById('popup1').style.display = "none";
    }
    </script>

</body>
</html>
