$(document).ready(function(){
    //Jquery est prêt

    //Utilisation du plugin ScrollMagic

    var controller = new ScrollMagic.Controller();

    //Construction d'une scene
    var content_anim1 = new ScrollMagic.Scene({
        triggerElement: '#c-a1'
    })
        .setClassToggle('#c-a1', 'fade-in')
        .addTo(controller);

    //Construction d'une scene
    var content_anim2 = new ScrollMagic.Scene({
        triggerElement: '#c-a2'
    })
        .setClassToggle('#c-a2', 'fade-in')
        .addTo(controller);

    //Construction d'une scene
    var content_anim3 = new ScrollMagic.Scene({
        triggerElement: '#c-a3'
    })
        .setClassToggle('#c-a3', 'fade-in')
        .addTo(controller);

    //Construction d'une scene
    var content_anim4 = new ScrollMagic.Scene({
        triggerElement: '#c-a4'
    })
        .setClassToggle('#c-a4', 'fade-in')
        .addTo(controller);


    //Construction d'une scene
    var img_anim1 = new ScrollMagic.Scene({
        triggerElement: '#i-a1'
    })
        .setClassToggle('#i-a1', 'fade-in')
        .addTo(controller);

    //Construction d'une scene
    var img_anim2 = new ScrollMagic.Scene({
        triggerElement: '#i-a2'
    })
        .setClassToggle('#i-a2', 'fade-in')
        .addTo(controller);

    //Construction d'une scene
    var img_anim3 = new ScrollMagic.Scene({
        triggerElement: '#i-a3'
    })
        .setClassToggle('#i-a3', 'fade-in')
        .addTo(controller);


    //Construction d'une scene
    var img_anim4 = new ScrollMagic.Scene({
        triggerElement: '#i-a4'
    })
        .setClassToggle('#i-a4', 'fade-in')
        .addTo(controller);

});