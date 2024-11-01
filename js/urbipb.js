jQuery(function($) {

  var urbiPromoBar = $('#urbipb-announcement-container');

  function urbiCheckPageMargin() {
    var comboHeight = urbiPromoBar.outerHeight() + 'px';

    $('body.urbipb-active').css('padding-top', comboHeight);
  }

  function showAnnouncement() {
    if ( urbipb_data.cookie_value !== Cookies.get('urbipb') ) {
      $('body').addClass('urbipb-active');

      if ( urbipb_data.fixed == '1' ) {
        var wpAdminBarHeight = $('#wpadminbar').outerHeight() + 'px';

        $('body').addClass('urbipb-fixed');
        urbiPromoBar.css('position', 'fixed');
        //urbiPromoBar.css('margin-top', wpAdminBarHeight);
      }

      $('#urbipb-announcement-container').slideDown('fast', function(){
        urbiCheckPageMargin();
      });
    }
  }
  
  $('#urbipb-announce-btn').click(function() {
    Cookies.set("urbipb", urbipb_data.cookie_value, urbipb_data.cookie_args);
    $('#urbipb-announcement-container').slideUp('fast', function(){
      $('body').removeClass('urbipb-active urbipb-fixed');
      $('body').css('padding-top', 'inherit');
    });
  });

  $(window).on('load', showAnnouncement);
  $(window).on('resize', urbiCheckPageMargin);
  $(document).ready(urbiCheckPageMargin);

}); // jQuery
