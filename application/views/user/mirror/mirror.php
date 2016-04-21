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
                <?php if($item->user_avatar != ''):?>
                  <img src="<?php echo $item->user_avatar;?>" alt="" class="img-rounded">
                <?php else:?>
                  <img src="#" alt="" class="img-rounded">
                <?php endif;?>
              </div>

              <div class="pull-left header-user-describe">
                <!-- 性别 -->
                <?php if($item->sex != NULL):?>
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
