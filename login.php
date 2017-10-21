<?php include('server.php') ?> 
<!DOCTYPE html>
<html1 lang="en">
    <head> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="style.css">

        <!-- Website Font style -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
        
        <!-- Google Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
         
        <title>Login</title>
    </head>
    <body1>
    <div class="image">
        <div class="container">
            <div class="row main">
                <div class="panel-heading">
                   <div class="panel-title text-center">
                        <h1 class="title">Login</h1>
                        <hr />
                    </div>
                </div> 
                <div class="main-login main-center">
                    <form class="form-horizontal" method="post" action="login.php">
                        <?php include('errors.php'); ?>

                        <div class="form-group">
                            <label for="username" class="cols-sm-2 control-label" name="username">Username</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="username" id="name"  placeholder="Enter your Name"/>
                                </div>
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <label for="password" class="cols-sm-2 control-label" name="password" required>Password</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <button type="submit" class="btn btn-primary btn-lg btn-block login-button" name="login_user">Login</button>
                        </div>
                        <p>
            Not yet a member? <a href="registration.php">Sign up</a>
        </p>
                    </form>
                </div>
            </div>
        </div>
       </div>
        <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    </body>
</html>

