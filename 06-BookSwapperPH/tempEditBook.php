<?php
	session_start();
	include 'backend/getUser.php';
	include 'backend/getTypes.php';
	include 'backend/getGenres.php';
	include 'backend/getBook.php';
	if(isset($_POST['book']))
	{
		$_SESSION['book'] = $_POST['book'];
	}
	$book = getBook();
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


					<form name="galleryForm" action="tempLibrary.php" method="post">
						<input type="hidden" name="tempID" value="<?php echo $_SESSION['id']; ?>">
					</form>


                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

<div class="container text-center">
	<div class="col-md-6 col-md-offset-3"> 
		<div class="boxview">
	    <h1>Trade your book now!</h1>
	    <form action="backend/editBook.php" method="post">
	            <div class="panel panel-primary">
	              <div class="panel-heading">
	                <h3 class="panel-title">Book Name</h3>
	              </div>

	              <div class="panel-body">
	                <input type="text" class="form-control" name="name">
	              </div>
	            </div>

				<div class="panel panel-primary">
	              <div class="panel-heading">
	                <h3 class="panel-title">Book Author</h3>
	              </div>
	              <div class="panel-body">
	                <input type="text" class="form-control" name="author" >
	              </div>
	            </div>
				
				<div class="panel panel-primary">
	              <div class="panel-heading">
	                <h3 class="panel-title">Type</h3>
	              </div>
	              <div class="panel-body">
	                <select name="type">
						<?php
							$types = getTypes();
							foreach($types as $type)
							{
								?>
								<option value="<?php echo $type->typeID; ?>"><?php echo $type->typeName; ?></option>
								<?php
							}
						?>
					</select>
	              </div>
				</div>  
				 
				 
				<div class="panel panel-primary">	           				 
				  <div class="panel-heading">
	                <h3 class="panel-title">Genre</h3>
	              </div>
	              <div class="panel-body">
	                <select name="genre">
						<?php
							$genres = getGenres();
							foreach($genres as $genre)
							{
								?>
								<option value="<?php echo $genre->genreID; ?>"><?php echo $genre->genreName; ?></option>
								<?php
							}
						?>
					</select>
	              </div>
				</div>	
				
				<div class="panel panel-primary">
	              <div class="panel-heading">
	                <h3 class="panel-title">Book Condition</h3>
	              </div>
	              <div class="panel-body">
	                <input type="text" class="form-control" name="condition">
	              </div>
	            </div>
				
				
	            <div class="panel panel-primary">
	              <div class="panel-heading">
	                <h3 class="panel-title">Added Comments</h3>
	              </div>

	              <div class="panel-body">
	                <textarea name="comment" rows="10" cols="30"></textarea>
	              </div>
	            </div>  
			
	          
				<div class="panel panel-primary">
	              <div class="panel-heading">
	                <h3 class="panel-title">Trading For</h3>
	              </div>
	              <div class="panel-body">
	                <input type="text" class="form-control" name="want" >
	              </div>
	            </div>
	    

	    

	    <div style="float: right; text-align:right; width:50%">
	            <input type="submit" class="btn btn-warning" value="Submit">
	        </form>
	    </div>

	    <div style="float: left; text-align:left; width:50%">
	        <form action="tempViewBook.php" method="post">
	            <input type="submit" class="btn btn-warning" value="Back">
	        </form>
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
</body>
</html>