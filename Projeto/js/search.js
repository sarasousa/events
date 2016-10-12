$(document).ready(setUp);
function setUp() {
	$("#search").keyup(function(){

        var filter = $(this).val();

        $(".col img").each(function(){

            if ($(this).attr('title').search(new RegExp(filter, "i")) < 0) {
                $(this).fadeOut();
                $(this).parent().hide();

            } else {
                $(this).fadeIn();
                $(this).parent().show();
            }
        });

        $(".event-title").each(function(){

            var visible_col = $(this).siblings().filter(':visible');
            if (visible_col.size() == 0)
            {
                $(this).hide();
            } else {
                $(this).show();
              
            }
         });

        $(".event-title").css({'margin-top':'0px'});

        $(".event-title").filter(':visible').filter(':first').css({'margin-top':'140px'});
       
    });
}