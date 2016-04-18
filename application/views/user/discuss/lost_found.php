<link href="/BBS/public/bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

<script src="/BBS/public/bootstrap/js/bootstrap-datetimepicker.js"></script>
<script src="/BBS/public/bootstrap/js/locales/bootstrap-datetimepicker.fr.js"></script>
<script src="/BBS/public/bootstrap/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>

<!-- contents -->
<div class="row" style="margin-top:5%;">
  <div class="col-md-1"></div>
  <div class="col-md-10 offset-body">
    <div class="row">
      <div class="col-md-9">
        <div class="row">
          <div class="col-md-12 clearfix">
            <h4>失物招领信息</h4>
            <div class="goods-list">
              <?php foreach($list as $item):?>
                <div class="goods-item">
                  <div class="goods-lost－found"><span class="label label-warning"><?php echo $item->type;?>信息</span></div>
                  <div class="goods-contents">
                    <p>
                      <?php echo $item->lost_goods;?>
                    </p>
                  </div>
                  <div class="goods-other">地点：<?php echo $item->pick_up_address;?></div>
                  <div class="goods-uper"><a href="#"><?php echo $item->pick_uper;?></a> 发布于 <?php echo $item->publish_time;?></div>
                </div>
              <?php endforeach;?>
              <!-- <div class="goods-item">
                <div class="goods-lost－found"><span class="label label-warning">认领信息</span></div>
                <div class="goods-contents">
                  <p>
                  管理团队缺乏进取心，管理论坛的人也就十来个普通学生，大家平时都有很多学业要忙，只能花有限的课余时间在论坛的运营管理上，一般只愿意维持
                  日常的论坛秩序和组织一些线下活动，连收集用户反馈都很懒散，更别说改版这种耗时耗力的大工程了
                  </p>
                </div>
                <div class="goods-other">地点：学校</div>
                <div class="goods-uper"><a href="#">未闻花名</a> 发布于 2016-04-13 14:00:00</div>
              </div> -->
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <ul class="list-group side-nav-group">
          <li class="list-group-item"><span class="glyphicon glyphicon-list-alt"></span><a href="javascript:void(0);" data-toggle="modal" data-target="#lost-goods-model">发布丢失信息</a></li>
          <li class="list-group-item"><span class="glyphicon glyphicon-th-large"></span><a href="javascript:void(0);" data-toggle="modal" data-target="#found-goods-model">发布认领信息</a></li>
        </ul>
        <div class="modal fade bs-example-modal-sm" id="lost-goods-model" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <form id="lost-form">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="exampleModalLabel">新建丢失信息</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="recipient-name" class="control-label">具体描述:</label>
                    <textarea class="form-control" name="lost-goods" rows＝"10"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="control-label">丢失地点:</label>
                    <input type="text" class="form-control" name="lost-address">
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="control-label">丢失时间:</label>
                    <div class="input-append date form_datetime" data-date="">
                      <input type="text" class="form-control" name="lost-time" size="25">
                      <span class="add-on"><i class="icon-remove"></i></span>
                      <span class="add-on"><i class="icon-th"></i></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="control-label">联系方式:</label>
                    <input type="text" class="form-control" name="contact">
                  </div>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-default" type="button"  data-dismiss="modal">关闭</button>
                  <button class="btn btn-primary" type="submit">确认发布</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="modal fade bs-example-modal-sm" id="found-goods-model" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <form id="lost-form">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="exampleModalLabel">认领信息</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="recipient-name" class="control-label">具体描述:</label>
                    <textarea class="form-control" name="lost-goods" rows＝"10"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="control-label">拾取地点:</label>
                    <input type="text" class="form-control" name="lost-address">
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="control-label">拾取时间:</label>
                    <div class="input-append date form_datetime" data-date="">
                      <input type="text" class="form-control" name="lost-time" size="25">
                      <span class="add-on"><i class="icon-remove"></i></span>
                      <span class="add-on"><i class="icon-th"></i></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="control-label">联系方式:</label>
                    <input type="text" class="form-control" name="contact">
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="control-label">地址:</label>
                    <input type="text" class="form-control" name="contact">
                  </div>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-default" type="button"  data-dismiss="modal">关闭</button>
                  <button class="btn btn-primary" type="submit">确认发布</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-1"></div>
</div>
<script src="/BBS/public/bootstrap/js/jquery.form.js"></script>
<script type="text/javascript">
  $(".form_datetime").datetimepicker({
      format: "yyyy-mm-dd hh:ii",
      showMeridian: true,
      autoclose: true,
      todayBtn: true,
      lang:'ch'
  });
</script>
<script type="text/javascript">
$(document).ready(function() {
  var options = {
    url: '/BBS/index.php/user/Lost/new_lost_info' ,         // override for form's 'action' attribute
    type: 'POST',        // 'get' or 'post', override for form's 'method' attribute
    success: showResponse ,  // post-submit callback
    // clearForm: true        // clear all form fields after successful submit
  };
  $('#lost-form').ajaxForm(options).submit(function (){return false;});
  function showResponse(data){
    var json = eval('('+data+')');
    if (json.code == 10000) {
      $('#lost-goods-model').modal('hide');
    }else if (json.code == '10001') {
      alert("发布失败");
    }
  }
});
</script>
