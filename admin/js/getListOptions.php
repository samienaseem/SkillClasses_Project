<?php
include "conn.php";
$tablename="mcq_questions";

extract($_REQUEST);
$sql="select test_name from $tablename WHERE mcq_class=$class GROUP BY test_name";

if (isset($stream)) {
$sql="select test_name from $tablename WHERE mcq_class='$class' AND mcq_stream='$stream' GROUP BY test_name";
}

$lists=mysqli_query($conn,$sql);

if ($lists->num_rows > 0) {

	$a="<option>Select</option>";

	while ($rows=$lists->fetch_assoc()) {

		$a.="<option value=".$rows['test_name'].">".$rows['test_name']."</option>";

	}

	echo $a;

}
else
{
	echo "<option>No existing Test Paper exist</option>";
}


  ?>