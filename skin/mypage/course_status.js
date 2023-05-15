
// 탭메뉴 컨텐츠
const m_tab = document.querySelectorAll('.list_tab .line_tab > li');
const t_on = document.querySelector('.list_tab .tab_on');
const m_con = document.querySelectorAll('.list_tab > .tab_con');

// showContent 함수
function showContent(num){
  m_con.forEach(function(item){
    item.style.display='none';
  });
  m_con[num].style.display='block';
}
showContent(0);

// titleColor 함수
function titleColor(num){
  m_tab.forEach(function(item){
    item.style.color='#5A5A5C';
  });
  m_tab[num].style.color='#DE0010';
}
titleColor(0);

// 메뉴 클릭 이벤트
m_tab.forEach(function(item,idx){
  item.addEventListener('click', function(e){
    e.preventDefault();
    showContent(idx);
    titleColor(idx);
    moveHighlight(idx);
  });
});

// on 이동함수
function moveHighlight(num){
  let newLeft = m_tab[num].offsetLeft;
  let newWidth = m_tab[num].offsetWidth;
  t_on.style.left = newLeft + 'px';
  t_on.style.width = newWidth + 'px';
}
// 탭메뉴 끝

// 프로그레스 바
(function ($) {
	$.fn.loading = function () {
		var DEFAULTS = [
		{
		backgroundColor: '#ccc',
		progressColor: '#DE0010',
		percent: 0,
		duration: 0
		}
	];	
		
		$(this).each(function (index) {
			var $target  = $(this);

			var opts = {
			backgroundColor: $target.data('color') ? $target.data('color').split(',')[0] : DEFAULTS[index].backgroundColor,
			progressColor: $target.data('color') ? $target.data('color').split(',')[1] : DEFAULTS[index].progressColor,
			percent: $target.data('percent') ? $target.data('percent') : DEFAULTS[index].percent,
			// duration: $target.data('duration') ? $target.data('duration') : DEFAULTS[index].duration
			};
	
			$target.append('<div class="background"><div class="rotate"></div><div class="left"></div><div class="right"></div></div><div class=""><span>' + opts.percent + (typeof opts.percent == 'number' ? '%' : '') + '</span></div>');
			
	
			$target.find('.background').css('background-color', opts.backgroundColor);
			$target.find('.left').css('background-color', opts.backgroundColor);
			$target.find('.rotate').css('background-color', opts.progressColor);
			$target.find('.right').css('background-color', opts.progressColor);
	
			var $rotate = $target.find('.rotate');
			setTimeout(function () {	
				$rotate.css({
					'transition': 'transform ' + opts.duration + 'ms linear',
					'transform': 'rotate(' + opts.percent * 3.6 + 'deg)'
				});
			},1);		

			if (opts.percent > 50) {
				var animationRight = 'toggle ' + (opts.duration / opts.percent * 50) + 'ms step-end';
				var animationLeft = 'toggle ' + (opts.duration / opts.percent * 50) + 'ms step-start';  
				$target.find('.right').css({
					animation: animationRight,
					opacity: 1
				});
				$target.find('.left').css({
					animation: animationLeft,
					opacity: 0
				});
        $target.find('.left-sub').css({display:'none'});
			} else {
        $target.find('.right-sub').css({display:'none'});
      }
		});
	}
})(jQuery);

$(".progress-bar").loading();