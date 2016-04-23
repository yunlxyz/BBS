<!-- contents -->
<div class="row content-body" style="margin-top:5%;">
  <div class="col-md-1"></div>
  <div class="col-md-10 offset-body">
    <div class="row">
      <div class="col-md-9">
        <div class="logs-questions-wrap" id="content">
          <div class="page-header small-nav-item">
            <h3>所有问题 <small>你所需要的都在这里...</small></h3>
          </div>
          <?php foreach ($question as $item):?>
            <div class="logs-questions-item">
              <h4><a href="/BBS/index.php/User/Question/index/<?php echo $item->id;?>"><?php echo $item->question_title;?></a></h4>
              <div>
                <a href="#"><?php echo $item->questioner;?></a><span class="zg-gray-normal"> 添加问题</span>
              </div>
              <div class="logs-questions-detail">
                <div><ins><?php echo $item->question_title;?></ins></div>
                <div>补充说明: <ins><?php echo $item->question_desc;?></ins></div>
              </div>
              <div class="logs-questions-meta"><time><?php echo $item->question_time?></time></div>
            </div>
          <?php endforeach;?>
          <a class="btn btn-default btn-block" id="next" href="/BBS/index.php/User/Question/index_all?page=2" role="button">点击加载更多。。。</a>

          <!-- <div class="logs-questions-item">
            <h4><a href="#">你们健身时都在想什么？健身的同时干着什么才能坚持下来健身？</a></h4>
            <div>
              <a href="#">未闻花名</a><span class="zg-gray-normal">添加问题</span>
            </div>
            <div class="logs-questions-detail">
              <div><ins>你们健身时都在想什么？健身的同时干着什么才能坚持下来健身？</ins></div>
              <div>补充说明: <ins>问题说明</ins></div>
            </div>
            <div class="logs-questions-meta"><time>2016-03-23 18:00:00</time></div>
          </div> -->

        </div>
      </div>
      <div class="col-md-3">
        <ul class="list-group side-nav-group">
          <li class="list-group-item"><span class="glyphicon glyphicon-list-alt"></span><a href="/BBS/index.php/User/Question/index_all">所有问题</a></li>
          <li class="list-group-item"><span class="glyphicon glyphicon-th-large"></span><a href="/BBS/index.php/User/Topics/index">话题广场</a></li>
          <li class="list-group-item"><span class="glyphicon glyphicon-star-empty"></span><a href="#">我的收藏</a></li>
          <li class="list-group-item"><span class="glyphicon glyphicon-heart"></span><a href="#">我关注的问题</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-md-1"></div>
</div>
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
		itemSelector 	: ".logs-questions-item",
		debug		 	: false,
		dataType	 	: 'html',
		// behavior		: 'twitter',
		appendCallback	: true, // USE FOR PREPENDING
		// pathParse     	: function( pathStr, nextPage ){ return pathStr.replace('2', nextPage ); }
    },
    function(newElements, data, url) {
		}
  );
  // $(window).unbind('.infscr');
  // // $(document).trigger(‘retrieve.infscr’);
  // // $('.infscr').infinitescroll('unbind');
  // $('#next').click(function(){
  //   // $(document).trigger('retrieve.infscr');
  //   $('#content').infinitescroll('retrieve');
  // })
  // $(document).ajaxError(function(e,xhr,opt){
  //   if (xhr.status == 404) $('#next').remove();
  // });
</script>
