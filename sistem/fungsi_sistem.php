<?php
defined('FOLDER_INDEX') OR exit('Halaman Yang Anda Akses Tidak Ditemukan');

//panggil file yang ada di folder tampilan
function tampilan($file,$var = null){
	global $halamanError;
	if(file_exists(FOLDER_INDEX."/aplikasi/tampilan/$file.php")){
		
		if(isset($var)){
			if(is_array($var)){
				foreach($var as $key => $value){
					$$key = $value;
				}
			}
		}
		
		require_once FOLDER_INDEX."/aplikasi/tampilan/$file.php";
	}else{	
		require_once FOLDER_INDEX.'/aplikasi/tampilan/'.$halamanError.'.php';
	}
}

//panggil file yang ada di folder fungsi
function fungsi($file){
	global $halamanError;
	if(file_exists(FOLDER_INDEX."/aplikasi/fungsi/$file.php")){
		require_once FOLDER_INDEX."/aplikasi/fungsi/$file.php";
	}else{	
		echo "<h4>Fungsi Yang Anda Panggil Tidak Ditemukan!</h4>";
	}
}

?>