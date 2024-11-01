jQuery(function($) {

  $(document).ready(function() {

    $('a#urbipb_cookie_reset').on( "click", function(e) {
      e.preventDefault();

      var urbipb_cookie_value_setting = $('input#urbipb_cookie_set_value');
      var urbipb_Confirm_Reset = confirm("You are about to reset the cookie value and promobar for all users. Continue?");

      if ( urbipb_Confirm_Reset == true ) {
        $.post( 
          ajaxurl, 
          { 'action' : 'urbipb_reset_cookie_value' },
          function(response) {
            randomized_value = JSON.parse(response);
            urbipb_cookie_value_setting.val( randomized_value );
          } // function(response)
        ); // post
      } // endif urbipb_Confirm_Reset
      
    }); // on click

    $('.color-picker').iris({
      defaultColor: true,
      change: function(event, ui){},
      clear: function() {},
      hide: true,
      palettes: true
    });

  
  }); // document.ready

}); // jQuery
