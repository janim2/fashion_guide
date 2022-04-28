<?php
//require_once 'database/config.php';
if(isset($_POST['save']))//check variable set or not
{
// variables for input data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$city_name = $_POST['city_name'];
$email = $_POST['email'];
// sql query for inserting data into database
$query = "INSERT INTO try(first_name,last_name,email) values ('$first_name','$last_name','$email')";
echo "<p align=center>Data Added Successfully.</p>";
}
else{
echo "error";
}
?> <!DOCTYPE html>
<html>
<body>
<form method="post" action="">
First name:<br>
<input type="text" name="first_name">
<br>
Last name:<br>
<input type="text" name="last_name">
<br>
Email Id:<br>
<input type="email" name="email">
<br><br>
<input type="submit" name="save" value="submit">
</form>
</body>
</html>