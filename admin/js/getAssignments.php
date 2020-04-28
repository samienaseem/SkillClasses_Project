<?php

include 'conn.php';
extract($_REQUEST);
$tablename="classassignments";
$sql="select * from classassignments where aofclass=?";
$stmt=$conn->prepare($sql);
$stmt->bind_param("s",$class);

if ($class<11) {
	

	if (isset($sub)) {
		
		$sql="select * from $tablename where aofclass=? AND asub=?";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param("ss",$class,$sub);	
	}
}
else{

	if ($stream=="pcb") {
		$sql="select * from $tablename where aofclass=? AND NOT asub='maths'";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param("s",$class);

		if (isset($sub)) {
			$stmt=Appendsubject($conn);
			$stmt->bind_param("ss",$class,$sub);
		}


	}
	else if ($stream=="pcm") {

		$sql="select * from $tablename where aofclass=? AND NOT (asub='biology' OR asub='bio')";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param("s",$class);

		if (isset($sub)) {
			$stmt=Appendsubject($conn);
			$stmt->bind_param("ss",$class,$sub);
		}
		
	}

	else{

		if (isset($sub)) {
			$stmt=Appendsubject($conn);
			$stmt->bind_param("ss",$class,$sub);
		}
	}


}

 function Appendsubject($conn)
{
	$sql="select * from $tablename where aofclass=? AND asub=?";
		$stmt=$conn->prepare($sql);
		//$stmt->bind_param("ss",$class,$sub);
		return $stmt;



}


$stmt->execute();
$result=$stmt->get_result();
if ($result->num_rows>0) {


echo "<div class='col-lg-12 col-xs-12'>";
echo "<table class=table>
<thead>
	<tr>
	<th>ID</th>
	<th>Assignment name</th>
	<th>Class</th>
	<th>Subject</th>
	<th>Date</th>
	</tr>
</thead> 
<tbody>";

while ($row=$result->fetch_assoc()) {
	
	 echo "<tr>";
    echo "<td>" . $row['aid'] . "</td>";
    echo "<td> <a href='js/".$row['apath']."' target='_blank'>". $row['aname']."</a></td>";
    echo "<td>" . $row['aofclass'] . "</td>";
    echo "<td>" . $row['asub'] . "</td>";
    echo "<td>" . $row['adate'] . "</td>";
    echo "</tr>";
	
}
 echo "</tbody>";
echo "</table>";
echo "</div>";

}
else {
	echo "<div class='col-lg-12 col-xs-12 not-found'>No Data Available</div>";

	}

 ?>
