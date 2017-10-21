<?php
$servername = "localhost";
$username="root";
$password="";
$dbname="library";
$id="";
$bookname="";
$authorname="";
$publishername="";
$price="";
$image="";
$description="";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//connect to mysql database
try{
	$conn =mysqli_connect($servername,$username,$password,$dbname);
}catch(MySQLi_Sql_Exception $ex){
	echo("error in connecting");
}
//get data from the form
function getData()
{
	$data = array();
	//$data[0]=$_POST['id'];
	$target_dir = "book/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$data[1]=$_POST['bookname'];
	$data[2]=$_POST['authorname'];
	$data[3]=$_POST['publishername'];
	$data[4]=$_POST['price'];
	$data[5]=$_FILES['image']['name'];
	$data[6]=$_POST['description'];
	return $data;
}
//search
if(isset($_POST['search']))
{
	$info = getData();
	$search_query="SELECT * FROM book WHERE id = '$info[0]'";
	$search_result=mysqli_query($conn, $search_query);
		if($search_result)
		{
			if(mysqli_num_rows($search_result))
			{
				while($rows = mysqli_fetch_array($search_result))
				{
					$id = $rows['id'];
					$bookname = $rows['bookname'];
					$authorname = $rows['authorname'];
					$publishername = $rows['publishername'];
					$price = $rows['price'];
					$image = $rows['image'];
					$description = $rows['description'];

					
				}
			}else{
				echo("no data are available");
			}
		} else{
			echo("result error");
		}
	
}
//insert
if(isset($_POST['insert_btn'])){
	$info = getData();
	$check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
	$insert_query="INSERT INTO `book`(`bookname`, `authorname`, `publishername`, `price`, `image`, `description`) VALUES ('$info[1]','$info[2]','$info[3]','$info[4]','$info[5]','$info[6]')";
	
	try{
		$insert_result=mysqli_query($conn, $insert_query);
		if($insert_result)
		{
			if(mysqli_affected_rows($conn)>0){
				echo("data inserted successfully");
				
			}else{
				echo("data are not inserted");
			}
		}
	}catch(Exception $ex){
		echo("error inserted".$ex->getMessage());
	}
}
//delete
if(isset($_POST['delete'])){
	$info = getData();
	$delete_query = "DELETE FROM `book` WHERE id = '$info[0]'";
	try{
		$delete_result = mysqli_query($conn, $delete_query);
		if($delete_result){
			if(mysqli_affected_rows($conn)>0)
			{
				echo("data deleted");
			}else{
				echo("data not deleted");
			}
		}
	}catch(Exception $ex){
		echo("error in delete".$ex->getMessage());
	}
}
//edit
if(isset($_POST['update'])){
	$info = getData();
	$update_query="UPDATE `book` SET `bookname`='$info[1]',authorname='$info[2]',publishername='$info[3]',price='$info[4]',image='$info[5]',pdescription='$info[6]' WHERE id = '$info[0]'";
	try{
		$update_result=mysqli_query($conn, $update_query);
		if($update_result){
			if(mysqli_affected_rows($conn)>0){
				echo("data updated");
			}else{
				echo("data not updated");
			}
		}
	}catch(Exception $ex){
		echo("error in update".$ex->getMessage());
	}
}

?>
