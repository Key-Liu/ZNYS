<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>注册</title>

    <!-- Bootstrap Core CSS -->
    <link href="/Public/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/Public/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/Public/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/Public/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">注册</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="register">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="手机号码" name="mobile" type="mobile" autofocus id="mobile">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="密码" name="password" type="password" id="password">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="确认密码" name="confirm_password" type="password" id="confirm_password">
                                </div>
                                <div class="form-group">
                                    <input class="form-control " placeholder="验证码" name="checkcode" type="text" id="checkcode">
                                </div>
                                <div class="form-group">
                                    <a href="#" class="btn btn-default center-block">获取验证码</a>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <a href="#" class="btn btn-lg btn-success btn-block" id="register">注册</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="/Public/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/Public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/Public/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/Public/dist/js/sb-admin-2.js"></script>

    <script type="text/javascript">
        
        $(document).ready(function(){
            $('#register').click(function(){
                var mobile = $('#mobile').val();
                var password = $('#password').val();
                var confirm_password = $('#confirm_password').val();
                var checkcode = $('#checkcode').val();
                if(mobile != ""){
                    if(mobile.length == 11){
                        if(password != ""){
                            if(confirm_password != ""){
                                if(password == confirm_password){
                                    if(checkcode != ""){
                                        $("form").submit();
                                    }else{
                                        alert("请输入验证码！");
                                    }
                                }else{
                                    alert("两次密码输入不一致！");
                                }
                            }else{
                                alert("请输入确认密码！");
                            }
                        }else{
                            alert("请输入密码！");
                        }
                    }else{
                        alert("手机号码长度不为11！");
                    }
                }else{
                    alert("请输入手机号码！");
                }
            });
        });

    </script>

</body>

</html>