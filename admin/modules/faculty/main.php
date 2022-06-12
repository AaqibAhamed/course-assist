<?php 
function saveFaculty($conn){
	$faculty_name = inputSanitizer($_POST['faculty_name']);
	$faculty_status = inputSanitizer($_POST['faculty_status']);

	if(!empty($faculty_name)){
		if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM faculty WHERE f_name='$faculty_name'"))==0){
			if(mysqli_query($conn, "INSERT INTO faculty (f_name,faculty_status) VALUES ('$faculty_name','$faculty_status')")){
				return array('<span class="msg_succuss"> Faculty Saved!</span>', "success");
			}else{
				return array('<span class="msg_error"> Error! Please try again.</span>', "error");
			}
		}else{
			return array('<span class="msg_error"> Faculty name already in database.</span>', "error");
		}
	}else{
		return array('<span class="msg_error"> Enter faculty name.</span>', "error");
	}
}

function getAllFaculties($conn){
	$qry = mysqli_query($conn, "SELECT * FROM faculty");
    	return $qry;
}

?>