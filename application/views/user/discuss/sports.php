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
            <h4>运动信息</h4>
            <div class="goods-list">
              <?php foreach($list as $item):?>
                <div class="goods-item">
                  <div class="goods-lost－found">
                    <span class="label label-warning"><?php echo $item->sports_type;?></span>
                    <span class="sports-count pull-right">已有<?php echo $item->count_people;?>人报名</span>
                  </div>
                  <div class="goods-contents">
                    <p><?php echo $item->contacts;?></p>
                  </div>
                  <div class="sports-details">
                    <div class="sports-time">
                      <a href="#"><?php echo $item->publisher;?></a> 发布于 <?php echo $item->publish_time;?>
                    </div>
                    <a class="pull-right" href="#">我要报名</a>
                  </div>
                </div>
              <?php endforeach;?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <ul class="list-group side-nav-group">
          <li class="list-group-item"><span class="glyphicon glyphicon-list-alt"></span><a href="javascript:void(0);" data-toggle="modal" data-target="#sports-model">发布运动信息</a></li>
        </ul>
        <div class="modal fade bs-example-modal-sm" id="sports-model" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <form id="sports-form">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="exampleModalLabel">运动信息</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="recipient-name" class="control-label">具体描述:</label>
                    <textarea class="form-control" name="contacts" rows＝"10"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="control-label">项目:</label>
                    <select class="form-control" name="sports_type">
                      <option>篮球</option>
                      <option>羽毛球</option>
                      <option>跑步</option>
                      <option>足球</option>
                      <option>乒乓球</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="control-label">时间:</label>
                    <div class="input-append date form_datetime" data-date="">
                      <input type="text" class="form-control" name="sports_time" size="25">
                      <span class="add-on"><i class="icon-remove"></i></span>
                      <span class="add-on"><i class="icon-th"></i></span>
                    </div>
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
    url: '/BBS/index.php/user/Sports/add_sports_info' ,         // override for form's 'action' attribute
    type: 'POST',        // 'get' or 'post', override for form's 'method' attribute
    success: showResponse ,  // post-submit callback
    clearForm: true        // clear all form fields after successful submit
  };
  $('#sports-form').ajaxForm(options).submit(function (){return false;});
  function showResponse(data){
    var json = eval('('+data+')');
    if (json.code == 10000) {
      $('#sports-model').modal('hide');
    }else if (json.code == '10001') {
      alert("发布失败");
    }
  }
});
</script>
