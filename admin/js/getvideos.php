<?php

include 'conn.php';

extract($_REQUEST);
$sql="select * from classvideos where vofclass=?";
$stmt=$conn->prepare($sql);
$stmt->bind_param("s",$class);

if ($class<11) {
	

	if (isset($sub)) {
		
		$sql="select * from classvideos where vofclass=? AND vsub=?";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param("ss",$class,$sub);	
	}
}
else{

	if ($stream=="pcb") {
		$sql="select * from classvideos where vofclass=? AND NOT vsub='maths'";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param("s",$class);

		if (isset($sub)) {
			$stmt=Appendsubject($conn);
			$stmt->bind_param("ss",$class,$sub);
		}


	}
	else if ($stream=="pcm") {

		$sql="select * from classvideos where vofclass=? AND NOT (vsub='biology' OR vsub='bio')";
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
	$sql="select * from classvideos where vofclass=? AND vsub=?";
		$stmt=$conn->prepare($sql);
		//$stmt->bind_param("ss",$class,$sub);
		return $stmt;



}


$stmt->execute();
$result=$stmt->get_result();

if ($result->num_rows>0) {

while ($row=$result->fetch_assoc()) {
	echo "<div class='col-lg-3 col-xs-6 boxing'>";
	echo "<div class='main_video'>";

		echo "<div class='video_src'>";
			echo '<video src="js/'.$row["vpath"].'" width="200" height="200" controls type="video/mp4" />';
		echo "</div>";


		echo "<div class='video_name'>";
			echo "<h4>".$row["vname"]."</h4>";
		echo "</div>";


		echo "<hr class='design'>";


		echo "<div class='video_class'>";
			echo "<h5> Class ".$row["vofclass"]."</h5>";
		echo "</div>";


		echo "<hr class='design'>";


		echo "<div class='video_sub'>";
			echo "<h5>".$row["vsub"]."</h5>";
		echo "</div>";


		echo "<hr class='design'>";


		echo "<div class='video_date'>";
			echo "<h5>".$row["vdate"]."</h5>";
		echo "</div>";


		echo "<hr class='design'>";


		echo "<div class='button'>";
			echo "<button class='btn btn-primary edit' name='submit_btn' onclick='clickfunction(".$row["vid"].")'>Edit</button>";
			echo "<button class='btn btn-danger submit' name='cancel_btn'>Delete</button>";
		echo "</div>";


	echo "</div>";

	echo "</div>";
	 /*echo "<tr>";
    echo "<td>" . $row['vid'] . "</td>";
    echo "<td>" . $row['vname'] . "</td>";
    echo "<td>" . $row['vofclass'] . "</td>";
    echo "<td>" . $row['vsub'] . "</td>";
    echo "<td>" . $row['vdate'] . "</td>";
    echo "</tr>";*/



	# code...
	}
}
else{
	echo "<div class='col-lg-12 col-xs-12 not-found'>No Data Available</div>";
}
/*echo "</table>";*/

	//echo "$class";

 ?>