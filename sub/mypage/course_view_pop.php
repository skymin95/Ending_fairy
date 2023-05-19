<?php
$title = "마이페이지 > 수강중인 강의 > 강의"; // 타이틀
include_once('../common.php');

function getYoutubeID($url) {
  if($url) {
    preg_match_all('/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/', $url, $matchs);
    return $matchs[7][0];
  }
}

$sql_index = "SELECT * FROM course_index WHERE index_id =".$_GET['index_id'];
$result_index = mysqli_query($con, $sql_index);
$row_index = mysqli_fetch_assoc($result_index);

$sql_status_class = "SELECT * FROM course_status WHERE index_id = ".$_GET['index_id'];
$result_status_class = mysqli_query($con, $sql_status_class);
$row_status_class = mysqli_fetch_assoc($result_status_class);

if(!empty($row_status_class['status'])) {
  echo "<script>
    let startPercentage = ".$row_status_class['status'].";
  </script>";
} else {
  echo "<script>
    let startPercentage = 0;
  </script>";
}

?>
<main>
  <div id="player"></div>
  <button id="closeBtn" type="button">수강종료</button>
  <script>
  var tag = document.createElement('script');
  
  tag.src = "https://www.youtube.com/iframe_api";
  var firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
  let player, timer; // 플레이어, 현재 시간 interval
  let duration; // 총 시간
  let currentTime; // 현재 시간

  
  function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        width: '100%',
        height: '360',
        videoId: '<?=getYoutubeID($row_index['class_link'])?>',
        playerVars: {
          'autoplay': 1, 
          'showinfo': 0, 
          'rel':0, 
          'modestbranding':1,
          'wmode':'transparent',
          'autohide':1,
          },
        events: {
          'onReady': onPlayerReady,
          'onStateChange': onPlayerStateChange
        }
      });
  }
  
  function onPlayerReady(event) {
    event.target.setPlaybackQuality("hd720");

    duration = player.getDuration().toFixed(0);
    let startTime = (startPercentage / 100);
    
    event.target.seekTo(duration * startTime);

    
    document.querySelector('#closeBtn').addEventListener('click', () => {
      const request = new XMLHttpRequest(); 

      request.open('POST', './course_view_pop_action.php?index_id=<?=$_GET['index_id']?>&currentTime='+currentTime+'&duration='+duration, false);
      request.send();
      window.close();
    });
  }
  
  function onPlayerStateChange(event) {
    if (event.data == YT.PlayerState.PLAYING) {
      event.target.setPlaybackQuality('hd720');
    }
  }
// 0.25초마다 재생 시간 체크
  function checkCurrentTime(){
    timer = setInterval(function(){
      currentTime = Number(player.getCurrentTime().toFixed(0)); // 현재시간      
    },250)
  }

  // 재생 시간 체크 중단
  function stopCheckCurrentTime(){
    clearInterval(timer);
  }


  function onPlayerStateChange(event) {
    if(event.data == YT.PlayerState.PLAYING){
      // console.log('재생중');
      checkCurrentTime();
    }else if(event.data == YT.PlayerState.PAUSED){
      // console.log('일시중지');
      stopCheckCurrentTime();
    }else if(event.data == YT.PlayerState.ENDED){
      // console.log('종료');
      stopCheckCurrentTime();
      alert('수강 완료');
    }
  }
  </script>
</main>