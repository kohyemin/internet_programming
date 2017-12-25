<html>
<body>
<?php
session_start();
?>
<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imgOk =0;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $imgOk=1;
        header("location: http://cspro.sogang.ac.kr/~cse20141592/welcome.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
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

if($connect){
    echo("MySQL Server connect success!");
}
else{
    echo("MySQL Server connect Failed");
}

$content = $_POST["content"];
$title = $_POST["title"];
$place = $_POST["place"];
$time = date("Y-m-d h:i:s",time());
$wid = $_SESSION["id"];
$writer = $_SESSION["name"];
$rvnum = $_SESSION["rvcnt"];
$rvnum = $rvnum +1;
$picfile = $_FILES["fileToUpload"]["name"];


$sql = "INSERT INTO Review(wid,place,title,content,wdate,writer,rvnum,picfile) VALUES ('$wid','$place','$title','$content','$time','$writer','$rvnum','$picfile');";


if(isset($_POST["submit"]) && $imgOk==1){
    $result = mysqli_query($connect,$sql);
    if(!$result){
        echo "query error";
        exit;
    }
    else{
        $sql = "UPDATE Users set rvcnt='$rvnum' where id = '$wid';";
        $result = mysqli_query($connect,$sql);
        if(!$result){
            echo "rvcnt error";
            exit;
        }
    }
}
$connect->close();

?>

</body>
</html>

