  $(document).ready(function() {
      
      $('body').prepend('<a href="top" class="btn btn-success btn-lg" style="filter: alpha(opacity=60); -moz-opacity: 0.6; opacity: 0.6" id="uinsa-backtotop"><i class="fa fa-chevron-up"></i></a>');

      var amountScrolled = 100;

      $(window).scroll(function() {
          if ( $(window).scrollTop() > amountScrolled ) {
              $('#uinsa-backtotop').fadeIn('slow');
          } else {
              $('#uinsa-backtotop').fadeOut('slow');
          }
      });

      $('#uinsa-backtotop').click(function() {
          $('html, body').animate({
              scrollTop: 0
          }, 700);
          return false;
      });
  });