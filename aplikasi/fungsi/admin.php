<?php

/*
---- Hapus Dir
*/
function rrmdir($dir) {
   if (is_dir($dir)) {
     $objects = scandir($dir);
     foreach ($objects as $object) {
       if ($object != "." && $object != "..") {
         if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object);
       }
     }
     reset($objects);
     rmdir($dir);
   }
}


/*
---- Departemen
*/
function dep_view($where=null){
	if(isset($where)){
		$sql = "SELECT * FROM departemen WHERE $where";
	}else{
		$sql = "SELECT * FROM departemen";
	}
	
	$data = tampil($sql);
	return $data;
}

function dep_add(){
	if(isset($_POST['btnAddDep'])){
		$nm_dep = $_POST['nm_dep'];
		
		$sql = "INSERT INTO departemen (nm_dep) VALUES('$nm_dep')";
		$simpan = query($sql);
		if($simpan){
			mkdir('aplikasi/tampilan/univrab/departemen/'.$nm_dep);
			return TRUE;
		}
		return FALSE;
	}
}

function dep_edit(){
	
	if(isset($_POST['btnEditDep'])){
		$id_dep = $_POST['id_dep'];
		$nm_dep = $_POST['nm_dep'];
		$nampil = dep_view("id_dep=".$id_dep);
		$sql = "UPDATE departemen SET nm_dep='$nm_dep' WHERE id_dep='$id_dep'";
		$simpan = query($sql);
		if($simpan){
			$dircuy = 'aplikasi/tampilan/univrab/departemen/';
			rename($dircuy.'/'.$nampil[0]['nm_dep'],$dircuy.'/'.$nm_dep);
			return TRUE;
		}
		return FALSE;
	}
}


function dep_delete(){
	if(isset($_POST['btnDeleteDep'])){
		$id_dep = $_POST['id_dep'];
		$nm_dep = $_POST['nm_dep'];
		$sql = "DELETE FROM departemen WHERE id_dep='$id_dep'";
		$hps = query($sql);
		if($hps){
			$dir = ('aplikasi/tampilan/univrab/departemen/'.$nm_dep);
			rrmdir($dir);
			return TRUE;
		}
		return FALSE;
	}
}


/*
---- Staff
*/

function staff_view($where=null){
	if(isset($where)){
		$sql = "SELECT * FROM staff WHERE $where";
	}else{
		$sql = "SELECT * FROM staff";
	}
	
	$data = tampil($sql);
	return $data;
}

function staff_add(){
	if(isset($_POST['btnAddStaff'])){
		$nm_staff = $_POST['nm_staff'];
		$id_dep = $_POST['id_dep'];
		
		$sql = "INSERT INTO staff (nm_staff,id_dep) VALUES('$nm_staff','$id_dep')";
		$simpan = query($sql);
		if($simpan){
			$wkwk = dep_view("id_dep='".$id_dep."'");
			mkdir('aplikasi/tampilan/univrab/departemen/'.$wkwk[0]['nm_dep'].'/'.$nm_staff);
			mkdir('aplikasi/tampilan/univrab/departemen/'.$wkwk[0]['nm_dep'].'/'.$nm_staff.'/'.'Working Hours');
			mkdir('aplikasi/tampilan/univrab/departemen/'.$wkwk[0]['nm_dep'].'/'.$nm_staff.'/'.'Project');

			?>
			<meta http-equiv="refresh" content="0; <?php echo URL;?>/aplikasi/tampilan/univrab/">;
			<?php
			return TRUE;
		}
		return FALSE;
	}
}

function staff_edit(){
	if(isset($_POST['btnEditStaff'])){
		$id_staff = $_POST['id_staff'];
		$nm_staff = $_POST['nm_staff'];
		$id_dep = $_POST['id_dep'];

		$nampillagi = staff_view("id_staff=".$id_staff);
		$sql = "UPDATE staff SET nm_staff='$nm_staff', id_dep='$id_dep' WHERE id_staff='$id_staff'";
		$simpan = query($sql);
		if($simpan){
			$wkwk = dep_view("id_dep='".$id_dep."'");
			$dircuy = 'aplikasi/tampilan/univrab/departemen/'.$wkwk[0]['nm_dep'];
			rename($dircuy.'/'.$nampillagi[0]['nm_staff'],$dircuy.'/'.$nm_staff);
			return TRUE;
		}
		return FALSE;
	}
}

function staff_delete(){
	if(isset($_POST['btnDeleteStaff'])){
		$id_staff = $_POST['id_staff'];
		$id_dep = $_POST['id_dep'];
		$nm_staff = $_POST['nm_staff'];
		
		$sql = "DELETE FROM staff WHERE id_staff='$id_staff'";
		$hps = query($sql);
		if($hps){
			$wkwk = dep_view("id_dep='".$id_dep."'");
			$dir = ('aplikasi/tampilan/univrab/departemen/'.$wkwk[0]['nm_dep'].'/'.$nm_staff);
			rrmdir($dir);
			return TRUE;
		}
		return FALSE;
	}
}

function upload_folder(){
$foldersekarang = filemanager();
if(isset($_POST['btnUpload'])){
    $nm = $_FILES['file']['name'];
    $target = $foldersekarang .'/'.$nm;
    if(is_uploaded_file($_FILES['file']['tmp_name'])){
        $file = move_uploaded_file($_FILES['file']['tmp_name'],$target);
    }
}
}


?>