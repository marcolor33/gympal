@extends($extend)

@section('content')


    <!--/* JQuery was added in the master*/-->
    <script src="{{ URL::to('formValidateLib/jquery.validate.js') }}"></script>
    <!--
    <script src = "{{ URL::to('formValidateLib/inputmask/inputmask.js') }}"></script>
    <script src = "{{ URL::to('formValidateLib/inputmask/jquery.inputmask.js') }}"></script>
    -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link href="{{ URL::to('css/sb-admin-2.css') }}" rel="stylesheet">
    <script src="{{ URL::to('formValidateLib/jquery.mask.js') }}"></script>
    <script src="{{ URL::to('formValidateLib/additional-methods.js') }}"></script>
    <script src="{{ URL::to('formValidateLib/localization/messages_zh_TW.min.js') }}"></script>
    <link rel="stylesheet" href=" {{ URL::to('formValidateLib/animate.min.css') }} ">



    <link href="{{ URL::to('css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ URL::to('css/modern-business.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ URL::to('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('https://fonts.googleapis.com/icon?family=Material+Icons') }}" rel="stylesheet">


    <script src="{{ URL::to('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{  URL::to('vendor/metisMenu/metisMenu.min.js') }}"></script>

    <script src="{{ URL::to('js/sb-admin-2.js') }}"></script>

    <style>
        label.error{
            color: #f33;
            padding: 0;
            margin: 2px 0 0 0;
            font-size: 0.7em;
        }
        td {
            font-size: large;
        }

        input.btn {
            border-radius: 30px;
            font-size: 15px;
            padding: 10px;

            -moz-border-radius: 5px;
            border-radius: 5px;

        }

        input {
            -webkit-border-radius: 5px;
            -moz-border-radius: 15px;
            border-radius: 15px;
            border: solid 1px black;
            padding: 5px;
            text-align: center;
        }

        input.text {
            text-align: center;
        }

        #wraper {
            width: 70%; border-radius: 20px; background-color: white; border: solid 1px black; height: 60px; text-align: center;
        }

    </style>


    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">檢視個案</h1>

            </div>
            <!-- /.col-lg-12 -->
        </div>

        <!-- Teaching Info Form -->
        <div class="row" id="caseFormRow">
            <div class="col-lg-12">
                <div class="panel panel-default" style="border-radius: 50px">
                    <div class="panel-body" style="background-color: #CCCCCC; border-radius: 50px;">
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="{{route('edit_case')}}" id="caseForm" role="form">

                                    <table style="width:100%; border-collapse:separate; border-spacing:2em; text-align: left">


                                        <tr>
                                            <td>
                                                <b>狀態</b>
                                            </td>
                                            <td>
                                                @if ($case->status == 'open')
                                                    <input type="text" readonly value="開放中"/>
                                                @elseif ($case->status == 'pending')
                                                    <input type="text" readonly value="處理中"/>
                                                @else
                                                    <input type="text" readonly value="已處理"/>
                                                @endif</td>
                                        </tr>

                                        </tr>
                                        <tr>
                                            <td>
                                                <b> 個案編號</b>
                                            </td>
                                            <td>
                                                <input type="text" readonly value="{!!$case->case_id!!}"/>
                                            </td>
                                            <td>
                                                <b>運動類別</b>
                                            </td>
                                            <td>
                                                <input type="text" readonly value="{!!$case->category_name!!}"/>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <b>個案日期</b>
                                            </td>
                                            <td>
                                                <input type="text" readonly
                                                       value="{!! explode(" ",$case->time_created)[0] !!}"/>
                                            </td>
                                            <td>
                                                <b>運動詳細</b>
                                            </td>
                                            <td>
                                                <input type="text" readonly value="{!!$case->subject_name!!}"/>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td>
                                                <b>學生性別</b>
                                            </td>
                                            <td>
                                                @if ($case->student_Sex == 'male')
                                                    <input type="text" readonly value="男"/>
                                                @else
                                                    <input type="text" readonly value="女"/>
                                                @endif
                                            </td>

                                            <td><b>學生年齡</b></td>
                                            <td>
                                                <input type="text" readonly value="{!! $case->student_Age !!}"/>
                                            </td>

                                        </tr>

                                        <tr>
                                            <td><b>上堂模式</b></td>
                                            <td>@if ($case->mode == 'single')
                                                    <input type="text" readonly value="單對單"/>
                                                @elseif ($case->mode == 'group')
                                                    <input type="text" readonly value="小組訓練"/>
                                                @else
                                                    <input type="text" readonly value="參加教練安排課堂"/>
                                                @endif
                                            </td>

                                            @if ($case->mode != 'single')

                                                <td><b>人數</b></td>
                                                <td><input type="text" readonly
                                                           value="{!! $case->classMemberNo !!}"/></td>

                                            @endif

                                            @if ($case->mode == 'single')

                                                <td><b>人數</b></td>
                                                <td><input type="text" readonly value="1"/></td>

                                            @endif
                                        </tr>

                                        <tr>
                                            <td><b>最快上堂日期</b></td>
                                            <td><input type="text" readonly value="{!! $case->start_date !!}"/></td>
                                        </tr>

                                        <tr>
                                            <td><b>上堂時間</b></td>
                                            <td>
                                                <div id="wraper" style="width:97%; height: 80px;">

                                                <input class="must" type="checkbox" name="start_time[]" value="6_9">早上
                                                (06:00-09:00)
                                                <input class="must" type="checkbox" name="start_time[]" value="9_12">早上
                                                (09:00-12:00)
                                                <input class="must" type="checkbox" name="start_time[]" value="12_15">下午
                                                (12:00-15:00)</br>
                                                <input class="must" type="checkbox" name="start_time[]" value="15_18">下午
                                                (15:00-18:00)
                                                <input class="must" type="checkbox" name="start_time[]" value="18_21">晚上
                                                (18:00-21:00)
                                                <input class="must" type="checkbox" name="start_time[]" value="21_24">晚上
                                                (21:00-00:00)</br>
                                                <input class="must" type="checkbox" name="start_time[]" value="anytime">任何時間<br>
                                                <div id="timeError"></div>

                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><b>上堂次數</b></td>
                                          <td><input type="text" readonly value="@php

                                                    switch($case->lesson_per_week){
                                                        case '1':
                                                            echo '每周一堂';
                                                            break;
                                                        case '2':
                                                            echo '每周兩堂';
                                                            break;
                                                        case '3':
                                                            echo '每周三堂';
                                                            break;
                                                        case '4':
                                                            echo '每周四堂';
                                                            break;
                                                        case '5':
                                                            echo '每周五堂';
                                                            break;
                                                        case '6':
                                                            echo '每周六堂';
                                                            break;
                                                        case '7':
                                                            echo '每周七堂';
                                                            break;
                                                        case '8':
                                                            echo '每周七堂或以上';
                                                            break;


                                                    }

                                                @endphp"/>
                                            </td>

                                            <td><b>課堂長度</b></td>
                                            <td><input type="text" readonly value="@php
                                                    switch($case->length){
                                                        case '0.5':
                                                            echo '每堂30分鐘';
                                                            break;
                                                        case '0.75':
                                                            echo '每堂45分鐘';
                                                            break;
                                                        case '1':
                                                            echo '每堂1小時';
                                                            break;
                                                        case '1.5':
                                                            echo '每堂1.5小時';
                                                            break;
                                                        case '2':
                                                            echo '每堂2小時';
                                                            break;
                                                        case '2.5':
                                                            echo '每堂2.5小時';
                                                            break;
                                                        case '3':
                                                            echo '每堂3小時';
                                                            break;
                                                        case '3.5':
                                                            echo '每堂3.5小時';
                                                            break;

                                                         case '4':
                                                            echo '每堂4小時';
                                                            break;
                                                        case '4.5':
                                                            echo '每堂4.5小時';
                                                            break;
                                                        case '5':
                                                            echo '每堂5小時或以上';
                                                            break;

                                                    }



                                                @endphp"/>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><b>上堂日子</b></td>
                                            <td>
                                                <div id="wraper" style="border-radius: 20px;">
                                                    <input class="must" type="checkbox" name="weeks[]" value="mon"/>星期一
                                                    <input class="must" type="checkbox" name="weeks[]" value="tue"/>星期二
                                                    <input class="must" type="checkbox" name="weeks[]" value="wed"/>星期三
                                                    <input class="must" type="checkbox" name="weeks[]"
                                                           value="thu"/>星期四</br>
                                                    <input class="must" type="checkbox" name="weeks[]" value="fri"/>星期五
                                                    <input class="must" type="checkbox" name="weeks[]" value="sat"/>星期六
                                                    <input class="must" type="checkbox" name="weeks[]" value="sun"/>星期日
                                                    <input class="must" type="checkbox" name="weeks[]" value="anytime"/>任何時間
                                                </div>
                                                <div id="weeksError"></div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><b>上堂場地</b></td>
                                            <td>@if ($case->venue == 'Facilities&VenuesOfLCSD')
                                                    <input type="text" readonly value="康文署體育館/ 場地"/>
                                                @elseif ($case->venue == 'Clubhouse')
                                                    <input type="text" readonly value="私人會所/ 場地"/>

                                                @elseif ($case->venue == 'SchoolOrCommunityCenter')
                                                    <input type="text" readonly value="學校/ 社區中心"/>
                                                @elseif ($case->venue == 'CoachAssign')
                                                    <input type="text" readonly value="教練提供場地"/>

                                                @else
                                                    <input type="text" readonly value="其他"/>


                                                @endif
                                            </td>
                                            <td><b>上堂地區</b></td>
                                            <td><input type="text" readonly value="{!! $case->district_name !!}"/>
                                            </td>
                                        </tr>

                                        @if ($case->refAddress != "")
                                            <tr>
                                                <td><b>參考地址</b></td>
                                                <td>
                                                    <textarea
                                                            style="cursor: default; border: solid 1px black; height:70px; border-radius: 20px; background-color: white;"
                                                            class="form-control"
                                                            name="refAddress">{!! $case->refAddress !!}</textarea>
                                                </td>
                                            </tr>
                                        @endif

                                        <tr>
                                            <td><b>要求教練性別</b></td>
                                            <td>@if ($case->sex == 'male')
                                                    <input type="text" readonly value="男"/>
                                                @elseif ($case->sex == 'female')
                                                    <input type="text" readonly value="女"/>
                                                @else
                                                    <input type="text" readonly value="無所謂"/>
                                                @endif
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><b>每堂學費</b></td>
                                            <td><input type="text" readonly value="${!! $case->fee!!}"/></td>
                                        </tr>

                                        <tr>
                                            <td><b>教練特別要求</b></td>
                                            <td>
                                                    <textarea
                                                            style="cursor: default; border: solid 1px black; height:150px; border-radius: 30px; background-color: white;"
                                                            class="form-control"
                                                            name="special_requirement"></textarea>
                                            </td>
                                        </tr>

                                    </table>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        @if(isset($_SESSION['user']))

            @if($_SESSION['user']['account_type'] == 'coach')
                <h4>教練留言</h4>
                <div class="row" id="showInterestRow">
                    <div class="col-lg-12">
                        <div class="panel panel-default" style="background-color: #CCCCCC; border-radius: 50px">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form action="{{route('show_interest',$case->case_id)}}" id="showInterestForm"
                                              role="form">
                                            <div class="form-group" style=" padding-top: 20px;">
                                                <textarea style="cursor: default; border: solid 1px black; height:200px; background-color: white;"
                                                          class="must form-control"
                                                          id="information" name="information"></textarea>
                                                <!--
                                                                                                <input readonly style="border-radius: 50px; height:200px;" class="must form-control"
                                                                                                       type="text" id="information" name="information"/>
                                                -->
                                            </div>
                                            <div class="form-group" style="text-align: center">
                                                <input style="border-radius: 50px;" class="btn" type="submit"
                                                       value="申請"/>
                                                {{--<input class="btn" type="button" value="取消申請" onclick="cancel_sumbit()"／>--}}
                                            </div>
                                            <input type="hidden" name="_token" value="{{ Session::token() }}">

                                        </form>

                                        <!--<a class="btn btn-default" onclick="edit_caseForm()">edit</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            @endif


        @else

            <div style="text-align: center;">
                <input style="border-radius: 50px;" class="btn" type="submit" value="申請"
                       onclick="guest_show_interest()"/>
            </div>
        @endif



        {{--<div class="form-group">--}}


    </div>

    <script>


        $(function () {
            $("#start_date").datepicker({
                dateFormat: "dd/mm/yy",
                yearRange: "-100:+0",
                changeMonth: true,
                changeYear: true
            });
        });

        function getWordsLength(words){
            var matches = words.match(/[\u00ff-\uffff]|\S+/g);
            return matches ? matches.length : 0;
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
            , "必須選擇");

        $.validator.addMethod("wordsMax",
           function(value, element, params) {
              var count = getWordsLength(value);
              if(count <= params[0]) {
                 return true;
              }
           },
           $.validator.format("最多 100 個字")
        );
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

        /*
         $("#studentAge").inputmask({mask: "[99]", greedy: 'false'});
         $("#classMemberNo").inputmask({mask:"[999]", greedy: 'false'});
         $("#start_time").inputmask({mask: "[9999]/[99]/[99]", greedy: 'false'});
         $("#fee").inputmask({mask: "[99999]", greedy: 'false'});
         */

        $("#studentAge").mask("00", {placeholder: "__"});
        $("#classMemberNo").mask("000", {placeholder: "___"});
        $("#start_time").mask("0000/00/00", {placeholder: "YYYY/MM/DD"});
        $("#fee").mask("00000", {placeholder: "_____"});

        $(document).ready(function () {


            reset_all();

            $('#fail').hide();
            $('#success').hide();
            //TeachingInfoForm


            $("#caseForm").validate({
                rules: {
                    studentAge: {
                        regex: "^(?=.*?[0-9]).{1,}$"
                    },
                    classMemberNo: {
                        regex: "^(?=.*?[0-9]).{1,}$"
                    },
                    special_requirement: {
                        regex: "^(?=.*[0-9A-Za-z\u4e00-\u9eff]).{1,100}$"
                    }
                },
                messages: {

                    studentGender: {
                        mRequired: "必須選擇"
                    },
                    "classType": {
                        mRequired: "必須選擇"
                    },
                    "venue": {
                        mRequired: "必須選擇"
                    },
                    "coachSex": {
                        mRequired: "必須選擇"
                    },
                    "weeks[]": {
                        mRequired: "必須選擇"
                    },
                    studentAge: {
                        regex: "請輸入有效年齡"
                    },
                    classMemberNo: {
                        regex: "請輸入有效數字"
                    },
                    special_requirement: {
                        regex: "請使用中文或英文輸入相關資料"
                    }
                },

                errorPlacement: function (error, element) {
                    if ((element.attr('name') === 'area[]')) {
                        error.appendTo("#areaError");
                    }
                    else if ((element.attr('name') === 'studentGender')) {
                        error.appendTo("#genderError")
                    }
                    else if ((element.attr('name') === 'classType')) {
                        error.appendTo("#classTypeError")
                    }
                    else if ((element.attr('name') === 'venue')) {
                        error.appendTo("#venueError")
                    }
                    else if ((element.attr('name') === 'coachSex')) {
                        error.appendTo("#coachSexError")
                    }
                    else if ((element.attr('name') === 'weeks[]')) {
                        error.appendTo("#weeksError")
                    }
                    else if ((element.attr('name') === 'caseCategory')) {
                        error.appendTo("#caseCategoryError")
                    }

                    else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function (form) {


                    $.ajax({
                        method: "POST",
                        url: $('#caseForm').attr('action'),
//                        url: "studentCase",
                        data: $('#caseForm').serialize().replace(/%5B%5D/g, '[]'),
                        success: function (data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true) {
                                alert('case updated!');
                                window.location.reload();
                            }

                            else
                                alert('failed to update profile!');
                        }
                    });
//                    return false
                }
            });


            $("#statusForm").validate({
                messages: {

                    status: {
                        mRequired: "必須選擇"
                    },

                },

                errorPlacement: function (error, element) {
                    if ((element.attr('name') === 'area[]')) {
                        error.appendTo("#areaError");
                    }


                    else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function (form) {


                    $.ajax({
                        method: "POST",
                        url: $('#statusForm').attr('action'),
//                        url: "studentCase",
                        data: $('#statusForm').serialize().replace(/%5B%5D/g, '[]'),
                        success: function (data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true) {
                                alert('case updated!');
                                window.location.reload();
                            }

                            else
                                alert('failed to update case!');
                        }
                    });
//                    return false
                }
            });


            //TeachingInfoForm
            $("#interestedForm").validate({

                messages: {


                    "interested": {
                        mRequired: "必須選擇"
                    }


                },
                errorPlacement: function (error, element) {
                    if ((element.attr('name') === 'area[]')) {
                        error.appendTo("#areaError");
                    }
                    else if ((element.attr('name') === 'studentGender')) {
                        error.appendTo("#genderError")
                    }
                    else if ((element.attr('name') === 'classType')) {
                        error.appendTo("#classTypeError")
                    }
                    else if ((element.attr('name') === 'venue')) {
                        error.appendTo("#venueError")
                    }
                    else if ((element.attr('name') === 'coachSex')) {
                        error.appendTo("#coachSexError")
                    }
                    else if ((element.attr('name') === 'weeks[]')) {
                        error.appendTo("#weeksError")
                    }
                    else if ((element.attr('name') === 'caseCategory')) {
                        error.appendTo("#caseCategoryError")
                    }

                    else {
                        error.insertAfter(element);
                    }
                },


                submitHandler: function (form) {

                    $.ajax({
                        method: "POST",
                        url: $('#interestedForm').attr('action'),
//
                        data: $('#interestedForm').serialize().replace(/%5B%5D/g, '[]'),
                        success: function (data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true) {
                                alert('已申請');
                                window.location.reload();
                            }

                            else
                                console.log(error);
                            alert('failed to update profile!');
                        }

                    });
                    return false
                }
            });


        });


        $("#showInterestForm").validate({
            rules: {
                "information":{
                    wordsMax:['300']
                }
            },
            messages: {

                information: {
                    wordsMax:  "最多 300 個字",
                    mRequired: "必須輸入"
                },

            },

            errorPlacement: function (error, element) {
                if ((element.attr('name') === 'area[]')) {
                    error.appendTo("#areaError");
                }
                else if ((element.attr('name') === 'studentGender')) {
                    error.appendTo("#genderError")
                }
                else if ((element.attr('name') === 'classType')) {
                    error.appendTo("#classTypeError")
                }
                else if ((element.attr('name') === 'venue')) {
                    error.appendTo("#venueError")
                }
                else if ((element.attr('name') === 'coachSex')) {
                    error.appendTo("#coachSexError")
                }
                else if ((element.attr('name') === 'weeks[]')) {
                    error.appendTo("#weeksError")
                }
                else if ((element.attr('name') === 'caseCategory')) {
                    error.appendTo("#caseCategoryError")
                }

                else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {


                $.ajax({
                    method: "POST",
                    url: $('#showInterestForm').attr('action'),
//                        url: "studentCase",
                    data: $('#showInterestForm').serialize().replace(/%5B%5D/g, '[]'),
                    success: function (data) {
                        console.log("success ajax request!");
                        console.log(data.success);
                        if (data.success == true) {
                            alert('個案已申請');
                            window.location.replace('{!! route("public_list_case") !!}');
                        }


                        else
                            alert('failed to update interest!');
                    }
                });
//                    return false
            }
        });


        $('#caseForm').on('change', function () {

            $('input[name="categoryTitle"]').each(function (index, elem) {
                if ($(elem).is(":checked")) {
                    console.log("checked!");
                    console.log($(elem).parent().children('div'));
                    $(elem).parent().children('div').show();
                }
                else {
                    $(elem).parent().children('div').hide();
                }
            });

            if ($("#otherCField").is(":checked")) {
                $("#extendCategory").show();
            }
            else {
                $("#extendCategory").hide();
                $("#extendCategory").val("");
            }


            if ($("#gpTrainningLocation").is(":checked") || $('#coachArrangeLocation').is(":checked")) {
                $("#classMemberNoOption").show();
            }
            else {
                $("#classMemberNoOption").hide();
                $("#classMemberNo").val("");
            }


            if ($("#FacilitiesAndVenuesOfLCSD_venue").is(":checked") || $("#Clubhouse_venue").is(":checked") ||
                $("#SchoolOrCommunityCenter_venue").is(":checked") || $("#other_venue").is(":checked")) {
                $('#refAddressOption').show();
//                    $("#refAddress").addClass("must");
            }
            else {
                $('#refAddressOption').hide();
                $('#refeAddress').val("");
//                    $("#refAddress").removeClass("must");
            }

        });


        function guest_show_interest() {

            alert('請先登入');
            window.location.href = "{{route('getLogin')}}";

        }

        function reset_all() {
            reset_caseForm();
            reset_interestedForm();
            reset_statusForm();
            reset_showInterestForm()
        }

        function reset_showInterestForm() {

            @if ($interest)


                $("[name='information']").val('@php  echo str_replace("\n", '\n', str_replace('"', '\"', addcslashes(str_replace("\r", '', (string)$interest->information), "\0..\37'\\")));; @endphp');
            @endif
        }

        function cancel_sumbit() {


            $.ajax({
                method: "POST",
                url: "{{route('cancel_interest',$case->case_id)}}",
//
                data: {_token: "{{ Session::token() }}"},
                success: function (data) {
                    console.log("success ajax request!");
                    console.log(data.success);
                    if (data.success == true) {
                        alert('申請已經取消');
                        window.location.replace("{!! route('public_list_case') !!}");
                    }

                    else
                        alert('failed to ucancel submition!');
                }

            });

        }

        function reset_interestedForm() {


            $("[name='interested']").filter("[value='{!! $case->coach_id !!}']").click();
            $("[name='interested']").prop('disabled', true);

            $(".interestedForm_control").hide()

        }


        function edit_interestedForm() {

            $("[name='interested']").prop('disabled', false);
            $(".interestedForm_control").show()

        }


        function reset_statusForm() {

            $("[name='status']").val('{!! $case->status !!}');
            $("[name='status']").prop('disabled', true);
            $(".statusForm_control").hide();
        }

        function reset_caseForm() {
            $("[name='studentGender']").filter($("[value='{!!$case->student_Sex !!}']")).click();
            $("[name='studentGender']").prop('disabled', true);

            $("#studentGender_text").html($("[name='studentGender']:checked").parent().text());


            $("[name='studentAge']").val("{!! $case->student_Age !!}");
            $("[name='studentAge']").prop('disabled', true);


            $("[name='classType']").filter($("[value='{!!$case->mode!!}']")).click();
            $("[name='classType']").prop('disabled', true);

            $("#classType_text").html($("[name='classType']:checked").parent().text());


            @if ($case->category_name == '其他')

$("[name='extendCategory']").val('{!! $case->subject_name !!}');
            $("#otherCField").click();

            @else


$("[name='caseCategory']").filter($("[value='{!! $case->subject_id !!}']")).click();
            $("[name='categoryTitle']").filter($("[value='{!! $case->category_name !!}']")).click();


            $("#classType_text").html($("[name='classType']:checked").parent().text());

            @endif


$("#caseForm").change();


            $("[name='caseCategory']").prop('disabled', true);

            $("[name='categoryTitle']").prop('disabled', true);

            $("[name='caseCategory']").filter($("[value='{!! $case->subject_id !!}']")).click();
            $("[name='caseCategory']").prop('disabled', true);

            $("#extendCategory").prop('disabled', true);


            $("[name='classMemberNo']").val("{!! $case->classMemberNo !!}");
            $("[name='classMemberNo']").prop('disabled', true);

            $("[name='start_time']").val("{!! $case->start_time !!}");
            $("[name='start_time']").prop('disabled', true);


            $("[name='frequency']").val("{!! $case->lesson_per_week !!}");
            $("[name='frequency']").prop('disabled', true);

            $("[name='start_date']").val("{!! $case->start_date !!}");
            $("[name='start_date']").prop('disabled', true);


            var str = "{!! $case->available_day !!}";
            var temp = str.split(",");

            for (var i in temp) {

                $("[name='weeks[]']").filter($("[value='" + temp[i] + "']")).click();
            }

            $("[name='weeks[]']").prop('disabled', true);

            var str = "{!! $case->start_time !!}";
            var temp = str.split(",");

            for (var i in temp) {

                $("[name='start_time[]']").filter($("[value='" + temp[i] + "']")).click();
            }
            $("[name='start_time[]']").prop('disabled', true);


            var fk = {!! $case->length !!};
            if (fk == 0.75)
                $("[name=classDuration]").val(fk.toFixed(2));
            else
                $("[name=classDuration]").val(fk.toFixed(1));

            $("[name=classDuration]").prop('disabled', true);


            $("[name=venue]").filter($("[value='{!! $case->venue !!}']")).click();
            $("[name=venue]").prop('disabled', true);

            $("[name='refAddress']").val("{!! $case->refAddress !!}");
            $("[name='refAddress']").prop('disabled', true);

            $("[name=district]").val("{!! $case->district_id !!}");
            $("[name=district]").prop('disabled', true);


            $("[name=fee]").val("{!! $case->fee !!}");
            $("[name=fee]").prop('disabled', true);


            $("[name='coachSex']").filter($("[value='{!! $case->sex !!}']")).click();
            $("[name=coachSex]").prop('disabled', true);


            $("[name=special_requirement]").val("@php  echo str_replace("\n", '\n', str_replace('"', '\"', addcslashes(str_replace("\r", '', (string)$case->special_requirement), "\0..\37'\\")));; @endphp");
            $("[name=special_requirement]").prop('disabled', true);


            $(".caseForm_control").hide();


        }


        function edit_caseForm() {

            $("[name='studentGender']").prop('disabled', false);

            $("[name='studentAge']").prop('disabled', false);

            $("[name='classType']").prop('disabled', false);


            $("[name='caseCategory']").prop('disabled', false);

            $("[name='categoryTitle']").prop('disabled', false);

            $("[name='caseCategory']").prop('disabled', false);

            $("[name='classMemberNo']").prop('disabled', false);

            $("[name='start_time']").prop('disabled', false);

            $("[name='frequency']").prop('disabled', false);

            $("[name='start_date']").prop('disabled', false);


            $("[name='weeks[]']").prop('disabled', false);


            $("[name='start_time[]']").prop('disabled', false);


            $("[name=classDuration]").prop('disabled', false);

            $("[name=venue]").prop('disabled', false);

            $("[name='refAddress']").prop('disabled', false);

            $("[name=district]").prop('disabled', false);

            $("[name=fee]").prop('disabled', false);

            $("[name=coachSex]").prop('disabled', false);


            $("[name=special_requirement]").prop('disabled', false);


            $(".caseForm_control").show();

        }

        function edit_statusForm() {

            $("[name='status']").prop('disabled', false);
            $(".statusForm_control").show();

        }


    </script>





@endsection
