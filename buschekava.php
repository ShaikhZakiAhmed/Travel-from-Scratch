<?php include 'header.html';
$t_id=$_POST['ra'];
// Create connection
$user='root';
$pass='';
$db='travel';
$con=mysqli_connect('localhost',$user,$pass,$db);
session_start();
$_SESSION['bus_id']=$t_id;
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
else
{
echo "<table  border=0>";
echo "<tr> <td width=194 >&nbsp;</td> <td width=928 >";
$sql="select * from bus where bus_id='$t_id' ";
$result=mysqli_query($con,$sql);
echo "<table width=100% border=1>";
echo "<tr><th>Bus NUMBER</th><th>Bus NAME</th><th>DATE</th><th>SOURCE</TH><th>DESTINATION</th><th>Seat Avilable</th></tr>";
echo "<form nmae=avlibility method=post action=login.html>";
while($row = mysqli_fetch_array($result))
  {
  $avl=$row['avilable'];
  echo "<center>";
  echo "<tr>";
  echo "<td>" . $row['bus_id']. "</td>";
  echo "<td>" . $row['name']. "</td>";
  echo "<td>" . $_SESSION['date'] . "</td>";
  echo "<td>" . $row['source']. "</td>";
  echo "<td>" . $row['destination']. "</td>";
  echo "<td>" . $row['avilable'] . "</td>";
  $_SESSION['avilable']=$row['avilable'];
  $_SESSION['bus_name']=$row['name'];
  echo "</tr></center>";
  }
 
 echo "<tr><td colspan=5><div align=right><input type=submit value=Book ticket></div></td></tr>";
echo "</form></table>";
echo "</td><td width=194 scope=col>&nbsp;</td></tr></table>";
}
?>