$('.toogle-menu').on('click', function(e) {
  e.preventDefault;
  $(this).toggleClass('toogle-menu_active');
  $('.slide-menu').toggleClass('slide-menu_active');
  $('.menu li').toggleClass('animate-left');
});

$(window).scroll(function(){
  var h_scroll = $(this).scrollTop();
  if (h_scroll > 200) {
    $('.up_scroll').addClass('show')
  } else {
    $('.up_scroll').removeClass('show')
  }
})

//Плавный скролл
$(document).on('click', '.up_scroll', function (event) {
  $('html, body').animate({
      scrollTop: 0
  }, 500);
});

//Мобильное меню
$('.mobile_menu').on('click', function(){
  $(this).toggleClass('active');
  $('.mobile_cover').toggleClass('active');
});

//Теги
$('.header_tags_more_btn').on('click', function(){
  $('.header_tags .container').toggleClass('open');
});

//Mobile Under Header
$('.term_list_more').on('click', function(){
  var dataTermListMore = $(this).data('more');
  $(this).toggleClass('active');
  $('.'+dataTermListMore).toggleClass('active');
})

//Stars rating
var getRating = $('.get_rating').val();
var ratingPercentage = getRating*20;
$('.stars-inner').css({'width':ratingPercentage+'%'});

$('.stars i').on('mouseover', function(){
  $('.stars i').css({'color':'#f56565'});
});

$('.stars i').on('mouseleave', function(){
  $('.stars i').css({'color':'transparent'});
})

$('.stars i').on('click', function(){
  $('.stars i').css({'color':'#f56565 !important'});
});

//Не работает игра
$('.notworking_button').on('click', function(){
  $('.modal').addClass('active');
  $('.modal-bg').addClass('active');
});

//Закрыть модель
$('.modal-close').on('click', function(){
  $('.modal').removeClass('active');
  $('.modal-bg').removeClass('active');
});