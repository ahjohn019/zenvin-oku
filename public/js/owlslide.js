$('.owl-carousel').owlCarousel({
    loop:false,
    margin:10,
    nav:false,
    autoWidth:true,
    responsive:{
        0:{
            items:1
        },
        400:{
            items:1
        },
        800:{
            items:1
        }
    },
    navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"]
})
