$(function(){

  let formAcademy = $('#formAcademy');


  let list_chapter = $('.list_lndex > .chapter');
  let list_chapter_index = list_chapter.length;

  let list_class = $('.list_lndex > .class');
  let list_class_index = list_class.length;

  $('.btn_chapter').on('click', function(e){
    e.preventDefault();
    list_chapter_index++;
    let addChapter = '<input type="radio" class="hidden" name="select" id="chapter'+list_chapter_index+'">' +
    '<label class="chapter" for="chapter'+list_chapter_index+'">' +
    '<img src="../images/chapter_img.svg" alt="챕터" /><span class="index">Chapter '+list_chapter_index+'.</span><input type="text" name="chapter[]" value="">' +
    '</label>';
    $('.course_index > .list_lndex').append(addChapter);
  });

  $('.btn_class').on('click', function(e){
    e.preventDefault();
    list_class_index++;
    let addClass = '<input type="radio" class="hidden" name="select" id="class'+list_class_index+'">' +
    '<label class="class" for="class'+list_class_index+'">' +
    '<img src="../images/class_img.svg" alt="차시" /><span class="index">'+list_class_index+'차시</span><input type="text" name="class[]" value="">' +
    '<div>링크주소 <input type="text" name="link[]"></div>'+
    '</label>';

    $('.course_index > .list_lndex').append(addClass);
  });

  //삭제 버튼 클릭
  $('.delete').on('click', function(e){
    e.preventDefault();
    let checkRadio = $('input[name=select]:checked');
    let checkLabel = $('input[name=select]:checked + label');

    //삭제
    if(checkLabel.next().next().hasClass('class') && checkLabel.hasClass('chapter')){
      $('input[name=select]:checked ~ label').each(function(index){
        if($(this).hasClass('class')){
          $(this).prev().remove();
          $(this).remove();
        } else if (index != 0) {
          return false;
        }
      });
    }
    checkRadio.remove();
    checkLabel.remove();

    //재정렬
    list_chapter = $('.list_lndex > .chapter');
    list_chapter_index = list_chapter.length;

    list_class = $('.list_lndex > .class');
    list_class_index = list_class.length;

    for(let i = 0; i < list_chapter_index; i++){
      list_chapter.eq(i).prev().attr('id', 'chapter' + (i+1));
      list_chapter.eq(i).attr('for', 'chapter' + (i+1));
      list_chapter.eq(i).find('.index').text('Chapter '+(i+1)+'.');
    }
    for(let j = 0; j < list_class_index; j++){
      list_class.eq(j).prev().attr('id', 'class' + (j+1));
      list_class.eq(j).attr('for', 'class' + (j+1));
      list_class.eq(j).find('.index').text((j+1)+'차시');
    }
  });

  //강의 submit
  $('#formAcademy').on('submit', function(e){
    $('.list_lndex > label.class').each(function(){
      let classVal = $(this).find('input[name="class[]"]').val();
      $(this).find('input[name="class[]"]').val('chapter'+$(this).prevAll('.chapter').eq(0).attr('for').substr(-1)+'^'+classVal);
    });
  });


});

    // 첨부파일
    let loadFile = function(event) {
      let reader = new FileReader();
      reader.onload = function(){
        let output = document.getElementById('output');
        output.src = reader.result;
      };
      reader.readAsDataURL(event.target.files[0]);
    };