$(document).ready(function(){
  show();
  function show(){
    var text = $.trim($('.detail-answer').text());
    var tmp_div = "<a href='javascript:void(0);' class='toggle-expand'>... 显示全部</a>";
    if(text.length > 50){
      $('.detail-answer').css('display','none');
      $('.summary').text(text.substring(0 , 50));
    }
    $('.summary').append(tmp_div);
  }

  $('.toggle-expand').click(function (){
    $(this).parent().css('display' , 'none');
    $(this).parent().parent().children('.detail-answer').css('display','block');
    $(this).parent().parent().children('.answer-actions').children('.js-collapse').addClass('is-sticky');
    $(this).parent().parent().children('.answer-actions').children('.js-collapse').css("position" , "fixed");
    $(this).parent().parent().children('.answer-actions').children('.js-collapse').css("display" , "inline-block");
    $(this).parent().parent().children('.answer-actions').children('.js-collapse').css("bottom" , "10px");
    $(this).parent().parent().children('.answer-actions').children('.js-collapse').css("right" , "38%");
    $(this).parent().parent().children('.answer-actions').data('expend' , '1');
  })
  $('.js-collapse').on('click' , function(){
    $(this).removeClass('is-sticky');
    $(this).parent().parent().children('.detail-answer').css('display','none');
    $(this).parent().parent().children('.summary').css('display' , 'block');
    $(this).css("display" , "none");
  })

  $(window).scroll(function(){
    $(".answer-actions").each(function(){
      var x = $(this).offset();
      var y = $(this).parent().children('.detail-answer').offset();
      var top = $(document).scrollTop();
      if ((x.top - top) > $(window).height() && $(window).height() > (y.top - top) > 0) {
        $(this).children('.is-sticky').css("position" , "fixed");
        $(this).children('.is-sticky').css("bottom" , "10px");
        $(this).children('.is-sticky').css("right" , "38%");
        $(this).children('.is-sticky').css("display" , "inline-block");
      }else {
        $(this).children('.is-sticky').css("position" , "static");
      }
    })
  })
});
