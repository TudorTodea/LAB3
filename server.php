<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'crud');


	$name = "";
	$address = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];

		mysqli_query($db, "INSERT INTO crud(name, address) VALUES ('$name', '$address')"); 
		$_SESSION['msg'] = "Address saved"; 
		header('location: user.php');
	}

	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$address = $_POST['address'];
	
		mysqli_query($db, "UPDATE crud SET name='$name', address='$address' WHERE id=$id");
		$_SESSION['msg'] = "Address updated!"; 
		header('location: user.php');
	}

	if(isset($_GET['del'])) {
$id=$_GET['del'];
mysqli_query($db,"DELETE FROM crud WHERE id=$id");
$_SESSION['msg'] = "Address deleted!"; 
header('location: user.php');
	}

	
	



$results=mysqli_query($db,"SELECT * FROM crud");

?>