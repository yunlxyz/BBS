<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet" />
    <link href="http://fonts.googleapis.com/css?family=Abel|Open+Sans:400,600" rel="stylesheet" />
    <style>
        html {
            /*background: url(img/6133364748_89f2365922_o.jpg) no-repeat center center fixed;*/
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        body {
            padding-top: 20px;
            font-size: 16px;
            font-family: "Open Sans",serif;
            background: transparent;
        }
        h1 {
            font-family: "Abel", Arial, sans-serif;
            font-weight: 400;
            font-size: 40px;
        }
        /* Override B3 .panel adding a subtly transparent background */
        .panel {
            background-color: rgba(255, 255, 255, 0.9);
        }
        .margin-base-vertical {
            margin: 40px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-4 panel panel-default">
                <h1 class="margin-base-vertical">Have you ever seen the rain?</h1>
                <form class="margin-base-vertical" id="myForm1">
                  <div class="form-group">
                    <label for="exampleInputEmail1">用户名</label>
                    <input type="text" class="form-control" name="account" placeholder="请输入用户名">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">密码</label>
                      <input type="password" class="form-control" name="password" placeholder="请输入密码">
                  </div>
                  <button type="submit" class="btn btn-default submit">登录</button>
                </form>
            </div><!-- //main content -->
        </div><!-- //row -->
    </div> <!-- //container -->
</body>
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script src="<?php echo base_url();?>public/js/jquery.form.js"></script>
<script>
$(document).ready(function() {
  var options = {
    url: '/BBS/index.php/user/Login/login' ,         // override for form's 'action' attribute
    type: 'POST',        // 'get' or 'post', override for form's 'method' attribute
    success: showResponse ,  // post-submit callback
    // clearForm: true        // clear all form fields after successful submit
  };
  $('#myForm1').ajaxForm(options).submit(function (){return false;});
  function showResponse(data){
    var json = eval('('+data+')');
    if (json.code == 10000) {
      location.href = "/BBS/index.php";
    }else if (json.code == '10001') {
      alert("密码错误");
    }
  }
});
</script>
</html>
