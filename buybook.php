<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname="library";

// Create connection
try{
  $conn =mysqli_connect($servername,$username,$password,$dbname);
}catch(MySQLi_Sql_Exception $ex){
  echo("error in connecting");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <title>Book List</title>
</head>
<body>
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
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
         <li><a href="index2.php"><span class="glyphicon"></span>Home</a></li>
        <li><a href="index2.php"><span class="glyphicon"></span>Contact Us</a></li>
        
        </ul>

        </div>
    </div>
    <nav>
    </div> 
<div class="container">
<h1>Book Worm</h1>


  <div class="row">
      <!-- BEGIN PRODUCTS -->
      <!--<div class="col-md-3 col-sm-6">
        <span class="thumbnail">
            <img src="book1.jpg" alt="...">
            <h4>Relativity</h4>
           
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
            <hr class="line">
            <div class="row">
              <div class="col-md-6 col-sm-6">
                <p class="price">$29,90</p>
              </div>
              <div class="col-md-6 col-sm-6">
                <button class="btn btn-success right" > BUY BOOK</button>
              </div>
              
            </div>
        </span>
      </div>  -->
      
      
       <div>
       
        <?php
           $sql = "SELECT id, bookname, authorname, publishername, price, image, description FROM book";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {  
        //echo "id: " . $row["id"]. " - Name: " . $row["bookname"]. " " . $row["authorname"]. "<br>";
      
          ?>
           <div class="col-md-3 col-sm-6">
       <span class="thumbnail">
            <img src= <?php echo($row["image"]);?> alt="book image">
            <h3><?php echo($row["bookname"]);?></h3>
            <h4><?php echo($row["authorname"]);?></h4>
            <h5><?php echo($row["publishername"]);?></h5>
            <p><?php echo($row["description"]);?> </p>
            <hr class="line">
            <div class="row">
              <div class="col-md-6 col-sm-6">
                <p class="price">Price=<?php echo($row["price"]);?>Taka</p>
                <p class="price">Product Code: <?php echo($row["id"]);?></p>
              </div>
              <div class="col-md-6 col-sm-6">
               <!-- <a href="books.html"><button class="btn btn-success right" > BUY BOOK</button>-->              
              <div><input type="text" name="quantity" value="1" size="1" /><input type="submit" value="Add to cart" class="btn btn-success right" /></div>


               

              </div>
              
            </div>
</span>
      </div>


            <?php 
             }
} else {
    echo "Sorry! Our stock is Empty right now! :(";
}
$conn->close();
         ?>
              </div>




      <!-- END PRODUCTS -->
  </div>
</div>
</body>
</html>