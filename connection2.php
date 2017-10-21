<?php
session_start();

// variable declaration
$bookname="";
$authorname="";
$publishername="";
$price="";
$image="";
$description="";
$errors = array(); 
$_SESSION['success'] = "";
$msg = "";
// connect to database
$db = mysqli_connect('localhost', 'root', '', 'library');

// insert data
if (isset($_POST['insert_btn'])) {
	// receive all input values from the form
	    $target = "book/".basename($_FILES['image']['name']);
		$bookname = mysqli_real_escape_string($db, $_POST['bookname']);
		$authorname = mysqli_real_escape_string($db, $_POST['authorname']);
		$publishername = mysqli_real_escape_string($db, $_POST['publishername']);
		$price = mysqli_real_escape_string($db, $_POST['price']);
		$image = $_FILES['image']['name'];
	     $description  = mysqli_real_escape_string($db, $_POST['description']);
	     
	         
	           
	// form validation: ensure that the form is correctly filled
	if (empty($bookname)) { array_push($errors, "Bookname is required"); }
	if (empty($price)) { array_push($errors, "Price is required"); }
	if (empty($image)) { array_push($errors, "Image is required"); }
	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
			$msg = "Image uploaded successfully";
		}else{
			$msg = "Failed to upload image";
		}
	}

	 

	// insert user if there are no errors in the form
	if (count($errors) == 0) {
		$query = "INSERT INTO book(bookname, authorname, publishername, price, image, description)
				  VALUES('$bookname', '$authorname', '$publishername', '$price', '$image', '$description')";
		mysqli_query($db, $query);
         echo "hoise";
     
		$_SESSION['bookname'] = $bookname;
		$_SESSION['success'] = "Book Successfully Added";
		echo "<h1 style='text-align:center;'>Registration Successful! Thank You ".$users->username."!.</h1><br>";
		header('location: bookentry.php');
	}
?>