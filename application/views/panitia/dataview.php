<?php
$cekuri = $this->uri->segment(3);
if ($cekuri == "mts") {
    $warna = "info";
    $lembaga = "MTS AL AMIEN";
} elseif ($cekuri == "ma") {
    $warna = "success";
    $lembaga = "MA AL AMIEN";
} elseif ($cekuri == "smp") {
    $warna = "warning";
    $lembaga = "SMP PLUS AL AMIEN";
} else {
    $warna = "danger";
    $lembaga = "SMK AL AMIEN";
}
?>


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5>DATABASE</h5>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <!-- <li class="breadcrumb-item"><a href="#">Data</a></li> -->
                    <li class="breadcrumb-item active">Data Calon Siswa / Data <?php echo $cekuri; ?></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-<?php echo $warna; ?>">
                    <div class="card-header">
                        <h3 class="card-title">Data Calon Siswa <?php echo $lembaga; ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <a class="btn btn-success" href="<?php echo base_url($this->session->userdata('jabatan')) ?>/form/<?php echo $cekuri; ?>"><i class="fa fa-user-plus"></i> Formulir Baru</a>
                        <hr>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Induk</th>
                                    <th>Nama</th>
                                    <th>L/P</th>
                                    <th>Tmpt Tgl Lahir</th>
                                    <th>Jalur</th>
									<th>Asal Lembaga</th>
                                    <!-- <th>Status</th> -->
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0; //variabel no
                                foreach ($cari as $row) :
                                    $no++;
                                ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $row->no_reg; ?></td>
                                        <td><?php echo $row->nama; ?></td>
                                        <td><?php echo $row->jk; ?></td>
                                        <td><?php echo $row->tmp_lahir . ', ' . date_indo($row->tgl_lahir); ?></td>
                                        <td><?php echo $row->jalur; ?></td>
										<td><?php echo $row->skl_asal; ?></td>
                                        <!-- <td align="center">
                                                <?php if ($row->status == "AKTIF") { ?>
                                                    <span class="badge bg-success"><?php echo $row->status; ?></span>
                                                <?php } elseif ($row->status == "NON AKTIF") { ?>
                                                    <span class="badge bg-danger"><?php echo $row->status; ?></span>
                                                <?php } else { ?>
                                                    <span class="badge bg-warning"><?php echo $row->status; ?></span>
                                                <?php } ?>
                                            </td> -->
                                        <td align="center">
                                            <a data-toggle='tooltip' data-placement='top' title='Profil' href="<?php echo base_url(); ?>panitia/view/<?php echo $tabel_cek; ?>/<?php echo ($row->id_enc); ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                            <a data-toggle='tooltip' data-placement='top' title='Edit' href="<?php echo base_url(); ?>panitia/edit/<?php echo $tabel_cek; ?>/<?php echo ($row->id_enc); ?>" class="btn btn-info btn-sm">
                                                <i class="fa fa-user-edit"></i>
                                            </a>
                                            <a data-toggle='tooltip' data-placement='top' title='Print' href="<?php echo base_url(); ?>panitia/bukti/<?php echo $tabel_cek; ?>/<?php echo ($row->id_enc); ?>" class="btn btn-warning btn-sm">
                                                <i class="fa fa-print"></i>
                                            </a>
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
<!-- /.content -->
