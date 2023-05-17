document.querySelector('#coupon_add').addEventListener('click', function(){
  document.querySelector('#couponModal').showModal();
});
document.querySelector('#modal_close_btn').addEventListener('click', function(){
  document.querySelector('#couponModal').close();
});

document.querySelector('#coupon_code').addEventListener('input', function(){
  if(this.value.length > 0) {
    document.querySelector('#couponModal button[type=submit]').classList.add('on');
    document.querySelector('#couponModal button[type=submit]').removeAttribute('disabled');;
  } else {
    document.querySelector('#couponModal button[type=submit]').classList.remove('on');
    document.querySelector('#couponModal button[type=submit]').setAttribute('disabled', 'disabled');
  }
});