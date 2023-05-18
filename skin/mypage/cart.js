$(function(){
  // 체크박스 전체 선택
  $('.cart_list_form').on('click', '#all', function () {
    var checked = $(this).is(':checked');

    if(checked){
      $(this).parents('.cart_list_form').find('input[type=checkbox]').prop('checked', true);
    } else {
      $(this).parents('.cart_list_form').find('input[type=checkbox]').prop('checked', false);
    }
    total_price_change();
  });

  // 체크박스 개별 선택
  $('.cart_list_form').on('click', '.check', function() {
    var checked = $(this).is(':checked');

    if (!checked) {
      $('#all').prop('checked', false);
    }
  });

  // 체크박스 개별 선택
  $('.cart_list_form').on('click', '.check', function() {
    var is_checked = true;
    
    $('.cart_list_form .check').each(function(){
        is_checked = is_checked && $(this).is(':checked');
    });
    
    $('#all').prop('checked', is_checked);
  });

  $('.check').on('change', total_price_change);
  total_price_change();
  
  function total_price_change() {
    let total_price = 0;
    let checkedCnt = 0;
    $('.cart_list_form .check').each(function(){
        if($(this).is(':checked')) {
          checkedCnt++;
          total_price += Number($(this).parents('.list_data').find('.course_price').text().replaceAll(',', '').replaceAll('원', ''));
          let formatPrice = new Intl.NumberFormat().format(total_price);
          $('.total_price > span:last-of-type').text(formatPrice+'원');
          $('#cart_submit_payment').text(formatPrice+'원 결제하기');
        }
      });
      if(checkedCnt == 0) {
        $('.total_price > span:last-of-type').text('0원');
        $('#cart_submit_payment').text('0원 결제하기');
    }
  }

  //선택삭제
  $('#cart_delete_all').on('click', (e) => {
    e.preventDefault();
    $('form[name=cart_delete]').attr('action', 'cart_delete.php');
    $('form[name=cart_delete]').submit();
  });
  //결제하기
  $('#cart_submit_payment').on('click', (e) => {
    e.preventDefault();
    $('form[name=cart_delete]').attr('action', 'cart_payment.php');
    $('form[name=cart_delete]').submit();
  });
});