$(document).ready(function() {
  $('.tab_menu ul li a').click(function() {
    let tab_id = $(this).attr('href');

    $('.tab_menu ul li').removeClass('active');
    $(this).parent().addClass('active');

    $('.tab_content').removeClass('active');
    $(tab_id).addClass('active');

    $('#paging > input[name=page]').val('1');
    $('#paging > input[name=cate]').val($('.tab_content.active').index());
    $('#paging').submit();

    return false;
  });
  
  $('.tab_menu > ul > li > a').each(function(index){
    const url = new URL(window.location.href);
    const urlParams = url.searchParams;
  
    if(index+1 == urlParams.get('cate')) {
      $('.tab_menu ul li').removeClass('active');
      $(this).parent().addClass('active');

      let tab_id = $(this).attr('href');
      $('.tab_content').removeClass('active');
      $(tab_id).addClass('active');
    }
  });
});