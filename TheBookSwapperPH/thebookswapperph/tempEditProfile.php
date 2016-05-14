<?php
	session_start();
	include 'backend/getProfile.php';
	include 'backend/getUser.php';
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is a book trading website.">
    <meta name="author" content="Justin Balderas, Ma. Angelica Dino, Patrick Joy Dominguiano">
	
    <title>TheBookSwapperPH</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/creative.css" type="text/css">
    <link rel="stylesheet" href="css/styles.css" type="text/css">
</head>

<body class="full">
  <?php
    $profile = getProfile();
  ?>

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
                <a class="navbar-brand page-scroll">TheBookSwapperPH</a>

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
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="tempViewUsers.php">View Users</a></li>

                  <?php
                      $user = getUser();
                  ?>
                  
					<!-- If the form libraryForm is located here, there would be a newline after Library link in the navbar !-->
					<li><a href="javascript: submitLibraryForm()">Library</a></li>
                  <?php
                    
                    if($_SESSION['isAdmin'] == 1)
                    {
                      ?>
                        <li><a href="tempAdmin.php">Admin Stuff</a></li>
                      <?php
                    }
                  ?>
                  <li><a href="tempProfile.php"><?php echo $user->userName ?></a></li>
                  <li><a href="backend/logout.php">Log Out</a></li>

                  <!-- Is it okay if I put this here !-->
                  <form name="libraryForm" action="tempLibrary.php" method="post">
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
        <h1>User Profile</h1>
        <form action="backend/editProfile.php" method="post">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">UserName</h3>
                  </div>
                  <div class="panel-body">
                    <input type="text" class="form-control" name="userName" value="<?php echo $profile->userName; ?>" required >
                  </div>
                </div>
	<!--			
				<div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Old Password</h3>
                  </div>
                  <div class="panel-body">
                    <input type="password" class="form-control" name="oldpass">
                  </div>
                </div>
				
				<div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">New Password</h3>
                  </div>
                  <div class="panel-body">
                    <input type="password" class="form-control" name="newpass1">
                  </div>
                </div>
				
				<div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Confirm New Password</h3>
                  </div>
                  <div class="panel-body">
                    <input type="password" class="form-control" name="newpass2">
                  </div>
                </div>
				-->
				<div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Display Name</h3>
                  </div>
                  <div class="panel-body">
                    <input type="text" class="form-control" name="displayName" value="<?php echo $profile->displayName; ?>" required >
                  </div>
                </div>

                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Location</h3>
                  </div>
                  <div class="panel-body">
                    <input type="text" class="form-control" name="location" value="<?php echo $profile->location; ?>" required >
                  </div>
                </div>

                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Contact Number</h3>
                  </div>
                  <div class="panel-body">
                    <input type="number" class="form-control" name="contactNo" value="<?php echo $profile->contactNo; ?>" required >
                  </div>
                </div>

                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Email Address</h3>
                  </div>
                  <div class="panel-body">
                    <input type="email" class="form-control" name="email" value="<?php echo $profile->email; ?>" required >
                  </div>
                </div>
        

        <div style="float: right; text-align:right; width:50%">
                <input type="submit" class="btn btn-warning" value="Edit">
            </form>
        </div>

        <div style="float: left; text-align:left; width:50%">
            <form action="tempProfile.php" method="post">
                <input type="submit" class="btn btn-warning" value="Back">
            </form>
        </div>
        </div>


  </div>
</div>

</header>

</body>
