// 16자리 랜덤 코드 생성
function generateRandomCode() {
  const characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  const codeLength = 16;
  let code = "";
  for (let i = 0; i < codeLength; i++) {
    code += characters.charAt(Math.floor(Math.random() * characters.length));
  }
  return code;
}

document.querySelector('.ran_btn').addEventListener('click', () => {
  document.querySelector('input[name=coupon_code]').value = generateRandomCode();
})