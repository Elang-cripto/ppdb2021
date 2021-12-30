<?php 
$role = $this->session->userdata('jabatan');
$this->load->view('theme/head');
$this->load->view('theme/hlink_all');
$this->load->view('theme/hlink_surat');
$this->load->view('theme/nav');
$this->load->view($role.'/side');
?>

<!-- =============================================================================================== -->

<link rel="stylesheet" href="<?php echo base_url('') ?>asset/elang/tabel.css">
    <title></title>
</head>
<body>
<div class="content-wrapper">
    <div style="text-align:center;"><a class="btn btn-primary btn-sm" class="no-print" href="javascript:printDiv('lembar-print');"><i class="fas fa-print"></i> Print</a></div>

    <div id="lembar-print" class="print-area">
        <section class="content">
            <?php
                $par = $this->uri->segment(3);
                $this->load->view($form); 
            ?>
        </section>
    </div>
</div>
<textarea id="printing-css" style="display:none;">.no-print{display:none}</textarea>
    <iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
</body>

<script type="text/javascript">
    function printDiv(elementId) {
    var a = document.getElementById('printing-css').value;
    var b = document.getElementById(elementId).innerHTML;
    window.frames["print_frame"].document.title = document.title;
    window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();
    }   
</script>

<!-- =============================================================================================== -->
<?php 
$this->load->view('theme/foot');
$this->load->view('theme/flink_2');
?>
</body>
</html>