<style type="text/css">
    body {padding:0px}
    .print-area {border:0px solid red;padding:1em;margin:0 0 1em}
</style>

    <title></title>
</head>
<body>
<div class="content-wrapper">
    <div style="text-align:center;"><a class="btn btn-primary btn-sm" class="no-print" href="javascript:printDiv('print-area-1');"><i class="fas fa-print"></i> Print</a></div>

    <div id="print-area-1" class="print-area">
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