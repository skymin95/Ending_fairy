// 탭메뉴
const tab = document.querySelectorAll('.c_tab .line_tab li');
const t_on = document.querySelector('.c_tab .tab_on');
const t_con = document.querySelectorAll('.c_tab .tab_con');

// showContent 함수
function showContent(num){
  t_con.forEach(function(item){
    item.style.display='none';
  });
  t_con[num].style.display='block';
}
showContent(0);

// titleColor 함수
function titleColor(num){
  tab.forEach(function(item){
    item.style.color='#5A5A5C';
  });
  tab[num].style.color='#DE0010';
}
titleColor(0);

// 탭 클릭 이벤트
tab.forEach(function(item,idx){
  item.addEventListener('click', function(e){
    e.preventDefault();
    showContent(idx);
    titleColor(idx);
    moveHighlight(idx);
  });

  // 온라인 오프라인 링크 구별
  if(item.dataset.cate == 'online' || item.dataset.cate == 'offline' || item.dataset.cate == 'curriculum') {
    showContent(idx);
    titleColor(idx);
    moveHighlight(idx);    
  }
});

// on 이동함수
function moveHighlight(num){
  let newLeft = tab[num].offsetLeft;
  let newWidth = tab[num].offsetWidth;
  t_on.style.left = newLeft + 'px';
  t_on.style.width = newWidth + 'px';
}
// 탭메뉴 끝

// 더보기
let i_more = document.querySelector('.intro .more');
let intro = document.querySelector('.intro .con');
let t_more = document.querySelector('.teacher .more');
let teacher = document.querySelector('.teacher .con');
let i_con_h = intro.offsetHeight;
let t_con_h = teacher.offsetHeight;

if(i_con_h>400){
  intro.style.height='400px';
  i_more.style.display='block';
}

i_more.addEventListener('click', function(){
  intro.style.height='100%';
  i_more.style.display='none';
});

if(t_con_h>400){
  teacher.style.height='400px';
  t_more.style.display='block';
}

t_more.addEventListener('click', function(){
  teacher.style.height='100%';
  t_more.style.display='none';
});

// 수강평 별점
let review = document.querySelectorAll('.review .star p');
let star_img = document.querySelectorAll('.review .star .star_f');

for(i=0;i<review.length;i++){
  star = review[i].innerText;
  star_img[i].classList.add('star'+star);
}