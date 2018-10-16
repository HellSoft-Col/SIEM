(function ($) {
    "use strict";
    // Auto-scroll
    $('#myCarousel').carousel({
        interval: 5000
    });

    // Control buttons
    $('.next').click(function () {
        $('.carousel').carousel('next');
        return false;
    });
    $('.prev').click(function () {
        $('.carousel').carousel('prev');
        return false;
    });

    // On carousel scroll
    $("#myCarousel").on("slide.bs.carousel", function (e) {
        var $e = $(e.relatedTarget);
        var idx = $e.index();
        var itemsPerSlide = 3;
        var totalItems = $(".carousel-item").length;
        if (idx >= totalItems - (itemsPerSlide - 1)) {
            var it = itemsPerSlide -
                (totalItems - idx);
            for (var i = 0; i < it; i++) {
                // append slides to end
                if (e.direction == "left") {
                    $(
                        ".carousel-item").eq(i).appendTo(".carousel-inner");
                } else {
                    $(".carousel-item").eq(0).appendTo(".carousel-inner");
                }
            }
        }
    });
})
(jQuery);
//////////////////////////////////////////////////////////////////////////////////////

$(function () {
    $('.pop').on('click', function () {
        $('.imagepreview').attr('src', $(this).find('img').attr('src'));
        $('#imagemodal').modal('show');
    });
});


//////////////////////////////////////////////////////////////////////////////////////
$(window).ready(function () {

    var init = function () {
        popup();
        readProductData();
    };

    var isDone = true;

    var popup = function () {
        var $items = $('.mini-carousel ul');
        var $linkClick = $('.mini-carousel ul li a');
        $('.video-player').hide();
        $('.btn-view').on('click', function () {
            $('#quick-view-pop-up').fadeToggle();
            $('#quick-view-pop-up').css({"top": "34px", "left": "314px"});
            $('.mask').fadeToggle();
        });
        $('.mask').on('click', function () {
            $('.mask').fadeOut();
            $('#quick-view-pop-up').fadeOut();
        });
        $('.quick-view-close').on('click', function () {
            $('.mask').fadeOut();
            $('#quick-view-pop-up').fadeOut();
        });

        $('.prev').on('click', function () {
            //animate on UL element of small image on the left
            if (!isDone) return;
            if ($items.position().top === 0) {
                $items.css({'top': '-125px'});
                $items.children('li').last().prependTo($items);
            }
            isDone = false;
            $('.mini-carousel ul').animate({
                top: "+=125px"
            }, 200, function () {
                isDone = true;
            });
            $('.image-large ul li').last().prependTo($('.image-large ul'));
        });

        $('.next').on('click', function () {
            //animate on UL element of class 'mini-carousel'
            if (!isDone) return;

            if ($items.position().top === 0) {
                $items.css({'top': '125px'});
                $items.children('li').first().appendTo($items);
            }
            isDone = false;
            $('.mini-carousel ul').animate({
                top: "-=125px"
            }, 300, function () {
                isDone = true;
            });
            $('.image-large ul li').first().appendTo($('.image-large ul'));
        });
        $('.quick-view-video').on('click', function () {
            $('.video-player').toggle();
            $('.image-large ul').toggle();
        });
    };
    var readProductData = function () {
        $.getJSON("winners.json", function (result) {
            $.each(result, function (val) {
                console.log(val.key);
            });
        });
    };
    init();
});
