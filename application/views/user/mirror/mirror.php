  <div class="row" style="margin-top:5%;">
  <div class="col-md-1"></div>
  <div class="col-md-10 offset-body">
    <div class="row">
      <div class="col-md-8">
        <?php foreach($info as $item):?>
          <div class="info-body">
            <div class="info-name">
              <h3><?php echo $item->account;?></h3>
            </div>
            <div class="info-introduce clearfix">
              <div class="pull-left">
                <img src="<?php echo $item->user_avatar;?>" alt="" class="img-rounded">
              </div>
              <div class="pull-left header-user-describe">
                <div class="editable-group" data-name="grade">
                  <span class="glyphicon glyphicon-king"></span><?php echo $item->sex;?>
                </div>
                <div class="editable-group" data-name="grade">
                  <span class="glyphicon glyphicon-education"></span><?php echo $item->major_id;?>
                </div>
                <div class="editable-group" data-name="grade">
                  <span class="glyphicon glyphicon-map-marker"></span>住宿
                </div>
                <div class="editable-group" data-name="grade">
                  <span class="glyphicon glyphicon-object-align-vertical"></span>其他
                </div>
                <div class="editable-group" data-name="grade">
                  <span class="glyphicon glyphicon-pencil"></span><?php echo $item->introduction;?>
                </div>
              </div>
            </div>
            <!-- <div class="info-like">like</div>
            <div class="info-other">other</div> -->
          </div>
        <?php endforeach;?>

        <div class="profile-section-wrap">
          <div class="section-wrap-title">
            <h5>我的回答</h5>
          </div>
          <div class="section-wrap-content">
            <div class="section-wrap-item">
              <span class="profile-setion-time">于：2016-03-24 18:00:00 关注了问题</span>
              <div class="question_link"><a href="#">怎样深入学习php，成为php高手？</a></div>
            </div>
            <div class="section-wrap-item">
              <span class="profile-setion-time">于：2016-03-24 18:00:00 关注了问题</span>
              <div class="question_link"><a href="#">怎样深入学习php，成为php高手？</a></div>
            </div>
            <div class="section-wrap-item">
              <span class="profile-setion-time">于：2016-03-24 18:00:00 关注了问题</span>
              <div class="question_link"><a href="#">怎样深入学习php，成为php高手？</a></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="mirror-sidebar">
          <div class="side-section-inner">
            <div class="profile-side-section-title">
              关注了<a href="#">20个话题</a>
            </div>
            <div class="profile-following-topic">
              <a href="#"><img src="http://img2.imgtn.bdimg.com/it/u=2001048216,3423073968&fm=23&gp=0.jpg" alt="图片" /></a>
              <a href="#"><img src="http://img2.imgtn.bdimg.com/it/u=2001048216,3423073968&fm=23&gp=0.jpg" alt="图片" /></a>
              <a href="#"><img src="http://img2.imgtn.bdimg.com/it/u=2001048216,3423073968&fm=23&gp=0.jpg" alt="图片" /></a>
              <a href="#"><img src="http://img2.imgtn.bdimg.com/it/u=2001048216,3423073968&fm=23&gp=0.jpg" alt="图片" /></a>
              <a href="#"><img src="http://img2.imgtn.bdimg.com/it/u=2001048216,3423073968&fm=23&gp=0.jpg" alt="图片" /></a>
              <a href="#"><img src="http://img2.imgtn.bdimg.com/it/u=2001048216,3423073968&fm=23&gp=0.jpg" alt="图片" /></a>
            </div>
          </div>
        </div>
      </div>
    <div>
  </div>
  <div class="col-md-1"></div>
</div>
