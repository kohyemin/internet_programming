<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title> Main </title>

<style type="text/css">
@import url('http://fonts.googleapis.com/earlyaccess/notosanskr.css');
a:link{ text-decoration : none; color : black;}
a:visited{ text-decoration : none; color : black;}
a:hover{ text-decoration : none; color : black;}
body{ margin : 0; padding :0;}

.title{
    text-align: center;
    margin : 50px auto;
    font-size : 28px;
}
.container{
    margin: 0 auto;
    padding: 10px;
    width: 1200px;
    font-family: 'Noto Sans KR', sans-serif;
}
article{
    display:flex;
    flex-direction:row;
}
.item{
    display:block;
    width: 210px;
    padding : 0 20px;
}
.item img{
    width: 210px;
}
.item h1{
    text-align : center;
    padding: 20px 0;
    font-size:14px;
}
.item p{
    text-align : center;
}
</style>

<body onload=test2()>
<section>
<header>
<h2><center> Travel Advisor <center></h2>
</header>
</section>

<div><center>
<form action="http://cspro.sogang.ac.kr/~cse20141592/fileup.php" method="post">
<input type="submit" name="write" id="write" value="Create new review">
<input type="button" name="search" id="search" value="Search keyword" onclick="top.location.href='http://cspro.sogang.ac.kr/~cse20141497/test/search.html'">
</form><center>
</div>


<?php
$sid = $_SESSION['id'];
?>

<?php
$dir = "uploads/";
$handle = opendir($dir);
$files = array();

while(false !== ($filename = readdir($handle))){
    if($filename=="." || $filename == ".."){
        continue;
    }

    if(is_file($dir."/".$filename)){
        $files[] = $filename;
    }
}

closedir($handle);

$url = "read.php";

echo '<div style="background-color: white; height: 20px; width: 100%; margin: 0px; padding : 0 0;"><ul></ul></div>';
echo '<center>';
foreach($files as $f){
    echo '<br>';
    echo '<a href =" ' .$url. '?fname='.$f.'">';
    echo "<div class=\"item\">";
    echo '<img src= "http://cspro.sogang.ac.kr/~cse20141592/uploads/' .$f. '">';
    echo "</div>";
    echo "</a>";
}
echo '<center>';
?>
</body>
</html>
