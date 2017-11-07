$(document).ready(function () {
    $('#header').scrollToFixed();
    $('.post').addClass("hidden").viewportChecker({
        classToAdd: 'visible animated fadeInUp',
        offset: 100
    });
    $('.post-2').addClass("hidden").viewportChecker({
        classToAdd: 'visible animated fadeInLeft',
        offset: 100
    });
    $('.post-3').addClass("hidden").viewportChecker({
        classToAdd: 'visible animated fadeInRight',
        offset: 100
    });
    $(".forModal").on("click", function(){
        var src=$(this).attr("src");
        var img=document.createElement("img");
        img.setAttribute("src", src);
        img.setAttribute("id", "imgInModal");
        img.setAttribute("style", "objectFit:cover");
        $(".modal-content").append(img);
        $("#modal").fadeIn(300,"linear");
        if($("#imgInModal").height()>document.documentElement.clientHeight-20){
            $("#imgInModal").height(document.documentElement.clientHeight-20);
        }
        if($("#imgInModal").width()>document.documentElement.clientWidth-20){
            $("#imgInModal").width(document.documentElement.clientWidth-20);
        }
    });
    $("#modal").on("click", function(){
        $("#modal").fadeOut(300,"linear", function(){
            $(".modal-content").html("");
        });
    });

    var offs=$("#header").outerHeight()+21;
    $(".nav-link").on("click", function(e){
        elem=$(this);
        if(elem.attr("href")==="#services"){
            $("body, html").animate({scrollTop: $("#services").offset().top-offs},400);
            e.preventDefault();
        }
        else if(elem.attr("href")==="#materials"){
            $("body, html").animate({scrollTop: $("#materials").offset().top-offs},400);
            e.preventDefault();
        }
        else if(elem.attr("href")==="#order"){
            $("body, html").animate({scrollTop: $("#order").offset().top-offs},400);
            e.preventDefault();
        }
        else if(elem.attr("href")==="#footer"){
            var val;
            if($("#footer").offset().top-offs>$(document).height()- $(window).height()){
                valS=$(document).height()- $(window).height();
            }
            else{
                valS=$("#footer").offset().top-offs;
            }
            $("body, html").animate({scrollTop: valS},400);
            e.preventDefault();
        }
    });
});