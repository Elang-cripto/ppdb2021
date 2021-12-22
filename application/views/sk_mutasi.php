<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

<link rel="stylesheet" href="<?php echo base_url('') ?>asset/db/surat/base.min.css"/>
<link rel="stylesheet" href="<?php echo base_url('') ?>asset/db/surat/fancy.min.css"/>
<link rel="stylesheet" href="<?php echo base_url('') ?>asset/db/surat/main.css"/>
<script src="<?php echo base_url('') ?>asset/db/surat/compatibility.min.js"></script>
<script src="<?php echo base_url('') ?>asset/db/surat/theViewer.min.js"></script>
<script>
	try{
	theViewer.defaultViewer = new theViewer.Viewer({});
	}catch(e){}
</script>

<title></title>
</head>
<body>
<div class="content-wrapper">
	<div id="pf1" class="pf w0 h0" data-page-no="1">
		<div class="pc pc1 w0 h0"><img class="bi x0 y0 w1 h1" alt="" width="100%" src="<?php echo base_url('') ?>asset/db/surat/bg1.png"/>
			<div class="t m0 x1 h2 y1 ff1 fs0 fc0 sc0 ls0 ws0">KETERANGAN SURAT PINDAH</div>
			<div class="t m0 x2 h3 y2 ff2 fs0 fc0 sc0 ls0 ws0">Nomor : <?php echo $baca->nosrt_out; ?></div>
			<div class="t m0 x0 h3 y3 ff2 fs0 fc0 sc0 ls0 ws0">Yang bertanda tangan di<span class="_ _0"></span>bawah ini Kepala Madra<span class="_ _0"></span>sah Aliyah Al <span class="_ _0"></span>Amien Sabrang Ambulu <span class="_ _0"></span>Jember </div>
			<div class="t m0 x0 h3 y4 ff2 fs0 fc0 sc0 ls0 ws0">menerangkan bahwa :</div>
			<div class="t m0 x3 h3 y5 ff2 fs0 fc0 sc0 ls0 ws0">A.<span class="_ _1"> </span>Keterangan Siswa</div>
			<div class="t m0 x4 h3 y6 ff2 fs0 fc0 sc0 ls0 ws0">1.<span class="_ _2"> </span>Nama<span class="_ _3"> </span>: <?php echo $baca->nama; ?></div>
			<div class="t m0 x4 h3 y7 ff2 fs0 fc0 sc0 ls0 ws0">2.<span class="_ _2"> </span>No. Induk<span class="_ _4"> </span>: <?php echo $baca->nis; ?></div>
			<div class="t m0 x4 h3 y8 ff2 fs0 fc0 sc0 ls0 ws0">3.<span class="_ _2"> </span>No.NISN<span class="_ _5"> </span>: <?php echo $baca->nisn; ?></div>
			<div class="t m0 x4 h3 y9 ff2 fs0 fc0 sc0 ls0 ws0">4.<span class="_ _2"> </span>Jenis Kelamin<span class="_ _6"> </span>: <?php if($baca->jk="L"){echo "Laki-laki";}else{echo "Perempuan";}; ?> </div>
			<div class="t m0 x4 h3 ya ff2 fs0 fc0 sc0 ls0 ws0">5.<span class="_ _2"> </span>Tempat dan Tanggal Lahir<span class="_ _7"> </span>: <?php echo $baca->tmp_lahir; ?>, <?php echo date_indo($baca->tgl_lahir); ?></div>
			<div class="t m0 x4 h3 yb ff2 fs0 fc0 sc0 ls0 ws0">6.<span class="_ _2"> </span>Mulai Masuk Tanggal<span class="_ _8"> </span>: <?php echo date_indo($baca->tgl_masuk); ?></div><div class="t m0 x4 h3 yc ff2 fs0 fc0 sc0 ls0 ws0">7.<span class="_ _2"> </span>Asal Sekolah<span class="_ _9"> </span>: Madrasah Tsanawiyah Al Amien</div>
			<div class="t m0 x4 h3 yd ff2 fs0 fc0 sc0 ls0 ws0">8.<span class="_ _2"> </span>Diterima Kelas<span class="_ _a"> </span>: 7</div>
			<div class="t m0 x4 h3 ye ff2 fs0 fc0 sc0 ls0 ws0">9.<span class="_ _2"> </span>Tujuan Pindah Siswa<span class="_ _b"> </span>: MTs Miftahul Huda Curah Kates Klompangan </div>
			<div class="t m0 x3 h3 yf ff2 fs0 fc0 sc0 ls0 ws0">B.<span class="_ _1"> </span> Keterangan Orang Tua</div>
			<div class="t m0 x4 h3 y10 ff2 fs0 fc0 sc0 ls0 ws0">1.<span class="_ _2"> </span>Nama Ayah<span class="_ _c"> </span>: <?php echo $baca->nm_ayh; ?></div>
			<div class="t m0 x4 h3 y11 ff2 fs0 fc0 sc0 ls0 ws0">2.<span class="_ _2"> </span>Nama Ibu<span class="_ _d"> </span>: <?php echo $baca->nm_ibu; ?></div>
			<div class="t m0 x4 h3 y12 ff2 fs0 fc0 sc0 ls0 ws0">3.<span class="_ _2"> </span>Alamat<span class="_ _e"> </span>: <?php echo $baca->alamat.', '.$baca->kelurahan; ?></div>
			<div class="t m0 x4 h3 y13 ff2 fs0 fc0 sc0 ls0 ws0">4.<span class="_ _2"> </span>Pekerjaan<span class="_ _f"> </span>: <?php echo $baca->kerja_ayh; ?></div>
			<div class="t m0 x0 h3 y14 ff2 fs0 fc0 sc0 ls0 ws0">Yang bersangkutan menjadi siswa Madrasah Tsanawiyah  Al Amien Sabrang Ambulu Jember.</div>
			<div class="t m0 x3 h3 y15 ff2 fs0 fc0 sc0 ls0 ws0">1.<span class="_ _2"> </span>Kelas<span class="_ _10"> </span>: <?php echo $baca->kelas_aktf; ?></div>
			<div class="t m0 x3 h3 y16 ff2 fs0 fc0 sc0 ls0 ws0">2.<span class="_ _2"> </span>Tahun Pelajaran<span class="_ _11"></span>: <?php echo $set->tapel ?></div><div class="t m0 x0 h3 y17 ff2 fs0 fc0 sc0 ls0 ws0">dan pindah dari sekolah ini.</div>
			<div class="t m0 x3 h3 y18 ff2 fs0 fc0 sc0 ls0 ws0">1.<span class="_ _2"> </span>Tanggal Pindah<span class="_ _12"> </span>: <?php echo date_indo($baca->tgl_out); ?></div>
			<div class="t m0 x3 h3 y19 ff2 fs0 fc0 sc0 ls0 ws0">2.<span class="_ _2"> </span>Alasan Pindah<span class="_ _13"> </span>: <?php echo $baca->alasan_out; ?></div>
			<div class="t m0 x0 h3 y1a ff2 fs0 fc0 sc0 ls0 ws0">Catatan</div>
			<div class="t m0 x3 h3 y1b ff2 fs0 fc0 sc0 ls0 ws0">1.<span class="_ _2"> </span>Lampran surat pindah terdiri dari:</div>
			<div class="t m0 x5 h3 y1c ff2 fs0 fc0 sc0 ls0 ws0">a.<span class="_ _2"> </span>Surat Pindah</div>
			<div class="t m0 x5 h3 y1d ff2 fs0 fc0 sc0 ls0 ws0">b.<span class="_ _2"> </span>Raport</div>
			<div class="t m0 x3 h3 y1e ff2 fs0 fc0 sc0 ls0 ws0">2.<span class="_ _2"> </span>Setelah <span class="_ _14"> </span>pindah <span class="_ _14"> </span>yang <span class="_ _14"> </span>bersangkutan <span class="_ _14"> </span>tidak <span class="_ _14"> </span>dapat <span class="_ _14"> </span>diterima <span class="_ _14"> </span>kembali <span class="_ _14"> </span>di <span class="_ _14"> </span>Madrasah <span class="_ _14"> </span>Tsanawiyah      </div>
			<div class="t m0 x6 h3 y1f ff2 fs0 fc0 sc0 ls0 ws0">Al Amien Al Amien Sabrang Ambulu.</div>
			<div class="t m0 x0 h3 y20 ff2 fs0 fc0 sc0 ls0 ws0">Demikian <span class="_ _15"> </span>surat <span class="_ _15"> </span>keterangan <span class="_ _15"> </span>pindah <span class="_ _15"> </span>ini, <span class="_ _15"> </span>apabila <span class="_ _15"> </span>dikemudian <span class="_ _15"> </span>hari <span class="_ _15"> </span>terdapat <span class="_ _15"> </span>kekeliruan <span class="_ _15"> </span>akan <span class="_ _15"> </span>kami </div>
			<div class="t m0 x0 h3 y21 ff2 fs0 fc0 sc0 ls0 ws0">perbaiki sebagaimana mestinya</div>
			<div class="t m0 x7 h3 y22 ff2 fs0 fc0 sc0 ls0 ws0">Ambulu, <?php echo date_indo($baca->tgl_out); ?></div>
			<div class="t m0 x7 h3 y23 ff2 fs0 fc0 sc0 ls0 ws0">Kepala Madrasah</div>
			<div class="t m0 x7 h2 y24 ff1 fs0 fc0 sc0 ls0 ws0">Zaenal Arifin, S.Pd.I</div>
			<!-- <div class="t m0 x7 h3 y25 ff2 fs0 fc0 sc0 ls0 ws0">NIP. 197703172005011008</div> -->
		</div>
		<div class="pi" data-data='{"ctm":[1.000000,0.000000,0.000000,1.000000,0.000000,0.000000]}'></div>
	</div>
</div>
<div class="loading-indicator">
</div>
</body>
</html>
