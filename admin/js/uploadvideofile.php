<?php
/*$servername="localhost";
    $username="root";
    $password="";
    $dbname="studentdetail";

    $conn=new mysqli($servername,$username,$password,$dbname);

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }*/
    //written by samie naseem
    include 'conn.php';
    extract($_REQUEST);
    
    $tablename="classVideos";
    $checktable=mysqli_query($conn,"show tables like '$tablename'");
    $exist=mysqli_num_rows($checktable);

    if ($exist==0) {
        $sql = "CREATE TABLE $tablename (
    vid INT  AUTO_INCREMENT PRIMARY KEY,
    vname VARCHAR(255) NOT NULL,
    vofclass VARCHAR(255) NOT NULL,
    vsub VARCHAR(255) NOT NULL,
    vdesp VARCHAR(255),
    vdate DATE NOT NULL,
    vpath VARCHAR(255) NOT NULL
    )";
    $conn->query($sql);
    }


    $date=date('d/m/Y');    
    $targetdir="test_uploads/Class_$class/Video/";
    $fileName = $_FILES["file1"]["name"]; // The file name
    $target_file=$targetdir.basename($fileName);
    $fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
    $fileType = $_FILES["file1"]["type"]; // The type of file it is
    $fileSize = $_FILES["file1"]["size"]; // File size in bytes
    $fileErrorMsg = $_FILES["file1"]["error"];// 0 for false... and 1 for true

    $sql="insert into $tablename (vname,vofclass,vsub,vdesp,vdate,vpath) values('$fileName','$class','$sub','$desp',CURDATE(),'$target_file')";

    if (!$fileTmpLoc) { // if file not chosen
        echo "ERROR: Please browse for a file before clicking the upload button.";
        exit();
    }
    if(move_uploaded_file($fileTmpLoc, "$targetdir/$fileName")){
        mysqli_query($conn,$sql);
        echo "upload is complete";
    } else {
        echo "move_uploaded_file function failed";
    }
?>