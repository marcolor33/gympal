<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gympal</title>

    <link rel="icon" href="/front/storage/app/profileImg/logo_0607.png">

    <!-- Login Page Style -->
    <link href="{{ URL::to('vendor/login-page-style/stylee.css')  }}" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::to('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ URL::to('vendor/metisMenu/metisMenu.min.css')  }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ URL::to('css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{  URL::to('vendor/morrisjs/morris.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ URL::to('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<style>

    a {
        text-decoration: none
    }

    #stuReg {
        width: 110px;
        border-radius: 0px 0px 0px 20px;
        margin-top: 5px;
        background-color: #B5B5B5;
    }

    #stuReg:hover {
        background-color: #DCDCDC;
    }

    #coachReg {
        width: 110px;
        border-radius: 0px 0px 20px 0px;
        margin-top: 5px;
        display: inline;
        background-color: #B5B5B5;
    }

    #coachReg:hover {
        background-color: #DCDCDC;
    }

    #inputContainer {
        position: relative;
        padding: 0;
        margin: 0;
    }

    #inputImg {
        position: absolute;
        bottom: 9px;
        left: 15px;
        width: 25px;
        height: 25px;
    }

    .login-screen {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

    }

    #stuReg:hover {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    #coachReg:hover {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    body {
        overflow:hidden;
        overflow-x:hidden;
    }

    #primary{
        overflow-x:hidden;
    }

    html,body{
        margin:0px;
        padding:0px;
    }


</style>


<!-- jQuery -->
<script src="{{ URL::to('vendor/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ URL::to('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{  URL::to('vendor/metisMenu/metisMenu.min.js') }}"></script>
<!-- Morris Charts JavaScript -->
<script src="{{ URL::to('vendor/raphael/raphael.min.js') }}"></script>

<script src="{{ URL::to('vendor/morrisjs/morris.min.js') }}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{ URL::to('js/sb-admin-2.js') }}"></script>

<link rel="stylesheet" type="text/css" href="{{ URL::to('vendor/datatables/css/jquery.dataTables.min.css') }}">

<script src="{{ URL::to('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::to('formValidateLib/jquery.validate.js') }}"></script>

<body>



<p style="text-align:center; padding-top: 50px;"><img src="http://gympal.com.hk/front/storage/app/upload/Image/bannerlogo.png"/></p>

<div class="login-wrap">
    <div class="login-html">
        <div class="login-form">
            <form role="form" id="loginForm" action="{{ route('startLogin') }}">
                <div class="login">
                    <div class="login-screen">

                        <div class="app-title">
                            <h2><b>會員登入</b></h2>
                            <br>
                        </div>

                        <div class="login-form">
                            <div class="control-group">
                                {{ $errors->has('email') ? '電郵不正確' : '' }}
                                <div id="inputContainer">
                                    <input class="login-field" id="login-name" placeholder="登記電郵" name="email"
                                           type="text">
                                    <img src="http://gympal.com.hk/front/storage/app/upload/Image/mailLogin.png"
                                         id="inputImg">
                                </div>
                            </div>

                            <div class="control-group">
                                <div id="inputContainer">
                                    {{ $errors->has('password') ? '密碼不正確' : '' }}
                                    <img src="http://gympal.com.hk/front/storage/app/upload/Image/keyLogin.png"
                                         id="inputImg">
                                    <input class="login-field" id="login-pass" placeholder="密碼" name="password"
                                           type="password">
                                </div>
                            </div>

                            <div class="form-group" style="text-align: center">
                                <input style="border: none; width: 200px" type="submit"
                                       class="btn btn-primary btn-large btn-block" value="登入">
                            </div>


                            <a style="display:inline; text-align:left;" align="left" class="login-link"
                               href="{{route('home')}}">返回主頁</a>
                            <a style="display:inline; cursor: pointer; margin-left: 100px; text-align:right;"
                               align="right" class="login-link" onclick="forget_password()">忘記密碼</a>
                            <input type="hidden" name="_token" value="{{ Session::token() }}">

                        </div>

                    </div>

                    <input id="stuReg" type="submit" align="left" value="學生登記">
                    <input id="coachReg" align="right" type="submit" value="教練登記">

                </div>
            </form>
        </div>
    </div>
</div>

<div>

</div>


</body>

</html>

<script>

    $(function(){
        $("#stuReg").on('click', function(e){
            e.preventDefault();
            window.location.replace("http://gympal.com.hk/front/public/studentApply");
        });
    });

    $(function(){
        $("#coachReg").on('click', function(e){
            e.preventDefault();
            window.location.replace("http://gympal.com.hk/front/public/coachApply");
        });
    });


    function forget_password() {

        window.location.href = "{!! route('forget_password') !!}";


    }

    $(document).ready(function () {
        $("#loginForm").validate({

            submitHandler: function (form) {

                $.ajax({
                    method: "POST",
                    dataType: "json",
                    url: $('#loginForm').attr('action'),
//                        url: "studentCase",
                    data: $('#loginForm').serialize().replace(/%5B%5D/g, '[]'),
                    success: function (data) {

                        console.log("success ajax request!");
                        console.log(data);

                        if (data.success == true) {
                            window.location.replace("{{route('home')}}");

                        }

                        else {
                            alert('請輸入正確的登記電郵及密碼');
                        }

                    },
                    error: function (data) {
//                        alert('ajax failed');
                        alert('請輸入正確的登記電郵及密碼');
                    }
                });
//                    return false
            }
        });

    });


</script>