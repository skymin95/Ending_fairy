$(function(){
  //쿠폰 사용
  $('#couponSelect').on('change', function(){
    let sale = $(this).find('option:selected').data('sale');
    
    let oriVal = Number($('.origin_price').text().substr(-0, $('.origin_price').text().length-1).replaceAll(',', ''));
    let paymentPrice = oriVal;
    if(sale != undefined) {
      $('.sale_price').text(new Intl.NumberFormat().format(sale.substr(-0, sale.length-1))+sale.substr(-1));
      if(sale.substr(-1) == '%') {
        let saleVal = Number(sale.substr(-0, sale.length-1));
        paymentPrice = oriVal * (saleVal / 100);
        $('.total_price').text(new Intl.NumberFormat().format(oriVal * (saleVal / 100))+'원');
      } else if(sale.substr(-1) == '원') {
        let saleVal = Number(sale.substr(-0, sale.length-1));
        paymentPrice = oriVal - saleVal;
        $('.total_price').text(new Intl.NumberFormat().format(oriVal - saleVal) + '원');
      }
    } else {
      $('.sale_price').text('0원');
      $('.total_price').text($('.origin_price').text());
    }
    $('#payment_price').text($('.total_price').text());
    $('#payment_price_input').val(paymentPrice);
  });
});