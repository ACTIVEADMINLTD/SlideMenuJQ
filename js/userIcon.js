$(document).ready(function(){
    $(".userIcon").on({
        "mouseenter": function(){
            $(".userOverlay").stop().animate({width: '25px'});
        },
        "mouseleave": function(){
            $(".userOverlay").stop().animate({width: '0px'});
        }
    });
});