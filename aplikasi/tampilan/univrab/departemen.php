<?php require_once("kepalanya.php"); 
if(isset($_POST['btnDeleteDep'])){
    $hps = dep_delete();
}

if(isset($_POST['btnEditDep'])){
    $edt = dep_edit();
}

if(isset($_POST['btnAddDep'])){
    $spn = dep_add();
}
?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Data Departemen</h5>
                </div>
                <div class="ibox-content">
                    <button class="btn btn-primary  dim " type="button" data-toggle="modal" data-target="#myModal2"><i class="fa fa-institution"></i> TAMBAH DEPARTEMEN</button>

                    <div class="modal inmodal" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content animated flipInY">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title">Tambah Departemen</h4>
                                    <small class="font-bold">Berhati-hati dalam pengisian maupun mengubah data</small>
                                </div>
                                <form method="post" action="">
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="id_dep" id="id_dep" value="<?php echo $val['id_dep'];?>" placeholder="Nama Fakultas" required>
                                        <input type="text" name="nm_dep" placeholder="Nama Departemen" class="form-control" style="width: 100%">
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                        <input type="submit" name="btnAddDep" value="Ubah" class="btn btn-success"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Departemen</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                             <?php
                             $no=1;
                             $data = dep_view();
                             if ($data)
                                foreach ($data as $val) {
                                    ?>
                                    <tr class="gradeX">
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $val['nm_dep'] ?></td>
                                        <td>
                                            <a href="" class="fa fa-trash" style="color:#730a0ac7" title="Hapus Data" data-toggle="modal" data-target="#hapus<?php echo $val['id_dep'];?>">
                                            </a>
                                            <a href="" data-toggle="modal" data-target="#edit<?php echo $val['id_dep'];?>" class="fa fa-edit" style="color:#730a0ac7" title="Edit Data">
                                            </a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="hapus<?php echo $val['id_dep'];?>" role="dialog">
                                                <div class="modal-dialog">
                                                    <form method="post" action="">
                                                      <!-- Modal content-->
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                          <h4 class="modal-title">Hapus Data</h4>
                                                      </div>
                                                      <div class="modal-body">
                                                          <p>Anda Yakin Ingin Menghapus <?php echo $val['nm_dep'];?> <b></b> ?</p>
                                                          <input type="hidden" name="id_dep" value="<?php echo $val['id_dep'];?>" />
                                                          <input type="hidden" name="nm_dep" value="<?php echo $val['nm_dep'];?>" />
                                                      </div>
                                                      <div class="modal-footer">
                                                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                          <input type="submit" name="btnDeleteDep" value="Hapus" class="btn btn-danger"/>
                                                      </div>
                                                  </div>
                                              </form>
                                          </div>
                                      </div>
                                      <!-- Modal EDIT -->
                                      <div class="modal inmodal fade" id="edit<?php echo $val['id_dep'];?>" tabindex="-1" role="dialog"  aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title">Ubah Departemen</h4>
                                                    <small class="font-bold">Berhati-hati dalam pengisian maupun mengubah data</small>
                                                </div>
                                                <form method="post" action="">
                                                    <div class="modal-body">
                                                        <input type="hidden" class="form-control" name="id_dep" id="id_dep" value="<?php echo $val['id_dep'];?>" placeholder="Nama Fakultas" required>
                                                        <input type="text" name="nm_dep" value="<?php echo $val['nm_dep'];?>" class="form-control" style="width: 100%">
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                        <input type="submit" name="btnEditDep" value="Ubah" class="btn btn-success"/>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Departemen</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>
</div>
</div>
</div>
<?php require_once ("kakinya.php"); ?>