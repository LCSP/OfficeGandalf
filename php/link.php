<?php 
$servername = "the_cake_is_a_lie";
$username = "the_cake_is_a_lie";
$password = "the_cake_is_a_lie";
$dbname = "the_cake_is_a_lie";
global $sid;
$sid = $_POST['Sid'];
//$sid = mysql_real_escape_string($sid);


global $conn; 

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("error 1");
}

$sql = "SELECT sid FROM sec";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($row["sid"] == $sid){
        	echo "Conected";
        	
        }
    }
    $conn->close();
} 


?>