<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: index2.php");
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Home Page</title>
	</head>

	<body>
	<div class="back">
		

      	<div class="content">
  	  <div class="row">
       <nav class="navbar navbar-default">
       <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">
        <img alt="Brand" src="logo.png" height="50px" width="auto">
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#">Home<span class="sr-only">(current)</span></a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Contact</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Books <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Literature</a></li>
            <li><a href="#">Poetry</a></li>
            <li><a href="#">Science fiction</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        
      
        <li><a href="bookentry.php">Add Book</a></li>
        
        </li>
        <li><span class="glyphicon"></span>
        <!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
        <h3>
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
        </h3>
      </div>
    <?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>

      <p><span class="glyphicon"></span>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    <?php endif ?>
        <li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span>LogOut</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
  	  </div>
  	  </div>
      
  	 <h1 class="firsthead"><b>Welcome to Book Worm <br><small class="firsthead">Books are your best friend forever</small></b></h1>
  	 <!--<h3 class="he3">A room without books is like a body without soul<br>lalalala</h3>-->

  	 <div class="wrapper">
  	 <a href="buybook.php"><button type="button" class="btn btn-default navbar-btn">Enter into Library!</button>
</div>
 </div>
    <!-------------------------------------My Footer---------------------------------------------->
<div class="foot">
 <div class="container">
    <section style="padding-top: 40px"></section>
	
	</div>

	

    <!----------- Footer ------------>
    <footer class="footer-bs">
        <div class="row">
        	<div class="col-md-3 footer-brand animated fadeInLeft">
        	<img alt="logo" src="logo.png" height="90px" width="100px">
            	<h2>Book Worm</h2>
                <p>© 2014 BS3 UI Kit, All rights reserved</p>
            </div>
        	<div class="col-md-4 footer-nav animated fadeInUp">
            	<h4>Menu —</h4>
            	<div class="col-md-6">
                    <ul class="pages">
                        <li><a href="#">Travel</a></li>
                        <li><a href="#">Literature</a></li>
                        <li><a href="#">Poem</a></li>
                        <li><a href="#">Science</a></li>
                        <li><a href="#">Adventure</a></li>
                    </ul>
                </div>
            	<div class="col-md-6">
                    <ul class="list">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contacts</a></li>
                        <li><a href="#">Terms & Condition</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2 footer-social animated fadeInDown">
            	<h4>Follow Us</h4>
            	<ul>

                	 <a href="https://www.facebook.com"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>
                	<a href="https://twitter.com"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>
                	<a href="https://google.com"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>
                	 <a href="www.gamil.com"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>
                </ul>
            </div>
        	<div class="col-md-3 footer-ns animated fadeInRight">
            	
						<h3>Contact Us</h3>
						<ul>
							<input type="text" class="form-control" placeholder="Email Address"><br>
							<input type="text" class="form-control" placeholder="Phone number"><br>
							<input type="text" class="form-control" placeholder="Subject"><br>
								
							
 								<button type="button" class="btn btn-default navbar-btn">Submit<a href="#"></button>
 							
						</ul>

					</div>
            </div>
        
    </footer>
    <section style="text-align:center; margin:10px auto;"><p>All rights reserved by <a href="index.php">The Book Worm</a></p></section>
</div>
</div>
</div>


	</body>
	</html>