$(function(){
  // a태그 클릭시 검색
  let tag = $('.tag li a');
  let cate = $('input[name=cate]');
  let on_off = cate.val();

  cate.click(function(){
    on_off = $(this).val();
  });

  tag.click(function(){
    let s_tag = $(this).attr('title');
    $(this).attr("href", "search_academy.php?cate="+on_off+"&search="+s_tag);
  });
});