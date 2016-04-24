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
              <!-- 头像 -->
              <div class="pull-left" data-name="avatar">
                <?php if($item->user_avatar != NULL):?>
                  <img src="<?php echo $item->user_avatar;?>" alt="" class="img-rounded">
                <?php else:?>
                  <img src="<?php echo 'http://localhost/BBS/public/images/basic/default_avatar.jpg';?>" alt="" class="img-rounded">
                <?php endif;?>
              </div>

              <div class="pull-left header-user-describe">
                <!-- 性别 -->
                <?php if($item->sex != ''):?>
                  <div class="editable-group">
                    <span class="glyphicon glyphicon-road"></span>
                    <!-- 显示用户信息 -->
                    <span class="info-wrap">
                      <span><?php echo $item->sex;?></span>
                      <a href="javascript:void(0);"><span class="glyphicon glyphicon-pencil"></span>修改</a>
                    </span>
                    <span class="edit-wrap" style="display:none;">
                      <span class="item">
                        <label class="radio-inline">
                          <input type="radio" name="sex" value="男"> 男
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="sex" value="女"> 女
                        </label>
                        <button type="button" class="btn btn-primary" id="1">确定</button>
                      </span>
                    </span>
                  </div>
                <?php else:?>
                  <div class="editable-group empty">
                    <span class="glyphicon glyphicon-road"></span>
                    <!-- 显示用户信息 -->
                    <span class="info-wrap" style="display:none;">
                      <span>填写性别信息</span>
                      <a href="javascript:void(0);"><span class="glyphicon glyphicon-pencil"></span>修改</a>
                    </span>
                    <!-- 信息为空显示 -->
                    <span class="info-empty-wrap">
                      <a href="javascript:void(0);" data-name="sex">填写性别信息</a>
                    </span>
                    <!-- 点击编辑、填写信息显示 -->
                    <span class="edit-wrap" style="display:none;">
                      <span class="item">
                        <label class="radio-inline">
                          <input type="radio" name="sex" value="男"> 男
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="sex" value="女"> 女
                        </label>
                        <button type="button" class="btn btn-primary" id="sex">确定</button>
                      </span>
                    </span>
                  </div>
                <?php endif?>

                <!-- 专业年级 -->
                <?php if($item->major != NULL):?>
                  <div class="editable-group">
                    <span class="glyphicon glyphicon-education"></span>
                    <!-- 显示用户信息 -->
                    <span class="info-wrap">
                      <span><?php echo $item->major;?></span>
                      <a href="javascript:void(0);" style="display:none;"><span class="glyphicon glyphicon-pencil"></span>修改</a>
                    </span>
                    <span class="edit-wrap" style="display:none;">
                      <span class="item">
                        <span class="form-inline">
                          <span><input type="text" class="form-control" id="exampleInputName2" placeholder="专业" style="width:120px;"></span>
                          <span><input type="text" class="form-control" id="exampleInputName2" placeholder="年级" style="width:120px;"></span>
                          <button type="button" class="btn btn-primary">确定</button>
                        </span>
                      </span>
                    </span>
                  </div>
                <?php else:?>
                  <div class="editable-group empty">
                    <span class="glyphicon glyphicon-education"></span>
                    <!-- 显示用户信息 -->
                    <span class="info-wrap" style="display:none;">
                      <span>填写专业年纪信息</span>
                      <a href="javascript:void(0);"><span class="glyphicon glyphicon-pencil"></span>修改</a>
                    </span>
                    <!-- 信息为空显示 -->
                    <span class="info-empty-wrap">
                      <a href="javascript:void(0);" data-name="sex">填写专业年纪信息</a>
                    </span>
                    <!-- 点击编辑、填写信息显示 -->
                    <span class="edit-wrap" style="display:none;">
                      <span class="item">
                        <span class="form-inline">
                          <span><input type="text" class="form-control" id="exampleInputName2" placeholder="专业" style="width:120px;"></span>
                          <span><input type="text" class="form-control" id="exampleInputName2" placeholder="年级" style="width:120px;"></span>
                          <button type="button" class="btn btn-primary">确定</button>
                        </span>
                      </span>
                    </span>
                  </div>
                <?php endif?>

                <!-- 地址 -->
                <?php if($item->location != NULL):?>
                  <div class="editable-group">
                    <span class="glyphicon glyphicon-map-marker"></span>
                    <!-- 显示用户信息 -->
                    <span class="info-wrap">
                      <span><?php echo $item->location;?></span>
                      <a href="javascript:void(0);"><span class="glyphicon glyphicon-pencil"></span>修改</a>
                    </span>
                    <span class="edit-wrap" style="display:none;">
                      <span class="item">
                        <span class="form-inline">
                          <span><input type="text" class="form-control" id="exampleInputName2" placeholder="地址" style="width:120px;"></span>
                          <button type="button" class="btn btn-primary">确定</button>
                        </span>
                      </span>
                    </span>
                  </div>
                <?php else:?>
                  <div class="editable-group empty">
                    <span class="glyphicon glyphicon-map-marker"></span>
                    <!-- 显示用户信息 -->
                    <span class="info-wrap" style="display:none;">
                      <span>填写详细地址</span>
                      <a href="javascript:void(0);"><span class="glyphicon glyphicon-pencil"></span>修改</a>
                    </span>
                    <!-- 信息为空显示 -->
                    <span class="info-empty-wrap">
                      <a href="javascript:void(0);" data-name="sex">填写详细地址</a>
                    </span>
                    <!-- 点击编辑、填写信息显示 -->
                    <span class="edit-wrap" style="display:none;">
                      <span class="item">
                        <span class="form-inline">
                          <span><input type="text" class="form-control" id="exampleInputName2" placeholder="地址" style="width:120px;"></span>
                          <button type="button" class="btn btn-primary">确定</button>
                        </span>
                      </span>
                    </span>
                  </div>
                <?php endif?>

                <!-- 其它 -->
                <?php if($item->other != NULL):?>
                  <div class="editable-group">
                    <span class="glyphicon glyphicon-grain"></span>
                    <!-- 显示用户信息 -->
                    <span class="info-wrap">
                      <span><?php echo $item->other;?></span>
                      <a href="javascript:void(0);"><span class="glyphicon glyphicon-pencil"></span>修改</a>
                    </span>
                    <span class="edit-wrap" style="display:none;">
                      <span class="item">
                        <span class="form-inline">
                          <span><input type="text" class="form-control" placeholder="地址" style="width:120px;"></span>
                          <button type="button" class="btn btn-primary">确定</button>
                        </span>
                      </span>
                    </span>
                  </div>
                <?php else:?>
                  <div class="editable-group empty">
                    <span class="glyphicon glyphicon-grain"></span>
                    <!-- 显示用户信息 -->
                    <span class="info-wrap" style="display:none;">
                      <span>填写其它信息</span>
                      <a href="javascript:void(0);"><span class="glyphicon glyphicon-pencil"></span>修改</a>
                    </span>
                    <!-- 信息为空显示 -->
                    <span class="info-empty-wrap">
                      <a href="javascript:void(0);" data-name="sex">填写其它信息</a>
                    </span>
                    <!-- 点击编辑、填写信息显示 -->
                    <span class="edit-wrap" style="display:none;">
                      <span class="item">
                        <span class="form-inline">
                          <span><input type="text" class="form-control" placeholder="地址" style="width:120px;"></span>
                          <button type="button" class="btn btn-primary">确定</button>
                        </span>
                      </span>
                    </span>
                  </div>
                <?php endif?>

                <!-- 个人介绍 -->
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
            <?php foreach($answer as $item):?>
              <div class="section-wrap-item">
                <span class="profile-setion-time"><?php echo $item->answer_time;?> 回答问题</span>
                <div class="question_link"><a href="#"><?php echo $item->question_title;?></a></div>
              </div>
            <?php endforeach;?>
            <!-- <div class="section-wrap-item">
              <span class="profile-setion-time">于：2016-03-24 18:00:00 关注了问题</span>
              <div class="question_link"><a href="#">怎样深入学习php，成为php高手？</a></div>
            </div>
            <div class="section-wrap-item">
              <span class="profile-setion-time">于：2016-03-24 18:00:00 关注了问题</span>
              <div class="question_link"><a href="#">怎样深入学习php，成为php高手？</a></div>
            </div> -->
          </div>
          <ul id="example"></ul>
        </div>
      </div>
      <div class="col-md-4">
        <div class="mirror-sidebar">
          <div class="side-section-inner">
            <div class="profile-side-section-title">
              关注了<a href="#"><?php echo $topic['count'];?></a>个话题
            </div>
            <div class="profile-following-topic">
              <?php foreach($topic['list'] as $item):?>
                <a href="javascript:;"><img src="<?php echo $item->topic_avatar;?>" alt="<?php echo $item->topic_title;?>" /></a>
              <?php endforeach;?>
              <!-- <a href="#"><img src="http://img2.imgtn.bdimg.com/it/u=2001048216,3423073968&fm=23&gp=0.jpg" alt="图片" /></a>
              <a href="#"><img src="http://img2.imgtn.bdimg.com/it/u=2001048216,3423073968&fm=23&gp=0.jpg" alt="图片" /></a>
              <a href="#"><img src="http://img2.imgtn.bdimg.com/it/u=2001048216,3423073968&fm=23&gp=0.jpg" alt="图片" /></a>
              <a href="#"><img src="http://img2.imgtn.bdimg.com/it/u=2001048216,3423073968&fm=23&gp=0.jpg" alt="图片" /></a>
              <a href="#"><img src="http://img2.imgtn.bdimg.com/it/u=2001048216,3423073968&fm=23&gp=0.jpg" alt="图片" /></a> -->
            </div>
          </div>
        </div>
      </div>
    <div>
  </div>
  <div class="col-md-1"></div>
</div>
<script src="/BBS/public/bootstrap-paginator/src/bootstrap-paginator.js"></script>
<script type='text/javascript'>
  $.ajax({ // 查询该用户有多少条数据
    url: "/BBS/index.php/User/Mirror/get_answer_count",
    dataType: "json",
    type: "POST",
    data: {},
    success: function(data){
      if(data.total > 1){
        var options = {
          bootstrapMajorVersion: 3,
          currentPage: 1,
          totalPages: data.total,
          size:"normal",
          alignment:"center",
          itemTexts: function (type, page, current) {
            switch (type) {
              case "first":
                return "第一页";
              case "prev":
                return "<";
              case "next":
                return ">";
              case "last":
                return "最后一页";
              case "page":
                return  page;
            }
          },
          onPageClicked: function (e, originalEvent, type, page) {
              $.ajax({ // 查询该用户有多少条数据
                url: "/BBS/index.php/User/Mirror/get_answer_list2",
                dataType: "json",
                type: "POST",
                data: {page: page},
                success: function(data){
                  var html = '';
                  $.each(data , function(n , item){
                    html += '<div class="section-wrap-item">'+
                              '<span class="profile-setion-time">'+item.answer_time+' 回答问题</span>'+
                              '<div class="question_link"><a href="#">'+item.question_title+'</a></div>'+
                            '</div>';
                  });
                  $('.section-wrap-content').empty();
                  $('.section-wrap-content').append(html);
                }
              })
          }
        }
        $('#example').bootstrapPaginator(options);
      }
    }
  })
</script>
<script>
$(function(){
  $('.info-empty-wrap a').on('click' , function(){
    $(this).parent().css({'display':'none'});
    $(this).parent().parent().children('.edit-wrap').css({'display':'inline'});
  })

  $('#sex').click(function(){
    var sex = $('input[name=sex]:checked').val();
    $.ajax({
      type: "POST",
      url: "",
      data: {
        sex: sex
      },
      success: function(){
      },
      error: function(){
      }
    })
  })
})
</script>
