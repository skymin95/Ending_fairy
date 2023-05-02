$(function(){

  // 상단 슬라이드
  const swiper = new Swiper('#m_slide.swiper', {
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    loop: true,

    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  });

  let sw = 0;
  $('.btn_pause').click(function(){
      if(sw==0){
          $('.fa-pause').attr('class','fas fa-play btn_pause');
          swiper.autoplay.stop();
          sw = 1;
      }else{
        $('.fa-play').attr('class','fas fa-pause btn_pause');
          swiper.autoplay.start();
          sw = 0;
      }
  });


  // 강의 슬라이드
  const swiper02 = new Swiper('.con_list.swiper', {
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    },
  });


  // 수강평 슬라이드
  const swiper03 = new Swiper('#reveiw.swiper', {
    slidesPerView: 2,
    spaceBetween: 13,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    loop: true,
    pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  });

});