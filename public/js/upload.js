$(document).ready(function(){
    $('#summernote').summernote({
      height: 200,                 // set editor height
      minHeight: null,             // set minimum height of editor
      maxHeight: null,             // set maximum height of editor
      focus: false ,
      lang: 'zh-CN' ,
      callbacks: {
        onImageUpload: function(files) {
          var $editor = $(this);
          sendFile(files[0], $editor);
        }
      }
    });

    function sendFile(file, editor) {
      data = new FormData();
      data.append("file", file);
      $.ajax({
        data: data,
        type: "POST",
        url: "http://localhost/BBS/index.php/User/Question/upload_image",
        cache: false,
        contentType: false,
        processData: false,
        success: function(url) {
          editor.summernote('insertImage', url);
        }
      });
    }

    $('.submit').click(function(){
      var code = $('#summernote').summernote('code');
      var qid = $('#question-title').data('qid');
      if (20 > $.trim(code).length > 10) {
        alert("你输入的信息太短");
      }else if ($.trim(code).length >= 10) {
        $.ajax({
          data: {
            code: code,
            qid: qid
          },
          type: "POST",
          dataType: "json",
          url: "http://localhost/BBS/index.php/User/Question/publish_answer",
          success: function(data) {
            var html = '';
            if (data.code == 10000) {
              html +='<div class="question-item-answer">'+
                      '<div class="answer-head">'+
                        '<a href="#" class="avatar-link pull-right"><img src="http://localhost/BBS/public/images/demo.jpg" /></a>'+
                        '<a href="#" class="author-link">回答者</a><span class="bio">,个人简介</span></div>'+
                      '<div class="answer-text">'+
                        '<p>'+code+'</p>'+
                        '<div class="zantong">'+
                          '<a href="#"><span class="glyphicon glyphicon-thumbs-up"><span></a> 0人赞同'+
                          '<time class="pull-right">回答于：2016-03-24 18:00:00</time>'+
                        '</div>'+
                      '</div>'+
                     '</div>';
              $('.question-answer').append(html);
              
            }
          }
        });
      }else {
        alert("请输入答案");
      }

    });
});
