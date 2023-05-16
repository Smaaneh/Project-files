$(document).ready(function(){
    $(".dropdown").click(function(){
        $(".menu").toggleClass("showMenu");
        $(".menu > li").click(function(){
            $(".dropdown > p").html($(this).html());
            $(".menu").removeClass("showMenu");
        });
    });
});