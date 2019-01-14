$(document).ready(function(){




// fade out title and redirect to accueil.php
$("#video").click(function() {
  $(this).fadeOut(4000);
  $("#skip").fadeOut(2000);
  setTimeout(function() {
       window.location.href = 'http://localhost:8888/accueil.php';
      }, 4000);
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
      $("#presentation-section-2").css({"marginTop":"2rem"});
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
      $("#presentation-section-3").css({"marginTop":"2rem"});
      // $("h2.scroll1").css({"color":"#A7BA7C"});
      $("#presentation-section-3 div").css({"opacity":1});

   } else {
      $("#presentation-section-3").css({"marginTop":"700px"});
      // $("h2.scroll1").css({"opacity":"0"});
      $("#presentation-section-3 div").css({"opacity":0});
   }


   /* -----------------------------------
      section 4 appears on window scroll
    -----------------------------------  */

   if ($(this).scrollTop() > 1900) {
      $("#presentation-section-4").css({"marginTop":"1rem"});
      // $("h2.scroll1").css({"color":"#A7BA7C"});
      $("#presentation-section-4 div").css({"opacity":1});

   } else {
      $("#presentation-section-4").css({"marginTop":"650px"});
      // $("h2.scroll1").css({"opacity":"0"});
      $("#presentation-section-4 div").css({"opacity":0});
   }



   /* -----------------------------------
      section 5 appears on window scroll
    -----------------------------------  */

   if ($(this).scrollTop() > 2600) {
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

   if ($(this).scrollTop() > 3100) {
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
    if ($(this).scrollTop() > 3800) {
      $("#img_25").css({"marginLeft":"0rem"});
      $("#img_25").css({"opacity":1});
   } else {
      $("#img_25").css({"marginLeft":"-41rem"});
      $("#img_25").css({"opacity":0});
   }

    /* H2 actualités */
     if ($(this).scrollTop() > 3800) {
      $("#presentation-section-7 h2").css({"marginLeft":"4rem"});
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