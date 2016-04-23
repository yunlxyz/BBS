<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title;?></title>
    <!-- Bootstrap -->
	<script src="http://cdn.bootcss.com/jquery/1.9.1/jquery.min.js"></script>
	<script src="http://cdn.bootcss.com/twitter-bootstrap/2.0.4/bootstrap.min.js"></script>
    <link href="http://cdn.bootcss.com/twitter-bootstrap/2.0.4/css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript">
	$(function() {
		$('#login').click(function() {
			var name_state = $('#name');
			var psd_state = $('#psd');
			var name = $('#name').val();
			var psd = $('#psd').val();
			if (name == '') {
				name_state.parent().next().next().css("display", "block");
				return false;
			} else if (psd == '') {
				name_state.parent().next().next().css("display", "none");
				psd_state.parent().next().next().css("display", "block");
				return false;
			} else {
				name_state.parent().next().next().css("display", "none");
				psd_state.parent().next().next().css("display", "none");
				$('.login').submit();
			}
		});
		$('#register').click(function() {
			var name_r_state = $('#name_r');
			var psd_r_state = $('#psd_r');
			var affirm_psd_state = $('#affirm_psd');
			var name_r = $('#name_r').val();
			var psd_r = $('#psd_r').val();
			var affirm_psd = $('#affirm_psd').val();
			if (name_r == '') {
				name_r_state.parent().next().next().css("display", "block");
				return false;
			} else if (psd_r == '') {
				psd_r_state.parent().next().next().css("display", "block");
				return false;
			} else if (affirm_psd == '') {
				affirm_psd_state.parent().next().next().css("display", "block");
				return false;
			} else if (psd_r != affirm_psd) {
				return false;
			} else {
				$('.register').submit();
			}
		})
	})

	function ok_or_errorBylogin(l) {
		var content = $(l).val();
		if (content != "") {
			$(l).parent().next().next().css("display", "none");
		}
	}

	function ok_or_errorByRegister(r) {
		var affirm_psd = $("#affirm_psd");
		var psd_r = $("#psd_r");
		var affirm_psd_v = $("#affirm_psd").val();
		var psd_r_v = $("#psd_r").val();
		var content = $(r).val();
		if (content == "") {
			$(r).parent().next().next().css("display", "block");
			return false;
		} else {
			$(r).parent().next().css("display", "block");
			$(r).parent().next().next().css("display", "none");
			if (psd_r_v == "") {
				$(psd_r).parent().next().css("display", "none");
				$(psd_r).parent().next().next().css("display", "none");
				$(psd_r).parent().next().next().css("display", "block");
				return false;
			}
			if (affirm_psd_v == "") {
				$(affirm_psd_v).parent().next().css("display", "none");
				$(affirm_psd_v).parent().next().next().css("display", "none");
				$(affirm_psd_v).parent().next().next().css("display", "block");
				return false;
			}
			if (psd_r_v == affirm_psd_v) {
				$(affirm_psd).parent().next().css("display", "none");
				$(affirm_psd).parent().next().next().css("display", "none");
				$(psd_r).parent().next().css("display", "none");
				$(psd_r).parent().next().next().css("display", "none");
				$(affirm_psd).parent().next().css("display", "block");
				$(psd_r).parent().next().css("display", "block");
			} else {
				$(affirm_psd).parent().next().css("display", "none");
				$(affirm_psd).parent().next().next().css("display", "none");
				$(psd_r).parent().next().css("display", "none");
				$(psd_r).parent().next().next().css("display", "none");
				$(psd_r).parent().next().css("display", "block");
				$(affirm_psd).parent().next().next().css("display", "block");
				return false;
			}
		}
	}

	function barter_btn(bb) {
		$(bb).parent().parent().fadeOut(1000);
		$(bb).parent().parent().siblings().fadeIn(2000);
	}

	</script>
	<style>
	@charset "utf-8";
* {
    margin: 0px ;
    padding: 0px ;
    text-decoration: none ;
    list-style: none;
    font-size: 12px ;
    font-family: Arial ;
}
/**login**/
.login_body{background: transparent; background: url(../../../public/images/basic/login.jpg);background-attachment:fixed;background-repeat:no-repeat;background-size:cover;-moz-background-size:cover;-webkit-background-size:cover;}
.login_div{width:500px;height:500px; top: 50%; left: 50%; color: black; margin-top: -250px; margin-left: -250px; position:fixed;border-radius:10px; z-index: 9999; background: #FFFFFF; opacity: 0.7; box-shadow: 5px 5px 10px 5px rgba(0, 0, 0, 0.5);}
.login_div .login_title{text-align: center; font-size: 35px; margin-top: 30px; letter-spacing: 5px; font-weight: bold;}
.login_nav{margin-top: 140px;}
.login_username{text-align: right; height: 40px; line-height: 40px; font-size: 20px; font-weight: bold;}
.login_usernameInput{height: 40px; padding: 0px;}
#name{font-size: 12px; height: 40px; outline: 0px; border-radius: 10px; border: 1px solid #CCCCCC; width: 95%;}
.ok_gou{height: 40px; color: #5CB85C; font-size: 35px; display: none; text-align: center; border-radius: 10px;padding: 0px; line-height: 37px; border: 2px solid  #5CB85C;}
.error_cuo{height: 40px; color: red; font-size: 40px;  display: none; text-align: center; border-radius: 10px;padding: 0px; line-height: 30px; border: 2px solid red;}
.login_psdNav{margin-top: 30px;}
.login_psdNav .col-xs-4{text-align: right; height: 40px; line-height: 40px; font-size: 20px; font-weight: bold;}
.login_psdNav .col-xs-6{height: 40px; padding: 0px;}
#psd{height: 40px; font-size: 12px; outline: 0px; border-radius: 10px; border: 1px solid #CCCCCC; width: 95%; }
.login_btn_div{text-align: center; margin-top: 30px; padding-left: 50px;}
#login{outline: 0px; border: 0px; width: 200px; height: 40px; border-radius: 10px; color: white; font-weight: bold; font-size: 20px;}
.barter_btnDiv{text-align: center; position: absolute; bottom: 0; margin-bottom: 10px;}
.barter_btn{border: 0px; background: transparent; outline: 0px;}
.register_body{width:500px;height:500px; top: 50%; left: 50%; color: black; margin-top: -250px; margin-left: -250px; position:fixed;border-radius:10px; display: none; background: #FFFFFF; opacity: 0.7; box-shadow: 5px 5px 10px 5px rgba(0, 0, 0, 0.5);}
.register_title{text-align: center; font-size: 35px; margin-top: 30px; letter-spacing: 5px; font-weight: bold;}
.register_nav{margin-top: 140px;}
.register_nav .col-xs-4{text-align: right; height: 40px; line-height: 40px; font-size: 20px; font-weight: bold;}
.register_nav .col-xs-6{height: 40px; padding: 0px;}
#name_r{font-size: 12px; height: 40px; outline: 0px; border-radius: 10px; border: 1px solid #CCCCCC; width: 95%;}
.register_psdnav{margin-top: 30px;}
.register_psdnav .col-xs-4{text-align: right; height: 40px; line-height: 40px; font-size: 20px; font-weight: bold;}
.register_psdnav .col-xs-6{height: 40px; padding: 0px;}
#psd_r{height: 40px; font-size: 12px; outline: 0px; border-radius: 10px; border: 1px solid #CCCCCC; width: 95%;}
.register_affirm{margin-top: 30px;}
.register_affirm .col-xs-4{text-align: right; height: 40px; line-height: 40px; font-size: 20px; font-weight: bold; }
.register_affirm .col-xs-6{height: 40px; padding: 0px;}
#affirm_psd{height: 40px; font-size: 12px; outline: 0px; border-radius: 10px; border: 1px solid #CCCCCC; width: 95%; }
.register_btn_div{text-align: center; margin-top: 30px; padding-left: 50px;}
#register{outline: 0px; border: 0px; width: 200px; height: 40px; border-radius: 10px; color: white; font-weight: bold; font-size: 20px;}
.barter_register{text-align: center; position: absolute; bottom: 0;margin-bottom: 10px;}
.barter_registerBtn{border: 0px; background: transparent; outline: 0px;}
.sub_btn:hover{background: #31B0D5;}
	</style>
</head>
<body>

<body class="login_body">

<div class="login_div">
	<div class="col-xs-12 login_title">登录</div>
	
  <form class="form-horizontal"  id="myForm1">
    <fieldset>
      <div id="legend" style="margin-top:20px;">
        <legend class=""></legend>
      </div>
    

    <div class="control-group" style="margin-top:100px;">

          <!-- Appended input-->
          <label class="control-label"></label>
          <div class="controls">
            <div class="input-append">
              <input class="span2" placeholder="请输入账号" type="text" name="account">
              <span class="add-on">账号</span>
            </div>
            <p class="help-block"></p>
          </div>

        </div>

    <div class="control-group" style="margin-top:30px;">

          <!-- Appended input-->
          <label class="control-label"></label>
          <div class="controls">
            <div class="input-append">
              <input class="span2" placeholder="请输入密码" type="password" name="password">
              <span class="add-on">密码</span>
            </div>
            <p class="help-block"></p>
          </div>

        </div>

    

    

    <div class="control-group">
          <label class="control-label"></label>

          <!-- Button -->
          <div class="controls">
            <button class="btn btn-primary">登录</button>
          </div>
        </div>

    </fieldset>
  </form>


	<div class="col-xs-12 barter_btnDiv"  style="margin-left:40%;" >
		<button class="barter_btn"onClick="javascript:barter_btn(this)">没有账号?前往注册</button>
	</div>
</div>

<div class="register_body">
	<div class="col-xs-12 register_title">注册</div>
	<form class="form-horizontal" id="registerForm">
    <fieldset>
      <div id="legend" style="margin-top:20px;">
        <legend class=""></legend>
      </div>



    <div class="control-group">

          <!-- Appended input-->
          <label class="control-label"></label>
          <div class="controls">
            <div class="input-append">
              <input class="span2" placeholder="请输入账号" name="account" type="text">
              <span class="add-on">账号</span>
            </div>
            <p class="help-block">用于登录</p>
          </div>

    </div>
		
	<div class="control-group">

	  <!-- Appended input-->
	  <label class="control-label"></label>
	  <div class="controls">
		<div class="input-append">
		  <input class="span2" placeholder="请输入昵称" name="nickname" type="text">
		  <span class="add-on">昵称</span>
		</div>
		<p class="help-block">注册后不可修改</p>
	  </div>

	</div>

    <div class="control-group">

          <!-- Appended input-->
          <label class="control-label"></label>
          <div class="controls">
            <div class="input-append">
              <input class="span2" placeholder="请输入密码" name="password" type="password">
              <span class="add-on">密码</span>
            </div>
            <p class="help-block">6-20位数字+字母+下划线</p>
          </div>

        </div>

    <div class="control-group">

          <!-- Appended input-->
          <label class="control-label"></label>
          <div class="controls">
            <div class="input-append">
              <input class="span2" placeholder="请再次输入密码" name="password2" type="password">
              <span class="add-on">确认密码</span>
            </div>
            <p class="help-block"></p>
          </div>

        </div>

    <div class="control-group">
          <label class="control-label"></label>

          <!-- Button -->
          <div class="controls">
            <button style="margin-left:50px;" class="btn btn-primary">注册</button>
          </div>
        </div>

    </fieldset>
  </form>
	<div class="col-xs-12 barter_register" style="margin-left:40%;">
		<button class="barter_registerBtn" onClick="javascript:barter_btn(this)">已有账号?返回登录</button>
	</div>
</div>
	
</body>
<script src="/BBS/public/bootstrap/js/jquery.form.js"></script>
<script>
$(document).ready(function() {
  var roptions = {
    url: 'register' ,         // override for form's 'action' attribute
    type: 'POST',        // 'get' or 'post', override for form's 'method' attribute
    success: showResponse ,  // post-submit callback
    // clearForm: true        // clear all form fields after successful submit
  };
  $('#registerForm').ajaxForm(roptions).submit(function (){return false;});
  function showResponse(data){
    var json = eval('('+data+')');
	alert(json['message']);	
    if(json['code'] == 10000){
		location.reload();
	}
  }
});

  var loptions = {
    url: '/BBS/index.php/user/Login/login' ,         // override for form's 'action' attribute
    type: 'POST',        // 'get' or 'post', override for form's 'method' attribute
    success: showResponse ,  // post-submit callback
    // clearForm: true        // clear all form fields after successful submit
  };
  $('#myForm1').ajaxForm(loptions).submit(function (){return false;});
  function showResponse(data){
    var json = eval('('+data+')');
    if (json.code == 10000) {
      location.href = "/BBS/index.php";
    }else if (json.code == '10001') {
      alert("密码错误");
    }
  }

</script>
</html>
