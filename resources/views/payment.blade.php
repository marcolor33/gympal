@extends($extend)

@section('content')

    <div class="container">

        <style>

            label.error {
                color: #f33;
                padding: 0;
                margin: 2px 0 0 0;
                font-size: 12px;
            }
        </style>


        <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css"/>
        <link href="{{ URL::to('css/sb-admin-2.css') }}" rel="stylesheet">
        <link href="{{ URL::to('css/modern-business.css') }}" rel="stylesheet">


        <script src="{{ URL::to('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>

        <script src="{{ URL::to('formValidateLib/jquery.validate.js') }}"></script>


        <script src="{{ URL::to('formValidateLib/jquery.mask.js') }}"></script>
        <script src="{{ URL::to('formValidateLib/additional-methods.js') }}"></script>
        <script src="{{ URL::to('formValidateLib/localization/messages_zh_TW.min.js') }}"></script>


        <!--
        <form id="payment_form"action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="79U8W4AKF9NE2">
            <input type="hidden" name="hosted_button_id" value="8X4JK2N6H9UUY">
            <input type="hidden" name="lc" value="ZH">
        <table>
        <tr><td><input type="hidden" name="on0" value="name">姓名</td></tr><tr><td><input class="must form-control" type="text" name="os0" maxlength="200"></td></tr>
        <tr><td><input type="hidden" name="on1" value="email">登記電郵</td></tr><tr><td><input class="must form-control" type="text" name="os1" maxlength="200"></td></tr>
        <tr><td><input type="hidden" name="on2" value="teleno">聯絡電話</td></tr><tr><td><input class="must form-control" type="text" id="os2" name="os2" maxlength="200"></td></tr>

        </table>
        <input type="image" src="https://www.paypalobjects.com/webstatic/en_AU/i/buttons/btn_paywith_primary_l.png" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
        <img alt="" border="0" src="https://www.sandbox.paypal.com/en_GB/i/scr/pixel.gif" width="1" height="1">
        </form>
        -->

        <div class="container" style="text-align: center;">

            <br/>
            <form id="payment_form" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                <input TYPE="hidden" name="charset" value="utf-8">
                <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="business" value="8X2LNXS4D5X4C">
                <input type="hidden" name="lc" value="HK">
                <input type="hidden" name="item_name" value="服務費用">
                <input type="hidden" name="item_number" value="1">
                <input type="hidden" name="button_subtype" value="services">
                <input type="hidden" name="no_note" value="1">
                <input type="hidden" name="no_shipping" value="1">
                <input type="hidden" name="rm" value="1">
                <input type="hidden" name="currency_code" value="HKD">
                <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG_wCUP.gif:NonHosted">
                <input type="hidden" name="return" value="http://gympal.com.hk/front/public/success">
                <input type="hidden" name="cancel_return" value="http://gympal.com.hk/front/public/payment">


                <div style="font-size:36px; font-weight:bold;">網上付款</div>
                <hr/>
                {{--<hr style="border-width: 2px; border-color: black;"/>--}}

                <a href="http://gympal.com.hk/front/storage/app/upload/Image/paymentflow-01.png">
                    <img src="http://gympal.com.hk/front/storage/app/upload/Image/paymentflow-01.png" width="84%"
                         height="70%">
                </a>

                <div style="padding-top: 32px;">
                    <table align="center">
                        <tr align="left" style="font-size: 18px;">
                            <td><input type="hidden" name="on0" value="姓名">姓名</td>
                        </tr>
                        <tr>
                            <td><input style="width: 300px;" class="must form-control" type="text" name="os0"
                                       maxlength="200"></td>
                        </tr>
                        <tr align="left" style="font-size: 18px;">
                            <td style="padding-top: 32px;"><input type="hidden" name="on1" value="登記電郵">登記電郵</td>
                        </tr>
                        <tr>
                            <td><input style="width: 100%;" class="must form-control" type="text" name="os1"
                                       maxlength="200"></td>
                        </tr>
                        <tr align="left" style="font-size: 18px;">
                            <td style="padding-top: 32px;"><input type="hidden" name="on2" value="聯絡電話">聯絡電話</td>
                        </tr>
                        <tr>
                            <td><input style="width: 100%;" class="must form-control" type="text" id="os2" name="os2"
                                       maxlength="200"></td>
                        </tr>

                    </table>

                </div>

                <br/>
                <br/>

                <input type="image"
                       src="https://www.paypalobjects.com/webstatic/en_AU/i/buttons/btn_paywith_primary_l.png"
                       border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
                <img alt="" border="0" src="https://www.sandbox.paypal.com/en_GB/i/scr/pixel.gif" width="1" height="1">
            </form>


        </div>


        <script>

            $.fn.extend({
                animateCss: function (animationName, cb) {
                    var animationEnd = "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";
                    this.addClass("animated " + animationName).one(animationEnd, function () {
                        $(this).removeClass("animated " + animationName);
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

            $("#os2").mask("00000000", {placeholder: ""});

            $(document).ready(function () {


                $("#payment_form").validate({
                    rules: {

                        os1: {
                            email: "true",

                        },

                        os2: {
                            regex: "^(?=.*?[0-9]).{8,}$"
                        },


                    },
                    messages: {

                        os1: {
                            email: "請輸入有效的電子郵件",

                        },
                        os2: {
                            regex: "請填寫有效電話號碼",

                        },


                    },

                    submitHandler: function (form) {


                        console.log("running handler");
                        form.submit();


                    }
                });


            });


        </script>

    </div>

@endsection
    
