<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Management Lembaga SMP/MTs</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">SMP / MTs</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <?php
        if (validation_errors() != false) {
        ?>
            <div class="alert alert-danger" role="alert">
                <?php echo validation_errors(); ?>
            </div>
        <?php
        }
        ?>

        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Managemen SMP / MTs</h3>
                    </div>
                    <!-- /.card-header  -->
                    <div class="card-body">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-tambah">
                            <i class="fa fa-user-plus"></i> Tambah
                        </button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-upload">
                            <i class="fa fa-upload"></i> Upload
                        </button>
                        <!-- <a class="btn btn-primary" href="<?php echo base_url('') ?>admin/adduser"><i class="fa fa-user-plus"></i> Tambah</a>   -->
                        <br><br>
                        <table class="table table-bordered table-striped projects">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NPSN</th>
                                    <th>Lembaga</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach ($dbsmpmts as $row) :
                                    $no++;
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row->npsn; ?></td>
                                        <td><?php echo $row->lembaga; ?></td>
                                        <td><?php echo $row->alamat; ?></td>

                                        <td align="center">
                                            <a type="button" href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-user-<?= $row->id; ?>"><i class="fa fa-user-edit"></i></a>
                                            <a data-toggle='tooltip' data-placement='top' title='Hapus' href="<?php echo base_url(); ?>admin/delsmpmts/<?php echo $row->id; ?>" class="btn btn-danger btn-sm" onclick="return del()"><i class="fa fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>

<!-- =============================== modal tambah =============================== -->
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah SMP / MTs</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form name="form_tambah" method="post" action="<?php echo base_url(); ?>admin/addsmpmts" enctype="multipart/form-data" onsubmit="return cekform()">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="npsn" class="col-sm-4 col-form-label">NPSN</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="npsn" id="npsn" placeholder="npsn" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lembaga" class="col-sm-4 col-form-label">Nama Lembaga</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="lembaga" id="lembaga" placeholder="Nama Lembaga" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-4 col-form-label">Alamat Lembaga</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- ======================================= modal edit ======================================= -->
<?php
foreach ($dbsmpmts as $m) :
?>
    <div class="modal fade" id="modal-user-<?php echo $m->id; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?php echo base_url(); ?>admin/editsmpmts" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="npsn" class="col-sm-4 col-form-label">NPSN</label>
                            <div class="col-sm-8">
                                <input type="hidden" id="id" name="id" value="<?php echo $m->id; ?>">
                                <input type="text" class="form-control" id="npsn" name="npsn" value="<?php echo $m->npsn; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lembaga" class="col-sm-4 col-form-label">Nama Lembaga</label>
                            <div class="col-sm-8">
                                <input type="hidden" id="id" name="id" value="<?php echo $m->id; ?>">
                                <input type="text" class="form-control" id="lembaga" name="lembaga" value="<?php echo $m->lembaga; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-4 col-form-label">Alamat Lembaga</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $m->alamat; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach; ?>

<!-- =============================== modal Upload =============================== -->
<div class="modal fade" id="modal-upload">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Upload SMP / MTs</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form method="POST" action="<?= base_url('admin/uploadsmpmts') ?>" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="col-form-label text-md-left">Upload File</label>
                                    <input type="file" class="form-control" name="file" accept=".xls, .xlsx" required>
                                    <div class="mt-1">
                                        <span class="text-secondary">File yang harus diupload : .xls, xlsx </br>
                                            <a href="<?php echo base_url(); ?>excel/upload_smpmts.xlsx">Download Format!</a>
                                        </span>
                                    </div>
                                    <?= form_error('file', '<div class="text-danger">', '</div>') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <div class="form-group mb-0">
                        <button type="submit" name="import" class="btn btn-primary"><i class="fas fa-upload mr-1"></i>Upload</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>