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
$name = "";
$salary = "";
$phno="";
$field_id="";


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
   


  $name=mysqli_real_escape_string($db, $_POST['worker_name']);
  $salary=mysqli_real_escape_string($db, $_POST['salary']);
  $phno=mysqli_real_escape_string($db, $_POST['phno']);
  $field_id=mysqli_real_escape_string($db, $_POST['field_id']);

    $query = "INSERT INTO field_worker (name,salary,phno,field_id) 
  	      VALUES('$name','$salary','$phno',$field_id)";
      if(mysqli_query($db, $query))
      {
      echo "<script>alert('Successfully stored');</script>";
				
    }
    else{
        echo"<script>alert('Somthing wrong!!!');</script>";
    }
  	
  	header('location: fieldworker.php');
  
}
?>