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
$pesticide_name = "";
$description= "";
$cost="";

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
   


  $pesticide_name=mysqli_real_escape_string($db, $_POST['pesticide_name']);
  $description=mysqli_real_escape_string($db, $_POST['description']);
  $cost=mysqli_real_escape_string($db, $_POST['cost']);
  

    $query = "INSERT INTO pesticide (pesticide_name,description,cost) 
  	      VALUES('$pesticide_name','$description','$cost')";
      if(mysqli_query($db, $query))
      {
      echo "<script>alert('Successfully stored');</script>";
				
    }
    else{
        echo"<script>alert('Somthing wrong!!!');</script>";
    }
  	
  	header('location: pesticide.php');
  
}
?>