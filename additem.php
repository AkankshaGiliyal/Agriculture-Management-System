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
$crop_name = "";
$month_grown = "";
$yield="";
$field_id="";
$pesticide_name="";
$warehouse_id="";

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
   
  $crop_name=mysqli_real_escape_string($db, $_POST['crop_name']);
  $month_grown=mysqli_real_escape_string($db, $_POST['month']);
  $yield=mysqli_real_escape_string($db, $_POST['quantity']);
  $field_id=mysqli_real_escape_string($db, $_POST['field_id']);
  $pesticide_name=mysqli_real_escape_string($db, $_POST['pesticide_name']);
   $warehouse_id=mysqli_real_escape_string($db, $_POST['warehouse_id']);
  
    $query = "INSERT INTO crop (crop_name,month,quantity,pesticide_name,field_id,warehouse_id) 
  	      VALUES('$crop_name','$month_grown','$yield','$pesticide_name','$field_id','$warehouse_id')";
      if(mysqli_query($db, $query))
      {
      echo "<script>alert('Successfully stored');</script>";
				
    }
    else{
        echo"<script>alert('Somthing wrong!!!');</script>";
    }
  	
  	header('location: table.php');
  
}
?>
<!-->

<!DOCTYPE html>
<html>
<head>
	<title>Add Item</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>
<form method="POST" class="form-inline" action="additem.php">
  <div class="form-group">
    <label for="name">Warehouse location</label>
    <input type="text" class="form-control" name="location">
    
  </div>
  <div class="form-group">
    <label for="name">Warehouse Name</label>
    <input type="text" class="form-control" name="name">
  </div>
  <div>
        <label for="name">Availability</label>
        <input type="number" name="$availability">
    </div>
  <button type="submit" class="btn btn-default" name="add">Add item</button>
</form> 

<div>
<a href="table.php">Home</a>
</div>
</body>
</html>
<!-->