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
<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<HTML>
<HEAD>
<TITLE>Simple PHP Shopping Cart</TITLE>
<link href="style.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart <a id="btnEmpty" href="index.php?action=empty">Empty Cart</a></div>
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>	
<table cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;"><strong>Name</strong></th>
<th style="text-align:left;"><strong>Code</strong></th>
<th style="text-align:right;"><strong>Quantity</strong></th>
<th style="text-align:right;"><strong>Price</strong></th>
<th style="text-align:center;"><strong>Action</strong></th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>
				<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo $item["name"]; ?></strong></td>
				<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $item["code"]; ?></td>
				<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["quantity"]; ?></td>
				<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo "$".$item["price"]; ?></td>
				<td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction">Remove Item</a></td>
				</tr>
				<?php
        $item_total += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="5" align=right><strong>Total:</strong> <?php echo "$".$item_total; ?></td>
</tr>
</tbody>
</table>		
  <?php
}
?>
</div>

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
</BODY>
</HTML>