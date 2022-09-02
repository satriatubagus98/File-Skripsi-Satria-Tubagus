<?php
$conn = new mysqli('localhost', 'root', '', 'satriatu_multilogin');
if($conn->connect_error){
	die("Fatal Error: Can't connect to database: ". $conn->connect_error);
}
?>
<?php
$db_host  = 'localhost';
$db_user  = 'root';
$db_pass  = '';
$db_database = 'satriatu_multilogin'; 

$db = new PDO('mysql:host='.$db_host.';dbname='.$db_database, $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
