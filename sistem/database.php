<?php
defined('FOLDER_INDEX') OR exit('Halaman Yang Anda Akses Tidak Ditemukan');

$db = new mysqli($localhost,$username,$password,$database);
if ($db->connect_error) {
	die("Connection failed: ".$db->connect_error);			 
}

//Fungsi untuk eksekusi query SQL
function query($sql){
	global $db;
	$query = $db->query($sql);

	if($query){
		return true;
	}
}

//fungsi untuk menampilkan data dari database
function tampil($sql){
	global $db;
	$result = $db->query($sql);
	if($result->num_rows > 0)
	{
		for($set = array (); $row = $result->fetch_assoc(); $set[] = $row);
		$hasil = $set;
		
		return $hasil;
	}else{
		return FALSE;
	}
}


?>