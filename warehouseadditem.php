<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<?php


// initializing variables
$warehouse_id = "";
$warehouse_loc = "";
$warehouse_name="";
$availability="";


// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'agriculturemanagement');
if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }


// Add item
if (isset($_POST['add'])) {
  // receive all input values from the form
  echo "connect";
   


  $warehouse_loc=mysqli_real_escape_string($db, $_POST['warehouse_location']);
  $warehouse_name=mysqli_real_escape_string($db, $_POST['warehouse_name']);
  $availability=mysqli_real_escape_string($db, $_POST['availability']);

    $query = "INSERT INTO warehouse (location,name,availability) 
  	      VALUES('$warehouse_loc','$warehouse_name','$availability')";
      if(mysqli_query($db, $query))
      {
      echo "<script>alert('Successfully stored');</script>";
				
    }
    else{
        echo"<script>alert('Somthing wrong!!!');</script>";
    }
  	
  	header('location: warehouse.php');
  
}
?>