$(document).ready(function(){

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
    var is_like = $(this).data('islike');
    var mythis = $(this);
    if (is_like == 1) {
      $.ajax({
        type: "POST",
        url: "index.php/Index/delete_like",
        data: {answer_id: answer_id} ,
        success: function(data){
          var json = eval('('+data+')');
          if(json.code == "10000"){
            mythis.removeClass('pressed');
            mythis.next('.vote-info').children('small').text(mythis.next('.vote-info').children('small').text()-1);
            // mythis.next('.vote-info span').prepend(mythis.next('.vote-info').children('small').text() -1);
            mythis.data('islike' , 0);
          }
        }
      })
    }else {
      $.ajax({
        type: "POST",
        url: "index.php/Index/add_like",
        data: {answer_id: answer_id} ,
        success: function(data){
          var json = eval('('+data+')');
          if(json.code == "10000"){
            mythis.addClass('pressed');
            mythis.next('.vote-info').children('a').prepend('lvyun');
            mythis.next('.vote-info').children('small').text(parseInt(mythis.next('.vote-info').children('small').text())+1);
            mythis.data('islike' , 1);
          }
        }
      })
    }
  });

})
