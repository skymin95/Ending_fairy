$(document).ready(function() {
  $('.tab_menu > ul > li > a').click(function() {
    let tab_id = $(this).attr('href');

    $('.tab_menu > ul > li').removeClass('active');
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
  // 회원 수정 프로그래스바 

  $(".progress-bar").loading();

    var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-36251023-1']);
		_gaq.push(['_setDomainName', 'jqueryscript.net']);
		_gaq.push(['_trackPageview']);

		(function () {
			var ga = document.createElement('script');
			ga.type = 'text/javascript';
			ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(ga, s);
		})();
    
    // 더보기
    $(window).on('load', function () {
      load('.class-load1', '3');
      load('.class-load2', '3');
      load('.class-load3', '3');
      
      $(".more_btn").on("click", function () {
        load('.class-load1', '3', '.more_btn');
        load('.class-load2', '3', '.more_btn');
        load('.class-load3', '3', '.more_btn');
      })
    });
    function load(id, cnt, btn) {
      var class_list = id + " .class-load:not(.active)";
      var class_length = $(class_list).length;
      var class_total_cnt;
      if (cnt < class_length) {
        class_total_cnt = cnt;
      } else {
        class_total_cnt = class_length;
        $(btn).hide();
      }
      $(class_list + ":lt(" + class_total_cnt + ")").addClass("active");
    }
  });
  
  // 첨부파일
let loadFile = function(event) {
  let reader = new FileReader();
  reader.onload = function(){
    let output = document.getElementById('output');
    output.src = reader.result;
  };
  reader.readAsDataURL(event.target.files[0]);
};