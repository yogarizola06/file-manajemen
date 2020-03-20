<?php

/*
Naklika Adalah Aplikasi Framework Untuk PHP.
	* @package		Naklika
	* @author		Firman Wazir
	* @email		firmanwazir@gmail.com
	* @copyright	Copyright (c) 2018 - 2019, Mari Ngoding
	* @since		Version 3.0.0
*/
date_default_timezone_set('Asia/Jakarta');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ( ! function_exists('filemanager'))
{

	function filemanager($folderutama = null){
		if(!isset($folderutama)){
			$folderutama = FOLDER_INDEX;
		}
		
		$_SESSION['fm_folderutama'] = $folderutama;
		
		if(isset($_SESSION['fm_foldersekarang'])){
			if(is_dir($_SESSION['fm_foldersekarang'])){
				$foldersekarang = $_SESSION['fm_foldersekarang'];
			}else{
				$foldersekarang = $folderutama;
			}
		}else{
			$foldersekarang = $folderutama;
		}
		
		$lokasifile = str_replace($folderutama,'',$foldersekarang);
		$linkfile = dirname(URL).'/';
		$linkfile  = $linkfile.basename(URL).$lokasifile;
		
		$_SESSION['fm_btnundo'] = 1;
		
		if($_SESSION['fm_folderutama'] != $foldersekarang){
			$namafolder = $foldersekarang.'xxx';
			$namafolder1 = basename($foldersekarang);

			$foldersebelumnnya = str_replace('/'.$namafolder1.'xxx','',$namafolder);
			$_SESSION['fm_btnundo'] = 1;
		}else{

			$foldersebelumnnya = $_SESSION['fm_folderutama'];
			$_SESSION['fm_btnundo'] = 0;
		}
		
		$_SESSION['fm_foldersebelumnnya'] = $foldersebelumnnya;
		
		$scanfolder = array_diff(scandir($foldersekarang), array('..', '.'));
		
		$hasilscan="";$no=0;
		foreach($scanfolder as $val){	
			if(is_file($foldersekarang.'/'.$val)){

				$link = str_replace($folderutama,'',$foldersekarang.'/'.$val);
				$link = $linkfile.'/'.$val;
				$link = str_replace('//','/',$link);
				$link = str_replace(':/','://',$link);
				$ext = pathinfo($foldersekarang.'/'.$val, PATHINFO_EXTENSION);
				
				$hasilscan[$no]['nama'] = $val;
				$hasilscan[$no]['tipe'] = 'file';
				$hasilscan[$no]['link'] = $link;
				$hasilscan[$no]['lokasi'] = $foldersekarang.'/'.$val;				
				$hasilscan[$no]['ext'] =$ext;
				
				$no++;
			}
			
			if(is_dir($foldersekarang.'/'.$val)){
				$hasilscan[$no]['fs'] = $foldersebelumnnya;
				$hasilscan[$no]['nama'] = $val;
				$hasilscan[$no]['tipe'] = 'folder';
				$hasilscan[$no]['link'] = $foldersekarang.'/'.$val;
				$no++;
			}
			
		}
		
		return $hasilscan;
		//echo '<pre>';
		//print_r($hasilscan);
	
		
	}	
}


if ( ! function_exists('fm_ajax_php'))
{
	function fm_ajax_php(){
		
		if(isset($_GET['klikfolder'])){
			$_SESSION['fm_foldersekarang'] = $_GET['klikfolder'];
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
		
		if(isset($_GET['hapusdata'])){
			unlink($_GET['hapusdata']);
			die(json_encode(array('hasil'=>'Sukses')));
		}
		
		if(isset($_GET['bacafile'])){
			if(!isset($_SESSION['recent'])){
				$_SESSION['recent']="";
				$_SESSION['recent']= $_GET['bacafile'];
			}else{
				if($_SESSION['recent']==""){
					$_SESSION['recent']= $_GET['bacafile'];
				}else{
					$_SESSION['recent']= $_GET['bacafile'].'@'.$_SESSION['recent'];
				}
			}
					
			$isi = file_get_contents($_GET['bacafile']);
			
			die(json_encode(array('hasil'=> htmlspecialchars($isi))));
		}
		
	}
	
}


if ( ! function_exists('fm_ajax_js'))
{
	function fm_ajax_js($urlajax){
		?>
		<script>$(".klikfolder").click(function () {
			
			var link = $(this).attr("url");
			
			$.getJSON("<?php echo $urlajax;?>",{"klikfolder":link}, function(data){
				var hasil = data.hasil;
				location.reload();

			});
		});
		$(".recent").click(function () {
			var link = $(this).attr("url");
			
			$.getJSON("<?php echo $urlajax;?>",{"recent":link}, function(data){
				var hasil = data.hasil;
				//location.reload();
				window.open(link);
					
			});
		});
		$(".hapusrecent").click(function () {
			var link = 1;
			
			$.getJSON("<?php echo $urlajax;?>",{"hapusrecent":link}, function(data){
				var hasil = data.hasil;
				location.reload();
					
			});
		});
		$("div#editfile").click(function () {
			var classedit = $(this).attr("modal");
			
			var lokasi = $(this).attr("lokasi");
			var formedit = $(this).attr("formedit");

			$.getJSON("<?php echo $urlajax;?>",{"bacafile":lokasi}, function(data){
				var hasil = data.hasil;
				$("."+formedit).html(hasil);			
				$( "."+classedit ).trigger( "click" );
			});
			
		});</script>
		
		<?php
		
	}
}

?>