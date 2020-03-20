<?php

//fungsi cek login
function login(){
	if(isset($_POST['btnLogin'])){
		$user = $_POST['username'];
		$pass = $_POST['password'];
		if(!is_array($user) && !is_array($pass)){
			$pass = md5($pass);			
			$dataLogin = tampil("SELECT * FROM staff WHERE username='$user'");
			if($dataLogin){
				foreach($dataLogin as $val){
				$passLogin = $dataLogin[0]['password'];
				$_SESSION['id_staff'] = $val['id_staff'];
				$_SESSION['nm_staff'] = $val['nm_staff'];
				if($pass == $passLogin){
					$_SESSION['username'] = $user;
					$_SESSION['LOGIN_AKTIF'] = 'AKTIF';
					return TRUE;
				}
				}
			}
		}
		return FALSE;
	}
}


?>