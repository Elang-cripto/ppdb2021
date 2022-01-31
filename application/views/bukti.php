<head>
	<link rel="stylesheet" href="<?php echo base_url('') ?>asset/elang/tabel.css">
</head>

<body>
	<?php
	$param = strtolower($this->uri->segment(3));
	if ($param == "mts") {
		$pilih 			= "MTS AL AMIEN";
		$panitia 		= "MOH ALI MAS'UD, S.Pd";
		$tempat_ver		= $set->tempat_ver1;
	} elseif ($param == "ma") {
		$pilih 			= "MA AL AMIEN";
		$panitia 		= "MOH ZAMRONI S,Pd";
		$tempat_ver		= $set->tempat_ver2;
	} elseif ($param == "smp") {
		$pilih 			= "SMP PLUS AL AMIEN";
		$panitia 		= "MOH ALI MAS'UD, S.Pd";
		$tempat_ver		= $set->tempat_ver2;
	} else {
		$pilih 			= "SMK AL AMIEN";
		$panitia 		= "MOH ZAMRONI S,Pd";
		$tempat_ver		= $set->tempat_ver2;
	}
	?>

	<div class="book">
		<div class="page">
			<table id="table1">
				<tr>
					<td style="width:10%"><img src="<?php echo base_url('') ?>asset/dist/img/logo.png" alt="Al Amien" width="60px" height="60px"></td>
					<td style="width:60%">
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
				<tr>
					<th class="td1"></th>
					<th class="td2"></th>
					<th class="td3"></th>
				</tr>
				<tr>
					<td colspan="3" style="width:100% " align="center">
						<h5><b>KARTU BUKTI PENDAFTARAN</b></h5>
					</td>
				</tr>
				<tr>
					<td>Nama Peserta Didik</td>
					<td>: <?php echo $data->nama; ?></td>
					<td rowspan="5" align="right">
						<img style="width: 100px; height: auto;" <?php
																	if (empty($data->foto)) {
																		$gambar = "none.png";
																	} else {
																		$gambar = $data->foto;
																	}
																	?> src="<?php echo base_url('asset/upload/' . $gambar) ?>" alt="profile">
					</td>
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

						if ($data->jk == "L") {
							echo "Laki-laki";
						} elseif ($klmn = "P") {
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
					<td>: <b><?php echo $data->jalur; ?></b>(<b><?php echo $data->ket; ?></b>)</td>
				</tr>
			</table>
			<br>
			<p>Bukti Pendaftaran ini harap dibawa pada saat Verifikasi data pada: <br></p>

			<table>
				<tr>
					<td style="width:20%">Hari, Tanggal</td>
					<td style="width:40%">: <?php echo $set->jadwal_ver; ?></td>
				</tr>
				<tr>
					<td style="width:20%">Tempat</td>
					<td style="width:40%">: <?php echo $tempat_ver; ?></td>
				</tr>
			</table>

			<br>
			<table style="width:100%">
				<tr>
					<td style="width:40%" class="text-center"></br>
						<img style="width: 100px; height: auto;" src="<?php echo base_url('asset/qr/' . md5($data->nik)) . '.png' ?>" alt="qrcode">
					</td>
					<td style="width:30%">
						<br>Pendaftar<br><br><br><br><br><b><?php echo $data->nama; ?></b>
					</td>
					<td style="width:30%">
						Jember, <?php
								$tanggalHariIni = new DateTime();
								echo $tanggalHariIni->format('d M Y');

								?><br>
						Panitia PPDB<br><br><br><br><br>
						<b><?php echo $panitia; ?></b>
					</td>
				</tr>
			</table>
			<br><br>

			<table id="table3" style="width:100%; border: 1px solid black; border-collapse:collapse;">
				<tr>
					<th>Dokumen Persyaratan</th>
					<th>Perlengkapan</th>
				</tr>
				<tr>
					<td>
						<div class="checkbox"><input type="checkbox"> Foto Copy SKHU</div>
					</td>
					<td>
						<div class="checkbox"><input type="checkbox"> Seragam</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="checkbox"><input type="checkbox"> Foto Copy Ijazah</div>
					</td>
					<td></td>
				</tr>
				<tr>
					<td>
						<div class="checkbox"><input type="checkbox"> Foto Copy Kartu Keluarga</div>
					</td>
					<td></td>
				</tr>
				<tr>
					<td>
						<div class="checkbox"><input type="checkbox"> Foto Copy Akte Kelahiran</div>
					</td>
					<td></td>
				</tr>
				<tr>
					<td>
						<div class="checkbox"><input type="checkbox"> Foto Copy KTP Orang Tua</div>
					</td>
					<td></td>
				</tr>
				<tr>
					<td>
						<div class="checkbox"><input type="checkbox"> Foto 3x4 Hitam Putih (3 Lembar)</div>
					</td>
					<td></td>
				</tr>
			</table>
		</div>
	</div>
</body>