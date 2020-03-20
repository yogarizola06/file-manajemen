<?php

//Mulai Session
session_start();

//Tampilkan Error Jika Source Code PHP Mengalami Error
error_reporting(E_ALL & ~E_NOTICE);

//Atur Waktu Ke Indonesia Bagian Barat (WIB)
date_default_timezone_set('Asia/Jakarta');

//Mendefenisikan Folder Utama
define('FOLDER_INDEX',__DIR__);

//Mendefenisikan Url
$url = $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
$url = explode('/index.php/',$url);
$url = explode('/index.php',$url[0]);
define('URL','http://'.$url[0]);

//panggil file sistem
require_once FOLDER_INDEX.'/sistem/sistem.php';


?>