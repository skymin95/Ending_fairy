<?php
$title = "마이페이지 > 회원정보 수정"; // 타이틀
include_once('../common.php');
empty($_SESSION['mb_id']) || $mb_id = $_SESSION['mb_id']."님 환영합니다.";

$mb_id = $_SESSION['mb_id'];

$sql_member = "SELECT * FROM member WHERE mb_id = '".$_SESSION['mb_id']."' ";
$result_member = mysqli_query($con, $sql_member);
$row_member = mysqli_fetch_array($result_member);
?>
<article>
  <h2 class="sub_title_prev">
    <a href="<?=$base_URL?>sub/mypage/mypage.php" title="돌아가기">
      <img src="<?=$base_URL?>images/arrow_title_prev.svg" alt="prev">
      회원정보 수정
    </a>
  </h2>
</article>
<article class="update_member">
  <h3 class="hidden">회원정보 수정 폼</h3>
  <form action="update_member_action.php" method="post">
    <table>
      <caption class="hidden">회원정보 수정 폼</caption>
      <tbody>
        <tr>
          <th>이름</th>
          <td><?=$row_member['mb_name']?></td>
        </tr>
        <tr>
          <th>아이디</th>
          <td><?=$row_member['mb_id']?></td>
        </tr>
        <tr>
          <th><label for="mb_nick">닉네임</label></th>
          <td>
            <input type="text" name="mb_nick" id="mb_nick">
            <button type="button"><img src="<?=$base_URL?>images/overlap_check.svg" alt="overlapCheck">중복확인</button><span id="overlapCheck"></span>
          </td>
        </tr>
        <tr>
          <th><label for="mb_password">비밀번호</label></th>
          <td><input type="password" name="mb_password" id="mb_password"></td>
        </tr>
        <tr>
          <th><label for="mb_password_chk">비밀번호 확인</label></th>
          <td><input type="password" name="mb_password_chk" id="mb_password_chk"></td>
        </tr>
        <tr>
          <th><label for="tel1">휴대폰 번호</label></th>
          <td class="tel">
            <input type="text" name="tel1" id="tel1"> -
            <input type="text" name="tel2" id="tel2"> -
            <input type="text" name="tel3" id="tel3">
          </td>
        </tr>
        <tr>
          <th><label for="mb_birth">생년월일</label></th>
          <td><input type="date" name="mb_birth" id="mb_birth"></td>
        </tr>
        <tr>
          <th><label for="mb_email">이메일</label></th>
          <td><input type="email" name="mb_email" id="mb_email"></td>
        </tr>
      </tbody>
    </table>
  </form>
</article>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/Ending_fairy/footer.php');
?>