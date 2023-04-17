<?php
include_once('./common.php');
?>
<main class="home">
  <section>
    <input type="checkbox" id="calenderChk" checked>
    <h3 class="hidden">강의 스케줄 관리 달력</h3>
    <article class="calender">
      <h3>강의 스케줄 관리</h3>
      <div class="cal_nav">
        <a href="#none" class="nav-btn go-prev" title="방향">
          <img src="<?=$base_URL?>images/cal_arrow.svg" alt="arrow">
        </a>
        <div class="now_year">
          <span>2023년</span>
        </div>
        <ul class="year-month">
          <li>
            <a href="#none" title="1">1</a>
          </li>
          <li>
            <a href="#none" title="2">2</a>
          </li>
          <li>
            <a href="#none" title="3">3</a>
          </li>
          <li>
            <a href="#none" title="4">4</a>
          </li>
          <li>
            <a href="#none" title="5">5</a>
          </li>
          <li>
            <a href="#none" title="6">6</a>
          </li>
          <li>
            <a href="#none" title="7">7</a>
          </li>
          <li>
            <a href="#none" title="8">8</a>
          </li>
          <li>
            <a href="#none" title="9">9</a>
          </li>
          <li>
            <a href="#none" title="10">10</a>
          </li>
          <li>
            <a href="#none" title="11">11</a>
          </li>
          <li>
            <a href="#none" title="12">12</a>
          </li>
        </ul>
        <a href="#none" class="nav-btn go-next" title="방향">
          <img src="<?=$base_URL?>images/cal_arrow.svg" alt="arrow">
        </a>
      </div>
      <div class="sec_cal">
        <div class="cal_wrap">
          <div class="days">
            <div class="day">일</div>
            <div class="day">월</div>
            <div class="day">화</div>
            <div class="day">수</div>
            <div class="day">목</div>
            <div class="day">금</div>
            <div class="day">토</div>
          </div>
          <div class="dates"></div>
        </div>
      </div>
      <label for="calenderChk" id="calenderChkLabel">
        <i class="fa-solid fa-chevron-down"></i>
      </label>
    </article>
  </section>
  <section class="main_data_table_section">
    <h3 class="hidden">신규 회원 / 답변대기 문의</h3>
    <article class="main_data_table main_members">
      <h3>신규 회원</h3>
      <table>
        <thead>
          <tr>
            <th>번호</th>
            <th>이름</th>
            <th>아이디</th>
            <th>이메일</th>
            <th>전화번호</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $sql_member = "SELECT * FROM member ORDER BY mb_no DESC LIMIT 0, 4";
            $result_member = mysqli_query($con, $sql_member);
    
            while($row_member = mysqli_fetch_assoc($result_member)) {
          ?>
          <tr>
            <td><?=$row_member['mb_no']?></td>
            <td><?=$row_member['mb_name']?></td>
            <td><?=$row_member['mb_id']?></td>
            <td><?=$row_member['mb_email']?></td>
            <td><?=$row_member['mb_tel']?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <a href="<?=$base_admin_URL?>adm_member_list.php" class="view_more">더보기 <i class="fa-solid fa-chevron-right"></i></a>
    </article>
    <article class="main_data_table main_answer">
      <h3>답변대기 문의</h3>
      <table>
        <thead>
          <th>번호</th>
          <th>제목</th>
          <th>글쓴이</th>
          <th>등록일</th>
          <th>관리</th>
        </thead>
        <tbody>
          <?php
            $sql_answer = "SELECT origin.*
            FROM board_question AS origin
            WHERE origin.question_id 
            NOT IN (SELECT a.question_id 
                    FROM board_question AS a, 
                      (SELECT question_parent_id 
                        FROM board_question 
                        WHERE question_parent_id IS NOT NULL) AS b 
            WHERE a.question_id = b.question_parent_id) AND origin.question_parent_id IS NULL
            ORDER BY question_id
            LIMIT 0, 4";
            $result_answer = mysqli_query($con, $sql_answer);
    
            while($row_answer = mysqli_fetch_assoc($result_answer)) {
              $sql_member_name = "SELECT * FROM member WHERE mb_no = '".$row_answer['mb_no']."'";
              $result_member_name = mysqli_query($con, $sql_member_name);
              $row_member_name = mysqli_fetch_assoc($result_member_name);
          ?>
          <tr>
            <td><?=$row_answer['question_id']?></td>
            <td><?=$row_answer['question_title']?></td>
            <td><?=$row_member_name['mb_name']?></td>
            <td><?=date_format(date_create($row_answer['question_wdate']), "Y-m-d")?></td>
            <td><a href="<?=$base_admin_URL?>adm_answer_insert.php?question_id=<?=$row_answer['question_id']?>" title="답변하기" class="btn_answer">답변하기</a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <a href="<?=$base_admin_URL?>adm_answer_list.php?page=1&cate=2" class="view_more">더보기 <i class="fa-solid fa-chevron-right"></i></a>
    </article>
  </section>
</main>
<?php
include_once('./footer.php');
?>