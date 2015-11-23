<?php include 'header.html';
$user='root';
$pass='';
$db='travel';
$con=mysql_connect('localhost',$user,$pass);
$taxi_id=rand(1,1000);
$from=$_POST['from'];
$amount=0;
$to =$_POST['to'];
$type =$_POST['type'];
$distance=$_POST['distance'];
$words = strnatcmp($type,'ac');
echo "<table  border=0>";
echo "<tr> <td width=194 >&nbsp;</td> <td width=928 >";
if($words)
{
$amount=$distance*19;
}
else
{
$amount=$distance*25;
}
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
else
{

$sql="INSERT INTO `taxireserve`(`taxi_id`, `from`, `to`, `type`, `amount`) VALUES ('$taxi_id','$from','$to','$type','$amount')";
mysql_select_db($db,$con);
$result=mysql_query($sql,$con);
if(! $result)
{
  die('Could not enter data: ' . mysql_error());
}
echo "<h1><center>Registration details</center></h1><hr>";
echo "<table width=100% border=1>";
echo "<tr><td>Taxi Hire Number</td><td>" . $taxi_id . "</td></tr>";
echo "<tr><td>From</td><td>" . $from . "</td></tr>";
echo "<tr><td>To</td><td>" . $to . "</td></tr>";
echo "<tr><td>Type</td><td>" . $type . "</td></tr>";
echo "<tr><td>Amount</td><td>" . $amount . "</td></tr>";

echo "</table>";
echo "<form name=submit>";
echo "<center><a href=login.html ><input type=button value=OK></a></center></form>";
}
echo "</td><td width=194 scope=col>&nbsp;</td></tr></table>";
?>