 <?php 
 session_start();  
 $connect = mysqli_connect("localhost", "root", "", "library");  
 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="buybookcart.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["id"],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="buybookcart.php"</script>';  
                }  
           }  
      }  
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
          $result = $connect->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {  
        //echo "id: " . $row["id"]. " - Name: " . $row["bookname"]. " " . $row["authorname"]. "<br>";
      
          ?>
          <form method="post" action="buybookcart.php?action=add&id=<?php echo $row["id"]; ?>">
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
                  
                
               
               <!-- <input type="text" name="quantity" value="<?php echo $row["id"]; ?>" /> -->  
                <input type="hidden" name="hidden_name" value="<?php echo $row["bookname"]; ?>"/>  
                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />  
              </div>
              <div class="col-md-6 col-sm-6">
               <!-- <a href="books.html"><button class="btn btn-success right" > BUY BOOK</button>-->              
              <div><input type="text" name="quantity" value="1" size="1" /><input type="submit" name="add_to_cart" value="Add to cart" class="btn btn-success right" /></div>

              
               

              </div>
              
            </div>
</span>
      </div>
</form>

            <?php 
             }
} else {
    echo "Sorry! Our stock is Empty right now! :(";
}
$connect->close();
         ?>
              </div>




      <!-- END PRODUCTS -->
  
                
                <div style="clear:both"></div>  
                <br />  
                <h3>Order Details</h3>  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="20%">Book Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="10%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>$ <?php echo $values["item_price"]; ?></td>  
                               <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="buybookcart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a>
                               
                               </td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                               <td>
                                <td><a href=""><span class="text-danger">Confirm</span></a>
                                <?php 
                                session_destroy();
                                ?>
                               </td>  

                          </tr>  
                          
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
           </div>
</div>
           <br />  
      </body>  
 </html>