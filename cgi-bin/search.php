<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head><meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title> Search Keyword </title>
</head>

<body>
<section>
<header>
<h2><center> Travel Advisor <center></h2>
</header>
</section>

<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

#echo ("MySQL - PHP Connect Test <br/>");
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

if(isset($_GET['search']))
{
	$valueToSearch = $_GET['column_name'];
	$keyword = $_GET['textvalue'];	

	if($valueToSearch == "country"){
		$query = "SELECT * FROM Review WHERE place LIKE '%".$keyword."%'";
	}
	else{ 
		$query = "SELECT Users.id, Review.picfile, Review.place FROM Users, Review WHERE $valueToSearch LIKE '%".$keyword."%'"; 
	}
	$search_result = mysqli_query($connect,$query);
}
else{
	$query ="SELECT * FROM Users";
	$search_result= mysqli_query($connect,$query);
}

$x = $_GET['column_name'];

$count = 0;
$cnt = 0;
if($x == "id"){
	if($search_result){
		if($search_result->num_rows >0){
			while($row = $search_result->fetch_assoc()){
				$cnt = $cnt + 1;
				if($cnt%3 == 0){
			#		echo $row['picfile'];
					echo '<br><center><div>';
					echo '<a href = " '. "http://cspro.sogang.ac.kr/~cse20141592/read.php". '?fname='. $row['picfile'].'">';
					echo '<img src="http://cspro.sogang.ac.kr/~cse20141592/uploads/' . $row['picfile'] . '">';
					echo '</div><center>';
					echo $row['place'];
					echo '<br><br>';
				}		
			}
		}	
		else{
			echo "No Record to be displayed";
		}
	}
	else{
		echo "Database error!";
	}	
}

else if($x == "name"){
	if($search_result){
		if($search_result->num_rows >0){
			while($row = $search_result->fetch_assoc()){
				$count = $count + 1;
				if($count%6 == 0){
		#			echo $row['picfile'];
					echo '<br><center><div>';
					echo '<a href = " '. "http://cspro.sogang.ac.kr/~cse20141592/read.php". '?fname='. $row['picfile'].'">';
					echo '<img src="http://cspro.sogang.ac.kr/~cse20141592/uploads/' . $row['picfile'] . '">';
					echo '</div><center>';	
					echo $row['place'];
					echo '<br><br>';
				}
			}
		}	
		else{
			echo "No Record to be displayed";
		}
	}
	else{
		echo "Database error!";
	}
}


else if($x == "country"){
	if($search_result){
		if($search_result->num_rows >0){
			while($row = $search_result->fetch_assoc()){
				echo '<br><center><div>';
				echo '<a href = " '. "http://cspro.sogang.ac.kr/~cse20141592/read.php". '?fname='. $row['picfile'].'">';
				echo '<img src="http://cspro.sogang.ac.kr/~cse20141592/uploads/' . $row['picfile'] . '">';
				echo '</div><center>';
				echo $row['place'];
				echo '<br><br>';
			}
		}	
		else{
			echo "No Record to be displayed";
		}
	}
	else{
		echo "Database error!";
	}
}
?>


<?php
#if(!isset($_SESSION['id']))
#{
#	header("location: ../test/index.html");
#}
#echo "Login Success!";
#echo "<a href=logout.php> Logout </a>";

?>

</body>
</html>
