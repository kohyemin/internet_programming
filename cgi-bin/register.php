<html>
<body>

<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

#echo("MySQL - PHP Connect Test <br/>");
$hostname = "localhost";
$username = "cs20141592";
$password = "dbpass";
$dbname = "db20141592";

$connect = new mysqli($hostname, $username, $password)
	or die("DB Connection Failed");
$result = mysqli_select_db($connect, $dbname)
	or die("Cannot select DB");

if($connect){
#	echo("MySQL Server Connect Success!");
}
else{
	echo("MySQL Server Connect Failed!");
}


$id = $_GET['id'];
$pwd = $_GET['pwd'];
$name = $_GET['name'];
$email = $_GET['email'];

$sql = "INSERT INTO Users(id, name, pw, email)
 VALUES('$id', '$name', '$pwd', '$email')";

$result = mysqli_query($connect, $sql);
#echo $result;
if(!$result){
	echo "Could not successfully run query ($sql) from DB:". mysqli_error($connect);
#	exit;
	header("location: http://cspro.sogang.ac.kr/~cse20141497/test/join.html");

}

header("location: http://cspro.sogang.ac.kr/~cse20141497/test/index.html");

$connect->close();
?>

<?php

$id = $name = $email = $pwd = "";

if($_SERVER["REQUEST_METHOD"] == "GET"){
	$id = test_input($_GET["id"]);
	$name = test_input($_GET["name"]);
	$email = test_input($_GET["email"]);
	$pwd = test_input($_GET["pwd"]);
}

function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>

<!-- checkinggggggggggggggggggggggg--!>
<?php
#echo $id;
#echo $name;
#echo $email;
?>
</body>
</html>

