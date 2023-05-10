// 탑버튼
let t_btn = document.querySelector('.t_btn');

t_btn.addEventListener('click', ()=>{
  window.scrollTo({
    top: 0,
    left: 0,
    behavior: 'smooth'
  });
});