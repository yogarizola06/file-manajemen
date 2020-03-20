<?php require_once ('kepalanya.php');

include 'filemanajer.php';

$manager = filemanager();

if(isset($_FILES['file'])){
    $nm = $_FILES['file']['name'];
    $target = $foldersekarang.'/'.$nm;
    if(is_uploaded_file($_FILES['file']['tmp_name'])){
        $file = move_uploaded_file($_FILES['file']['tmp_name'],$target);
    }
}
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2>File Manager</h2>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="file-manager">
                        
                        
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
                    if($_SESSION['fm_btnundo'] ==1){
                    ?>
                        <li>
                            <div class="klikfolder" name="klikfolder" url='<?php echo $foldersebelumnnya;?>' style="cursor:pointer;">
                                <i class="fa fa-undo">
                                </i> Kembali
                            </div>
                        </li>
                    <?php
                    }
                    ?>
                           <?php
                        $URL = FOLDER_INDEX;
                        $folder = filemanager($URL.'/aplikasi/tampilan/univrab');
                        if(is_array($folder)){
                            foreach($folder as $val){
                                if ($val['tipe'] == "folder"){
                                if ($val['nama'] == $_SESSION['nm_staff']){
                                    ?>
                                    <li>
                                        <div class="klikfolder" name="klikfolder" url='<?php echo $val['link'];?>' style="cursor:pointer;">
                                            <i class="fa fa-folder">
                                                </i> <?php echo $val['nama'];?>
                                            </div>
                                        </li>
                                        <?php   
                                    }else{
                                        if($folderutama != $foldersekarang){
                                            ?>
                                            <li>
                                                <div class="klikfolder" name="klikfolder" url='<?php echo $val['link'];?>' style="cursor:pointer;">
                                                    <i class="fa fa-folder">
                                                        </i> <?php echo $val['nama'];?>
                                                    </div>
                                                </li>
                                                <?php    
                                                }       
                                            }

                                        }
                                    }
                                }
                                ?>
                        </ul>
                        
                        <ul class="tag-list" style="padding: 0">
                        
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
            <h4>File</h4>
                <?php
                $file = filemanager($URL.'/aplikasi/tampilan/univrab');
                if(is_array($file)){
                    $no=0;
                    foreach($file as $val){
                        if ($val['tipe'] == "file"){
                        $date = date("F d Y H:i:s.", filemtime($val['lokasi']));
                ?>
                 <div class="file-box">
                    <div class="file">
                        <?php
                        $nothapus = array('filemanajer.php','filemanager.php');
                            if(!in_array($val['nama'], $nothapus)){
                                
                        ?>
                        <i id="hapusfile" class="fa fa-times-circle text-danger" style="cursor:pointer;float:right;padding:5px" lokasi="<?php echo $val['lokasi'];?>" namefile="<?php echo $val['nama'];?>"></i>
                        
                        <?php
                            }
                        $filedit = array('php','html','js','css','txt','log','ini');
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
                        <a target="_blank" url="<?php echo $val['link'];?>" class="recent" style="cursor:pointer">
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
                }
                
                ?>
                

            </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    $URL = URL;
      fm_ajax_js($URL.'/aplikasi/tampilan/univrab/fungsi_ajax.php'); ?>
    <?php require_once ('kakinya.php'); 


    ?>

