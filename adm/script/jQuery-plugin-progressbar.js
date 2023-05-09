;
(function ($) {
	$.fn.loading = function () {
		var DEFAULTS = [
		{
		backgroundColor: '#ccc',
		progressColor: '#DE0010',
		percent: 85,
		duration: 3000
		},
		{
		backgroundColor: '#ccc',
		progressColor: '#DE0010',
		percent: 75,
			duration: 3000
		},
		{
		backgroundColor: '#ccc',
		progressColor: '#DE0010',
		percent: 65,

		},
		{
		backgroundColor: '#ccc',
		progressColor: '#DE0010',
		percent: 60,

		},
		{
		backgroundColor: '#ccc',
		progressColor: '#DE0010',
		percent: 55,

		},
		{
		backgroundColor: '#ccc',
		progressColor: '#DE0010',
		percent: 50,
		},
		// 신청대기
		{
		backgroundColor: '#ccc',
		progressColor: '#ccc',
		percent: 'D-day',
		// duration: 10000
		},
		{
		backgroundColor: '#ccc',
		progressColor: '#ccc',
		percent: 'D-day',

		},
		{
		backgroundColor: '#ccc',
		progressColor: '#ccc',
		percent: 'D-day',

		},
		{
		backgroundColor: '#ccc',
		progressColor: '#ccc',
		percent: 'D-day',

		},
		{
		backgroundColor: '#ccc',
		progressColor: '#ccc',
		percent: 'D-day',

		},
		// 수강완료
		{
		backgroundColor: '#ccc',
		progressColor: '#DE0010',
		percent: 100,

		},
		{
		backgroundColor: '#ccc',
		progressColor: '#DE0010',
		percent: 100,

		},
		{
		backgroundColor: '#ccc',
		progressColor: '#DE0010',
		percent: 100,

		},
		{
		backgroundColor: '#ccc',
		progressColor: '#DE0010',
		percent: 100,
		}
	];	
		
		$(this).each(function (index) {
			var $target  = $(this);

			var opts = {
			backgroundColor: $target.data('color') ? $target.data('color').split(',')[0] : DEFAULTS[index].backgroundColor,
			progressColor: $target.data('color') ? $target.data('color').split(',')[1] : DEFAULTS[index].progressColor,
			percent: $target.data('percent') ? $target.data('percent') : DEFAULTS[index].percent,
			duration: $target.data('duration') ? $target.data('duration') : DEFAULTS[index].duration
			};
			// console.log(opts);
	
			$target.append('<div class="background"></div><div class="rotate"></div><div class="left"></div><div class="right"></div><div class=""><span>' + opts.percent + (typeof opts.percent == 'number' ? '%' : '') + '</span></div>');
			
	
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
			} 
		});
	}
})(jQuery);