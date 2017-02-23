$(document).ready(function() {
    $(window).scroll(function() {

    if ($(window).scrollTop() > 200) {
        $('#nav').addClass('sticky');
    } else {
        $('#nav').removeClass('sticky');
    }
    });

    $('.mobile-toggle').click(function() {
    if ($('.nav').hasClass('show')) {
        $('.nav').removeClass('show');
    } else {
        $('.nav').addClass('show');
    }
    });
    
    $('#col_1').click(function(){
        $('#panel_1').slideToggle('slow');
    });

    $('#col_2').click(function(){
        $('#panel_2').slideToggle('slow');
    });

    $('#col_3').click(function(){
        $('#panel_3').slideToggle('slow');
    });

    $('#col_4').click(function(){
        $('#panel_4').slideToggle('slow');
    });
    
    

}); 
    


