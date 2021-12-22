<head>
<style type="text/css">
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
    width:40px
    }
    .td2 {
    width:400px
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
<div class="book">
	
	<div class="page">
		<table align="center" width="100%">
				<tr>
					<td align="center">
	                <img src="https://i.ibb.co/kJ8fP5m/garuda.png" alt="garuda" border="0">
	                </td>
				</tr>
	            <tr>
					<td align="center">
	                <h4>RAPOR <br>
	                SEKOLAH MENENGAH PERTAMA (SMP) <br> 
	                SMPS PLUS AL AMIEN</h4>
	                </td>
	            </tr>
	            <tr>
	                <td align="center">
					NSS : 202052426218 | NPSN: 20554201
	                </td>
				</tr>
	            <tr>
	                <td align="center" style="padding:150px">
	                <img src="https://i.ibb.co/PG3hNBt/logoo.png" alt="logoo" border="0">
	                </td>
				</tr>
	            <tr>
	                <td align="center">
					Nama Peserta Didik <br>
					<b><?php echo $baca->nama; ?></b>
	                </td>
				</tr>
	            <tr>
	                <td align="center" >
					NIS / NISN <br>
					<b><?php echo $baca->nis; ?> / <?php echo $baca->nisn; ?></b>
	                </td>
				</tr>
	            <tr>
	                <td align="center" style="padding:50px">
					<h4>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN <br>
					REPUBLIK INDONESIA</h4>
	                </td>
				</tr>
		</table>
	</div>
	<div class="page">
		<div align="center"><b>KETERANGAN TENTANG DIRI PESERTA DIDIK</b></div>
		<br>
		<table>
		<tr>
			<th class="td1"></th>
			<th class="td2"></th>
			<th class="td3"></th>
		</tr>
		<tr>
			<td>1.</td>
			<td>Nama Peserta Didik (Lengkap)</td>
			<td>: <?php echo $baca->nama; ?></td>
		</tr>
		<tr>
			<td>2.</td>
			<td>NIS / NISN</td>
			<td>: <?php echo $baca->nis; ?> / <?php echo $baca->nisn; ?></td>
		</tr>
		<tr>
			<td>3.</td>
			<td>Tempat Tanggal Lahir</td>
			<td>: <?php echo $baca->tmp_lahir; ?>, <?php echo date_indo($baca->tgl_lahir); ?></td>
		</tr>
		<tr>
			<td>4.</td>
			<td>Jenis Kelamin <?php echo $baca->jk ?></td>
			<td>: 
				<?php 
				
				if ($baca->jk =="L") {
					echo "Laki-laki";
				} elseif ($klmn ="P") {
					echo "Perempuan";
				}
				?>
			</td>
		</tr>
		<tr>
			<td>5.</td>
			<td>Agama</td>
			<td>: <?php echo $baca->agama; ?></td>
		</tr>
		<tr>
			<td>6.</td>
			<td>Status dalam Keluarga</td>
			<td>: Anak Kandung</td>
		</tr>
		<tr>
			<td>7.</td>
			<td>Anak ke</td>
			<td>: <?php echo $baca->anak_ke; ?></td>
		</tr>
		<tr>
			<td>8.</td>
			<td>Alamat Peserta Didik</td>
			<td>: <?php echo $baca->alamat; ?></td>
		</tr>
		<tr>
			<td>9.</td>
			<td>Nomor Telepon Rumah</td>
			<td>: <?php echo $baca->telp; ?></td>
		</tr>
		<tr>
			<td>10.</td>
			<td>Sekolah Asal</td>
			<td>: <?php echo $baca->skl_asal; ?></td>
		</tr>
		<tr>
			<td>11.</td>
			<td>Diterima di sekolah ini</td>
			<td>:</td>
		</tr>
		<tr>
			<td></td>
			<td>Di kelas</td>
			<td>: VII</td>
		</tr>
		<tr>
			<td></td>
			<td>Pada tanggal</td>
			<td>: <?php echo $baca->tgl_masuk; ?></td>
		</tr>
		<tr>
			<td>12.</td>
			<td>Nama Orang Tua</td>
			<td>:</td>
		</tr>
		<tr>
			<td></td>
			<td>a. Ayah</td>
			<td>: <?php echo $baca->nm_ayh; ?></td>
		</tr>
		<tr>
			<td></td>
			<td>b. Ibu</td>
			<td>: <?php echo $baca->nm_ibu; ?></td>
		</tr>
		<tr>
			<td>13.</td>
			<td>Alamat Orang Tua</td>
			<td>: <?php echo $baca->alamat; ?></td>
		</tr>
		<tr>
			<td></td>
			<td>Nomor Telepon Rumah</td>
			<td>: <?php echo $baca->telp; ?></td>
		</tr>
		<tr>
			<td>14.</td>
			<td>Pekerjaan Orang Tua</td>
			<td>:</td>
		</tr>
		<tr>
			<td></td>
			<td>a. Ayah</td>
			<td>: <?php echo $baca->kerja_ayh; ?></td>
		</tr>
		<tr>
			<td></td>
			<td>b. Ibu</td>
			<td>: <?php echo $baca->kerja_ibu; ?></td>
		</tr>
		<tr>
			<td>15.</td>
			<td>Nama Wali Peserta Didik</td>
			<td>: <?php echo $baca->nm_wl; ?></td>
		</tr>
		<tr>
			<td>16.</td>
			<td>Alamat Wali Peserta Didik</td>
			<td>: </td>
		</tr>
		<tr>
			<td></td>
			<td>Nomor Telpon Rumah</td>
			<td>: </td>
		</tr>
		<tr>
			<td>17.</td>
			<td>Pekerjaan Wali Peserta Didik</td>
			<td>: <?php echo $baca->kerja_wl; ?></td>
		</tr>
		</table>
		<table style="width:100%">
			<tr >
				<td style="width:30%"> </td>
				<td style="width:30%"><img width=50%   src="https://i.ibb.co/99xwTft/foto.png" alt="foto" border="0"> </td>
				<td style="width:40%">
					Jember, 12 Juli 2021<br>
					Kepala Sekolah, <br><br><br><br>
					<b>Hj. I'ah Maslikah, S.Pd.I</b>
				</td>
			</tr>
		</table>
	</div>
</div>
</body>