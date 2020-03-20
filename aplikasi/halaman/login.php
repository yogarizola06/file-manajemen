<?php
defined('FOLDER_INDEX') OR exit('Halaman Yang Anda Akses Tidak Ditemukan');

//panggil fungsi login
require_once FOLDER_INDEX.'/aplikasi/fungsi/login.php';

function index(){
	univrab();
}

//halaman login mahasiswa
function univrab(){
	if(isset($_POST['btnLogin'])){
		$login = login();
		if($login){
			$_SESSION['SubFolder'] = 'univrab';
			header('location:'.URL.'/index.php/beranda');
		}
		$error = 1;
	}
	
	if(!isset($_SESSION['LOGIN_AKTIF'])){
		tampilan('login/login');
		$error = 0;
	}else{
		header('location:'.URL.'/index.php/'.$_SESSION['SubFolder']);
	}
	
}






?>