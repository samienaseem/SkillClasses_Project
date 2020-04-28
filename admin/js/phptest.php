<?php
include "conn.php";
$tablename="mcq_questions";
$class='9';
$stream='pcb';

$sql="select test_name from $tablename WHERE mcq_class='11' AND mcq_stream='pcm' GROUP BY test_name";
$lits=mysqli_query($conn,$sql);
$final=mysqli_num_rows($lits);
echo "$final";

if ($lits->num_rows > 0) {



	//echo '$rows["test_name"]';

	while ($rows=$lits->fetch_assoc()) {


		echo $rows['test_name']."<br>"/*.$rows['mcq_stream']."<br>"*/;
		# code...
	}
	# code...
}

  ?>