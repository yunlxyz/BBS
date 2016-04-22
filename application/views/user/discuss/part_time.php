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
            <h4>兼职信息</h4>
            <div class="part-time">
              <div class="part-item">
                <div class="part-title">
                  <span class="label label-primary">兼职</span>
                  <a href="javascript:;" class="expend" data-part="1">招募 第11期北大－云大－台大学生社会服务计划</a>
                </div>
                <div class="part-detail-time">
                  <div><span>时间：</span>xxxx-xx-xx xx:xx:xx</div>
                </div>
              </div>
              <div class="part-item">
                <div class="part-title">
                  <span class="label label-primary">兼职</span>
                  <a href="javascript:;">招募 第11期北大－云大－台大学生社会服务计划</a>
                </div>
                <div class="part-detail-time">
                  <div><span>时间：</span>xxxx-xx-xx xx:xx:xx</div>
                </div>
              </div>
              <div class="part-item">
                <div class="part-title">
                  <span class="label label-primary">兼职</span>
                  <a href="#">招募 第11期北大－云大－台大学生社会服务计划</a>
                </div>
                <div class="part-detail-time">
                  <div><span>时间：</span>xxxx-xx-xx xx:xx:xx</div>
                </div>
              </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="detail-part" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                  </div>
                  <div class="modal-body">
                    ...
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
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
  $('.expend').click(function(){
    alert($(this).data('part'));
    $('#detail-part').modal();
  })

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
