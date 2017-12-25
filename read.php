<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>READ</title>
<style>
td { font-size : 9pt; }
A:link { font : 9pt; color : black; text-decoration : none; 
font-family : arial; font-size : 9pt; }
A:visited { text-decoration : none; color : black; font-size : 9pt; }
A:hover { text-decoration : underline; color : black; 
font-size : 9pt; }
</style>
</head>

<body>
<?php 
session_start();
?>

<?php
error_reporting(E_ALL);
ini_set("display_errors",1);

$hostname = "localhost";
$username = "cs20141592";
$password = "dbpass";
$dbname = "db20141592";

$connect = new mysqli($hostname,$username,$password) or die ("DB Connection Failed");
$result = mysqli_select_db($connect,$dbname) or die("Cannot Select DB");

if(!$connect){
        echo("MySQL Server connect Failed");
}

$fname = $_GET["fname"];
$getreview = "SELECT * from Review WHERE picfile = '$fname';";
$search_result = mysqli_query($connect,$getreview);

if($search_result){
    if($search_result->num_rows >0){
        while($row = $search_result->fetch_assoc()){
            $wid = $row['wid'];
            $writer = $row['writer'];
            $place = $row['place'];
            $title = $row['title'];
            $content = $row['content'];
            $wdate = $row['wdate'];
        }
    }
    else{
        echo "No Record to be displayed";
    }
}
else{
    echo "Database error";
}

echo '<br>';
echo '<img src = "http://cspro.sogang.ac.kr/~cse20141592/uploads/'.$fname.'">';

echo '<table width=580 border=0 cellpadding=2 cellspacing=1 bgcolor=#777777>';
echo '<tr>';
echo '<td height=20 align=center bgcolor=#999999>';
echo "<font color=white><B>Selected Review</B></font>";
echo '</td>';
echo '</tr>';
echo '<tr>';
echo '<td color=white>&nbsp;';
echo '<table>';

/*
echo '<tr>';
echo '<td align=left >'
echo '<img src = "http://cspro.sogang.ac.kr/~cse20141592/uploads/'.$fname.'">';
echo '</td>';
echo '</tr>';
*/

echo '<tr>';
echo '<td width=60 align=left > Writer </td>';
echo '<td align=left >'.$writer.' ('.$wid.')       '.$wdate;
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<td width=60 align=left > Place </td>';
echo '<td align=left >'.$place;
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<td width=60 align=left > Title </td>';
echo '<td align=left >'.$title;
echo '</td>';
echo '</tr>';
/*
echo '<tr>';
echo '<td width=60 align=left > Written on </td>';
echo '<td align=left >'.$wdate;
echo '</td>';
echo '</tr>';
*/
echo '<tr>';
echo '<td width=60 align=left > Content </td>';
echo '<td align=left >'.$content;
echo '</td>';
echo '</tr>';

echo '</table>';
echo '</td>';
echo '</tr>';
echo '</table>';

?>

</body>
</html>
