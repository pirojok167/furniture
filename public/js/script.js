$(document).ready(function () {
    $('#header').scrollToFixed();
    $('.post').addClass("hidden").viewportChecker({
        classToAdd: 'visible animated fadeIn',
        offset: 100
    });
    // $('.post-2').addClass("hidden").viewportChecker({
    //     classToAdd: 'visible animated fadeInLeft',
    //     offset: 100
    // });
    // $('.post-3').addClass("hidden").viewportChecker({
    //     classToAdd: 'visible animated fadeInRight',
    //     offset: 100
    // });
    $(".btn-send-footer").on("click", function(e){
        e.preventDefault();
        $(".layer-footer").fadeIn(300,"linear");
        var data=$("#form-footer").serializeArray();
        var url=$("#form-footer").attr("action");
        $.ajax({
            method:"POST",
            url:url,
            data:data,
            success:function(data){
                $(".loader").fadeOut(300,"linear", function(){
                    $(".layer-footer-content").append("<h4 style='letter-spacing: 1px;display: none' class='m-auto thx-for-mail'>"+data+"</h4>");
                    document.getElementById("form-footer").reset();
                    $(".thx-for-mail").fadeIn(300,"linear", function () {
                        $(".layer-footer").fadeOut(1500,"linear", function () {
                            $(".thx-for-mail").remove();
                            $(".loader").show();
                        });
                    });
                });
            }
        });
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
    $(".nav-link, .btn-order").on("click", function(e){
        elem=$(this);
        if(elem.attr("href")==="#services"){
            $("body, html").animate({scrollTop: $("#services").offset().top-offs},600,"easeInOutExpo");
            e.preventDefault();
        }
        else if(elem.attr("href")==="#materials"){
            $("body, html").animate({scrollTop: $("#materials").offset().top-offs},600,"easeInOutExpo");
            e.preventDefault();
        }
        else if(elem.attr("href")==="#order"){
            $("body, html").animate({scrollTop: $("#order").offset().top-offs},600,"easeInOutExpo");
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
            $("body, html").animate({scrollTop: valS},600,"easeInOutExpo");
            e.preventDefault();
        }
    });
    $(".btn-making-gallery").on("click", function(){
        $(".og-loading").show();
        if(!$(this).parent().hasClass("og-expanded")){
            $(".gallery-content").html("");
        }
        var id=$(this).attr("id");
        var name=$(this).attr("data-name");
       $.get("/get-making-images/"+id, function(data){
           $(".og-loading").hide();
           var p=document.createElement("p");
           p.innerHTML=name;
           p.classList.add("big", "text-center");
           $(".gallery-content").append(p);
           var div=document.createElement("div");
           div.classList.add("owl-carousel", "owl-theme","w-100","h-100");
           div.style="position:relative";
           $(".gallery-content").append(div);
           var src=JSON.parse(data);
           for(var i=0;i<src.length;i++){
               var timeVar="../images/"+src[i];
               var div2=document.createElement("div");
               div2.classList.add("item");
               $(".owl-carousel").append(div2);
               var img=document.createElement("img");
               img.src=timeVar;
               img.style="height:100%;object-fit:cover;";
               $(".item:nth-last-child(1)").append(img);
           }
           var loop;
           if(src.length>1){
               loop=true;
           }
           else if(src.length===1){
               loop:false;
           }
           $('.owl-carousel').owlCarousel({
               items:1,
               loop:loop,
               nav:true,
               navText : ["",""]
            });
       });
    });
});