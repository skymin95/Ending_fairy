$(document).ready(function() {
  $('.tab_menu ul li a').click(function() {
    let tab_id = $(this).attr('href');

    $('.tab_menu ul li').removeClass('active');
    $(this).parent().addClass('active');

    $('.tab_content').removeClass('active');
    $(tab_id).addClass('active');

    return false;
  });
});