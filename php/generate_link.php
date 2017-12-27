<?php  

$servername = "the_cake_is_a_lie";
$username = "the_cake_is_a_lie";
$password = "the_cake_is_a_lie";
$dbname = "the_cake_is_a_lie";
global $sid;
$sid = rand(1, 9999);
global $ip;
$ip = get_client_ip_env();
global $break;
$break ="";
global $conn; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("error 1");
}

$sql = "SELECT ip, sid FROM sec";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($row["ip"] == $ip){
        	echo $row["sid"];
        	$break ="1";
        	
        }
    }
    $conn->close();
} 
 if($break != "1"){
 	$conn = new mysqli($servername, $username, $password, $dbname);
 	$sql = "INSERT INTO sec (sid, ip) VALUES ('$sid', '$ip')";
	if ($conn->query($sql) === TRUE) {
    echo $sid;
	} else {
    echo "Error 9";
	}
 }











//ip
function get_client_ip_env() {
	$ipaddress = '';
	if (getenv('HTTP_CLIENT_IP'))
		$ipaddress = getenv('HTTP_CLIENT_IP');
	else if(getenv('HTTP_X_FORWARDED_FOR'))
		$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	else if(getenv('HTTP_X_FORWARDED'))
		$ipaddress = getenv('HTTP_X_FORWARDED');
	else if(getenv('HTTP_FORWARDED_FOR'))
		$ipaddress = getenv('HTTP_FORWARDED_FOR');
	else if(getenv('HTTP_FORWARDED'))
		$ipaddress = getenv('HTTP_FORWARDED');
	else if(getenv('REMOTE_ADDR'))
		$ipaddress = getenv('REMOTE_ADDR');
	else
		$ipaddress = 'UNKNOWN';

	return $ipaddress;
}

?>