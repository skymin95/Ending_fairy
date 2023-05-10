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

  // 마이페이지 강의
  const swiper02 = new Swiper('#m_my .swiper', {
    autoplay: false,
    slidesPerView: 3,
    // spaceBetween : 8,
  });

  // 강의 슬라이드
  const swiper03 = new Swiper('.con_list.swiper', {
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
  const swiper04 = new Swiper('#reveiw.swiper', {
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

});


// 탭메뉴 컨텐츠
const course_tab = document.querySelectorAll('#m_academy .line_tab > li');
const course_t = document.querySelectorAll('#m_academy .line_tab > li a');
const tab_con01 = document.querySelectorAll('#m_academy > .tab_con');
const tab_on = document.querySelector('#m_academy .tab_on');
const board_tab = document.querySelectorAll('#board .line_tab > li');
const board_t = document.querySelectorAll('#board .line_tab > li a');

// showContent 함수
function showContent(num){
  tab_con01.forEach(function(item){
    item.style.display='none';
  });
  tab_con01[num].style.display='block';
}
showContent(0);

// titleColor 함수
function titleColor(num){
  course_t.forEach(function(item){
    item.style.color='#5A5A5C';
  });
  course_t[num].style.color='#DE0010';
}
titleColor(0);

function titleColor02(num){
  board_t.forEach(function(item){
    item.style.color='#5A5A5C';
  });
  board_t[num].style.color='#DE0010';
}
titleColor02(0);

// 메뉴 클릭 이벤트
course_tab.forEach(function(item,idx){
  item.addEventListener('click', function(e){
    e.preventDefault();
    showContent(idx);
    titleColor(idx);
    moveHighlight(idx);
  });
});

// on 이동함수
function moveHighlight(num){
  let newLeft = course_tab[num].offsetLeft;
  let newWidth = course_tab[num].offsetWidth;
  tab_on.style.left = newLeft + 'px';
  tab_on.style.width = newWidth + 'px';
}
// 탭메뉴 끝


// 탑버튼
let t_btn = document.querySelector('.t_btn');

t_btn.addEventListener('click', ()=>{
  window.scrollTo({
    top: 0,
    left: 0,
    behavior: 'smooth'
  });
});