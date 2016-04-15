<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title><?php echo $title;?></title>
    <link href="/BBS/public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/BBS/public/css/myCss.css" rel="stylesheet">
    <script src="/BBS/public/bootstrap/js/jquery.min.js"></script>
    <script src="/BBS/public/bootstrap/js/bootstrap.min.js"></script>
    <script src="/BBS/public/js/my_js.js"></script>
  </head>
  <body>
    <div class="container-fluid">
      <!-- navbar -->
      <div class="row  navbar-fixed-top" style="background-color:#0062c8;">
        <div class="col-md-1"></div>
        <div class="col-md-10 offset-head-nav">
          <nav class="navbar">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/BBS/index.php">沙湖</a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li class="active"><a href="/BBS/index.php">首页 <span class="sr-only">(current)</span></a></li>
                  <li><a href="/BBS/index.php/User/News/index">发现 </a></li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">分类讨论 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">一起运动 </a></li>
                      <li><a href="#">我爱学习 </a></li>
                      <li role="separator" class="divider"></li>
                      <li><a href="#">扩展人脉</a></li>
                      <li role="separator" class="divider"></li>
                      <li><a href="/BBS/index.php/User/Lost/index">失物招领</a></li>
                    </ul>
                  </li>
                </ul>
                <form class="navbar-form navbar-left" role="search">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="搜索话题、分类">
                  </div>
                  <button type="submit" class="btn btn-default btn-search-my">🔍搜索</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                  <li>
                    <button type="button" class="add-question" data-toggle="modal" data-target="#myModal">提问</button>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $user;?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="/BBS/index.php/User/Mirror/index">我的主页</a></li>
                      <li><a href="#">设置</a></li>
                      <li role="separator" class="divider"></li>
                      <li><a href="/BBS/index.php/User/Login/loggout">退出</a></li>
                    </ul>
                  </li>
                </ul>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>
        </div>
        <div class="col-md-1"></div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">提问</h4>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <input type="email" class="form-control" id="question" placeholder="你的问题">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">问题说明:</label>
                  <textarea class="form-control" rows="3" placeholder="问题说明" id="question_decs"></textarea>
                  <!-- <input type="textarae" class="form-control" id="exampleInputPassword1" placeholder="问题说明"> -->
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">话题分类:</label>
                  <input type="email" class="form-control" id="question_type" placeholder="话题分类">
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
              <button type="button" class="btn btn-primary btn-release">发布</button>
            </div>
          </div>
        </div>
      </div>
      <script>
        $(document).ready(function(){
          $('.btn-release').click(function(){
            var question = $('#question').val();
            var question_decs = $('#question_decs').val();
            var question_type = $('#question_type').val();
            $.ajax({
              type: "POST",
              url: "/BBS/index.php/User/Question/question_publish",
              data: {
                question_title: question,
                question_decs: question_decs,
                question_type: question_type
              },
              success:function(){
                alert("OK");
              },
              error:function(xhr, type, exception){
                alert(xhr.responseText, "Failed");
              }
            })
          })
        })
      </script>
