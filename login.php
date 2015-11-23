<?php

// Create connection
$user='root';
$pass='';
$db='travel';
$con=mysqli_connect('localhost',$user,$pass,$db);
$id=$_POST['id'];
$pass=$_POST['pass'];
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
else
{

$sql="SELECT COUNT(login_id)from register where login_id='$id' AND password='$pass' ";
$result=mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result))
  {
  
 $login=$row['COUNT(login_id)'];
 
  }
if($login == 0)
{
header('Location: login.html');
}
else
{
session_start();
$_SESSION['login']=$id;
header('Location: book.php');
}

}
?>