<?php

include('config.php');

if (isset($_POST['submit']))
{
$crop_id=mysqli_real_escape_string($db, $_POST['crop_id']);
$crop_name=mysqli_real_escape_string($db, $_POST['crop_name']);
$month=mysqli_real_escape_string($db, $_POST['month']);
$quantity=mysqli_real_escape_string($db, $_POST['quantity']);
$pesticide_name=mysqli_real_escape_string($db, $_POST['pesticide_name']);
$field_id=mysqli_real_escape_string($db, $_POST['field_id']);
$warehouse_id=mysqli_real_escape_string($db, $_POST['warehouse_id']);

mysqli_query($db,"UPDATE crop SET crop_name='$crop_name', month='$month' ,quantity='$quantity',pesticide_name='$pesticide_name',field_id='$field_id',warehouse_id='$warehouse_id' WHERE crop_id='$crop_id'");

header("Location:table.php");
}


if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
{

$id = $_GET['id'];
$result = mysqli_query($db,"SELECT * FROM crop WHERE crop_id=$crop_id");

$row = mysqli_fetch_array($result);

if($row)
{

$crop_id = $row['crop_id'];
$name = $row['crop_name'];
$month = $row['month'];
$quantity=$row['quantity'];
$pesticide=$row['pesticide_name'];
$field_id=$row['field_id'];
$warehouse_id=$row['warehouse_id'];
}
else
{
echo "No results!";
}
}
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Edit Item</title>
</head>
<body>



<form action="" method="post" action="cropedit.php">
<input type="hidden" name="id" value="<?php echo $id; ?>"/>

<table border="1">
<tr>
<td colspan="2"><b><font color='Red'>Edit </font></b></td>
</tr>
<tr>
<td width="179"><b><font >Crop Name <em>*</em></font></b></td>
<td><label>
<input type="text" name="crop_name" value="<?php echo $crop_name; ?>" />

</label></td>
</tr>

<tr>
<td width="179"><b><font color='#663300'>Price<em>*</em></font></b></td>
<td><label>
<input type="text" name="month" value="<?php echo $month ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='#663300'>Quantity<em>*</em></font></b></td>
<td><label>
<input type="text" name="quantity" value="<?php echo $quantity;?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='#663300'>Pesticide<em>*</em></font></b></td>
<td><label>
<input type="text" name="pesticide" value="<?php echo $pesticide_name;?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='#663300'>Field ID<em>*</em></font></b></td>
<td><label>
<input type="text" name="field_id" value="<?php echo $field_id;?>" />
</label></td>
</tr>


<tr>
<td width="179"><b><font color='#663300'>Warehouse ID<em>*</em></font></b></td>
<td><label>
<input type="text" name="warehouse_id" value="<?php echo $warehouse_id;?>" />
</label></td>
</tr>

<tr align="Right">
<td colspan="2"><label>
<input type="submit" name="submit" value="Edit ">
</label></td>
</tr>
</table>
</form>
</body>
</html>
