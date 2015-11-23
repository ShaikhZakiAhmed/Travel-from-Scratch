<?php 
$user='root';
$pass='';
$db='travel';
$con=mysql_connect('localhost',$user,$pass);
$id=$_POST['id'];
$first=$_POST['first'];
$last=$_POST['last'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$email=$_POST['email'];
$mobile=$_POST['phone'];
$pass=$_POST['password'];

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
else
{

$sql="INSERT INTO `register`(`login_id`, `first`, `last`, `gender`, `address`, `email`, `phone`, `password`) VALUES ('$id','$first','$last','$gender','address','$email','$mobile','$pass')";
mysql_select_db($db,$con);
$result=mysql_query($sql,$con);
if(! $result)
{
  die('Could not enter data: ' . mysql_error());
}
echo "<h1><center>Registration details</center></h1><hr>";
echo "<table width=100% border=1>";
echo "<tr><td>Id</td><td>" . $id . "</td></tr>";
echo "<tr><td>First Name</td><td>" . $first . "</td></tr>";
echo "<tr><td>Last Name</td><td>" . $last . "</td></tr>";
echo "<tr><td>Gender</td><td>" . $gender . "</td></tr>";
echo "<tr><td>Email</td><td>" . $email . "</td></tr>";
echo "<tr><td>Phone Number</td><td>" . $mobile . "</td></tr>";
echo "<tr><td>Address</td><td>" . $address . "</td></tr>";
echo "<tr><td>Password</td><td>" . $pass . "</td></tr>";
echo "</table>";
echo "<form name=submit>";
echo "<center><a href=login.html ><input type=button value=LogIn></a></center></form>";

  }

?>