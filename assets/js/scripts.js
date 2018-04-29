(function() {
    "use strict";

    // custom scrollbar

    $("html").niceScroll({styler:"fb",cursorcolor:"#1b93e1", cursorwidth: '6', cursorborderradius: '10px', background: '#FFFFFF', spacebarenabled:false, cursorborder: '0',  zindex: '1000'});

    $(".scrollbar1").niceScroll({styler:"fb",cursorcolor:"#1b93e1", cursorwidth: '6', cursorborderradius: '0',autohidemode: 'false', background: '#FFFFFF', spacebarenabled:false, cursorborder: '0'});



    $(".scrollbar1").getNiceScroll();
    if ($('body').hasClass('scrollbar1-collapsed')) {
        $(".scrollbar1").getNiceScroll().hide();
    }

    // function hasGetUserMedia() {
    //   return !!(navigator.mediaDevices && navigator.mediaDevices.getUserMedia);
    // }
    //
    // if (hasGetUserMedia()) {
    //   alert('good to go');
    // } else {
    //   alert('getUserMedia() is not supported by your browser');
    // }

    $(".showtakephoto").click( function (){
        //var toggle = $(".takephoto").toggle();

        if($(".takephoto").toggle().is(":visible")){
          $(".takephoto").find('input').removeAttr('disabled');
        }else{
          $(".takephoto").find('input').attr('disabled');
        }
        // if($(".takephoto").hide()){
        //   $(".takephoto").find('input').attr('disabled');
        // }else{
        //   $(".takephoto").find('input').removeAttr('disabled');
        // }
    });

    // $(".hasbank").change(function() {
    //     if(this.checked) {
    //       $(".showaccountfield").show().find('input, select').removeAttr('disabled');
    //     }else{
    //       $(".showaccountfield").hide().find('input, select').attr('disabled');
    //     }
    // });



})(jQuery);
