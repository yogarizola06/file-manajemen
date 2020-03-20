<?php
session_start();

if(isset($_GET['konfirmasi'])){
	$_SESSION['lokasi'] = $_GET['konfirmasi'];

	die(json_encode(array('hasil'=>'Sukses')));
}

if(isset($_GET['recent'])){
	
	if(!isset($_SESSION['recent'])){
		$_SESSION['recent']="";
		$_SESSION['recent']= $_GET['recent'];
	}else{
		if($_SESSION['recent']==""){
			$_SESSION['recent']= $_GET['recent'];
		}else{
			$_SESSION['recent']= $_GET['recent'].'@'.$_SESSION['recent'];
		}
	}
	
	

	die(json_encode(array('hasil'=>'Sukses')));
}

if(isset($_GET['hapusrecent'])){
	$_SESSION['recent']="";
	die(json_encode(array('hasil'=>'Sukses')));
}

if(isset($_GET['hapusfile'])){
	unlink($_GET['hapusfile']);
	die(json_encode(array('hasil'=>'Sukses')));
}

if(isset($_GET['editfile'])){
	
	if(!isset($_SESSION['recent'])){
		$_SESSION['recent']="";
		$_SESSION['recent']= $_GET['editfile'];
	}else{
		if($_SESSION['recent']==""){
			$_SESSION['recent']= $_GET['editfile'];
		}else{
			$_SESSION['recent']= $_GET['editfile'].'@'.$_SESSION['recent'];
		}
	}
	
	
	$isi = file_get_contents($_GET['editfile']);
	
	die(json_encode(array('hasil'=> htmlspecialchars($isi))));
}


?>
