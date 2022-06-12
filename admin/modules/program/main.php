<?php 
function saveProgram($conn){
	$program_name = inputSanitizer($_POST['program_name']);
	$department = inputSanitizer($_POST['department']);
	$program_status = inputSanitizer($_POST['program_status']);
	$credit = inputSanitizer($_POST['credit']);


	if(!empty($program_name)){
		if(!empty($credit)){
			if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM progarm WHERE program_name='$program_name'"))==0){
				if(mysqli_query($conn, "INSERT INTO progarm (program_name,total_credit,department_id,program_status) VALUES ('$program_name','$credit','$department','$program_status')")){
					return array('<span class="msg_succuss"> Progarm Saved!</span>', "success");
				}else{
					return array('<span class="msg_error"> Error! Please try again.</span>', "error");
				}
			}else{
				return array('<span class="msg_error"> Program name already in database.</span>', "error");
			}
		}else{
			return array('<span class="msg_error"> Enter credit.</span>', "error");
		}
	}else{
		return array('<span class="msg_error"> Enter program name.</span>', "error");
	}
}

function getAllPrograms($conn){
	$qry = mysqli_query($conn, "SELECT department.*,progarm.*,faculty.* FROM department,progarm,faculty WHERE department.d_id=progarm.department_id AND department.faculty_f_id=faculty.f_id");
    	return $qry;
}

?>