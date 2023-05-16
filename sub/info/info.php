<?php
$title = "캐논아카데미 소개"; // 타이틀
include_once('../common.php');

?>
<main>
  <article>
    <h2 class="sub_title_prev">
      <a href="javascript:window.history.back();" title="뒤로가기">
        <img src="<?=$base_URL?>images/arrow_title_prev.svg" alt="prev">
        캐논아카데미 소개
      </a>
    </h2>
  </article>
  <section id="info_wrap">
    <article class="info_intro">
      <img src="<?=$base_URL?>images/logo_admin.png" alt="캐논아카데미 레드로고">
      <img src="<?=$base_URL?>images/info_start.png" alt="테두리 시작아이콘">
      <ul>
        <li>
        캐논아카데미는 고객에게 다양하고 체계적인 사진 문화 프로그램을 제공하여 카메라 사용 인구 및 회수를 늘리고 나아가 사진 문화 확대에 기여하고자 지난 2002년에 개설되었습니다.
        </li>
        <li>
        캐논아카데미의 다양한 오프라인 강의와 더불어, 더욱 많은 분들에게 사진의 즐거움과 가치를 전달하기 위하여 2020년 온라인 강의를 새롭게 오픈하였습니다.
        </li>
        <li>  
        지금, 캐논아카데미 오프라인 강의와 온라인 강의를 함께 만나보세요.
        </li>
      </ul>
      <img src="<?=$base_URL?>images/info_end.png" alt="테두리 끝아이콘">
    </article>
    <article class="info_on_class">
      <h3>온라인 강의</h3>
      <ul class="class_order">
        <li>
          <img src="<?=$base_URL?>images/class7.jpg" alt="제품 사용법 강의사진">
          <p>제품 사용법</p>
        </li>
        <li>
          <img src="<?=$base_URL?>images/class8.jpg" alt="사진 클래스 강의사진">
          <p>사진 클래스</p>
        </li>
        <li>
          <img src="<?=$base_URL?>images/class9.jpg" alt="영상 클래스 강의사진">
          <p>영상 클래스</p>
        </li>
      </ul>
      <ul class="class_explain">
        <li>올바른 제품사용법을 익힐 수 있는 기초강의</li>
        <li>기초부터 전문가의 고급 노하우를 배울 수 있는 사진 클래스</li>
        <li>캐논 카메라를 활용해 영상을 제작하는 분들을 위한 영상클래스</li>
      </ul>
    </article>
    <article class="info_off_class">
      <h3>오프라인 강의</h3>
      <ul class="class_order">
        <li>
          <img src="<?=$base_URL?>images/class10.jpg" alt="클래스룸 강의사진">
          <p>제품 사용법</p>
        </li>
        <li>
          <img src="<?=$base_URL?>images/class11.jpg" alt="실습 강의사진">
          <p>실습</p>
        </li>
        <li>
          <img src="<?=$base_URL?>images/class12.jpg" alt="코스 강의사진">
          <p>코스</p>
        </li>
      </ul>
      <ul class="class_explain">
        <li>촬영 이론과 실습을 정복할 수 있는 클래스룸</li>
        <li>초점,거리,역광 등 다양한 환경을 직접 경험하는 실습강의</li>
        <li>사진의 다양한 구도,연출법을 이론,실습으로 배우는 코스강의</li>
      </ul>
    </article>
    <article class="info_classroom">
      <h3>강의실</h3>
      <p>언주 캐논플렉스 아카데미</p>
      <ul>
        <li>
          <img src="<?=$base_URL?>images/classroom1.png" alt="강의실1 사진">
          <p>강의실 1</p>
        </li>
        <li>
          <img src="<?=$base_URL?>images/classroom2.png" alt="강의실2 사진">
          <p>강의실 2</p>
        </li>
        <li>
          <img src="<?=$base_URL?>images/classroom3.png" alt="강의실3 사진">
          <p>강의실 3</p>
        </li>
        <li>
          <img src="<?=$base_URL?>images/classroom4.png" alt="강의실4 사진">
          <p>강의실 4</p>
        </li>
      </ul>
    </article>
    <article class="info_location">
      <h3>언주 캐논플렉스 위치</h3>
      <div id="map" style="width:100%;height:172px;" ></div>
      <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=558bbc07ac0f8dcc88ea99feaa2c0f7b"></script>
  <script>
    var container = document.getElementById('map'); //지도를 담을 영역의 DOM 레퍼런스
    var options = { //지도를 생성할 때 필요한 기본 옵션
	  center: new kakao.maps.LatLng(37.508129562791076, 127.0357317122251), //지도의 중심좌표.
	  level: 3 //지도의 레벨(확대, 축소 정도)
  };

    var map = new kakao.maps.Map(container, options); //지도 생성 및 객체 리턴

    // 마커가 표시될 위치입니다 
    var markerPosition  = new kakao.maps.LatLng(37.508129562791076, 127.0357317122251); 

    // 마커를 생성합니다
    var marker = new kakao.maps.Marker({
        position: markerPosition
    });

// 마커가 지도 위에 표시되도록 설정합니다
marker.setMap(map);
  </script>
      <dl>
        <dt>문의</dt>
        <dd>1533 - 3355</dd>
      </dl>
      <dl>
        <dt>주소</dt>
        <dd>서울특별시 강남구 봉은사로 217 캐논플렉스 4층 (9호선 언주역 4번 출구)</dd>
      </dl>
    </article>
    <article class="info_direction">
      <h3>오시는 길</h3>
      <dl>
        <dt>
          <img src="<?=$base_URL?>images/icon_car.png" alt="승용차아이콘">
          <p>승용차</p>
        </dt>
        <dd>차병원사거리에서 논현로 방면으로 직진(약 150m), 논현로114길 방면으로 우회전(약 200m) 후 봉은사로33길 방면으로 우회전(약 100m )</dd>
      </dl>
      <dl>
        <dt>
          <img src="<?=$base_URL?>images/icon_parking.png" alt="주차아이콘">
          <p>주차</p>
        </dt>
        <dd>유료주차 (주차장이 협소하오니 대중교통 이용  부탁 드립니다.)</dd>
      </dl>
      <dl>
        <dt>
          <img src="<?=$base_URL?>images/icon_subway.png" alt="지하철아이콘">
          <p>지하철</p>
        </dt>
        <dd>9호선 언주역 4번 출구 도보 2분(약 100m)</dd>
      </dl>
      <dl>
        <dt>
          <img src="<?=$base_URL?>images/icon_bus.png" alt="버스아이콘">
          <p>버스</p>
        </dt>
        <dd>
          <span>언주역2, 3, 4, 5번출구.차병원사거리 / 차병원 / 국민은행논현동지점</span>
          <ul>
            <li>간선 : 147, 241, 242, 463, N850</li>
            <li>지선 : 3412, 3422, 4211, 6411</li>
            <li>직행 : 3600, 9600</li>
          </ul>
        </dd>
      </dl>
                      
    </article>
  </section>
</main>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/Ending_fairy/footer.php');
?>
