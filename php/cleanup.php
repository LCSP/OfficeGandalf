<?php  
$servername = "the_cake_is_a_lie";
$username = "the_cake_is_a_lie";
$password = "the_cake_is_a_lie";
$dbname = "the_cake_is_a_lie";
$ip = get_client_ip_env();


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("error 1");
}
$sql = "DELETE FROM sec WHERE ip='$ip'";

if ($conn->query($sql) === TRUE) {
	$conn->close();
	} 
	





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