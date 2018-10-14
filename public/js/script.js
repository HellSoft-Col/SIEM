(function($) {
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
            document.getElementById("mainNav").style.padding = "10px 5px";
            document.getElementById("logo").style.height = "40px";
        } else {
            document.getElementById("mainNav").style.padding = "20px 5px";
            document.getElementById("logo").style.height = "55px";
        }
    }
})(jQuery); // End of use strict
