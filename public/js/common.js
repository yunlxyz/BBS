$(document).ready(function(){
  // $('.name').tooltip({
  //   title: "顶部的 Tooltip"
  //
  // });

  $(document).on('click' , '.follow-link' ,function(){
    var follow_question = $(this).data('qid');
    var mythis = $(this);
    $.ajax({
      type: "POST",
      url: "index.php/User/Follow/follow_question",
      data: {question_id: follow_question} ,
      success: function(data){
        var json = eval('('+data+')');
        if(json.code == "20000"){
          mythis.text('取消关注');
          mythis.attr('class' , 'unfollow-link');
        }
      }
    })
  });

  $(document).on('click' , '.unfollow-link' , function(){
    var follow_question = $(this).data('qid');
    var mythis = $(this);
    $.ajax({
      type: "POST",
      url: "index.php/User/Follow/unfollow_question",
      data: {question_id: follow_question} ,
      success: function(data){
        var json = eval('('+data+')');
        if(json.code == "20000"){
          mythis.html('<span class="glyphicon glyphicon-plus feed-icon"></span>关注问题');
          mythis.attr('class' , 'follow-link');
        }
      }
    })
  });

  $(document).on('click' , '.up' , function(){
    var answer_id = $(this).data('aid');
    var mythis = $(this);
    mythis.addClass('pressed');
    // $.ajax({
    //   type: "POST",
    //   url: "index.php/User/Follow/unfollow_question",
    //   data: {question_id: follow_question} ,
    //   success: function(data){
    //     var json = eval('('+data+')');
    //     if(json.code == "20000"){
    //       mythis.html('<span class="glyphicon glyphicon-plus feed-icon"></span>关注问题');
    //       mythis.attr('class' , 'follow-link');
    //     }
    //   }
    // })
  });
})