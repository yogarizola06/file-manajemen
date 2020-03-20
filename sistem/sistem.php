<?php
defined('FOLDER_INDEX') OR exit('Halaman Yang Anda Akses Tidak Ditemukan');


//ambil url/link halaman yang diakses sekarang
$ambilUrl = trim($_SERVER['REQUEST_URI']);
$pisahkanUrl = explode('index.php/',$ambilUrl);
$url_bagian = explode('/',$pisahkanUrl[1]); //Array

//Panggil File Config
require_once 'config.php';

//Panggil File Database
require_once 'database.php';

//panggil file fungsi_sistem.php
require_once "fungsi_sistem.php";

/*
	- Lokasi (aplikasi/halaman/)
	- aktifkan penggunaan subfolder di FOLDER halaman => (aplikasi/halaman/'sub folder'/$file.php)
*/
$halaman = "";
if(isset($_SESSION['SubFolder'])){
	$halaman = $_SESSION['SubFolder'].'/';	
}

/*
	- Lokasi File (aplikasi/halaman/)
	- cek apakah user mengakses halaman tertentu
	- jika user mengakses halaman tertentu, maka code php untuk mengecek halaman tersebut diaktifkan
	- jika tidak arahkan ke halaman awal / $halamanUtama
*/
if($ambilUrl != $pisahkanUrl){
	if(count($url_bagian) > 0){
		$pilihHalaman = 1; //aktif
	}else{
		$pilihHalaman = 0; //tidak aktif
	}
}else{
	$pilihHalaman = 0; //tidak aktif
}

if($pilihHalaman==1){
	if(isset($url_bagian[0])){
		if($url_bagian[0] != null){
			if(file_exists(FOLDER_INDEX.'/aplikasi/halaman/'.$url_bagian[0].'.php')){
				require_once FOLDER_INDEX.'/aplikasi/halaman/'.$url_bagian[0].'.php';
				if(isset($url_bagian[1])){
					if(function_exists($url_bagian[1])){
						$url_bagian[1]();
					}else{
						if($url_bagian[1] == null){
							index();
						}else{
							require_once FOLDER_INDEX.'/aplikasi/tampilan/'.$halamanError.'.php';
						}
					}
				}else{
					index();
				}
				
			}elseif(file_exists(FOLDER_INDEX.'/aplikasi/halaman/'.$halaman.$url_bagian[0].'.php')){
				require_once FOLDER_INDEX.'/aplikasi/halaman/'.$halaman.$url_bagian[0].'.php';
				if(isset($url_bagian[1])){
					if(function_exists($url_bagian[1])){
						$url_bagian[1]();
					}else{
						if($url_bagian[1] == null){
							index();
						}else{
							require_once FOLDER_INDEX.'/aplikasi/tampilan/'.$halamanError.'.php';
						}
					}
				}else{
					index();
				}		
			}else{
				require_once FOLDER_INDEX.'/aplikasi/tampilan/'.$halamanError.'.php';
			}
		}else{
			require_once FOLDER_INDEX.'/aplikasi/halaman/'.$halamanUtama.'.php';
			index();
		}
		
	}else{
		require_once FOLDER_INDEX.'/aplikasi/halaman/'.$halamanUtama.'.php';
		index();
	}
}else{
	require_once FOLDER_INDEX.'/aplikasi/halaman/'.$halamanUtama.'.php';
	index();
}



?>