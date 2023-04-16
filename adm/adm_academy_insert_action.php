<?php
//ALTER TABLE `course_index` ADD `chapter_id` INT(11) NULL AFTER `index_id`;
  include_once('./common.php');
  $sql_member = "SELECT * FROM member WHERE mb_id = '".$_SESSION['mb_id']."'";
  $result_member = mysqli_query($con, $sql_member);
  $row_member = mysqli_fetch_assoc($result_member);

  $mb_no = $row_member['mb_no'];

  $id = $_POST['id']??'';

  $course_title = $_POST['course_title'];
  $course_cate = $_POST['course_cate'];
  $course_edu_time = $_POST['course_edu_time'];
  $course_price = $_POST['course_price'];
  $course_teacher = $_POST['course_teacher'];
  $course_ask_sdate = $_POST['course_ask_sdate'];
  $course_ask_edate = $_POST['course_ask_edate'];
  $course_edu_sdate = $_POST['course_edu_sdate'];
  $course_edu_edate = $_POST['course_edu_edate'];
  $course_tag = $_POST['course_tag'];
  $course_link = $_POST['course_link'];
  if($id == ''){
    $sql_course = "INSERT INTO course(course_title, course_cate, course_edu_time, course_price, course_teacher, course_ask_sdate, course_ask_edate, course_edu_sdate, course_edu_edate, course_tag, course_link, mb_no)
    VALUES('$course_title' ,'$course_cate' ,'$course_edu_time' ,'$course_price' ,'$course_teacher' ,'$course_ask_sdate' ,'$course_ask_edate' ,'$course_edu_sdate' ,'$course_edu_edate' ,'$course_tag' ,'$course_link' , '$mb_no')";
    $result_course = mysqli_query($con, $sql_course);

    if($result_course) {
      $last_id = mysqli_insert_id($con);

      foreach($_POST['chapter'] AS $key_chapter => $value_chapter){
        $sql_chapter = "INSERT INTO course_index(chapter_id, chapter, course_id) VALUES ('".($key_chapter+1)."', '$value_chapter', '$last_id')";
        $result_chapter = mysqli_query($con, $sql_chapter);
      }

      foreach($_POST['class'] AS $key_class => $value_class){
        $chapter = explode('chapter', explode('^', $value_class)[0])[1]; // explode로 ^를 기준으로 자른 후 chapter숫자로 추출한 뒤 다시 explode로 chapter을 잘라 숫자를 추출
        $class_title = explode('^', $value_class)[1]; // explode로 ^를 기준으로 자른 후 이후에 나오는 데이터 삽입
        $class_link = $_POST['link'][$key_class]; // 차시링크

        $sql_class = "INSERT INTO course_index(chapter, class, class_link, course_id) VALUES ('$chapter', '$class_title', '$class_link', '$last_id')";
        $result_class = mysqli_query($con, $sql_class);
      }
    }
  } else {
    $sql_course = "UPDATE course
    SET course_title = '$course_title', 
        course_cate = '$course_cate', 
        course_edu_time = '$course_edu_time', 
        course_price = '$course_price', 
        course_teacher = '$course_teacher', 
        course_ask_sdate = '$course_ask_sdate', 
        course_ask_edate = '$course_ask_edate', 
        course_edu_sdate = '$course_edu_sdate', 
        course_edu_edate = '$course_edu_edate', 
        course_tag = '$course_tag', 
        course_link = '$course_link', 
        mb_no = '$mb_no'
    WHERE course_id = '$id' ";
    $result_course = mysqli_query($con, $sql_course);

    if($result_course) {
      $last_id = $id;

      $sql_chapter_remove = "DELETE FROM course_index WHERE course_id = $id";
      $query_chapter_remove = mysqli_query($con, $sql_chapter_remove);

      foreach($_POST['chapter'] AS $key_chapter => $value_chapter){
        $sql_chapter = "INSERT INTO course_index(chapter_id, chapter, course_id) VALUES ('".($key_chapter+1)."', '$value_chapter', '$last_id')";
        $result_chapter = mysqli_query($con, $sql_chapter);
      }

      foreach($_POST['class'] AS $key_class => $value_class){
        $chapter = explode('chapter', explode('^', $value_class)[0])[1]; // explode로 ^를 기준으로 자른 후 chapter숫자로 추출한 뒤 다시 explode로 chapter을 잘라 숫자를 추출
        $class_title = explode('^', $value_class)[1]; // explode로 ^를 기준으로 자른 후 이후에 나오는 데이터 삽입
        $class_link = $_POST['link'][$key_class]; // 차시링크

        $sql_class = "INSERT INTO course_index(chapter, class, class_link, course_id) VALUES ('$chapter', '$class_title', '$class_link', '$last_id')";
        $result_class = mysqli_query($con, $sql_class);
      }
    }
  }
?>
<script>
  alert('<?=$id == '' ? '작성' : '수정'?> 완료되었습니다.');
  location.href='<?=$base_admin_URL?>adm_academy_list.php';
</script>