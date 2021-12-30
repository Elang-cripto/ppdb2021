<head>
<style type="text/css">
	img	{
		width:15mm;
		height:15mm;
	}
    body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 12pt "Tahoma";
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    .page {
        width: 210mm;
        min-height: 297mm;
        padding: 20mm;
        margin: 10mm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 7px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    @page {
        size: A4;
        margin: 0;
    }
    @media print {
        html, body {
            width: 210mm;
            height: 297mm;        
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
    .td1 {
    width:200px
    }
    .td2 {
    width:500px
    }
    .td3 {
    width:500px
    }
    td {
    padding-top : 5px;
    padding-bottom : 5px;
    }
</style>
</head>
<body>

<?php
$param = $this->uri->segment(4);
	if ($param=="MTS") {
		$pilih="MTS AL AMIEN";
	} elseif($param=="MA") {
		$pilih="MA AL AMIEN";
	} elseif($param=="SMP") {
		$pilih="SMP PLUS AL AMIEN";	
	} else {
		$pilih="SMK AL AMIEN";
	}
?>
<div class="book">
	
	<div class="page">
		<table>
			<tr>
				<td style="width:5%"><img src="<?php echo base_url('') ?>asset/dist/img/logo.png" alt="Al Amien" ></td>
				<td style="width:40%">
				<div align="left"><b>PANITIA PENERIMAAN PESERTA DIDIK BARU<br>
					TAHUN PELAJARAN 2022-2023<br>
					MTS - MA - SMP - SMK AL AMIEN
					</b></div>
				</td>
				<td style="width:20% " align="right"><b>No. Registrasi </b><br><?php echo $data->no_reg; ?> </td>
			</tr>
		</table>
		
		<br>
		<table>
			<tr >
				<th class="td1"></th>
				<th class="td2"></th>
				<th class="td3"></th>
			</tr>
			<tr>
				<td colspan="2" style="width:100% " align="center"><h5><b>KARTU BUKTI PENDAFTARAN</b></h5></td></br>
			</tr>
			<tr>
				<td>Nama Peserta Didik</td>
				<td>: <?php echo $data->nama; ?></td>
			</tr>
			<tr>
				<td>NISN</td>
				<td>: <?php echo $data->nisn; ?></td>
			</tr>
			<tr>
				<td>Tempat Tanggal Lahir</td>
				<td>: <?php echo $data->tmp_lahir; ?>, <?php echo date_indo($data->tgl_lahir); ?></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>: 
					<?php 
					
					if ($data->jk =="L") {
						echo "Laki-laki";
					} elseif ($klmn ="P") {
						echo "Perempuan";
					}
					?>
				</td>
			</tr>
			<tr>
				<td>Alamat Peserta Didik</td>
				<td>: <?php echo $data->alamat; ?></td>
			</tr>
			<tr>
				<td>Nomor Telepon Rumah</td>
				<td>: <?php echo $data->telp; ?></td>
			</tr>
			<tr>
				<td>Sekolah Asal</td>
				<td>: <?php echo $data->skl_asal; ?></td>
			</tr>
			<tr>
				<td>Alamat Sekolah Asal</td>
				<td>: <?php echo $data->almt_skl; ?></td>
			</tr>
			<tr>
				<td>Nama Ayah</td>
				<td>: <?php echo $data->nm_ayh; ?></td>
			</tr>
			<tr>
				<td>Nama Ibu</td>
				<td>: <?php echo $data->nm_ibu; ?></td>
			</tr>
			<tr>
				<td>Lembaga Pilihan</td>
				<td>: <?php echo $pilih; ?> </td>
			</tr>
			<tr>
				<td>Pendaftaran Jalur</td>
				<td>: <b><?php echo $data->jalur; ?></b></td>
			</tr>
		</table>
		<br>
		<p>Bukti Pendaftaran ini harap dibawa pada saat Verifikasi data pada: <br></p>
		
		<table>
			<tr>
				<td style="width:20%">Hari, Tanggal</td>
				<td style="width:40%">: ...............................</td>
			</tr>
			<tr>
				<td style="width:20%">Tempat</td>
				<td style="width:40%">: ...............................</td>
			</tr>
		</table>
		
		<br>
		<table style="width:100%">
			<tr >
				<td style="width:40%" class="text-center">
					<img class="profile-user-img img-fluid"
                        <?php 
                          if(empty($data->foto)){
                            $gambar = "none.png";
                          }else{
                            $gambar = $data->foto;
                          }
                        ?>
                       src="<?php echo base_url('asset/upload/'.$gambar)?>"
                       alt="User profile picture">
				</td>
				<td style="width:30%">
						  <br>Pendaftar<br><br><br><br><?php echo $data->nama; ?>
				</td>
				<td style="width:30%">
					Jember, <?php 
					$tanggalHariIni = new DateTime();
					echo $tanggalHariIni->format('d M Y');
					
					?><br>
					Panitia PPDB<br><br><br><br>
					<b>____________________</b>
				</td>
			</tr>
		</table>
	</div>
</div>
</body>