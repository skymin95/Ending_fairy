$(document).ready(function() {
  // 탭 메뉴 클릭 이벤트
  $('.tab_menu ul li a').click(function() {
    var tab_id = $(this).attr('href');

    // 탭 메뉴 활성화
    $('.tab_menu ul li').removeClass('active');
    $(this).parent().addClass('active');

    // 탭 내용 변경
    $('.tab_content').removeClass('active');
    $(tab_id).addClass('active');

    return false;
  });
});