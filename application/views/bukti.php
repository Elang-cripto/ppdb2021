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
		<div align="center"><b>PANITIA PENERIMAAN PESERTA DIDIK BARU <br>TAHUN PELAJARAN 2022-2023</b></div>
		<br>
		<table>
		<tr>
			
			<th class="td2"></th>
			<th class="td3"></th>
		</tr>
		<tr>
			<td>Nama Peserta Didik (Lengkap)</td>
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
			<td>Nama Orang Tua</td>
			<td>:</td>
		</tr>
		<tr>
			
			<td>a. Ayah</td>
			<td>: <?php echo $data->nm_ayh; ?></td>
		</tr>
		<tr>
			
			<td>b. Ibu</td>
			<td>: <?php echo $data->nm_ibu; ?></td>
		</tr>
		</table>
		<table style="width:100%">
			<tr >
				
				<td style="width:30%"><img width=50%   src="#" alt="foto" border="0"> </td>
				<td style="width:40%">
					Jember, 12 Juli 2021<br>
					Panitia PPDB<br><br><br><br>
					<b>____________________</b>
				</td>
			</tr>
		</table>
	</div>
</div>
</body>