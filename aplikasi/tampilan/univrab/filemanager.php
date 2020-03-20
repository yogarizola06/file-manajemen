<?php

//scan folder utama
session_start();

date_default_timezone_set('Asia/Jakarta');
				   


$_SESSION['home'] = __DIR__;

$bn = basename($_SESSION['home']);

if(isset($_SESSION['lokasi'])){
	$directory = $_SESSION['lokasi'];
}else{
	$directory = __DIR__;
}

$namefileM = 'filemanager.php';
$baseurl = 'http://localhost:85'.str_replace($namefileM,'',$_SERVER['REQUEST_URI']);
$dirfile = str_replace($_SESSION['home'],'',$directory);
$linkfile = $baseurl.$dirfile;



if(isset($_FILES['file'])){
	$nm = $_FILES['file']['name'];
	$target = $directory.'/'.$nm;
	if(is_uploaded_file($_FILES['file']['tmp_name'])){
		$file = move_uploaded_file($_FILES['file']['tmp_name'],$target);
	}
}

$btn_undo = 1;
$nmfolder="";
if($_SESSION['home'] != $directory){
	$nmfolder1 = $directory.'xxx';
	$nmfolder = basename($directory);

	$asal = str_replace('/'.$nmfolder.'xxx','',$nmfolder1);
	$btn_undo = 1;
}else{
	//$nmfolder = basename($_SESSION['home']);
	$asal = $_SESSION['home'];
	$btn_undo = 0;
}

$scanned_directory = array_diff(scandir($directory), array('..', '.'));

$folder = "";
$file = "";
$no=0;$no1=0;

$icon = array('php' => 'code',
			'html' => 'code',
			'js' => 'code',
			'css' => 'code',
			'jpg' => 'picture-o', 
			'png' => 'picture-o', 
			'gif' => 'picture-o',
			'mp3' => 'music', 
			'mp4' => 'film', 
			'mkv' => 'film',
			'xls' => 'bar-chart-o', 
			'xlsx' => 'bar-chart-o', 
			'doc' => 'file-word-o', 
			'docx' => 'file-word-o',
			'zip' => 'file-archive-o',
			'rar' => 'file-archive-o',
		);

$filedit = array('php','html','js','css','txt','log','ini');

$nothapus = array('api.php','filemanager.php');


foreach($scanned_directory as $val){
	
	if(is_file($directory.'/'.$val)){
		$file[$no]['nama'] = $val;
		
		$link = str_replace($_SESSION['home'],'',$directory.'/'.$val);
		$link = $linkfile.'/'.$val;
		$link = str_replace('//','/',$link);
		$link = str_replace(':/','://',$link);
		
		$file[$no]['link'] = $link;
		$file[$no]['lokasi'] = $directory.'/'.$val;
		$ext = pathinfo($directory.'/'.$val, PATHINFO_EXTENSION);
		$file[$no]['ext'] =$ext;
		
		$no++;
	}
	
	if(is_dir($directory.'/'.$val)){
		$folder[$no1]['nama'] = $val;
		$folder[$no1]['link'] = $directory.'/'.$val;
		$no1++;
	}
	
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from https://bootdey.com  -->
    <!--  All snippets are MIT license https://bootdey.com/license -->
    <title>Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<link rel=stylesheet href="assets/doc/docs.css">

<link rel="stylesheet" href="assets/lib/codemirror.css">
<link rel="stylesheet" href="assets/addon/hint/show-hint.css">

    <style type="text/css">
    	body{margin-top:10px;
    background:#eee;
}

.file-box {
  float: left;
  width: 220px;
}
.file-manager h5 {
  text-transform: uppercase;
}
.file-manager {
  list-style: none outside none;
  margin: 0;
  padding: 0;
}
.folder-list li a {
  color: #666666;
  display: block;
  padding: 5px 0;
}
.folder-list li {
  border-bottom: 1px solid #e7eaec;
  display: block;
}
.folder-list li i {
  margin-right: 8px;
  color: #3d4d5d;
}
.category-list li a {
  color: #666666;
  display: block;
  padding: 5px 0;
}
.category-list li {
  display: block;
}
.category-list li i {
  margin-right: 8px;
  color: #3d4d5d;
}
.category-list li a .text-navy {
  color: #1ab394;
}
.category-list li a .text-primary {
  color: #1c84c6;
}
.category-list li a .text-info {
  color: #23c6c8;
}
.category-list li a .text-danger {
  color: #EF5352;
}
.category-list li a .text-warning {
  color: #F8AC59;
}
.file-manager h5.tag-title {
  margin-top: 20px;
}
.tag-list li {
  float: left;
}
.tag-list li a {
  font-size: 10px;
  background-color: #f3f3f4;
  padding: 5px 12px;
  color: inherit;
  border-radius: 2px;
  border: 1px solid #e7eaec;
  margin-right: 5px;
  margin-top: 5px;
  display: block;
}
.file {
  border: 1px solid #e7eaec;
  padding: 0;
  background-color: #ffffff;
  position: relative;
  margin-bottom: 20px;
  margin-right: 20px;
}
.file-manager .hr-line-dashed {
  margin: 15px 0;
}
.file .icon,
.file .image {
  height: 100px;
  overflow: hidden;
}
.file .icon {
  padding: 15px 10px;
  text-align: center;
}
.file-control {
  color: inherit;
  font-size: 11px;
  margin-right: 10px;
}
.file-control.active {
  text-decoration: underline;
}
.file .icon i {
  font-size: 70px;
  color: #dadada;
}
.file .file-name {
  padding: 10px;
  background-color: #f8f8f8;
  border-top: 1px solid #e7eaec;
}
.file-name small {
  color: #676a6c;
}
ul.tag-list li {
  list-style: none;
}
.corner {
  position: absolute;
  display: inline-block;
  width: 0;
  height: 0;
  line-height: 0;
  border: 0.6em solid transparent;
  border-right: 0.6em solid #f1f1f1;
  border-bottom: 0.6em solid #f1f1f1;
  right: 0em;
  bottom: 0em;
}
a.compose-mail {
  padding: 8px 10px;
}
.mail-search {
  max-width: 300px;
}
.ibox {
  clear: both;
  margin-bottom: 25px;
  margin-top: 0;
  padding: 0;
}
.ibox.collapsed .ibox-content {
  display: none;
}
.ibox.collapsed .fa.fa-chevron-up:before {
  content: "\f078";
}
.ibox.collapsed .fa.fa-chevron-down:before {
  content: "\f077";
}
.ibox:after,
.ibox:before {
  display: table;
}
.ibox-title {
  -moz-border-bottom-colors: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  background-color: #ffffff;
  border-color: #e7eaec;
  border-image: none;
  border-style: solid solid none;
  border-width: 3px 0 0;
  color: inherit;
  margin-bottom: 0;
  padding: 14px 15px 7px;
  min-height: 48px;
}
.ibox-content {
  background-color: #ffffff;
  color: inherit;
  padding: 15px 20px 20px 20px;
  border-color: #e7eaec;
  border-image: none;
  border-style: solid solid none;
  border-width: 1px 0;
}
.ibox-footer {
  color: inherit;
  border-top: 1px solid #e7eaec;
  font-size: 90%;
  background: #ffffff;
  padding: 10px 15px;
}
a:hover{
text-decoration:none;    
}

.codeMirrir{
	height: 700px;
}
    </style>



</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
<div class="row">
    <div class="col-md-3">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <div class="file-manager">
                    <h5>Show:</h5>
                    <a class="hapusrecent" class="file-control active" style="cursor:pointer">Hapus Recent</a>
                   
                    <div class="hr-line-dashed"></div>
					<form method="post" action="" enctype="multipart/form-data">
						<input type="file" class="fileupload" name="file" style="display:none"/>
						<div id="btnupload" class="btn btn-primary btn-block">Upload Files</div>
						<input type="submit" class="btnsubmit" style="display:none"/>
					</form>
                    <div class="hr-line-dashed"></div>
                    <h5>Folders</h5>
                    <ul class="folder-list" style="padding: 0">
					<?php
					if($btn_undo ==1){
					?>
						<li>
							<a class="btnfolder" lokasi='<?php echo $asal;?>' style="cursor:pointer;">
								<i class="fa fa-undo">
								</i> Kembali
							</a>
						</li>
					<?php
					}
					if(is_array($folder)){
						foreach($folder as $val){
							if ($val['nama'] == "tes"){
					?>
						<li>
							<a class="btnfolder" lokasi='<?php echo $val['link'];?>' style="cursor:pointer;">
								<i class="fa fa-folder">
								</i> <?php echo $val['nama'];?>
							</a>
						</li>
					<?php	
						}else{
							if($_SESSION['home'] != $directory){
					?>
						<li>
							<a class="btnfolder" lokasi='<?php echo $val['link'];?>' style="cursor:pointer;">
								<i class="fa fa-folder">
								</i> <?php echo $val['nama'];?>
							</a>
						</li>
					<?php			
							}

						}
					}
					}
					?>
                        
                        
                    </ul>
                    
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9 animated fadeInRight">
        <div class="row">
			 <div class="col-lg-12">
				
				<?php
				if(isset($_SESSION['recent'])){
					if($_SESSION['recent'] != ""){
						echo '<h4>Recent File</h4>';
						$recent = explode('@',$_SESSION['recent']);
						$cn = count($recent);
						if($cn > 5){
							$cn = 5;
						}
						
						for($i=0;$i<$cn;$i++){
							$ext = pathinfo($recent[$i], PATHINFO_EXTENSION);
							$ico_r = "file";
							if(isset($icon[$ext])){
								$ico_r = $icon[$ext];
							}
							
							
							
							$name = basename($recent[$i]);
							?>
							 <div class="file-box">
								<div class="file">
									<a target="_blank" href="<?php echo $recent[$i];?>" style="cursor:pointer">
										<span class="corner"></span>

										<div class="icon">										
											<i class="fa fa-<?php echo $ico_r;?>"></i>
										</div>
										<div class="file-name">
											<?php echo $name;?>
											<br>
											<small>...</small>
										</div>
									</a>
								</div>

							</div>
							<?php
							
						}
						echo '<hr>';
					}		
				}
				
				?>
			 </div>
            <div class="col-lg-12">
			<h4>File</h4>
				<?php
				if(is_array($file)){
					$no=0;
					foreach($file as $val){
						$date = date("F d Y H:i:s.", filemtime($val['lokasi']));
				?>
				 <div class="file-box">
                    <div class="file">
						<?php
							if(!in_array($val['nama'], $nothapus)){
								
						?>
						<i id="hapusfile" class="fa fa-times-circle text-danger" style="cursor:pointer;float:right;padding:5px" lokasi="<?php echo $val['lokasi'];?>" namefile="<?php echo $val['nama'];?>"></i>
						
						<?php
							}
						if(in_array($val['ext'], $filedit)){
							$no++;
							//$isi = file_get_contents($val['lokasi']);
							//$myfile = fopen($val['lokasi'], "r") or die("Unable to open file!");
							//$isi = fread($myfile,filesize($val['lokasi']));
							//fclose($myfile);
						?>
							<i id="editfile" class="fa fa-edit text-success" style="cursor:pointer;float:right;padding:5px" lokasi="<?php echo $val['lokasi'];?>" namefile="<?php echo $val['nama'];?>" modal="editfile<?php echo $no;?>" formedit='formedit<?php echo $no;?>' no='<?php echo $no;?>'></i>
							
							<i class="editfile<?php echo $no;?>" data-toggle="modal" data-target=".modaledit<?php echo $no;?>" style="display:none"></i>
							<div class="modal fade modaledit<?php echo $no;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							
							  <div class="modal-dialog modal-lg"><h1 class='badge bagde-info'>Klik Untuk Menampilkan </h1>
								<div class="modal-content" style="padding:10px;">
									<form><textarea id="code<?php echo $no;?>" name="code<?php echo $no;?>" class="formedit<?php echo $no;?>" style="width:100%;height:700px !important;"></textarea></form>
								</div>
							  </div>
							</div>
						
						<?php
						}
						?>
                        <a target="_blank" lokasi="<?php echo $val['link'];?>" class="recent" style="cursor:pointer">
                            <span class="corner"></span>

                            <div class="icon">
								<?php
									if(isset($icon[$val['ext']])){
										$ico = $icon[$val['ext']];
									}else{
										$ico = 'file';
									}
								?>
                                <i class="fa fa-<?php echo $ico;?>"></i>
                            </div>
                            <div class="file-name">
                                <?php echo $val['nama'];?>
                                <br>
                                <small><?php echo $date;?></small>
                            </div>
                        </a>
                    </div>

                </div>
				<?php
					}
				}
				
				?>
                
				
				
                
                
                
                
                
                

            </div>
        </div>
        </div>
    </div>
</div>

<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="assets/lib/codemirror.js"></script>
<script src="assets/addon/hint/show-hint.js"></script>
<script src="assets/addon/hint/anyword-hint.js"></script>
<script src="assets/mode/javascript/javascript.js"></script>
<script type="text/javascript">

		$(".btnfolder").click(function () {
			var link = $(this).attr('lokasi');
			
			$.getJSON("api.php",{"konfirmasi":link}, function(data){
				var hasil = data.hasil;
				location.reload();

			});
		})
		
		$(".recent").click(function () {
			var link = $(this).attr('lokasi');
			
			$.getJSON("api.php",{"recent":link}, function(data){
				var hasil = data.hasil;
				//location.reload();
				window.open(link);
					
			});
		})
		
		$(".hapusrecent").click(function () {
			var link = 1;
			
			$.getJSON("api.php",{"hapusrecent":link}, function(data){
				var hasil = data.hasil;
				location.reload();
					
			});
		})
		
		$("#btnupload").click(function () {
			$( ".fileupload" ).trigger( "click" );
		})
		
		$(".fileupload").on('change', function(){
			$( ".btnsubmit" ).trigger( "click" );
		})
		
		$("i#hapusfile").click(function () {
			var link = $(this).attr('lokasi');
			var nm = $(this).attr('namefile');
			if (confirm('Yakin ingin menghapus file ini "'+nm+'" ?')) {
				$.getJSON("api.php",{"hapusfile":link}, function(data){
					var hasil = data.hasil;
					location.reload();
						
				});
			} 
			
		})
		
		$("i#editfile").click(function () {
			var classedit = $(this).attr('modal');
			
			var lokasi = $(this).attr('lokasi');
			var formedit = $(this).attr('formedit');
			var no = 'code'+$(this).attr('no');
			
			$('.CodeMirror').remove();
			
			$.getJSON("api.php",{"editfile":lokasi}, function(data){
				var hasil = data.hasil;
				$("."+formedit).html(hasil);			
				$( "."+classedit ).trigger( "click" );
				tess(no);
				//location.reload();	
				
			});
			
		});
		
</script>

<script>
function tess(no){
      CodeMirror.commands.autocomplete = function(cm) {
        cm.showHint({hint: CodeMirror.hint.anyword});
      }
      var editor = CodeMirror.fromTextArea(document.getElementById(no), {
        lineNumbers: false,
        extraKeys: {"Ctrl-Space": "autocomplete"}
      });
}
    </script>
</body>
</html>
<?php
//unset($_SESSION['lokasi']);
?>