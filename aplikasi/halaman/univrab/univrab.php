<?php
fungsi('admin');

function index(){
	tampilan('univrab/beranda');
}

function file_manager(){
	tampilan('univrab/filemnjr');
}

function departemen(){
	tampilan('univrab/departemen');
}

function staff(){
	tampilan('univrab/staff');
}

function coba(){
	tampilan('univrab/index');
}


function keluar(){
	$log = $_SESSION['SubFolder'];
	session_destroy();
	header('location:'.URL.'/index.php/login');
}


?>