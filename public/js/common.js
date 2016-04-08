$(document).ready(function(){
  $('.follow-link').click(function(){
    var follow_question = $(this).data('qid');
    var mythis = $(this)
    // alert($(this).text());
    $.ajax({
      type: "POST",
      url: "index.php/User/Follow/follow_question",
      data: {question_id: follow_question} ,
      success: function(data){
        var json = eval('('+data+')');
        if(json.code == "20000"){
          mythis.text('取消关注');
          mythis.removeClass();
          mythis.addClass('unfollow-link')
        }
      }
    })
  });

  // $('.unfollow-link').click(functin(){
  //   var follow_question = $(this).data('qid');
  //   var mythis = $(this)
  //   // alert($(this).text());
  //   $.ajax({
  //     type: "POST",
  //     url: "index.php/User/Follow/unfollow_question",
  //     data: {question_id: follow_question} ,
  //     success: function(data){
  //       var json = eval('('+data+')');
  //       if(json.code == "20000"){
  //         mythis.text('取消关注');
  //         mythis.removeClass();
  //         mythis.addClass('unfollow-link')
  //       }
  //     }
  //   })
  // })
})
