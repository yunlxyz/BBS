<!-- contents -->
<div class="row" style="margin-top:4.1%;">
  <div>
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>
      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="http://www.bz55.com/uploads/allimg/150309/139-150309101A0.jpg" alt="...">
          <div class="carousel-caption">
            <h3>第一张</h3>
            <p>这里是简介，你好世界！！！</p>
          </div>
        </div>
        <div class="item">
          <img src="http://www.bz55.com/uploads/allimg/150309/139-150309101A3.jpg" alt="...">
          <div class="carousel-caption">
            <h3>第二张</h3>
            <p>这里是简介，你好世界！！！</p>
          </div>
        </div>
        <div class="item">
          <img src="http://www.bz55.com/uploads/allimg/150309/139-150309101A7.jpg" alt="...">
          <div class="carousel-caption">
            <h3>第3张</h3>
            <p>这里是简介，你好世界！！！</p>
          </div>
        </div>
      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</div>
<div class="row" style="margin-top:4.1%;">
  <div class="col-md-1"></div>
  <div class="col-md-10 offset-body">
    <div class="row news-list">
      <?php foreach($news as $item):?>
        <div class="col-sm-6 col-md-4 news-item" data-nid="<?php echo $item->id;?>">
          <div class="thumbnail">
            <img src="http://img2.3lian.com/2014/f5/158/d/86.jpg" alt="...">
            <div class="caption">
              <h3><?php echo $item->news_title;?></h3>
              <p><?php echo $item->news_subtitle;?></p>
              <!-- <div class="collapse" id="collapseExample<?php echo $item->id;?>"> -->
                <!-- <div class="well"> -->
                  <!-- <?php echo $item->news_decs;?> -->
                <!-- </div> -->
              <!-- </div> -->
              <p class="clearfix">
                <a class="btn btn-primary pull-right read" role="button">阅读</a>
              </p>
            </div>
          </div>
        </div>
      <?php endforeach;?>
      <!-- <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <img src="http://ww1.sinaimg.cn/mw600/aa8725c6gw1e7e1wq2brxj20dw07tq4b.jpg" alt="...">
          <div class="caption">
            <h3>新闻标题</h3>
            <p>新闻副标题</p>
            <div class="collapse" id="collapseExample2">
              <div class="well">
                新闻详细内容
              </div>
            </div>
            <p class="clearfix">
              <a class="btn btn-primary pull-right" role="button" data-toggle="collapse" href="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">阅读</a>
            </p>
          </div>
        </div>
      </div> -->
    </div>
  </div>
  <div class="col-md-1"></div>
</div>
<!-- Modal -->
<div class="modal fade" id="newsModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <!-- <h4 class="modal-title" id="myModalLabel">Modal title</h4> -->
      </div>
      <div class="modal-body">
        <div class="model-title text-center"><h3>标题</h3></div>
        <div class="model-sub text-center"><h4>摘要</h4></div>
        <div class="model-time text-right"><small>编辑于2016-04-23 18:20 by root</small></div>
        <div class="model-content"><p>内容</p></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
      </div>
    </div>
  </div>
</div>
<script src="/BBS/public/js/masonry.pkgd.js"></script>
<script src="/BBS/public/js/masonry.pkgd.min.js"></script>
<script>
  $(function(){
    $('.read').on('click' , function(){
      var news_id = $(this).parent().parent().parent().parent().data('nid');
      $.ajax({
        url: '/BBS/index.php/User/News/get_news_signal',
        dataType: 'json',
        type: 'POST',
        data:{news_id: news_id},
        success:function(data){
          if (data.code = 10000) {
            var item = data.news[0];
            $('.model-title h3').text(item.news_title);
            $('.model-sub h4').text(item.news_subtitle);
            $('.model-time small').text('编辑于 '+item.news_time + ' by ' +item.news_editor);
            $('.model-content p').text(item.news_decs);
            $('#newsModel').modal();
          }
        }
      })
    })
  })
</script>
<script>
$('.news-list').masonry({
  itemSelector: '.news-item',
  percentPosition: true
});
</script>
