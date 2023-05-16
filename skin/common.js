// 탑버튼
let t_btn = document.querySelector('.t_btn');
let mGnb = document.getElementById('m_gnb');

t_btn.addEventListener('click', ()=>{
  window.scrollTo({
    top: 0,
    left: 0,
    behavior: 'smooth'
  });
});

// 스크롤 방지
  mGnb.addEventListener('change', function(){
    if(mGnb.checked==true){
        document.querySelector('body').style.overflowY = 'hidden';
    } else {
        document.querySelector('body').style.overflowY = '';
    }
  });
