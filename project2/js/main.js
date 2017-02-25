//Wait until ready for input
jQuery(document).ready(function($) {

    //Show general search box on #search click
    $("#search").click(function(event) {
        $(".hidden").toggle('fast');
    });

});
