$(function(){
  // a태그 클릭시 검색
  let tag = $('.tag li a');
  let cate = $('input[name=cate]');

  cate.click(function(){
    cate = $(this).val();
  });

  tag.click(function(){
    let s_tag = $(this).attr('title');
    $(this).attr("href", "search_academy.php?cate="+cate+"&search="+s_tag);
  });
});