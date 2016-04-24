<div class="row" style="margin-top:5%;">
  <div class="col-md-1"></div>
  <div class="col-md-10 offset-body">
    <div class="row">
      <div class="col-md-9">
        <div class="row">
          <div class="col-md-12 clearfix">
            <h4>当前话题：<?php echo $topic_title;?></h4>
            <div class="goods-list">
              <?php foreach($list as $key =>$value){?>
                <div class="goods-item">
                  <div class="goods-lost-found">
                    <span class="label label-warning"></span>
                    <a href="javascript:void(0);" class="AlreadyBm" data-toggle="modal" data-sid=""  data-target="#alreadyBaoming"><span class="sports-count pull-right">已有<?php echo $value->follower_count;?>人关注,<?php echo $value->answer_count;?>个回答</span></a>
                  </div>
                  <div class="goods-contents">
					<a href="../../Question/index/<?php echo $value->id;?>"><?php echo $value->question_title;?></a> 
                    
                  </div>
                  <div class="sports-details">
                    <div class="sports-time">
                      <p><?php echo $value->question_desc;?></p>
                    </div>					
					<span class="pull-right a-bm">提问者:<?php echo $value->questioner;?></span>
                  </div>
                </div>
			  <?php }?>
			  <?php if(count($list)==0){?>
			  <div class="goods-list">
				本话题下还没有问题
			  </div>
			  <?php } ?>
            </div>
          </div>
        </div>
	  
      </div>

      <div class="col-md-3">
		这里还没有东西

      </div>
    </div>
  </div>
  <div class="col-md-1"></div>
</div>