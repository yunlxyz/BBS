$(document).ready(function(){
    $('#summernote').summernote({
      height: 200,                 // set editor height
      minHeight: null,             // set minimum height of editor
      maxHeight: null,             // set maximum height of editor
      focus: true ,
      callbacks: {
        onImageUpload: function(files) {
          // alert('OK');
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
          url: "http://localhost/BBS/index.php/User/Question/publish_answer",
          success: function(url) {
            alert("OK");
          }
        });
      }else {
        alert("请输入答案");
      }

    });
});
