<?php
/*$servername="localhost";
	$username="root";
	$password="";
	$dbname="demovideo";

	$conn=new mysqli($servername,$username,$password,$dbname);

	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }*/
    include 'conn.php';

  /*  $sub=$_REQUEST['sub'];
    echo "'$sub' okie";*/

    extract($_REQUEST);
    

$date=date('d/m/Y');    
$targetdir="test_uploads/";
$fileName = $_FILES["file1"]["name"]; // The file name
$target_file=$targetdir.basename($fileName);
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file1"]["type"]; // The type of file it is
$fileSize = $_FILES["file1"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["file1"]["error"];// 0 for false... and 1 for true

$sql="insert into demovideo(videoname) values('$target_file')";

if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
}
if(move_uploaded_file($fileTmpLoc, "test_uploads/$fileName")){
	mysqli_query($conn,$sql);
    echo "upload is complete";
} else {
    echo "move_uploaded_file function failed";
}
?>