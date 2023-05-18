<?php
$title = "강의 관리 > 강의 작성"; // 타이틀
include_once('./common.php');

$id = (empty($_GET['course_id']) ? '' : $_GET['course_id']);
$id = mysqli_real_escape_string($con, $id);
if($id != '') {
$query = "SELECT * FROM course WHERE course_id = '$id'";
$result = mysqli_query($con, $query);
$data = mysqli_fetch_assoc($result);
} else {
  $data = array(
    'course_title' => '',
    'course_cate' => '',
    'course_edu_time' => '',
    'course_price' => '',
    'course_teacher' => '',
    'course_ask_sdate' => '',
    'course_ask_edate' => '',
    'course_edu_sdate' => '',
    'course_edu_edate' => '',
    'course_tag' => '',
    'course_link' => ''
  );
}

$sql_member = "SELECT mb_no, mb_id, mb_name, mb_nick FROM member WHERE mb_id = '".$_SESSION['mb_id']."'";
$result_member = mysqli_query($con, $sql_member);
$row_member = mysqli_fetch_array($result_member);

?>
<main class="board_insert">
  <ul class="board_h">
    <li><h2 class="a_title">강의<?=($id == '' ? '추가' : '수정')?></h2></li>
    <li><a href="adm_academy_list.php" class="a_title">목록으로 이동<i class="fa-solid fa-chevron-right"></i></a></li>
  </ul>

  <form name="write" method="post" action="adm_academy_insert_action.php" id="formAcademy" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=($id == '' ? '' : $id)?>">
    <div class="board_wrap">
      <dl>
        <dt>강의명</dt>
        <dd>
          <input type="text" name="course_title" value="<?=$data['course_title']?>"  class="txe" required >
        </dd>

        <dt>강의 분류</dt>
        <dd class="w-30">
          <select name="course_cate">
            <option value="온라인" <?=$data['course_cate']=="온라인"?"selected":""?>>온라인</option>
            <option value="오프라인" <?=$data['course_cate']=="오프라인"?"selected":""?>>오프라인</option>
          </select>
        </dd>

        <dt>교육 시간</dt>
        <dd class="w-30">
          <input type="text" name="course_edu_time" value="<?=$data['course_edu_time']?>"  class="txe" required >
        </dd>

        <dt>강의 가격</dt>
        <dd class="w-30">
          <input type="text" name="course_price" value="<?=$data['course_price']?>"  class="txe" required >
        </dd>

        <dt>담당 강사</dt>
        <dd class="w-30">
          <input type="text" name="course_teacher" value="<?=$data['course_teacher']?>"  class="txe" required >
        </dd>

        <dt>신청 기간</dt>
        <dd>
          <input type="date" name="course_ask_sdate" value="<?=date_format(date_create($data['course_ask_sdate']), "Y-m-d")?>"  class="txe" required > ~ <input type="date" name="course_ask_edate" value="<?=date_format(date_create($data['course_ask_edate']), "Y-m-d")?>"  class="txe" required >
        </dd>

        <dt>교육 기간</dt>
        <dd>
          <input type="date" name="course_edu_sdate" value="<?=date_format(date_create($data['course_edu_sdate']), "Y-m-d")?>"  class="txe" required > ~ <input type="date" name="course_edu_edate" value="<?=date_format(date_create($data['course_edu_edate']), "Y-m-d")?>"  class="txe" required >
        </dd>

        <dt>강의 태그</dt>
        <dd>
          <input type="text" name="course_tag" value="<?=$data['course_tag']?>"  class="txe" required >
        </dd>

        <dt>미리보기 링크</dt>
        <dd>
          <input type="text" name="course_link" value="<?=$data['course_link']?>"  class="txe" required >
        </dd>
        <dt>이미지 삽입</dt>
        <dd>
          <div class="course_img">
            <?php if(empty($data['course_img'])) {?>
            <img id="output" src="<?=$base_URL?>images/default_img.png" alt="image"/>
            <?php } else {
              $sql_file = "SELECT * FROM upload_file WHERE fileID = '".$data['course_img']."'";
              $result_file = mysqli_query($con, $sql_file);
              $row_file = mysqli_fetch_assoc($result_file);
            ?>
            <img id="output" src="<?=$base_URL.'upload/'.$row_file['nameSave']?>" alt="image"/>
            <?php } ?>
            <input type="file" accept="image/*" onchange="loadFile(event)" id="inputTag" name="fileDoc"/>
            <label htmlFor="inputTag" for="inputTag"><span>+</span> 파일추가</label>
          </div>
        </dd>

        <dt>강의 구성</dt>
        <dd class="course_index">
          <div>
            <button type="button" class="insert btn_chapter">
              <i class="fa-solid fa-plus"></i> 챕터 추가
            </button>
            <button type="button" class="insert btn_class">
              <i class="fa-solid fa-plus"></i> 차시 추가
            </button>
            <button type="button" class="delete">
              <i class="fa-solid fa-minus"></i> 삭제
            </button>
          </div>
          <div class="list_lndex">
            <?php
              if(empty($id)) {
            ?>
            <input type="radio" class="hidden" name="select" id="chapter1">
            <label class="chapter" for="chapter1">
              <img src="<?=$base_URL?>images/chapter_img.svg" alt="챕터" /><span class="index">Chapter 1.</span><input type="text" name="chapter[]" value="">
            </label>
            <input type="radio" class="hidden" name="select" id="class1">
            <label class="class" for="class1">
              <img src="<?=$base_URL?>images/class_img.svg" alt="차시" /><span class="index">1차시</span><input type="text" name="class[]" value="">
              <div>링크주소 <input type="text" name="link[]"></div>
            </label>
            <?php } else {?>
            <?php
              $sql_chapter = "SELECT * FROM course_index WHERE course_id = $id AND class IS NULL";
              $result_chapter = mysqli_query($con, $sql_chapter);
              $class_index = 0;
              while($row_chapter = mysqli_fetch_assoc($result_chapter)) {
            ?>
            <input type="radio" class="hidden" name="select" id="chapter<?=$row_chapter['chapter_id']?>">
            <label class="chapter" for="chapter<?=$row_chapter['chapter_id']?>">
              <img src="<?=$base_URL?>images/chapter_img.svg" alt="챕터" /><span class="index">Chapter <?=$row_chapter['chapter_id']?>.</span><input type="text" name="chapter[]" value="<?=$row_chapter['chapter']?>">
            </label>
            <?php
                $sql_class = "SELECT * FROM course_index WHERE course_id = $id AND class IS NOT NULL AND chapter = ".$row_chapter['chapter_id']."";
                $result_class = mysqli_query($con, $sql_class);
                while($row_class = mysqli_fetch_assoc($result_class)) {
                  $class_index++;
                  ?>
            <input type="radio" class="hidden" name="select" id="class<?=$class_index?>">
            <label class="class" for="class<?=$class_index?>">
              <img src="<?=$base_URL?>images/class_img.svg" alt="차시" /><span class="index"><?=$class_index?>차시</span><input type="text" name="class[]" value="<?=$row_class['class']?>">
              <div>링크주소 <input type="text" name="link[]" value="<?=$row_class['class_link']?>"></div>
            </label>
            <?php
                }
              }
            }
            ?>
          </div>
        </dd>
      </dl>

      <!-- 삭제/완료 -->
      <ul class="board_b">
        <li><a href="adm_academy_delete.php?course_id=<?=$data['course_id']?>">삭제</a></li>
        <li class="nw_success"><input type="submit" value="완료"></li>
      </ul>
    </div>
  </form>
</main>
<?php
include_once('./footer.php');
?>