<?php 
function saveDepartment($conn){
	$department_name = inputSanitizer($_POST['department_name']);
	$department_status = inputSanitizer($_POST['department_status']);
	$faculty = inputSanitizer($_POST['faculty']);

	if(!empty($department_name)){
		if(!empty($faculty)){
			if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM department WHERE d_name='$department_name'"))==0){
				if(mysqli_query($conn, "INSERT INTO department (d_name,faculty_f_id,d_status) VALUES ('$department_name','$faculty','$department_status')")){
					return array('<span class="msg_succuss"> Department Saved!</span>', "success");
				}else{
					return array('<span class="msg_error"> Error! Please try again.</span>', "error");
				}
			}else{
				return array('<span class="msg_error"> Department name already in database.</span>', "error");
			}
		}else{
			return array('<span class="msg_error"> Select faculty.</span>', "error");
		}	
	}else{
		return array('<span class="msg_error"> Enter department name.</span>', "error");
	}
}

function getAllDepartments($conn){
	$qry = mysqli_query($conn, "SELECT department.*,faculty.* FROM department,faculty WHERE department.faculty_f_id=faculty.f_id");
    	return $qry;
}

?>