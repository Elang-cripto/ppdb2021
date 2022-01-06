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
                        <!-- <a class="btn btn-primary" href="<?php echo base_url('') ?>admin/adduser"><i class="fa fa-user-plus"></i> Tambah</a>   -->
                        <br><br>
                        <table class="table table-bordered table-striped projects">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Lembaga</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <!-- <tbody>
                                <?php
                                $no = 0;
                                foreach ($dbuser_pes as $row) :
                                    $no++;
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row->nama; ?></td>
                                        <td align="center"><?php echo $row->last; ?></td>
                                        <td>
                                            <span class="badge badge-<?php
                                                                        if ($row->status != 'AKTIF') {
                                                                            echo 'danger';
                                                                        } else {
                                                                            echo 'info';
                                                                        } ?>">
                                                <?php echo strtoupper($row->status); ?>
                                            </span>
                                        </td>
                                        <td align="center">
                                            <span class="badge badge-<?php
                                                                        if ($row->jabatan == 'admin') {
                                                                            echo 'danger';
                                                                        } elseif ($row->jabatan == 'tatausaha') {
                                                                            echo 'info';
                                                                        } else {
                                                                            echo 'success';
                                                                        } ?>">
                                                <?php echo strtoupper($row->jabatan); ?>
                                            </span>
                                        </td>
                                        <td align="center">
                                            <a data-toggle='tooltip' data-placement='top' title='Detail' href="<?php echo base_url(); ?>admin/profil/<?php echo $row->id; ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                            <a type="button" href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-user-<?php echo md5($row->id); ?>"><i class="fa fa-user-edit"></i></a>
                                            <a data-toggle='tooltip' data-placement='top' title='Hapus' href="<?php echo base_url(); ?>admin/deluser_pes/<?php echo $row->id; ?>" class="btn btn-danger btn-sm" onclick="return del()"><i class="fa fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody> -->
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