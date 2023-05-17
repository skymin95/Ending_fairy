$(function(){

  // 상단 슬라이드
  const swiper = new Swiper('#m_slide.swiper', {
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    spaceBetween: 10,
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
  const swiper03 = new Swiper('.con_list.swiper', {
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    spaceBetween: 20,
    loop: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    },
  });


  // 수강평 슬라이드
  const swiper04 = new Swiper('#review.swiper', {
    slidesPerView: 2,
    spaceBetween: 20,
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

  // 수강평 별점
  let review = $('#review .star p').text();
  let star = $('#review .star img');

  console.log(star);

  if(review=5){
    star.css('width', '15px');
  }

});


// 탭메뉴 컨텐츠
const m_tab = document.querySelectorAll('#m_academy .line_tab > li');
const t_on = document.querySelector('#m_academy .tab_on');
const m_con = document.querySelectorAll('#m_academy > .tab_con');

// showContent 함수
function showContent(num){
  m_con.forEach(function(item){
    item.style.display='none';
  });
  m_con[num].style.display='block';
}
showContent(0);

// titleColor 함수
function titleColor(num){
  m_tab.forEach(function(item){
    item.style.color='#5A5A5C';
  });
  m_tab[num].style.color='#DE0010';
}
titleColor(0);

// 메뉴 클릭 이벤트
m_tab.forEach(function(item,idx){
  item.addEventListener('click', function(e){
    e.preventDefault();
    showContent(idx);
    titleColor(idx);
    moveHighlight(idx);
  });
});

// on 이동함수
function moveHighlight(num){
  let newLeft = m_tab[num].offsetLeft;
  let newWidth = m_tab[num].offsetWidth;
  t_on.style.left = newLeft + 'px';
  t_on.style.width = newWidth + 'px';
}
// 탭메뉴 끝