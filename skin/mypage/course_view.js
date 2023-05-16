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
})(jQuery);

$(".progress-bar").loading();