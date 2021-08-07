$(document).ready(function(){
    
    $(".menuBtn").on("click", function(){
        if (!$(this).hasClass("Active")) {
            $(".Active").removeClass("Active");
            $(this).addClass("Active");
        } else {
            $(this).removeClass("Active");
        }
    });

    //Vars
    var itemSelected = false;
    var mOpen = false;

    //Init
    $(".menu").hide();
    $(".navDropdown").hide();
    $(".menu").animate({width: '0px'});
    $(".navDropdown").animate({width: '0px'});

    //Menu open / close
    $("#menu-button").on("click", function(){
        if (!mOpen) {
            mOpen = true;
            $(".menu").show();  
            if (itemSelected) {
                $(".menu").stop().animate({width: '400px'});
            } else {
                $(".menu").stop().animate({width: '300px'});
            }
        } else {
            mOpen = false;
            $(".menu").stop().animate({width: '0px'});
            $(".menu").hide(100); 
        }
    });

    // Dropdown
    $(".navBtnDD").on({
        //open / close
        "click": function(){
            if (itemSelected) {
                if ($(this).hasClass("Open")) {
                    itemSelected = false;
                    $(".navDropdown").stop(true).animate({width: '0px'}).hide(100);
                    $(this).removeClass("Open");
                    $(".menu").stop(true).animate({width: '300px'});
                } else {
                    itemSelected = true;
                    $(".navDropdown").stop(true).animate({width: '0px'}).hide(350);
                    $(".menu").stop(true).animate({width: '300px'});
                    $(".navButton").removeClass("Open");
                    $(this).find("ul").stop(true).show(350).animate({width: '100px'});
                    $(this).addClass("Open"); 
                    $(".menu").animate({width: '400px'});              
                }              
            } else {
                itemSelected = true;
                $(this).find("ul").stop(true).show(0).animate({width: '100px'});
                $(this).addClass("Open");
                $(".menu").stop(true).animate({width: '400px'});
            }
        }, //Hover
        "mouseenter": function(){
            if (!itemSelected) {
                $(this).find("ul").stop(true).show().animate({width: '100px'});
                $(".menu").animate({width: '400px'});
            }
        },
        "mouseleave": function(){
            if (!itemSelected) {
                $(this).find("ul").stop(true).animate({width: '0px'}).hide(350);
                $(".menu").stop(true).animate({width: '300px'});
            }
        }
    });
});