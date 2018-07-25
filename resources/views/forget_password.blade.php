<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        bottom: 10px;
        left: 15px;
        width: 25px;
        height: 25px;
    }

    .login-screen {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
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

<center>
    <img src="http://gympal.com.hk/front/storage/app/upload/Image/loginLogo.png"/>
</center>
<div class="login-wrap">
    <div class="login-html">
        <div class="login-form">
            <div class="login">
                <div class="login-screen">

                    <div class="app-title">
                        <h2><b>忘記密碼</b></h2>
                        <br>
                    </div>


                    <div class="login-form">
                        <form id="forget_password_form" role="form" action="{{ route('forget_password_email') }}">
                            <fieldset>
                                <div class="control-group">
                                    <div id="inputContainer">
                                        <input class="login-field" id="login-name" placeholder="登記電郵" name="email"
                                               type="text">
                                        <img src="http://gympal.com.hk/front/storage/app/upload/Image/mailLogin.png"
                                             id="inputImg">
                                    </div>
                                </div>


                                <div class="form-group" style="text-align: center">
                                    <input style="border: none; width: 200px" type="submit"
                                           class="btn btn-primary btn-large btn-block" value="確定">
                                </div>


                                <a style="display:inline; text-align:center;" align="left" class="login-link"
                                   href="{{route('home')}}">返回主頁</a>

                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                            </fieldset>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div>

</div>


{{--<div class="container">--}}
{{--<div class="row">--}}
{{--<div class="col-md-4 col-md-offset-4">--}}
{{--<div class="login-panel panel panel-default">--}}
{{--<div class="panel-heading">--}}
{{--<h3 class="panel-title">Please Sign In</h3>--}}
{{--</div>--}}
{{--<div class="panel-body">--}}
{{--<form id="forget_password_form" role="form" action="{{ route('forget_password_email') }}">--}}
{{--<fieldset>--}}
{{--<div class="form-group">--}}

{{--<input class="form-control must" placeholder="E-mail" name="email" type="email" autofocus>--}}
{{--</div>--}}

{{--<!----}}
{{--<div class="checkbox">--}}
{{--<label>--}}
{{--<input name="remember" type="checkbox" value="Remember Me">Remember Me--}}
{{--</label>--}}
{{--</div>--}}
{{---->--}}
{{--<!-- Change this to a button or input when using this as a form -->--}}
{{--<div class="form-group">--}}
{{--<a href="{{route('home')}}"><i class="fa fa-th fa-th"></i> 網站首頁 </a>--}}
{{--</div>--}}
{{--<button type="submit">Login</button>--}}
{{--<input type="hidden" name="_token" value="{{ Session::token() }}">--}}
{{--</fieldset>--}}
{{--</form>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}


</body>

<script>

    $.fn.extend({
        animateCss: function (animationName, cb) {
            var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
            this.addClass('animated ' + animationName).one(animationEnd, function () {
                $(this).removeClass('animated ' + animationName);
                if (cb) {
                    cb();
                }
            });
        }
    });

    $.validator.addMethod("mRequired", $.validator.methods.required,
        "必須填寫");

    $.validator.addMethod("regex",
        function (value, element, regexp) {
            var re = new RegExp(regexp);
            return this.optional(element) || re.test(value);
        }
        , "格式錯誤");

    $.validator.addMethod("valueNotEquals", function (value, element, arg) {
            return arg != value;
        }
        , "必須選擇");

    jQuery.validator.addClassRules({
        must: {
            mRequired: true,
        },
    });

    jQuery.validator.addClassRules({
        mustChoose: {
            valueNotEquals: "default"
        }
    });

    $(document).ready(function () {


        $("#forget_password_form").validate({
            rules: {
                studentAge: {
//                        regex:"^(?=.*?[0-9]).{1,}$"
                    digits: true,
                    range: [1, 99],
                },


            },
            messages: {
                email: {
                    mRequired: "必須選擇"
                },

            },

            submitHandler: function (form) {


                $.ajax({
                    method: "POST",
                    dataType: "json",
                    url: $('#forget_password_form').attr('action'),

                    data: {

                        email: $('[name=email]').val(),
                        _token: $('[name=_token]').val(),

                    },

                    success: function (data) {


                        console.log("success ajax request!");
                        console.log(data.success);
                        if (data.success) {

                            alert("重設密碼電郵已經發出")
                            window.location.href = "{!! route('getLogin') !!}";

                        }
                        else {

                            alert("此電郵尚未登記")

                        }

                    },
                    error: function (data) {
                        console.log("fail ajax request!");
                        console.log(data.success);

                    }
                });

            }
        });


    });


</script>

</html>