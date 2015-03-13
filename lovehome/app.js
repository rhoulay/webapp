// Initialize Swiper
$(document).ready(function () {

    $(window).on('touchstart', function(e) {
        document.getElementById('bg-audio').play();
    });

    window.setTimeout(function(){
        overLoading();
    },2500);



    function overLoading(){
        $('#loading').addClass("animated bounceOut").one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
            $("#loading").removeClass("animated bounceOut");
            hideOpacity($("#loading"));
            $("#logo").css('opacity', '1');
            $("#wave").css('opacity', '1');
            $("#mountain").css('opacity', '1');
            initSwiper();
        });
    }

    hideSlide();
    $("#logo").css('opacity', '0');
    $("#wave").css('opacity', '0');
    $("#mountain").css('opacity', '0');


    function initSwiper(){
        //initialize swiper when document ready
        var mySwiper = new Swiper ('.swiper-container', {
            // Optional parameters
            direction: 'vertical',
            onInit: function(swiper){
                hideSlide();
                showOnebyOne();
            },
            onTransitionEnd: function(swiper){

                showOnebyOne();
            },
            onTransitionStart: function(swiper){
                hideSlide();
            }
        });
    }


    function hideOpacity(obj){
        obj.css('opacity', '0');
    }
    function showOpacity(obj){
        obj.css('opacity', '1');
    }


    function hideSlide(){
        $('.swiper-slide').children().each(function(element){
            if($(this).attr('animated-css')){
                hideOpacity($(this));
                $(this).removeClass('animated ' + $(this).attr('animated-css'));
            }
        });
    }
    function showOnebyOne(){
        $('.swiper-slide-active').children().each(function(element){
            if($(this).attr('animated-css')){
                showOpacity($(this));
                $(this).addClass('animated ' + $(this).attr('animated-css')).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                    $(this).removeClass('animated ' + $(this).attr('animated-css'));
                });
            }

        });
    }
});