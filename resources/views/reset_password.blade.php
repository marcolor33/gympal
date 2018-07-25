<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gympal</title>


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


<script src="{{ URL::to('formValidateLib/jquery.validate.js') }}"></script>
<!--
    <script src = "{{ URL::to('formValidateLib/inputmask/inputmask.js') }}"></script>
    <script src = "{{ URL::to('formValidateLib/inputmask/jquery.inputmask.js') }}"></script>
    -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<script src="{{ URL::to('formValidateLib/jquery.mask.js') }}"></script>
<script src="{{ URL::to('formValidateLib/additional-methods.js') }}"></script>
<script src="{{ URL::to('formValidateLib/localization/messages_zh_TW.min.js') }}"></script>
<link rel="stylesheet" href=" {{ URL::to('formValidateLib/animate.min.css') }} ">
</body>
<center>
    <img src="http://gympal.com.hk/front/storage/app/upload/Image/loginLogo.png"/>
</center>

<br>

<div style="width:300px; margin:0 auto;">
    <center>
        <div class="row change_pw_form">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>重設密碼</b></div>
                    <div class="panel-body">
                        <div class="row">

                                <form class="change_pw_form" id="change_pw_form" role="form"
                                      action="{{route('change_password')}}" method="post">
                                    <div class="form-group">
                                        <input class="must form-control" type="password" id="oldPassword"
                                               name="oldPassword"><br>
                                        新密碼: <input style="width: 80%;" class="must form-control" type="password" id="newPassword"
                                                    name="newPassword"><br><br><br>
                                        再次輸入新密碼: <input style="width: 80%;" class="must form-control" type="password" id="confirmPassword"
                                                        name="confirmPassword"><br><br><br>
                                        <input type="hidden" name="account_id" value="{!! $account->account_id!!}">
                                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                                    </div>
                                    <div class="form-group">
                                        <center>
                                            <input class="btn btn-primary" type="submit" value="確定"/>
                                        </center>

                                        {{--<button class="btn btn-warning" type= "button" onclick="reset_all()">cancel</button>--}}
                                    </div>
                                </form>

                        </div>
                    </div>
                </div>

        </div>
    </center>
</div>
</body>

<script>

    $(function () {
        $("#birthDatepicker").datepicker({
            dateFormat: "yy/mm/dd",
            yearRange: "-100:+0",
            changeMonth: true,
            changeYear: true
        });
    });


    $(document).ready(function () {
        reset_all();

        $("#newPassword").mask('ZZZZZZZZZZZZZZZ', {
            translation: {
                'Z': {
                    pattern: /[a-zA-Z0-9]/, optional: true
                }
            }
        });


        $("#change_pw_form").validate({
            rules: {

                'newPassword': {
                    regex: "^(?=.*[A-Za-z])(?=.*?[0-9]).{8,}$"
                },
                confirmPassword: {
                    equalTo: "#newPassword"
                },

            },
            messages: {

                newPassword: {
                    regex: "密碼至少8位由英文字母及數字組合組成"
                },
                confirmPassword: {
                    equalTo: "與已填寫密碼不相同"
                }


            },
            errorPlacement: function (error, element) {
                if ((element.attr('name') === 'category[]')) {
                    error.appendTo("#categoryError");
                }
                else if ((element.attr('name') === 'extendCategory')) {
                    error.insertAfter(element);
                }
                else if ((element.attr('name') === 'gender')) {
                    error.appendTo(genderError)
                }
                else if ((element.attr('name') === 'groupClass')) {
                    error.appendTo(groupClassError)
                }
                else if ((element.attr('name') === 'provideClassroom')) {
                    error.appendTo(provideClassroomError)
                }
                else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {

                $.ajax({
                    method: "POST",
                    url: $('#change_pw_form').attr('action'),
                    data: $('#change_pw_form').serialize().replace(/%5B%5D/g, '[]'),
                    success: function (data) {
                        console.log("success ajax request!");
                        console.log(data.success);
                        if (data.success == true) {
                            alert('更改密碼成功');
                            window.location.href = "{!! route('getLogin') !!}";
                        }

                        else {
                            alert('更改密碼失敗! :');
                            console.log('not same old pw?')

                        }
                    }
                });

                return false
            }
        });


    })

    function reset_change_pw_form() {


        $('#oldPassword').prop('value', '{!! $account->password !!}');
        $('#oldPassword').hide();

        $('#newPassword').prop('value', '');
        $('#confirmPassword').prop('value', '');

    }


    function edit_change_pw_form() {
        reset_all();
        $('.change_pw_form').show();

    }


    function reset_all() {

        reset_change_pw_form();

    }


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
        , "Value must not equal arg.");

    jQuery.validator.addClassRules({
        must: {
            mRequired: true,
        },
    });


</script>

</html>

