$(document).ready(function(){

  // 아이디 저장
  //저장된 쿠기값을 가져와서 id 칸에 넣어준다 없으면 공백으로 처리
  var key = getCookie("key");
  $("#id").val(key); // id input의 선택자 아이디명

  if($("#id").val() !=""){ // 페이지 로딩시 입력 칸에 저장된 id가 표시된 상태라면 id저장하기를 체크 상태로 둔다
    $("#log_save").attr("checked", true); //id저장하기를 체크 상태로 둔다 (.attr()은 요소(element)의 속성(attribute)의 값을 가져오거나 속성을 추가합니다.)
  }

  $("#log_save").change(function(){ // 체크박스에 변화가 있다면,
    if($("#log_save").is(":checked")){ // ID 저장하기 체크했을 때,
      setCookie("key", $("#id").val(), 2); // 하루 동안 쿠키 보관
    }else{ // ID 저장하기 체크 해제 시,
      deleteCookie("key");
    }
  });

  // ID 저장하기를 체크한 상태에서 ID를 입력하는 경우, 이럴 때도 쿠키 저장.
  $("#id").keyup(function(){ // ID 입력 칸에 ID를 입력할 때,
    if($("#log_save").is(":checked")){ // ID 저장하기를 체크한 상태라면,
      setCookie("key", $("#id").val(), 2); // 하루 동안 쿠키 보관
    }
  });
});

//쿠키 함수
function setCookie(cookieName, value, exdays){
  var exdate = new Date();
  exdate.setDate(exdate.getDate() + exdays);
  var cookieValue = escape(value) + ((exdays==null) ? "" : "; expires=" + exdate.toGMTString());
  document.cookie = cookieName + "=" + cookieValue;
}

function deleteCookie(cookieName){
  var expireDate = new Date();
  expireDate.setDate(expireDate.getDate() - 1);
  document.cookie = cookieName + "= " + "; expires=" + expireDate.toGMTString();
}

function getCookie(cookieName) {
  cookieName = cookieName + '=';
  var cookieData = document.cookie;
  var start = cookieData.indexOf(cookieName);
  var cookieValue = '';
  if(start != -1){
    start += cookieName.length;
    var end = cookieData.indexOf(';', start);
    if(end == -1)end = cookieData.length;
    cookieValue = cookieData.substring(start, end);
  }
  return unescape(cookieValue);
}