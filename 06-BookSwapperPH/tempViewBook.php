<?php
	session_start();
	include 'backend/getUser.php';
	include 'backend/getBook.php';

	if(isset($_POST['bookID']))
	{
		$_SESSION['bookID'] = $_POST['bookID'];
	}
?>

<html lang="en">
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
						<button type="submit" value="Search" class="btn btn-default">Submit</button>
					</div>
				</form>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
					<li><a href="tempViewUsers.php">View Users</a></li>

					<?php
						if(isset($_SESSION['isLoggedIn']))
						{
							$user = getUser();
							?>
							<li><a href="javascript: submitLibraryForm()">Library</a></li>
							<?php
								if($_SESSION['isAdmin'] == 1)
								{
									?>
										<li><a href="tempAdmin.php">Admin Stuff</a></li>
									<?php
								}
							?>
							<li><a href="tempProfile.php"><?php echo $_SESSION['name']; ?></a></li>
							<li><a href="backend/logout.php">Log Out</a></li>

							<!-- Is it okay if I put this here !-->
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
        <!-- /.container-fluid -->
    </nav>

	<?php
		$book = getBook();
	?>
		<div class="container text-center">
		<div class="col-md-6 col-md-offset-3">
			<div class="boxview">
			    <h1><?php echo $book->bookName; ?></h1>

	            <div class="panel panel-primary">
	              <div class="panel-heading">
	                <h3 class="panel-title">Book Name</h3>
	              </div>

	              <div class="panel-body">
	                <?php echo $book->bookName; ?>
	              </div>
	            </div>

	            <div class="panel panel-primary">
	              <div class="panel-heading">
	                <h3 class="panel-title">Author</h3>
	              </div>

	              <div class="panel-body">
	                <?php echo $book->bookAuthor; ?>
	              </div>
	            </div>

				<div class="panel panel-primary">
	              <div class="panel-heading">
	                <h3 class="panel-title">Condition</h3>
	              </div>

	              <div class="panel-body">
	                <?php echo $book->bookCondition; ?>
	              </div>
	            </div>
				
	            <div class="panel panel-primary">
	              <div class="panel-heading">
	                <h3 class="panel-title">Trading For</h3>
	              </div>
	              <div class="panel-body">
	                <?php echo $book->bookWant; ?>
	              </div>
	            </div>

		        <div class="row">
		        	<div class="col-md-4">
		        		<a class="btn btn-warning" href="tempLibrary.php">Back</a>
		        	</div>


			    <?php
				    if(isset($_SESSION['isLoggedIn']) AND $_SESSION['id'] == $_SESSION['tempID'])
					{
						?>
					    <div class="col-md-4">
					    	<form action="tempEditBook.php" method="post">
					            <input type="submit" class="btn btn-warning" value="Edit">
					        </form>
					    </div>


					    <div class="col-md-4">
					    	<form action="backend/deleteBook.php" method="post">
					            <input type="submit" class="btn btn-danger" value="Delete">
					        </form>
					    </div>

				    	<?php
					}
					elseif(isset($_SESSION['isLoggedIn']))
					{
						?>
						<div class="col-md-4 col-md-offset-4">
					    	<form action="backend/addOffer.php" method="post">
					            <input type="submit" class="btn btn-warning" value="Offer Trade">
					        </form>
					    </div>
					    <?php
					}
				?>
				</div>

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

                    <input type="text" name="username" class="form-control" style="margin: 5px" placeholder="Username">
                    <input type="password" name="password1" class="form-control" style="margin: 5px" placeholder="Password">
                    <input type="password" name="password2" class="form-control" style="margin: 5px" placeholder="Confirm Password">

               

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
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.min.js"></script>
	<script src="js/jquery.fittext.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/creative.js"></script>

	<script type="text/javascript">
	function submitLibraryForm(){
		  document.libraryForm.submit();
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
