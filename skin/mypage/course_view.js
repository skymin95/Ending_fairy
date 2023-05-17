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
			text: $target.data('text') ? $target.data('text') : '',
			// duration: $target.data('duration') ? $target.data('duration') : DEFAULTS[index].duration
			};
	
			$target.append('<div class="background"><div class="rotate"></div><div class="left"></div><div class="right"></div></div><div class=""><p>' + (opts.text == '' ? '' : opts.text) + '<span class="emp">' + opts.percent + (typeof opts.percent == 'number' ? '%' : '') + '</span></p></div>');
			
	
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

	//직선 프로그레스바
	let bar = [];
	$('.line_box').each(function(i, v){
		bar[i] = new ProgressBar.Line(v, {
			strokeWidth: 4,
			easing: 'easeInOut', //이징 속성
			duration: 1, //시간
			color: '#DE0010',
			trailColor: '#D9D9D9', //가이드 선
			trailWidth: 8, //가이드 두께
			svgStyle: {  //
				width: '220px',
				height: '8px',
				strokeLinecap: 'round'
			}
		});
		bar[i].animate(v.dataset.percent / 100); // 0.0(0%)~1.0(100%)//진행도 
		v.parentNode.querySelector('.status_percent').style.left = v.dataset.percent + '%';
	});

})(jQuery);

$(".progress-bar").loading();