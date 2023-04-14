let calLoadVal = '';
$(document).ready(function() {
  calendarInit();
  calLoadVal = '-'+($('.today').position().top-70)+'px'; // 캘린더 오늘날짜 위치 초기값 변경
});
/*
  달력 렌더링 할 때 필요한 정보 목록 

  현재 월(초기값 : 현재 시간)
  금월 마지막일 날짜와 요일
  전월 마지막일 날짜와 요일
*/

function calendarInit() {

  // 날짜 정보 가져오기
  let date = new Date(); // 현재 날짜(로컬 기준) 가져오기
  let utc = date.getTime() + (date.getTimezoneOffset() * 60 * 1000); // uct 표준시 도출
  let kstGap = 9 * 60 * 60 * 1000; // 한국 kst 기준시간 더하기
  let today = new Date(utc + kstGap); // 한국 시간으로 date 객체 만들기(오늘)

  let thisMonth = new Date(today.getFullYear(), today.getMonth(), today.getDate());
  // 달력에서 표기하는 날짜 객체

  
  let currentYear = thisMonth.getFullYear(); // 달력에서 표기하는 연
  let currentMonth = thisMonth.getMonth(); // 달력에서 표기하는 월
  let currentDate = thisMonth.getDate(); // 달력에서 표기하는 일

  // kst 기준 현재시간
  // console.log(thisMonth);

  // 캘린더 렌더링
  renderCalender(thisMonth);

  function renderCalender(thisMonth) {

      // 렌더링을 위한 데이터 정리
      currentYear = thisMonth.getFullYear();
      currentMonth = thisMonth.getMonth();
      currentDate = thisMonth.getDate();

      // 이전 달의 마지막 날 날짜와 요일 구하기
      let startDay = new Date(currentYear, currentMonth, 0);
      let prevDate = startDay.getDate();
      let prevDay = startDay.getDay();

      // 이번 달의 마지막날 날짜와 요일 구하기
      let endDay = new Date(currentYear, currentMonth + 1, 0);
      let nextDate = endDay.getDate();
      let nextDay = endDay.getDay();

      // console.log(prevDate, prevDay, nextDate, nextDay);

      // 현재 월 표기
      // $('.year-month').text(currentYear + '.' + (currentMonth + 1));

      $('.now_year span').text(currentYear+'년');

      $('.year-month a').removeClass('current_month');
      $('.year-month a').each(function(value){
        if(value == currentMonth) {
          $(this).addClass('current_month');
        }
      });

      // 렌더링 html 요소 생성
      calendar = document.querySelector('.dates');
      calendar.innerHTML = '';
      
      // 지난달
      for (let i = prevDate - prevDay; i <= prevDate; i++) {
          calendar.innerHTML = calendar.innerHTML + '<div class="day prev disable" data-date="' + (currentYear + '-' + ((currentMonth-1) < 10 ? '0'+currentMonth : currentMonth) + '-' + (i < 10 ? '0'+i : i)) + '">' + i + '</div>'
      }
      // 이번달
      for (let i = 1; i <= nextDate; i++) {
          calendar.innerHTML = calendar.innerHTML + '<div class="day current" data-date="' + (currentYear + '-' + (currentMonth+1 < 10 ? '0'+(currentMonth+1) : currentMonth) + '-' + (i < 10 ? '0'+i : i)) + '">' + i + '</div>'
      }
      // 다음달
      for (let i = 1; i <= (7 - nextDay == 6 ? 0 : 6 - nextDay); i++) {
          calendar.innerHTML = calendar.innerHTML + '<div class="day next disable" data-date="' + (currentYear + '-' + ((currentMonth+2) < 10 ? '0'+(currentMonth+2) : currentMonth) + '-' + (i < 10 ? '0'+i : i)) + '">' + i + '</div>'
      }

      // 오늘 날짜 표기
      if (today.getMonth() == currentMonth) {
          todayDate = today.getDate();
          let currentMonthDate = document.querySelectorAll('.dates .current');
          currentMonthDate[todayDate -1].classList.add('today');
      }

      let nowCalendarMonth = currentYear + '-' + ((currentMonth+1) < 10 ? '0'+(currentMonth+1) : (currentMonth+1));

      requestAcademy(nowCalendarMonth);

      //캘린더 크기 변경시 날짜들 위치 변경
      $(window).on('load', calenderChkChange);
      $('#calenderChk').on('change', calenderChkChange);

    }
    
    //캘린더 크기 변경시 날짜들 위치 변경 함수
    function calenderChkChange() {
      if($('#calenderChk').is(':checked')) {
        $('.dates').css('margin-top', calLoadVal);
      } else {
        $('.dates').css('margin-top', '0');
      }
    }
    
    // 이전달로 이동
    $('.go-prev').on('click', function() {
      thisMonth = new Date(currentYear, currentMonth - 1, 1);
      renderCalender(thisMonth);
    });
    
    // 다음달로 이동
    $('.go-next').on('click', function() {
      thisMonth = new Date(currentYear, currentMonth + 1, 1);
      renderCalender(thisMonth); 
    });
    
    
    //선택한 달로 이동
    $('.year-month a').each(function(){
      $(this).click(function(){
      thisMonth = new Date(currentYear, $(this).text()-1, 1);
      renderCalender(thisMonth); 
    });
  });

  // 달력에 해당하는 강의 표기
  function requestAcademy(nowCalendarMonth){
    let request = new XMLHttpRequest();
    let url = './adm_calendar_data.php';
    let eduDateArr = [];
    let i = 0;
    
    request.open('POST', url, true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send('nowCalendarMonth='+nowCalendarMonth);
    
    request.onreadystatechange = () => {
      if(request.readyState === request.DONE){       //readyState가 바뀔 때마다 호출 되므로 완료 시에만 동작하도록 한다.
        if(request.status === 200 || request.status === 201){
          let parseData = JSON.parse(request.responseText);
          for(data of parseData){
            let eduDate = new Date(data.course_edu_sdate);
            let eduYear = eduDate.getFullYear();
            let eduMonth = (eduDate.getMonth()+1 < 10 ? '0'+(eduDate.getMonth()+1) : eduDate.getMonth()+1);
            let eduDay = (eduDate.getDate()+1 < 10 ? '0'+(eduDate.getDate()+1) : eduDate.getDate()+1);
            let eduDateString = eduYear+'-'+eduMonth+'-'+(eduDay-1);
    
            eduDateArr[i] = {
              'eduDateString':eduDateString,
              'course_title':data.course_title,
              'course_cate':data.course_cate
            };
            i++;
          }
          let days = document.querySelectorAll('.dates > .day');
          for(day of days){
            for(eduDate of eduDateArr){
              if(eduDate.eduDateString == day.dataset.date) {
                day.innerHTML += '<p class="'+(eduDate.course_cate == '온라인' ? 'online' : 'offline')+'">'+eduDate.course_title+'</p>';
              }
            }
          }
        }else{
          console.log('실패');
        }
      }
    };
    


  }
}
