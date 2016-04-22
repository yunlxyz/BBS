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
            <h4>最新兼职信息</h4>
            <div class="part-time">
              <?php foreach($list as $item):?>
                <div class="part-item">
                  <div class="part-title">
                    <span class="label label-primary">兼职</span>
                    <a href="javascript:;" class="expend" data-pid="<?php echo $item->id;?>"><?php echo $item->title;?></a>
                  </div>
                  <div class="part-detail-time">
                    <div><span>发布时间：</span><?php echo $item->publish_time;?></div>
                  </div>
                </div>
              <?php endforeach;?>

              <!-- <div class="part-item">
                <div class="part-title">
                  <span class="label label-primary">兼职</span>
                  <a href="javascript:;" class="expend">招募 第11期北大－云大－台大学生社会服务计划</a>
                </div>
                <div class="part-detail-time">
                  <div><span>时间：</span>xxxx-xx-xx xx:xx:xx</div>
                </div>
              </div> -->

            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <ul class="list-group side-nav-group">
          <li class="list-group-item"><span class="glyphicon glyphicon-list-alt"></span><a href="javascript:void(0);" data-toggle="modal" data-target="#part-model">发布兼职信息</a></li>
        </ul>
        <div class="modal fade bs-example-modal-sm" id="part-model" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <form id="part-form">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="exampleModalLabel">招聘信息</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="recipient-name" class="control-label">标题:</label>
                    <textarea class="form-control" name="title" rows＝"10"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="control-label">时间:</label>
                    <input type="text" class="form-control" name="time">
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="control-label">报名方式:</label>
                    <input type="text" class="form-control" name="application">
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="control-label">联系方式:</label>
                    <input type="text" class="form-control" name="contact_link">
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="control-label">详细描述:</label>
                    <textarea class="form-control" name="contents" rows＝"10"></textarea>
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

<!-- Modal -->
<div class="modal fade" id="detail-part" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title part-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
        <div><h5>时间:</h5><span class="part-time"></span></div>
        <div><h5>报名方式:</h5><span class="part-application"></span></div>
        <div><h5>联系方式:</h5><span class="part-contact-info"></span></div>
        <hr/>
        <div><h5>具体内容:</h5><p class="part-contents"></p></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
      </div>
    </div>
  </div>
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
  $('.expend').click(function(){
    var pid = $(this).data('pid');
    $.ajax({
      type: "POST",
      url: "/BBS/index.php/User/Part_time/get_detail_part",
      data: {pid: pid} ,
      success: function(data){
        var json = eval('('+data+')');
        if(json.code == "10000"){
          $.each(json.info , function(n , item){
            $('#detail-part .part-title').text(item['title']);
            $('#detail-part .part-time').text(item['time']);
            $('#detail-part .part-application').text(item['application']);
            $('#detail-part .part-contact-info').text(item['contact_link']);
            $('#detail-part .part-contents').text(item['contents']);
          })
        }
      }
    });
    setTimeout(function(){
      $('#detail-part').modal();
    } , 200)
  })

  var options = {
    url: '/BBS/index.php/User/Part_time/add_part' ,         // override for form's 'action' attribute
    type: 'POST',        // 'get' or 'post', override for form's 'method' attribute
    success: showResponse ,  // post-submit callback
    clearForm: true        // clear all form fields after successful submit
  };
  $('#part-form').ajaxForm(options).submit(function (){return false;});
  function showResponse(data){
    var json = eval('('+data+')');
    if (json.code == 10000) {
      $('#part-model').modal('hide');
    }else if (json.code == '10001') {
      alert("发布失败");
    }
  }
});
</script>
