<?php include 'header.html';
$user='root';
$pass='';
$db='travel';
$t_no=$_POST['ticketnum'];
session_start();
$t_id=$_POST['ticketnum'];
$_SESSION['train_name']=$t_id;
echo "<table  border=0>";
echo "<tr> <td width=194 >&nbsp;</td> <td width=928 >";
$con=mysqli_connect('localhost',$user,$pass,$db);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
else
{

$sql="SELECT * FROM `reservation` WHERE ticket_no='$t_no' ";
$result=mysqli_query($con,$sql);
echo "<h2><center> Travel Details of Ticket </center></h2>";
echo "<table width=100% border=0>";
while($row = mysqli_fetch_array($result))
  {
  
  echo "<tr><td width=35%>Ticket Number</td><td>" . $row['ticket_no']. "</td></tr>";
echo "<tr><td>Travel ID</td><td>" . $row['travel_id']. "</td></tr>";
echo "<tr><td>Travel Type</td><td>" . $row['travel_type']. "</td></tr>";
echo "<tr><td>Login ID</td><td>" . $row['login_id']. "</td></tr>";
echo "<tr><td>Numberof Ticket</td><td>" . $row['no_ticket']. "</td></tr>";
echo "<tr><td>Date</td><td>" . $row['date']. "</td>";

  }
echo "</table>";
echo "<form action='cancel.php' method=post>";
echo "<div align=right><input type=submit value=cancel ></form></div></table>";
echo "</td><td width=194 scope=col>&nbsp;</td></tr></table>";

}