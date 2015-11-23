<?php include 'header.html';
session_start();
$user='root';
$pass='';
$db='travel';
$con=mysqli_connect('localhost',$user,$pass,$db);
echo "<table  border=0>";
echo "<tr> <td width=194 >&nbsp;</td> <td width=928 >";
if(isset($_SESSION['login']))
{
echo "welcome " .$_SESSION['login'] . "<br>";
echo "<h1>Please Enter Passanger details <br></h1><br>";
echo "<form name=details method=post action=bookupdate.php>";
if(isset($_SESSION['login']))
{
if(isset($_SESSION['train_id']))
{
echo "Train ID:".$_SESSION['train_id'] . "<br>";
$t_id=$_SESSION['train_id'];

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
else
{
$sql="select * from train where train_id='$t_id' ";
$result=mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result))
  {
  echo "Train Name: " .$row['name'] . "<br>";
  echo "From: " . $row['source']. "<br>";
  echo "To: " . $row['destination']. "<br>";
  }

}


}
if(isset($_SESSION['bus_id']))
{

}
if(isset($_SESSION['flight_id']))
{
}

}
echo "Enter Passanger Name<input type=text name=passname > <br> Select Number of ticket<input type=text name=no_ticket ><br>";
echo "<input type=submit value=Booking>";
}
else
{
header('Location: login.html');
}
echo "</td><td width=194 scope=col>&nbsp;</td></tr></table>";
?>

