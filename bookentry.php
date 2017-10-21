<?php include("connection.php");
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

	<title>Book Entry</title>
	</head>

	<body>
	<div class="others">
    
	<div class="container">
      <div class="panel-heading">
                <div class="onlyform">
<div class="col-md-5">
    <div class="form-area">  
        
        <br style="clear:both">
        <div class="panel-title text-center">
                    <h2 style="margin-bottom: 25px; text-align: center;">Add Book Form</h2>
                    </div>
                    <div class="main-login main-center">
                    <form class="form-horizontal" method="post" action="bookentry.php" enctype="multipart/form-data">
    				<div class="form-group">
						<input type="text" class="form-control" id="bookname" name="bookname" placeholder="Book Name" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="authorname" name="authorname" placeholder="Author Name" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="publishername" name="publishername" placeholder="Publisher Name" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="price" name="price" placeholder="Price" required>
					</div>
					<div class="form-group">
    <label for="image">Upload Book Cover</label>
    <input type="file" class="form-control-file" name="image" id="image" aria-describedby="fileHelp">
    <small id="fileHelp" class="form-text text-muted"></small>
  </div>
                    <div class="form-group">
                    <textarea class="form-control" type="textarea" id="description" name="description" laceholder="Description (If Any)" maxlength="140" rows="7"></textarea>
                        <span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit</p></span>


                    </div>

                    <div>
        <input type="submit" class="btn btn-primary btn-lg btn-block login-button" name="insert_btn" value="Add">
        
        
    </div>
            
        
        </form>
        
    </div>
    </div>
</div>

</div>
</div>
</div>
</div>
	</body>

	<script type="text/javascript">
		$(document).ready(function(){ 
    $('#characterLeft').text('140 characters left');
    $('#message').keydown(function () {
        var max = 140;
        var len = $(this).val().length;
        if (len >= max) {
            $('#characterLeft').text('You have reached the limit');
            $('#characterLeft').addClass('red');
            $('#btnSubmit').addClass('disabled');            
        } 
        else {
            var ch = max - len;
            $('#characterLeft').text(ch + ' characters left');
            $('#btnSubmit').removeClass('disabled');
            $('#characterLeft').removeClass('red');            
        }
    });    
});

	</script>