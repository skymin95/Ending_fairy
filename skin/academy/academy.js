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
  //온라인 오프라인 링크 구별
  if(item.dataset.cate == 'online' || item.dataset.cate == 'offline') {
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
