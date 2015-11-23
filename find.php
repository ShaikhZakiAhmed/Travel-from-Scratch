<?php include 'header.html';
// Create connection
$user='root';
$pass='';
$db='travel';
$con=mysqli_connect('localhost',$user,$pass,$db);
session_start();

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
else
{
echo "<table  border=0>";
echo "<tr> <td width=194 >&nbsp;</td> <td width=928 >";
$sou=$_POST['source'];
$des=$_POST['destination'];
// store session data
$_SESSION['date']=$_POST['Dofj'];
$sql="select * from train where source='$sou' AND destination='$des' ";
$result=mysqli_query($con,$sql);
echo "<table width=100% border=1>";
echo "<tr><th>TRAIN NUMBER</th><th>TRAIN NAME</th><th>SOURCE</TH><th>DESTINATION</th><th>Check Avalibility</th></tr>";
echo "<form nmae=avilibility method=post action=checkavl.php>";
while($row = mysqli_fetch_array($result))
  {
  $id=$row['train_id'];
  echo "<center>";
  echo "<tr>";
  echo "<td>" . $row['train_id']. "</td>";
  echo "<td>" . $row['name']. "</td>";
  echo "<td>" . $row['source']. "</td>";
  echo "<td>" . $row['destination']. "</td>";
  echo "<td> <input type=radio name=ra value=$id></td>";
  echo "</tr></center>";
  }
 
 echo "<tr><td colspan=5><div align=right><input type=submit value=Booking></div></td></tr>";
echo "</form> </table>";
echo "</td><td width=194 scope=col>&nbsp;</td></tr></table>";
}
?>
