<?php include 'header.html';
$user='root';
$pass='';
$db='travel';
$con=mysql_connect('localhost',$user,$pass);
session_start();
$t_no=$_SESSION['train_name'];
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
else
{

$sql="DELETE FROM `reservation` WHERE ticket_no='$t_no' LIMIT 1";
mysql_select_db($db,$con);
$result=mysql_query($sql,$con);
if(! $result)
{
  die('Could not enter data: ' . mysql_error());
}
else
{
echo "<h2><center>Your ticket has Cancell</h2></center>";
session_destroy();
}
}
?>

