<?php  
$servername = "the_cake_is_a_lie";
$username = "the_cake_is_a_lie";
$password = "the_cake_is_a_lie";
$dbname = "the_cake_is_a_lie";
global $sid;
global $state;
$sid = $_POST['Sid']; 
$state = $_POST['1'];
//$sid = mysql_real_escape_string($sid);

global $conn; 

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("error 1");
}
$sql = "UPDATE sec SET isplaying = 2 WHERE sid='$sid'";

if ($conn->query($sql) === TRUE) {
    echo sid;
	} else {
    echo "error 9";
	}
	$conn->close();

?>