<?php include('server.php');?>


<?php
$name = "";
$address = "";
$id="0";


if(isset($_POST['save'])){
$u_name =  $_POST['name'];
$u_address =  $_POST['address'];

$sql = "INSERT INTO info (name, address)
VALUES ('$u_name', '$u_address')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header('location: index.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}

 
if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$address = $_POST['address'];

	mysqli_query($conn, "UPDATE info SET name='$name', address='$address' WHERE id=$id");
	// $_SESSION['message'] = "Address updated!"; 
	header('location: index.php');
}


if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($conn, "DELETE FROM info WHERE id=$id");
	
	header('location: index.php');
}


?>