<!-- contents -->
<div class="row" style="margin-top:5%;">
  <div class="col-md-1"></div>
  <div class="col-md-10 offset-body">
    <div class="row">
      <div class="col-md-9">
        <div class="row">
          <div class="col-md-12 clearfix" id="content">
            <h4 class="home-title"><span class="glyphicon glyphicon-th-list"></span>最新帖子</h4>
            <?php foreach ($data as $item):?>
              <div class="feed-item clearfix">
                <div class="avatar pull-left text-center">
                  <div><img src="<?php echo $item['question']['topic_avatar'];?>" style="width:50px;height:50px;" /></div>
                </div>
                <div class="feed-main pull-left">
                  <div class="source">来自 <a class＝"name" href="#" data-placement="bottom"><?php echo $item['question']['topic_title'];?></a></div>
                  <div class="content clearfix">
                    <h5><a class="question-link" href="/BBS/index.php/User/Question/index/<?php echo $item['question']['id'];?>" target="_blank"><?php echo $item['question']['question_title'];?></a></h5>
                    <div class="answer-auther-info clearfix">
                      <a href="#" class="avatar-link pull-right"><img src="<?php echo $item['answer']['user_avatar'];?>" /></a>
                      <a href="#" class="author-link"><?php echo $item['answer']['nickname'];?></a><span class="bio">，<?php echo $item['answer']['introduction'];?></span>
                    </div>
                    <div class="detail-answer">
                      <p><?php echo $item['answer']['answer_decs'];?></p>
                      <div class="zantong">
                        <?php if($item['like']['islike'] == 1):?>
                          <a class="up pressed" href="javascript:void(0);" data-islike="1" data-aid="<?php echo $item['answer']['id'];?>"><span class="glyphicon glyphicon-thumbs-up"><span></a>
                        <?php else:?>
                          <a class="up" href="javascript:void(0);" data-islike="0" data-aid="<?php echo $item['answer']['id'];?>"><span class="glyphicon glyphicon-thumbs-up"><span></a>
                        <?php endif;?>
                        <div class="vote-info">
                          <?php foreach($item['like']['like'] as $liker):?>
                            <a href="#"><?php echo $liker->liker;?></a>
                          <?php endforeach;?>
                          等<small><?php echo $item['like']['total'][0]->count_like;?></small>人赞同
                        </div>
                      </div>
                    </div>
                    <div class="summary"></div>
                    <div class="feed-meta answer-actions" data-resourceid="1">
                      <button type="button" class="btn btn-primary pull-right js-collapse"><span class="glyphicon glyphicon-menu-up"></span>收起</button>
                      <?php if($item['mark'] === 1):?>
                        <a href="javascript:void(0);" class="unfollow-link" data-qid="<?php echo $item['question']['id'];?>">
                          取消关注
                        </a>
                      <?php else:?>
                        <a href="javascript:void(0);" class="follow-link" data-qid="<?php echo $item['question']['id'];?>">
                          <span class="glyphicon glyphicon-plus feed-icon"></span>关注问题
                        </a>
                      <?php endif;?>
                      <a href="/BBS/index.php/User/Question/index/<?php echo $item['question']['id'];?>" target="_blank"><span class="glyphicon glyphicon-comment feed-icon"></span><?php echo $item['question']['answer_count'];?>回答</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach;?>
            <a class="btn btn-default btn-block" id="next" href="/BBS/index.php/Index/index/?page=1" role="button">点击加载更多。。。</a>


            <!-- <div class="feed-item clearfix">
              <div class="avatar pull-left text-center">
                <div><img src="http://localhost/BBS/public/images/demo.jpg" style="width:50px;height:50px;" /></div>
              </div>
              <div class="feed-main pull-left">
                <div class="source">来自 <a href="#">分类</a></div>
                <div class="content clearfix">
                  <h5><a class="question-link" href="/BBS/index.php/User/Question/index">不管有没有人看…我写一个真实的故事?</a></h5>
                  <div class="answer-auther-info clearfix">
                    <a href="#" class="avatar-link pull-right"><img src="http://localhost/BBS/public/images/demo.jpg" /></a>
                    <a href="#" class="author-link">回答者</a><span class="bio">,个人简介</span>
                  </div>
                  <div class="detail-answer">
                    <p>不管有没有人看…我写一个真实的故事。大学时期我是校队的控卫，工作之后因为懒加忙，打球打的少了，球感生疏，菜如狗…不管有没有人看…我写一个真实的故事。大学时期我是校队的控卫，工作之后因为懒加忙，打球打的少了，球感生疏，菜如狗…不管有没有人看…我写一个真实的故事。大学时期我是校队的控卫，工作之后因为懒加忙，打球打的少了，球感生疏，菜如狗…不管有没有人看…我写一个真实的故事。大学时期我是校队的控卫，工作之后因为懒加忙，打球打的少了，球感生疏，菜如狗…不管有没有人看…我写一个真实的故事。大学时期我是校队的控卫，工作之后因为懒加忙，打球打的少了，球感生疏，菜如狗…不管有没有人看…我写一个真实的故事。大学时期我是校队的控卫，工作之后因为懒加忙，打球打的少了，球感生疏，菜如狗…不管有没有人看…我写一个真实的故事。大学时期我是校队的控卫，工作之后因为懒加忙，打球打的少了，球感生疏，菜如狗…不管有没有人看…我写一个真实的故事。大学时期我是校队的控卫，工作之后因为懒加忙，打球打的少了，球感生疏，菜如狗…不管有没有人看…我写一个真实的故事。大学时期我是校队的控卫，工作之后因为懒加忙，打球打的少了，球感生疏，菜如狗…不管有没有人看…我写一个真实的故事。大学时期我是校队的控卫，工作之后因为懒加忙，打球打的少了，球感生疏，菜如狗…不管有没有人看…我写一个真实的故事。大学时期我是校队的控卫，工作之后因为懒加忙，打球打的少了，球感生疏，菜如狗…不管有没有人看…我写一个真实的故事。大学时期我是校队的控卫，工作之后因为懒加忙，打球打的少了，球感生疏，菜如狗…</p>
                    <div class="zantong">
                      <a href="#"><span class="glyphicon glyphicon-thumbs-up"><span></a>未闻花名、ABC等10人赞同
                    </div>
                  </div>
                  <div class="summary"></div>
                  <div class="feed-meta answer-actions" data-resourceid="1">
                    <button type="button" class="btn btn-primary pull-right js-collapse"><span class="glyphicon glyphicon-menu-up"></span>收起</button>
                    <a href="#"><span class="glyphicon glyphicon-plus feed-icon"></span>关注问题</a>
                    <a href="#"><span class="glyphicon glyphicon-comment feed-icon"></span>123回答</a>
                  </div>
                </div>
              </div>
            </div> -->

          </div>
        </div>
      </div>
      <div class="col-md-3 tmp">
        <ul class="list-group side-nav-group">
          <li class="list-group-item"><span class="glyphicon glyphicon-list-alt"></span><a href="/BBS/index.php/User/Question/index_all">所有问题</a></li>
          <li class="list-group-item"><span class="glyphicon glyphicon-th-large"></span><a href="/BBS/index.php/User/Topics/index">话题广场</a></li>
          <li class="list-group-item"><span class="glyphicon glyphicon-star-empty"></span><a href="#">我的收藏</a></li>
          <li class="list-group-item"><span class="glyphicon glyphicon-heart"></span><a href="/BBS/index.php/User/Follow/index">我关注的问题</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-md-1"></div>
</div>
<script src="/BBS/public/js/common.js"></script>
<script>
	$('#content').infinitescroll({
    loading: {
      finishedMsg: '<a class="btn btn-default btn-block" href="javascript:;" role="button">问题已经全部加载完了</a>',
      img: null,
      msg: null,
      msgText: '<a class="btn btn-default btn-block" href="javascript:;" role="button">正在加载更多数据，请稍后。。。</a>',
      selector: null,
      speed: 'slow',
      start: undefined
    },
		// callback		: function () { console.log('using opts.callback'); },
		navSelector  	: "#next",
		nextSelector 	: "#next",
		itemSelector 	: ".feed-item",
		debug		 	: true,
		dataType	 	: 'html',
		// behavior		: 'twitter',
		appendCallback	: true, // USE FOR PREPENDING
		// pathParse     	: function( pathStr, nextPage ){ return pathStr.replace('2', nextPage ); }
    },
    function(newElements, data, url) {
		}
  );
</script>
<script>
// 	$('#content').infinitescroll({
//     loading: {
//       finishedMsg: '<a class="btn btn-default btn-block" href="javascript:;" role="button">问题已经全部加载完了</a>',
//       img: null,
//       msg: null,
//       msgText: '<a class="btn btn-default btn-block" href="javascript:;" role="button">正在加载更多数据，请稍后。。。</a>',
//       selector: null,
//       speed: 'slow',
//       start: undefined
//     },
// 		// callback		: function () { console.log('using opts.callback'); },
// 		navSelector  	: "#next",
// 		nextSelector 	: "#next",
// 		itemSelector 	: "#content",
// 		debug		 	: false,
// 		dataType	 	: 'json',
// 		// behavior		: 'twitter',
// 		appendCallback	: false, // USE FOR PREPENDING
// 		// pathParse     	: function( pathStr, nextPage ){ return pathStr.replace('2', nextPage ); }
//     },
//     function( response ) {
//       var html ='';
//       $.each(response , function(n , value){
//         html += '<div class="feed-item clearfix">'+
//                   '<div class="avatar pull-left text-center">'+
//                     '<div><img src="'+value["question"]["topic_avatar"]+'" style="width:50px;height:50px;" /></div>'+
//                   '</div>'+
//                   '<div class="feed-main pull-left">'+
//                     '<div class="source">来自 <a href="#">'+value["question"]["topic_title"]+'</a></div>'+
//                     '<div class="content clearfix">'+
//                       '<h5><a class="question-link" href="/BBS/index.php/User/Question/index/'+value["question"]["id"]+'">'+value["question"]["question_title"]+'</a></h5>'+
//                       '<div class="answer-auther-info clearfix">'+
//                         '<a href="#" class="avatar-link pull-right"><img src="'+value["answer"]["user_avatar"]+'" /></a>'+
//                         '<a href="#" class="author-link">'+value["answer"]["answerer"]+'</a><span class="bio">,'+value["answer"]["introduction"]+'</span>'+
//                       '</div>'+
//                       '<div class="detail-answer">'+
//                         '<p>'+value["question"]["question_desc"]+'</p>'+
//                         '<div class="zantong">'+
//                           '<a href="#"><span class="glyphicon glyphicon-thumbs-up"><span></a>、ABC等10人赞同'+
//                         '</div>'+
//                       '</div>'+
//                       '<div class="summary"></div>'+
//                       '<div class="feed-meta answer-actions" data-resourceid="1">'+
//                         '<button type="button" class="btn btn-primary pull-right js-collapse"><span class="glyphicon glyphicon-menu-up"></span>收起</button>'+
//                         '<a href="#"><span class="glyphicon glyphicon-plus feed-icon"></span>关注问题</a>'+
//                         '<a href="/BBS/index.php/User/Question/index/'+value["question"]["id"]+'"><span class="glyphicon glyphicon-comment feed-icon"></span>'+value["question"]["answer_count"]+'回答</a>'+
//                       '</div>'+
//                     '</div>'+
//                   '</div>'+
//                 '</div>';
//       });
//       $('#content').append(html);
// 		});
// </script>
