// 탭메뉴
const tab = document.querySelectorAll('#course_list .line_tab li');
const title = document.querySelectorAll('#course_list .line_tab li a');
const tab_on = document.querySelector('#course_list .tab_on');

// showContent 함수
// function showContent(num){
//   con.forEach(function(item){
//     item.style.display='none';
//   });
//   con[num].style.display='block';
// }
// showContent(0);

// titleColor 함수
function titleColor(num){
  title.forEach(function(item){
    item.style.color='#5A5A5C';
  });
  title[num].style.color='#DE0010';
}
titleColor(0);

// 메뉴 클릭 이벤트
tab.forEach(function(item,idx){
  item.addEventListener('click', function(e){
    e.preventDefault();
    // showContent(idx);
    titleColor(idx);
    moveHighlight(idx);
  });
});

// on 이동함수
function moveHighlight(num){
  let newLeft = tab[num].offsetLeft;
  let newWidth = tab[num].offsetWidth;
  tab_on.style.left = newLeft + 'px';
  tab_on.style.width = newWidth + 'px';
}
// 탭메뉴 끝