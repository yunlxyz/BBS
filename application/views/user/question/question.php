<!-- contents -->
<div class="row" style="margin-top:5%;">
  <div class="col-md-1"></div>
  <div class="col-md-10 offset-body">
    <div class="row">
      <div class="col-md-9">
        <div class="row">
          <div class="col-md-12 clearfix">
            <div class="main-content-inner">
              <div class="zm-tag">
                <span class="label label-primary"><?php echo $question[0]->question_class;?></span>
                <span class="label label-primary">标签2</span>
                <span class="label label-primary">标签3</span>
                <span class="label label-primary">标签4</span>
                <span class="label label-primary">标签5</span>
              </div>
              <div class="question-title clearfix">
                <h4><?php echo $question[0]->question_title;?></h4>
                <div class="question-info clearfix">
                  <span><?php echo $question[0]->questioner;?></span>
                  <div class="pull-right">提问于：<?php echo $question[0]->question_time;?></div>
                </div>
              </div>
              <div class="question-detail">
                <p><?php echo $question[0]->question_desc;?></p>
              </div>
              <div class="question-answer-count">
                <?php echo $question[0]->answer_count;?>个回答
              </div>
              <div class="question-answer">
                <?php foreach($answer as $item):?>
                  <div class="question-item-answer">
                    <div class="answer-head">
                      <a href="#" class="avatar-link pull-right"><img src="<?php echo $item->user_avatar;?>" /></a>
                      <a href="#" class="author-link"><?php echo $item->answerer;?></a><span class="bio">,<?php echo $item->introduction;?></span></div>
                    <div class="answer-text">
                      <p><?php echo $item->answer_decs;?></p>
                      <div class="zantong">
                        <a href="#"><span class="glyphicon glyphicon-thumbs-up"><span></a>未闻花名、ABC等<?php echo $item->like_count;?>人赞同
                        <time class="pull-right">回答于：<?php echo $item->answer_time;?></time>
                      </div>
                    </div>
                  </div>
                <?php endforeach;?>
                <!-- <div class="question-item-answer">
                  <div class="answer-head">
                    <a href="#" class="avatar-link pull-right"><img src="http://localhost/BBS/public/images/demo.jpg" /></a>
                    <a href="#" class="author-link">回答者</a><span class="bio">,个人简介</span></div>
                  <div class="answer-text">
                    <p>要盲目迷信基础单品，全基础单品只有那种靠颜和身材身高撑住的妹子才能穿出效果，普通身材的穿起来会很平淡，而且基础单品挺考验搭配功力的，配得好挺时髦，配的不好挺路人，所以穿衣服尽量选择适合自己的，不要盲目迷信《我的一百件基础单品》这种书，它并不实用，外国人五官立体，穿件无图案T恤都能突出五官显得简洁好看，但是中国人的五官没那么立体，有可能穿起来效果会平淡（也有很多妹子能穿好看，我只是举例），关键是要试，如果试着不好看就不要买了，不要为买基础单品而买，要看成效</p>
                    <div class="zantong">
                      <a href="#"><span class="glyphicon glyphicon-thumbs-up"><span></a>未闻花名、ABC等10人赞同
                      <time class="pull-right">回答于：2016-03-24 18:00:00</time>
                    </div>
                  </div>
                </div> -->
              </div>
              <div class="answer-editor-wrap">
                <div class="answer-from">未闻花名</div>
                <div id="summernote"></div>
                <script>
                  $(document).ready(function() {
                      $('#summernote').summernote();
                  });
                </script>
                <div class="answer-command text-right">
                  <button type="button" class="btn btn-primary">发布</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="explore-side-section">
          <div class="section-title">
            <h4>热门话题</h4>
          </div>
          <ul class="list-group hot-topics">
            <li class="list-group-item">如何看待「山东疫苗案」未冷藏疫苗流入 24 省事件？</li>
            <li class="list-group-item">如何看待「山东疫苗案」未冷藏疫苗流入 24 省事件？</li>
            <li class="list-group-item">Morbi leo risus</li>
            <li class="list-group-item">Porta ac consectetur ac</li>
            <li class="list-group-item">Vestibulum at eros</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-1"></div>
</div>
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.js"></script>
