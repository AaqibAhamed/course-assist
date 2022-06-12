<?php 
	function session(){
		ob_start();
		if(!isset($_SESSION)){ session_start(); }  
	}
	function adminLogin($conn){
		$username =  filter_var($_POST['username'], FILTER_SANITIZE_EMAIL);
		$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

		$pwd = adminPwdGen($password);

		$check_user = mysqli_query($conn, "SELECT * FROM admin_users where user_email='$username' and user_status='1'");

		if(mysqli_num_rows($check_user)==1){
			if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM admin_users where user_email='$username'"))==1){
				if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM admin_users where user_email='$username' and user_password='$pwd'"))==1){
					$userinfo = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM admin_users where user_email='$username' and user_status='1' and user_password='$pwd'"));
						$_SESSION['admin_id'] = $userinfo['userid'];
						header("Location: administrator.php");

				}else{
					return "Incorrect password";
				}
			}else{
				return "User not found in database";
			}
			
		}else{
			return "Inactive User";
		}
	}

	function adminPwdGen($pwd){
		$pepper = c1isvFdxMDdmjOlvxpecFw;
		$password = hash_hmac("sha256", $pwd, $pepper);

		return $password;
	}

	function displayMessages($string, $type){
		if(!empty($string)){
			if($type =="success"){
				$msg = '
				<div class="alert alert-success">
				  '.$string.'.
				</div>
				';
			}else if($type =="info"){
				$msg = '
					<div class="alert alert-info">
					  '.$string.'.
					</div>
				';
			}else if($type =="warning"){
				$msg = '
					<div class="alert alert-warning">
					  '.$string.'.
					</div>
				';
			}else{
				$msg ='
					<div class="alert alert-danger">
					  '.$string.'.
					</div>
				';
			}
		}
		return $msg;
	}

	function emailSanitizer($value){
		return filter_var($value, FILTER_SANITIZE_EMAIL);
	}
	
	function numberSanitizer($value){
		return filter_var($value, FILTER_SANITIZE_NUMBER_INT);
	}
	
	function inputSanitizer($value){
		return filter_var($value, FILTER_SANITIZE_STRING);
	}
	
	function urlSanitizer($value){
		return filter_var($value, FILTER_SANITIZE_URL);
	}
	
?>