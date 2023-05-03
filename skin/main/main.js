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
const tab_menu01 = document.querySelectorAll('#m_academy .tab01 > li');
const tab_menu02 = document.querySelectorAll('#m_academy .tab02 > li');
const tab_menu03 = document.querySelectorAll('#board .tab01 > li');
const tab_title01 = document.querySelectorAll('#m_academy .tab01 > li a');
const tab_title02 = document.querySelectorAll('#m_academy .tab02 > li a');
const tab_title03 = document.querySelectorAll('#board .tab01 > li a');
const tab_con01 = document.querySelectorAll('#m_academy > .tab_con');
const tab_con02 = document.querySelectorAll('#m_academy .con_list');
const tab_on01 = document.querySelector('#m_academy .tab_on');


// showContent 함수
function showContent(num){
  tab_con01.forEach(function(item){
    item.style.display='none';
  });
  tab_con01[num].style.display='block';
}
showContent(0);

function showContent02(num){
  tab_con02.forEach(function(item){
    item.style.display='none';
  });
  tab_con02[num].style.display='block';
}
showContent02(0);

// titleColor 함수
function titleColor(num){
  tab_title01.forEach(function(item){
    item.style.color='#5A5A5C';
  });
  tab_title01[num].style.color='#DE0010';
}
titleColor(0);

function titleColor02(num){
  tab_title02.forEach(function(item){
    item.style.color='#5A6265';
    item.style.background='#EFF1F3';
  });
  tab_title02[num].style.color='#F4F4F5';
  tab_title02[num].style.background='#38373C';
}
titleColor02(0);

function titleColor03(num){
  tab_title03.forEach(function(item){
    item.style.color='#5A5A5C';
  });
  tab_title03[num].style.color='#DE0010';
}
titleColor03(0);

// 메뉴 클릭 이벤트
tab_menu01.forEach(function(item,idx,all){
  item.addEventListener('click', function(e){
    e.preventDefault();
    showContent(idx);
    showContent02(0);
    titleColor(idx);
    titleColor02(0);
    moveHighlight(idx);
  });
});

tab_menu02.forEach(function(item,idx,all){
  item.addEventListener('click', function(e){
    e.preventDefault();
    showContent02(idx);
    titleColor02(idx);
  });
});

// on 이동함수
function moveHighlight(num){
  let newLeft = tab_menu01[num].offsetLeft;
  let newWidth = tab_menu01[num].offsetWidth;
  tab_on01.style.left = newLeft + 'px';
  tab_on01.style.width = newWidth + 'px';
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