$('.button-more').on('mouseout', function () {
    $(this).animate({
        opacity: 1.0,
        marginLeft: 0
    }, 100);
});

 // カルーセル
 $('.carousel').slick({
   autoplay: true,
   dots: true,
   infinite: true,
   autoplaySpeed: 5000,
   arrows: false,
 });