$(document).ready(function(){





        /*-----------------------
               PAGE ADMIN
        -------------------------- */

        // background color changes with timer
        function playsliderAdmin(){
            $('#admin-page-section-1').css("background-color", "rgba(252, 210, 244, 0.8)");
            var interval = 2000; // `setTimeout` accepts time in millis
            // Change the color to red after 6 seconds
            setTimeout(function() {
                $('#admin-page-section-1').css("background-color", "rgba(215, 192, 180, 0.91)");
            }, interval);
            x = setTimeout(function(){playsliderAdmin()}, 6000);
        }
        playsliderAdmin();


        /*-----------------------
               PAGE ADMIN ORDER
        -------------------------- */
        // background color changes with timer
        function playslider(){
            $('#main-admin-orders').css("background-color", "rgba(194, 206, 215, 0.91)");
            var interval = 2000; // `setTimeout` accepts time in millis
            // Change the color to red after 6 seconds
            setTimeout(function() {
                $('#main-admin-orders').css("background-color", "rgba(215, 192, 180, 0.91)");
            }, interval);
            x = setTimeout(function(){playslider()}, 6000);
        }
        playslider();


    /*----------------------------
         PAGE TOUS LES ATELIERS
    ------------------------------ */

    // background color changes with timer
    function playsliderAllAteliers(){
        $('#section-1-atelier').css("background-color", "rgba(221, 255, 210, 0.8)");
        var interval = 2000; // `setTimeout` accepts time in millis
        // Change the color to red after 6 seconds
        setTimeout(function() {
            $('#section-1-atelier').css("background-color", "rgba(255, 238, 207, 1)");
        }, interval);
        x = setTimeout(function(){playsliderAllAteliers()}, 6000);
    }
    playsliderAllAteliers();


        /*-----------------------
               PAGE PRODUCT EDITOR
        -------------------------- */

        // background color changes with timer
        function playsliderProductEditor(){
            $('#product-editor').css("background-color", "rgba(252, 210, 244, 0.8)");
            var interval = 2000; // `setTimeout` accepts time in millis
            // Change the color to red after 6 seconds
            setTimeout(function() {
                $('#product-editor').css("background-color", "rgba(215, 192, 180, 0.91)");
            }, interval);
            x = setTimeout(function(){playsliderProductEditor()}, 6000);
        }
        playsliderProductEditor();




        /*-----------------------
             PAGE ATELIER EDITOR
        -------------------------- */

        // background color changes with timer
        function playsliderAtelierEditor(){
            $('#main-atelier-editor').css("background-color", "rgba(252, 210, 125, 0.8)");
            var interval = 2000; // `setTimeout` accepts time in millis
            // Change the color to red after 6 seconds
            setTimeout(function() {
                $('#main-atelier-editor').css("background-color", "rgba(152, 192, 126, 0.91)");
            }, interval);
            x = setTimeout(function(){playsliderAtelierEditor()}, 6000);
        }
        playsliderAtelierEditor();



        /*-----------------------
               PAGE ATELIER EDITOR
         -------------------------- */

        function playsliderSingleAtelier(){
            $('#single-atelier-block').css("background-color", "rgba(200, 150, 180, 0.7)");
            $('#single-atelier-block').css("color", "rgb(11,60,55)");
            $('#single-atelier-block h2').css("color", "rgb(11,100,55)");
            $('#single-atelier-block a').css("color", "rgb(255,255,255)");
            $('#single-atelier-block p').css("color", "rgb(255,255,255)");
            var interval = 2000; // `setTimeout` accepts time in millis
            // Change the color to red after 6 seconds
            setTimeout(function() {
                $('#single-atelier-block').css("background-color", "rgba(150, 160, 230, 0.91)");

                $('#single-atelier-block').css("color", "rgb(0,0,0)");
                $('#single-atelier-block h2').css("color", "rgb(0,0,0)");
                $('#single-atelier-block a').css("color", "rgb(0,0,0)");
                $('#single-atelier-block p').css("color", "rgb(0,0,0)");
            }, interval);




            x = setTimeout(function(){playsliderSingleAtelier()}, 6000);
        }
        playsliderSingleAtelier();


        /*----------------------------
             PAGE TOUS LES ATELIERS Admin
        ------------------------------ */

        // background color changes with timer
        function playsliderAdminAllAteliers(){
            $('#admin-all-ateliers').css("background-color", "rgba(252, 210, 125, 0.8)");
            var interval = 2000; // `setTimeout` accepts time in millis
            // Change the color to red after 6 seconds
            setTimeout(function() {
                $('#admin-all-ateliers').css("background-color", "rgba(152, 192, 126, 0.91)");
            }, interval);
            x = setTimeout(function(){playsliderAdminAllAteliers()}, 6000);
        }
        playsliderAdminAllAteliers();






    /*-----------------------
           ALL PRODUCTS ADMIN
    -------------------------- */

    // background color changes with timer
    function playsliderAdminAllProducts(){
        $('#main-admin-all-products').css("background-color", "rgba(40, 210, 244, 0.8)");
        var interval = 2000; // `setTimeout` accepts time in millis
        // Change the color to red after 6 seconds
        setTimeout(function() {
            $('#main-admin-all-products').css("background-color", "rgba(215, 192, 180, 0.91)");
        }, interval);
        x = setTimeout(function(){playsliderAdminAllProducts()}, 6000);
    }
    playsliderAdminAllProducts();







// fade out title and redirect to accueil.php
    $("#video").click(function() {
        $(this).fadeOut(4000);
        $("#skip").fadeOut(2000);
        setTimeout(function() {
            window.location.href = 'http://localhost:8888/accueil.php';
        }, 4000);
    });



    /*-----------------------
               PAGE SINGLE PRODUCT USER
        -------------------------- */


    // background color changes with timer
    function playsliderSingleProduct(){
        $('#single-product-block').css("background-color", "rgba(252, 210, 244, 0.8)");
        var interval = 2000; // `setTimeout` accepts time in millis
        // Change the color to red after 6 seconds
        setTimeout(function() {
            $('#single-product-block').css("background-color", "rgba(215, 192, 180, 0.91)");
        }, interval);
        x = setTimeout(function(){playsliderSingleProduct()}, 6000);
    }
    playsliderSingleProduct();


    /*-----------------------
       ALL PRODUCTS USER
-------------------------- */

    // background color changes with timer
    function playsliderAllProductsUser(){
        $('.all-products-block').css("background-color", "rgba(150, 210, 244, 0.8)");
        var interval = 2000; // `setTimeout` accepts time in millis
        // Change the color to red after 6 seconds
        setTimeout(function() {
            $('.all-products-block').css("background-color", "rgba(215, 192, 180, 0.91)");
        }, interval);
        x = setTimeout(function(){playsliderAllProductsUser()}, 6000);
    }
    playsliderAllProductsUser();




    // show description when click on it

    $(".toggle").on('click', function(){
    $('.toggle-description').slideToggle(200);
});

    /* ---------------------
           PAGE ACCUEIL
    ----------------------- */


    /* navbar subcategory appear on hover */
    $('#link-block1 a').on('mouseenter',function(){
        $('#link-block1 ul').css('display','block')
    });

    $('#link-block1 a').on('mouseleave',function(){
        $('#link-block1 ul').css('display','none')
    });




    /* ----------------
      scroll function
    ------------------- */

    $(window).on("scroll", function () {

        /* parallax on background image */


        var scrollTop = $(window).scrollTop();
        var imgPos = scrollTop / 50 + 'px';
        $('.parallax').css('transform', 'translateY(' + imgPos + ')');



        /* carousel text appear on each slide */
        $('.carousel').carousel({
            interval: 4500
        });


        $('#text').html($('.active > .carousel-caption').html());
        $('#text').css({'opacity':'0'});

        /* text hidden at start */

        $('.carousel').on('slid.bs.carousel', function () {

            $('#text').html($('.active > .carousel-caption').html());

            /* opacity */
            $('#text').css({'opacity':'1'});
            $('#text').css({'top':'40%'});
        });



        /* -----------------------------------
           section 1 appears on window scroll
         -----------------------------------  */

        if ($(this).scrollTop() > 110) {
            $("#presentation-section-1 .container").css({"marginTop":"8rem"});



            $("#presentation-section-1 .container").css({"opacity":1});

        } else {
            $("#presentation-section-1 .container").css({"marginTop":"40rem"});

            $("#presentation-section-1 .container").css({"opacity":0});
        }


        /* -----------------------------------
            section 2 appears on window scroll
          -----------------------------------  */

        if ($(this).scrollTop() > 600) {
            $("#presentation-section-2").css({"marginTop":"7rem"});
            // $("h2.scroll1").css({"color":"#A7BA7C"});
            $("#presentation-section-2 div").css({"opacity":1});

        } else {
            $("#presentation-section-2").css({"marginTop":"180px"});
            // $("h2.scroll1").css({"opacity":"0"});
            $("#presentation-section-2 div").css({"opacity":0});
        }







        /* -----------------------------------
              section 3 appears on window scroll
            -----------------------------------  */

        if ($(this).scrollTop() > 1200) {
            $("#presentation-section-3").css({"marginTop":"7rem"});
            // $("h2.scroll1").css({"color":"#A7BA7C"});
            $("#presentation-section-3 div").css({"opacity":1});

        } else {
            $("#presentation-section-3").css({"marginTop":"300px"});
            // $("h2.scroll1").css({"opacity":"0"});
            $("#presentation-section-3 div").css({"opacity":0});
        }




        /* -----------------------------------
              section 8 appears on window scroll
            -----------------------------------  */

        if ($(this).scrollTop() > 1700) {
            $("#presentation-section-8").css({"marginLeft":"0px"});
            $("#presentation-section-8").css({"marginTop":"7rem"});
            // $("h2.scroll1").css({"color":"#A7BA7C"});
            $("#presentation-section-8 div").css({"opacity":1});

        } else {
            $("#presentation-section-8").css({"marginLeft":"40rem"});
            $("#presentation-section-8").css({"marginTop":"30rem"});
            // $("h2.scroll1").css({"opacity":"0"});
            $("#presentation-section-8 div").css({"opacity":0});
        }





        /* -----------------------------------
           section 4 appears on window scroll
         -----------------------------------  */

        if ($(this).scrollTop() > 2200) {
            $("#presentation-section-4").css({"marginTop":"7rem"});
            // $("h2.scroll1").css({"color":"#A7BA7C"});
            $("#presentation-section-4 div").css({"opacity":1});

        } else {
            $("#presentation-section-4").css({"marginTop":"20rem"});
            // $("h2.scroll1").css({"opacity":"0"});
            $("#presentation-section-4 div").css({"opacity":0});
        }



        /* -----------------------------------
                  section 9 appears on window scroll
                -----------------------------------  */

        /*if ($(this).scrollTop() > 2500) {*/
           /* $("#presentation-section-9").css({"marginTop":"7rem"});
            $("#presentation-section-9 div").css({"opacity":1});*/

       /* } else {
            $("#presentation-section-9").css({"marginTop":"2200px"});
            // $("h2.scroll1").css({"opacity":"0"});
            $("#presentation-section-9 div").css({"opacity":0});
            */

            if ($(this).scrollTop() > 2700) {
                $("#presentation-section-9").css({"marginTop":"7rem"});
                $("#presentation-section-9").css({"marginLeft":"0px"});
                $("#presentation-section-9 div").css({"opacity":1});

            } else {
                $("#presentation-section-9").css({"marginTom":"-300rem"});
                $("#presentation-section-9").css({"marginLeft":"100rem"});
                // $("h2.scroll1").css({"opacity":"0"});
                $("#presentation-section-9 div").css({"opacity":0});
            }




        /* -----------------------------------
           section 5 appears on window scroll
         -----------------------------------  */

        if ($(this).scrollTop() > 3000) {
            $("#presentation-section-5").css({"marginLeft":"5.3rem"});
            // $("h2.scroll1").css({"color":"#A7BA7C"});
            $("#presentation-section-5 div").css({"opacity":1});

        } else {
            $("#presentation-section-5").css({"marginLeft":"-70px"});
            // $("h2.scroll1").css({"opacity":"0"});
            $("#presentation-section-5 div").css({"opacity":0});
        }



        /* -----------------------------------
              section 6 appears on window scroll
            -----------------------------------  */

        if ($(this).scrollTop() > 3400) {
            $("#presentation-section-6").css({"marginTop":"4rem"});
            // $("h2.scroll1").css({"color":"#A7BA7C"});
            $("#presentation-section-6 div").css({"opacity":1});

        } else {
            $("#presentation-section-6").css({"marginTop":"1600px"});
            // $("h2.scroll1").css({"opacity":"0"});
            $("#presentation-section-6 div").css({"opacity":0});
        }






        /* -----------------------------------
             section 7 appears on window scroll
           -----------------------------------  */

        // if ($(this).scrollTop() > 3200) {
        //    $("#presentation-section-7").css({"marginTop":"2rem"});

        //    $("#presentation-section-7 div").css({"opacity":1});

        // } else {
        //    $("#presentation-section-7").css({"marginTop":"2200px"});

        //    $("#presentation-section-7 div").css({"opacity":0});
        // }

        /* image left */
        if ($(this).scrollTop() > 3600) {
            $("#img_68").css({"marginLeft":"0rem"});
            $("#img_68").css({"marginTop":"0rem"});
            $("#presentation-section-7").css({"marginTop":"7rem"})
            $("#img_68").css({"opacity":1});
        } else {
            $("#img_68").css({"marginLeft":"-200rem"});
            $("#img_68").css({"marginTop":"30rem"});
            $("#img_68").css({"opacity":1});
        }

        /* H2 actualités */
        if ($(this).scrollTop() > 3500) {
            $("#presentation-section-7 h2").css({"marginLeft":"0rem"});
            $("#presentation-section-7 h2").css({"opacity":1});
        } else {
            $("#presentation-section-7 h2").css({"marginLeft":"-60rem"});
            $("#presentation-section-7 h2").css({"opacity":0});
        }


        /* toutes nos actualités button */
        if ($(this).scrollTop() > 3900) {
            $("#actualités-button-1").css({"marginLeft":"1rem"});
            $("#actualités-button").css({"opacity":0});
        } else {
            $("#actualités-button-1").css({"marginLeft":"20rem"});
            $("#actualités-button-1").css({"opacity":1});
        }


        /* image right */
        if ($(this).scrollTop() > 3900) {
            $("#img_26").css({"marginRight":"0rem"});
            $("#img_26").css({"opacity":1});
        } else {
            $("#img_26").css({"marginRight":"-41rem"});
            $("#img_26").css({"opacity":0});
        }



        /* -----------------------------------
              PAGE PRODUCT_EDITOR
            -----------------------------------  */
        /*if ($(this).scrollTop() > 20) {
            $("h1").css({"marginLeft":"0rem"});
            $("h1").css({"opacity":1});
        } else {
            $("h1").css({"marginLeft":"-80rem"});
            $("h1").css({"opacity":0});
        }*/
    });





    /*-----------------------
           PAGE ATELIERS
    -------------------------- */

    /* show hidden section when hover on navbar link */
    $("#atelier-link").on('mouseenter', function() {
        $("#hidden-section").css('display','block');
    });

    $("#hidden-section").on('mouseleave', function() {
        $("#hidden-section").css('display','none');
    });


    /* page nos lieux  */


    /* picture is bigger on hover */





});