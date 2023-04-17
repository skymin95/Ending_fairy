<?php
$title = "회원 관리 > 회원 수정"; // 타이틀
include_once('./common.php');
$mb_id = $_SESSION['mb_id']; // 회원명
$mb_no = $_GET['mb_no']; // 회원명
?>

<?php



  $query_member = "SELECT * FROM member WHERE mb_no = '$mb_no'";
  $result_member = mysqli_query($con, $query_member);
  $row_member = mysqli_fetch_array($result_member);

  // 전화번호 데이터 기입
  $str = $row_member['mb_tel'];
  if(strpos($str, '-')){
    $substr1 = explode('-', $str)[0]; 
    $substr2 = explode('-', $str)[1];
    $substr3 = explode('-', $str)[2]; 
  } else {
    $substr1 = substr($str, 0, 3); 
    $substr2 = substr($str, 3, 4);
    $substr3 = substr($str, 7, 11); 
  }
?>



    
<main>
<ul class="board_h">
    <li><h2 class="a_title">회원정보</h2></li>
    <li><a href="adm_member_list.php" class="a_title1">목록으로 이동<i class="fa-solid fa-chevron-right"></i></a></li>
  </ul>
  <form name="write" method="post" action="adm_member_update_action.php" enctype="multipart/form-data">
    <input type="hidden" name="mb_no" value="<?=$mb_no?>">
    <div class="board_wrap">
      <div class="member_h">
      <dl>
        <dt>아이디</dt>
        <dd><input type="text"value="<?=$row_member['mb_id']?>" name="mb_id" readonly></dd>

        <dt class="pass_text">비밀번호</dt>
        <dd>
          <input type="password" placeholder="신규 비밀번호" name="mb_password">
          <input type="password" placeholder="신규 비밀번호 확인">
        </dd>

        <dt>이름</dt>
        <dd><input type="text" value="<?=$row_member['mb_name']?>" name="mb_name"></dd>

        <dt>닉네임</dt>
        <dd>
          <input type="text" value="<?=$row_member['mb_nick']?>" name="mb_nick">
          <button class='nick_check'>
            <i class="fa-solid fa-check"></i> 중복확인
          </button>
        </dd>

        <dt>이메일</dt>
        <dd class="email_box">
          <input type="text" value="<?=$row_member['mb_email']?>" name="mb_email">
          <input type="checkbox" name="mb_sns" value="1">
        </dd>
      </dl>
      <dl>
        <dt class="file_insert">프로필 사진</dt>
        <dd>  
          <div class="user_img">
            <?php if(empty($row_member['mb_1'])) {?>
            <img id="output" src="<?=$base_URL?>images/default_profile.png" alt="profile"/>
            <?php } else {
              $sql_file = "SELECT * FROM upload_file WHERE fileID = '".$row_member['mb_1']."'";
              $result_file = mysqli_query($con, $sql_file);
              $row_file = mysqli_fetch_assoc($result_file);
            ?>
            <img id="output" src="<?=$base_URL.'upload/'.$row_file['nameSave']?>" alt="profile"/>
            <?php } ?>
            <input type="file" accept="image/*" onchange="loadFile(event)" id="inputTag" name="fileDoc"/>
            <label htmlFor="inputTag" for="inputTag"><span>+</span> 파일추가</label>
          </div>
        </dd>

        <dt>회원레벨</dt>
        <dd>
          <select class="user_level" name="mb_level">
            <option value="1">1</option>
            <option value="8">8</option>
            <option value="10">10</option>
          </select>
        </dd>

        <dt>생년월일</dt>
        <dd><input type="date" value="<?=date_format(date_create($row_member['mb_birth']), "Y-m-d")?>" name="mb_birth"></dd>

        <dt>휴대폰 번호</dt>
        <dd class="tel_box">
          <input type="tel" maxlength='3'  value="<?= $substr1?>" name="mb_tel[]"><span>-</span>
          <input type="tel" maxlength='4'  value="<?= $substr2?>" name="mb_tel[]"><span>-</span>
          <input type="tel" maxlength='4'  value="<?= $substr3?>" name="mb_tel[]">
        </dd>
      </dl>
    </div>

<!-- 강의 수강률(탭) -->
<div class="tab_menu">
    <ul>
      <li class="active"><a href="#tab1">수강중인 강의 (6)</a></li>
      <li><a href="#tab2">신청·대기 강의 (5)</a></li>
      <li><a href="#tab3">수강완료 강의 (3)</a></li>
    </ul>

    <div id="tab1" class="tab_content active">
      <div class="class-load1">
        <ul class="member_class">
          <li class="lists__item class-load">
            <img src="http://localhost/Ending_fairy/images/test.png" alt="asd">
            <div class="mclass-content">
              <p>온라인 강의</p>
              <h3>여행 사진 첫걸음</h3>
              <p>남은 수강 기간<span>24일</span></p>
              <div class="member_circle">
                <button>삭제</button>
                <div class="progress-bar position"></div>
                <div class='class_lr'>
                  <span>8차시</span>
                  <span>10차시</span>
                </div>
              </div>      
            </div>
          </li>

          <li class="lists__item class-load">
            <img src="http://localhost/Ending_fairy/images/test.png" alt="asd">
            <div class="mclass-content">
              <p>온라인 강의</p>
              <h3>여행 사진 첫걸음</h3>
              <p>수강만료<span>24일</span></p>
              <div class="member_circle">
                <button>삭제</button>
                <div class="progress-bar position"></div>
                <div class='class_lr'>
                  <span>6차시</span>
                  <span>9차시</span>
                </div>
              </div>      
            </div>
          </li>

          <li class="lists__item class-load">
            <img src="http://localhost/Ending_fairy/images/test.png" alt="asd">
            <div class="mclass-content">
              <p>온라인 강의</p>
              <h3>여행 사진 첫걸음</h3>
              <p>수강만료<span>24일</span></p>
              <div class="member_circle">
                <button>삭제</button>
                <div class="progress-bar position"></div>
                <div class='class_lr'>
                  <span>5차시</span>
                  <span>9차시</span>
                </div>
              </div>      
            </div>
          </li>
      
          <li class="lists__item class-load">
            <img src="http://localhost/Ending_fairy/images/test.png" alt="asd">
            <div class="mclass-content">
              <p>온라인 강의</p>
              <h3>여행 사진 첫걸음</h3>
              <p>수강만료<span>24일</span></p>
              <div class="member_circle">
                <button>삭제</button>
                <div class="progress-bar position"></div>
                <div class='class_lr'>
                  <span>5차시</span>
                  <span>9차시</span>
                </div>
              </div>      
            </div>
          </li>  

          <li class="lists__item class-load">
            <img src="http://localhost/Ending_fairy/images/test.png" alt="asd">
            <div class="mclass-content">
              <p>온라인 강의</p>
              <h3>여행 사진 첫걸음</h3>
              <p>수강만료<span>24일</span></p>
              <div class="member_circle">
                <button>삭제</button>
                <div class="progress-bar position"></div>
                <div class='class_lr'>
                  <span>4차시</span>
                  <span>9차시</span>
                </div>
              </div>      
            </div>
          </li>  

          <li class="lists__item class-load">
            <img src="http://localhost/Ending_fairy/images/test.png" alt="asd">
            <div class="mclass-content">
              <p>온라인 강의</p>
              <h3>여행 사진 첫걸음</h3>
              <p>수강만료<span>24일</span></p>
              <div class="member_circle">
                <button>삭제</button>
                <div class="progress-bar position"></div>
                <div class='class_lr'>
                  <span>4차시</span>
                  <span>9차시</span>
                </div>
              </div>      
            </div>
          </li>  
        </ul>
      </div>
    </div>
    
    <div id="tab2" class="tab_content">
    <div class="class-load2">
        <ul class="member_class">
          <li class="lists__item class-load">
            <img src="http://localhost/Ending_fairy/images/test.png" alt="asd">
            <div class="mclass-content">
              <p>온라인 강의</p>
              <h3>여행 사진 첫걸음</h3>
              <p>수강만료<span>24일</span></p>
              <div class="member_circle">
                <button>삭제</button>
                <div class="progress-bar position"></div>
              </div>      
            </div>
          </li>

          <li class="lists__item class-load">
            <img src="http://localhost/Ending_fairy/images/test.png" alt="asd">
            <div class="mclass-content">
              <p>온라인 강의</p>
              <h3>여행 사진 첫걸음</h3>
              <p>수강만료<span>24일</span></p>
              <div class="member_circle">
                <button>삭제</button>
                <div class="progress-bar position"></div>
              </div>      
            </div>
          </li>

          <li class="lists__item class-load">
            <img src="http://localhost/Ending_fairy/images/test.png" alt="asd">
            <div class="mclass-content">
              <p>온라인 강의</p>
              <h3>여행 사진 첫걸음</h3>
              <p>수강만료<span>24일</span></p>
              <div class="member_circle">
                <button>삭제</button>
                <div class="progress-bar position"></div>
              </div>      
            </div>
          </li>
      
          <li class="lists__item class-load">
            <img src="http://localhost/Ending_fairy/images/test.png" alt="asd">
            <div class="mclass-content">
              <p>온라인 강의</p>
              <h3>여행 사진 첫걸음</h3>
              <p>수강만료<span>24일</span></p>
              <div class="member_circle">
                <button>삭제</button>
                <div class="progress-bar position"></div>
              </div>      
            </div>
          </li>  

          <li class="lists__item class-load">
            <img src="http://localhost/Ending_fairy/images/test.png" alt="asd">
            <div class="mclass-content">
              <p>온라인 강의</p>
              <h3>여행 사진 첫걸음</h3>
              <p>수강만료<span>24일</span></p>
              <div class="member_circle">
                <button>삭제</button>
                <div class="progress-bar position"></div>
              </div>      
            </div>
          </li>  

        
        </ul>
      </div>
    </div>
    </div>

  <div id="tab3" class="tab_content">
  <div class="class-load3">
        <ul class="member_class">
          <li class="lists__item class-load">
            <img src="http://localhost/Ending_fairy/images/test.png" alt="asd">
            <div class="mclass-content">
              <p>온라인 강의</p>
              <h3>여행 사진 첫걸음</h3>
              <p>수강만료<span>24일</span></p>
              <div class="member_circle">
                <button>삭제</button>
                <div class="progress-bar position"></div>
              </div>      
            </div>
          </li>

          <li class="lists__item class-load">
            <img src="http://localhost/Ending_fairy/images/test.png" alt="asd">
            <div class="mclass-content">
              <p>온라인 강의</p>
              <h3>여행 사진 첫걸음</h3>
              <p>수강만료<span>24일</span></p>
              <div class="member_circle">
                <button>삭제</button>
                <div class="progress-bar position"></div>
              </div>      
            </div>
          </li>

          <li class="lists__item class-load">
            <img src="http://localhost/Ending_fairy/images/test.png" alt="asd">
            <div class="mclass-content">
              <p>온라인 강의</p>
              <h3>여행 사진 첫걸음</h3>
              <p>수강만료<span>24일</span></p>
              <div class="member_circle">
                <button>삭제</button>
                <div class="progress-bar position"></div>
              </div>      
            </div>
          </li>
    
        </ul>
      </div>
    </div>
  </div>
</div>


  <button type="button" class="more_btn">더보기 <i class="fa-solid fa-chevron-down"></i></button>




      <!-- 삭제/완료 -->
      <ul class="board_b">
        <li><a href="<?=$base_admin_URL?>adm_member_delete.php?mb_no=<?=$mb_no?>" title="삭제">삭제</a></li>
        <li class="nw_success"><input type="submit" value="완료"></li>
      </ul>
    </div>
  </form>

</main>