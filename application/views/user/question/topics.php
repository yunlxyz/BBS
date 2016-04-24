<!-- contents -->
<div class="row" style="margin-top:5%;">
  <div class="col-md-1"></div>
  <div class="col-md-10 offset-body">
    <div class="row">
      <div class="col-md-9">
        <div class="row">
          <div class="col-md-12">
            <div class="topics-cat-title">
              <a href="#" class="pull-right">你关注了<?php echo count($ftopic);?>个话题</a>
              <h4><span class="glyphicon glyphicon-th-large" ria-hidden="true"></span>话题广场</h4>
            </div>
            <div class="topics-cat-main"></div>
            <div class="topics-cat-sub">
              <div class="general-list">
                <?php foreach($topic as $item):?>
                  <div class="item">
                    <div class="blk">
                      <a href="topic_list/<?php echo $item->id;?>">
                        <img src="<?php echo $item->topic_avatar;?>" />
                        <strong><?php echo $item->topic_title;?></strong>
                      </a>
                      <p><?php echo $item->topic_decs;?></p>
                      <a href="#" class="follow">
							<input type="hidden" value="<?php echo $item->id;?>"/>
							<?php if(in_array($item->id,$ftopic)){
									echo '<span class="glyphicon">取消关注</span>';
								}else{
									echo '<span class="glyphicon glyphicon-plus">关注</span>';
								}
							?>
					  </a>
                    </div>
                  </div>
                <?php endforeach;?>
                <!-- <div class="item even">
                  <div class="blk">
                    <a href="#">
                      <img src="http://localhost/BBS/public/images/demo.jpg" />
                      <strong>游戏</strong>
                    </a>
                    <p>游戏是一种基于物质满足之上的，在一种特定时间、空间范围内遵循某</p>
                    <a href="#" class="follow"><span class="glyphicon glyphicon-plus"></span>关注</a>
                  </div>
                </div> -->
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
<script>
$(function(){
	$(".follow").click(function(){
		var topic_id = $(this).children(1).val();
		var fthis = $(this);
		if($(this).find(".glyphicon").html()=="关注"){
			$.ajax({
				type:"POST",
				url:"../../../index.php/User/Topics/follow_topic",
				data: {topic_id:topic_id},
				success: function(data){
					var json = eval('('+data+')');
					if(json.code == 20000){
						fthis.find(".glyphicon").html("取消关注");
						fthis.find(".glyphicon").removeClass("glyphicon-plus");
					}
				},
				error:function(){
					alert('请重试');
				}
			});
		}else{
			if($(this).find(".glyphicon").html()=="取消关注"){
				$.ajax({
					type:"POST",
					url:"../../../index.php/User/Topics/unfollow_topic",
					data: {topic_id:topic_id},
					success: function(data){
						var json = eval('('+data+')');
						if(json.code == 20000){
							fthis.find(".glyphicon").html("关注");
							fthis.find(".glyphicon").addClass("glyphicon-plus");
						}
					},
					error:function(){
						alert('请重试');
					}
				})
			}

		}
	});

});

</script>
