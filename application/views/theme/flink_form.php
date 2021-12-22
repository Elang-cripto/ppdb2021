<!-- jQuery -->
<script src="<?php echo base_url('') ?>asset/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('') ?>asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('') ?>asset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('') ?>asset/dist/js/demo.js"></script>
<!-- Elang.js -->
<script src="<?php echo base_url('') ?>asset/dist/js/elang.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url('') ?>asset/plugins/summernote/summernote-bs4.min.js"></script>
<!-- Page Script -->
<script src="<?php echo base_url('') ?>asset/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
	 $(function () {
	    //Add text editor
	    $('#compose-textarea').summernote()
	  })
	  $(document).ready(function () {
	      bsCustomFileInput.init();
	    });

    $('#cekform').validate({
	    rules: {
		    email: {
		        required: true,
		        email: true,
		    },
		    username: {
		        required: true,
		        minlength: 6
		    },
		    password: {
		        required: true,
		        minlength: 6
		    },
		    terms: {
		        required: true
		    },
	    },
	    messages: {
	      email: {
	        required: "Please enter a email address",
	        email: "Please enter a vaild email address"
	      },
	      password: {
	        required: "Please provide a password",
	        minlength: "Your password must be at least 5 characters long"
	      },
	      terms: "Please accept our terms"
	    },
	    errorElement: 'span',
	    errorPlacement: function (error, element) {
	      error.addClass('invalid-feedback');
	      element.closest('.form-group').append(error);
	    },
	    highlight: function (element, errorClass, validClass) {
	      $(element).addClass('is-invalid');
	    },
	    unhighlight: function (element, errorClass, validClass) {
	      $(element).removeClass('is-invalid');
	    }
	  });
</script>