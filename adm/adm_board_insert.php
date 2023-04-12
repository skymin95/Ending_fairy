<?php
include_once('./common.php');
?>
<main class="board_insert">
    <ul class="board_h">
      <li><h2>공지사항</h2></li>
      <li><button>목록으로 이동</button></li>
    </ul>

    <form name="write" method="post" action="noticewrite2.php">
      <input type="hidden" name="id" value="<?=$id?>">
    
      <div class="board_wrap">
        <dl>
            <dt>제목</dt>
            <dd><input type="text" name="name" value="<?=$data['name']?>" class="txe" required ></dd>

            <dt>작성자</dt>
            <dd><input type="text" name="subject" value="<?=$data['subject']?>" required></dd>

            <dt>파일선택</dt>
            <dd class="asd"><input type="text" name="subject" value="<?=$data['subject']?>" required>
              <button class="board_file">파일추가</button>
            </dd>

            <dt>내용</dt>
            <dd><textarea name="memo" required><?=$data['memo']?></textarea></dd>       
          </dl>

          <!-- 삭제/완료 -->
          <ul class="board_b">
            <li><a href="noticelist.php">삭제</a></li>
            <li class="nw_success"><input type="submit" value="완료"></li>
          </ul>
      </div>
    </form>
  </main>
<?php
include_once('./footer.php');
?>