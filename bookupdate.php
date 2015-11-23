<?php
session_start();
$user='root';
$pass='';
$db='travel';
$con=mysql_connect('localhost',$user,$pass);
$login=$_SESSION['login'];
$ticket=$_POST['no_ticket'];
$date=$_SESSION['date'];
$ava=$_SESSION['avilable'];
echo "<table  border=0>";
echo "<tr> <td width=194 >&nbsp;</td> <td width=928 >";
if(isset($_SESSION['train_id']))
{
$t_id=$_SESSION['train_id'];

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
else
{
$ticket_no=rand(1,100000);
$sql=" INSERT INTO `reservation`(`ticket_no`, `travel_id`, `login_id`, `no_ticket`, `travel_type`, `date`) VALUES ('$ticket_no','$t_id','$login','$ticket','Train','$date') ";
mysql_select_db($db,$con);
$result=mysql_query($sql,$con);
if(! $result)
{
  die('Could not enter data: ' . mysql_error());
}
$newava=$ava-$ticket;
$sql1="UPDATE `train` SET `avilable`=$newava WHERE train_id=$t_id";
$result=mysql_query($sql1,$con);

}
echo "<center><h2>Thank you for booking ticket online</h2></center><br><h3>your booking details are</h3><br>";
echo "<table width=70% border=0>";
echo "<tr><td> Ticket Number </td> <td>" . $ticket_no . "</td></tr>";
echo "<tr><td> Train Number </td> <td>" . $t_id . "</td></tr>";
echo "<tr><td> Train Name </td> <td>" . $_SESSION['train_name']. "</td></tr>";
echo "</table>";
unset($_SESSION['train_id']);

}
if(isset($_SESSION['bus_id']))
{
$t_id=$_SESSION['bus_id'];

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
else
{
$ticket_no=rand(1,100000);
$sql=" INSERT INTO `reservation`(`ticket_no`, `travel_id`, `login_id`, `no_ticket`, `travel_type`, `date`) VALUES ('$ticket_no','$t_id','$login','$ticket','Bus','$date') ";
mysql_select_db($db,$con);
$result=mysql_query($sql,$con);
if(! $result)
{
  die('Could not enter data: ' . mysql_error());
}
$newava=$ava-$ticket;
$sql1="UPDATE `bus` SET `avilable`=$newava WHERE bus_id=$t_id";
$result=mysql_query($sql1,$con);

}
echo "<center><h2>Thank you for booking ticket online</h2></center><br><h3>your booking details are</h3><br>";
echo "<table width=70% border=0>";
echo "<tr><td> Ticket Number </td> <td>" . $ticket_no . "</td></tr>";
echo "<tr><td> Train Number </td> <td>" . $t_id . "</td></tr>";
echo "<tr><td> Train Name </td> <td>" . $_SESSION['bus_name']. "</td></tr>";
echo "</table>";
unset($_SESSION['bus_id']);

}
if(isset($_SESSION['flight_id']))
{
$t_id=$_SESSION['flight_id'];

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
else
{
$ticket_no=rand(1,100000);
$sql=" INSERT INTO `reservation`(`ticket_no`, `travel_id`, `login_id`, `no_ticket`, `travel_type`, `date`) VALUES ('$ticket_no','$t_id','$login','$ticket','Flight','$date') ";
mysql_select_db($db,$con);
$result=mysql_query($sql,$con);
if(! $result)
{
  die('Could not enter data: ' . mysql_error());
}
$newava=$ava-$ticket;
$sql1="UPDATE `flight` SET `avilable`=$newava WHERE train_id=$t_id";
$result=mysql_query($sql1,$con);

}
echo "<center><h2>Thank you for booking ticket online</h2></center><br><h3>your booking details are</h3><br>";
echo "<table width=70% border=0>";
echo "<tr><td> Ticket Number </td> <td>" . $ticket_no . "</td></tr>";
echo "<tr><td> Train Number </td> <td>" . $t_id . "</td></tr>";
echo "<tr><td> Train Name </td> <td>" . $_SESSION['flight_name']. "</td></tr>";
echo "</table>";
unset($_SESSION['flight_id']);

}


echo "</td><td width=194 scope=col>&nbsp;</td></tr></table>";
?>