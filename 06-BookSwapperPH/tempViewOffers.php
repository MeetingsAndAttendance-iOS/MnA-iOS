<?php
    session_start();
    include 'backend/getOffers.php';
    include 'backend/getUser.php';
	if(isset($_SESSION['offerID']))
    {
        unset($_SESSION['offerID']);
    }
    if(isset($_SESSION['displayName']))
    {
        unset($_SESSION['displayName']);
        unset($_SESSION['location']);
        unset($_SESSION['contactNo']);
        unset($_SESSION['email']);
    }
	
	
?>

<!DOCTYPE html>
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
    <link rel="stylesheet" href="css/creative.css" type="text/css">
    <link rel="stylesheet" href="css/styles.css" type="text/css">

</head>

<body class="full">
<?php
    $user = getUser();
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
                        <form name="galleryForm" action="tempGallery.php" method="post">
                          <input type="hidden" name="tempID" value="<?php echo $_SESSION['id']; ?>">
                        </form>

                        <?php
                      }
                      ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

<div class="container text-center">
  <div class="table-responsive"> 
    <h1>My Trade Transactions</h1>         
      <table class="table">
      <thead>
          <tr>
          <th>#</th>
          <th>BookOffered</th>
          <th>Message</th>
		  <th>Trading to</th>
		  <th>Status</th>
          <th></th>
          </tr>
      </thead>
      <tbody>
          <?php 
              echo other_populate_table();
          ?>
      </tbody>
     </table>
	<h1>Book Offers</h1>
	  <table class="table">
      <thead>
          <tr>
          <th>#</th>
          <th>BookOffered</th>
          <th>Message</th>
          <th>Trading from</th>
		  <th>Status</th>
          <th></th>
          </tr>
      </thead>
      <tbody>
          <?php 
              echo populate_table();
          ?>
      </tbody>
     </table>
    </div>
  </div>
</div>


</body>
</html>