<html>
<body>

<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

echo("MySQL - PHP Connect Test <br/>");
$hostname = "localhost";
$username = "cs20141592";
$password = "dbpass";
$dbname = "db20141592";

$connect = new mysqli($hostname, $username, $password)
	or die("DB Connection Failed");
$result = mysqli_select_db($connect, $dbname)
	or die("Cannot select DB");

if($connect){
	echo("MySQL Server Connect Success!");
}
else{
	echo("MySQL Server Connect Failed!");
}

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){

	$id = $_POST['id'];
	$pwd = $_POST['pwd'];

	$sql = "SELECT * FROM Users WHERE id ='$id' and pw = '$pwd'";
	$result = mysqli_query($connect, $sql);
	$count = mysqli_num_rows($result);
	
	if($count == 1)
	{
		$row = $result->fetch_assoc();
		$_SESSION['id'] = $id;
		$_SESSION['name'] = $row[name];
		$_SESSION['rvcnt'] = $row[rvcnt];
		echo "login success!";
		header("location: http://cspro.sogang.ac.kr/~cse20141592/welcome.php");
	}
	else
	{
		echo "login failed!";
		echo 'alert("The password is not matched!")';
		header("location: http://cspro.sogang.ac.kr/~cse20141497/test/index.html");	
	}
}

$connect->close();
?>

<?php


#$id = $pwd = "";

#if($_SERVER["REQUEST_METHOD"] == "POST")
#{#
#	$id = test_input($_POST["id"]):
#	$pwd = test_input($_POST["pwd"]);
#}

#function test_input($data)
#{
#	$data = trim($data);
#	$data = stripslashes($data);
#	$data = htmlspecialchars($data);
#)
#?>

<?php
#echo $id;
#echo $pwd;
?>


</body>
</html>

