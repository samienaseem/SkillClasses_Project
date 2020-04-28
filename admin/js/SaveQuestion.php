<?php

include 'conn.php';

extract($_REQUEST);
$tablename="mcq_questions";
$checktable=mysqli_query($conn,"show tables like '$tablename'");
$exist=mysqli_num_rows($checktable);

$res=array('inserted','inserted2');

if ($exist==0) {

	$sql="CREATE TABLE $tablename (
    mcq_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    test_name VARCHAR(50) NOT NULL,
    mcq_class VARCHAR(50) NOT NULL,
    mcq_stream VARCHAR(50),
    mcq_desp VARCHAR(255),
    mcq_ques VARCHAR(255) NOT NULL,
    option1 VARCHAR(255) NOT NULL,
    option2 VARCHAR(255) NOT NULL,
    option3 VARCHAR(255) NOT NULL,
    option4 VARCHAR(255) NOT NULL,
    c_ans VARCHAR(10) NOT NULL
    )";

    $conn->query($sql);
}
	$paperlist="select test_name from $tablename WHERE mcq_class='$class' GROUP BY test_name";
	$query="insert into $tablename(test_name, mcq_class, mcq_desp, mcq_ques, option1, option2, option3, option4, c_ans) values (?,?,?,?,?,?,?,?,?)";
	$stmt=$conn->prepare($query);
	$stmt->bind_param("sssssssss",$papername,$class,$desp,$ques,$op1,$op2,$op3,$op4,$ans);

if (isset($stream)) {
	$paperlist="select test_name from $tablename WHERE mcq_class='$class' AND mcq_stream='$stream' GROUP BY test_name";
	$query="insert into $tablename(test_name,mcq_class, mcq_stream, mcq_desp, mcq_ques, option1, option2, option3, option4, c_ans) values (?,?,?,?,?,?,?,?,?,?)";
	$stmt=$conn->prepare($query);
	$stmt->bind_param("ssssssssss",$papername,$class,$stream,$desp,$ques,$op1,$op2,$op3,$op4,$ans);
	
	}

	$stmt->execute();
	 $ab=mysqli_query($conn,"Select * from $tablename where mcq_class='$class'");
	 $paperlist=mysqli_query($conn,$paperlist);
	 
	 $getlist=mysqli_num_rows($paperlist);
	 $count=mysqli_num_rows($ab);

	 $res[2]=$count;
	 $res[3]="";
	 $ac="";


	 //$res[3]="<option value='samie'>samie</><option value='samie1'>samie1</>";
	 //$res[3]=$getlist;

	 if ($paperlist->num_rows > 0) {

	 	$ac="<option value='none'>None</>";

	while ($rows=$paperlist->fetch_assoc()) {

		//echo $rows['test_name']."<br>";
		$ac.="<option value=".$rows['test_name'].">".$rows['test_name']."</option>";
		



		# code...
	}
	$res[3]=$ac;
	
	# code...
}



	echo json_encode($res);




  ?>