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
$field_id = "";
$field_size = "";



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
   


  $field_id=mysqli_real_escape_string($db, $_POST['field_id']);
  $field_size=mysqli_real_escape_string($db, $_POST['field_size']);


    $query = "INSERT INTO field (field_id,field_size) 
  	      VALUES('$field_id','$field_size')";
      if(mysqli_query($db, $query))
      {
      echo "<script>alert('Successfully stored');</script>";
				
    }
    else{
        echo"<script>alert('Somthing wrong!!!');</script>";
    }
  	
  	header('location: field.php');
  
}
?>