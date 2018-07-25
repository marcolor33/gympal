@extends($extend)

@section('content')



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



    <link href="{{ URL::to('css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ URL::to('css/modern-business.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ URL::to('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('https://fonts.googleapis.com/icon?family=Material+Icons') }}" rel="stylesheet">


    <script src="{{ URL::to('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{  URL::to('vendor/metisMenu/metisMenu.min.js') }}"></script>

    <script src="{{ URL::to('js/sb-admin-2.js') }}"></script>

    <style>
        input.btn {
            border-radius: 30px;
            font-size: 15px;
            padding: 10px;
        }

        hr {
            background-color: dimgrey;
            color: dimgrey !important;
            height: 0px;
            width: 220px;
            border-style: dotted;
        }

        @media screen and (max-width: 1000px) {
            hr {
                display:none;
            }
        }

/*
        input:checked {
            height: 50px;
            width: 50px;
        }
*/

    </style>


    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="font-size: 36px; font-weight: bold; text-align: center">教練資料庫</h1>

            </div>
        </div>

        <div class="row defaultHidden" id="districtFormRow">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="left col-xs-6">
                        <table style="width:100%; border-collapse:separate; border-spacing:2em; text-align: left">
                            <tr>

                                <td>
                                    <div>
                                        @if ($coach->profile_pic != '')
                                            {{--<img class="img-responsive img-hover" src='http://piq.codeus.net/static/media/userpics/piq_157628_400x400.png'/><a class="cvForm_control"onclick="delete_profile_pic('{{$coach->profile_pic}}','{{route('delete_profile_pic')}}')">clear profile pic</a>--}}
                                            <img height=200px width=200px src='{{$coach->profile_pic}}'/><a
                                                    class="cvForm_control"
                                                    onclick="delete_profile_pic('{{$coach->profile_pic}}','{{route('delete_profile_pic')}}')">clear
                                                profile pic</a>
                                        @elseif ($coach->sex == 'male')
                                            <img height=200px width=200px
                                                 src='/front/storage/app/profileImg/profile-male.jpg'/><a
                                                    class="cvForm_control"
                                                    onclick="delete_profile_pic('{{$coach->profile_pic}}','{{route('delete_profile_pic')}}')">clear
                                                profile pic</a>

                                        @else
                                            <img height=200px width=200px
                                                 src='/front/storage/app/profileImg/profile-female.jpg'/><a
                                                    class="cvForm_control"
                                                    onclick="delete_profile_pic('{{$coach->profile_pic}}','{{route('delete_profile_pic')}}')">clear
                                                profile pic</a>

                                        @endif

                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>  @if ($coach->chin_name == "")
                                        <!--<h5>{!!$coach->eng_name !!}</h5>-->
                                        <b><p style="font-size:16px; font-weight:bold;">{!!$coach->eng_name !!}</p></b>
                                    @else
                                        <!--<h5>{!!$coach->chin_name !!}</h5>-->
                                        <b><p style="font-size:16px; font-weight:bold;">{!!$coach->chin_name !!}</p></b>
                                    @endif</td>
                            </tr>

                            <tr>
                                <td><h5 @php if ($coach->approved == '0') echo 'hidden'; @endphp><img height="20"
                                                                                                      width="20"
                                                                                                      src="/front/public/images/approved.png"/><b>       專業認證</b>
                                    </h5>
                                    <h5 @php if ($coach->star == '0') echo 'hidden'; @endphp><img height="20" width="20"
                                                                                                  src="/front/public/images/stared.png"/><b>   星級教練</b>
                                    </h5>
                                </td>
                            </tr>
                            <tr>
                                <td>性別</td>
                                <td>
                                    @if ($coach->sex == 'male') 男 @else 女 @endif

                                </td>
                            </tr>

                            <tr>
                                <td>年齡</td>
                                <td>
                                    @php

                                        $birthDate = explode("-", $coach->birth_year); $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md") ? ((date("Y") - $birthDate[0]) - 1) : (date("Y") - $birthDate[0]));
                                      echo $age;
                                    @endphp

                                </td>
                            </tr>
                            <tr>

                                <td>運動類別</td>
                                <td>
                                    <h5>
                                        @php
                                            //echo $coach->subjects;
                                           $temp = explode("," , $coach->subjects);
                                            $count = 1;

                                            $result = $temp[0];

                                            while ($count < sizeof($temp))
                                            {
                                                $result = $result.", ".$temp[$count];
                                                $count++;
                                            }

                                            echo $result;
                                        @endphp
                                    </h5>
                                </td>
                            </tr>
                            <tr>
                                <td>教學年資</td>
                                <td id=experience_text></td>
                                <td hidden><select class="must" name="experienceSelection" id="experienceSelection">
                                        <option value="default">--請選擇--</option>
                                        <option value="none">沒有</option>
                                        <option value="lessthanoneyear">少於一年</option>
                                        <option value="onetotwoyear">一至兩年</option>
                                        <option value="twotofouryear">兩年至四年</option>
                                        <option value="fivetotenyear">五年至十年</option>
                                        <option value="atleasttenyear">十年或以上</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>最低時薪（小時）</td>
                                <td>${!! $coach->min_pay !!}</td>
                            </tr>
                            <tr>
                                <td>理想時薪（小時）</td>
                                <td>${!! $coach->well_pay !!}</td>
                            </tr>
                            <tr>
                                <td>能否提供課地</td>
                                <td>
                                    @if ($coach->offer_venue == '')
                                        不可以
                                    @else
                                        可以
                                    @endif
                                </td>
                                <!--                    <td><input class="must" type="radio" id="canProvideClassroom" name ="provideClassroom" value="yes"> 可以 <input class="must" type="radio" name ="provideClassroom" value="no"> 不可以 <span id="provideClassroomError"> </span></td>-->
                            </tr>
                            <tr>
                                <td>能否安排小組課堂</td>
                                <td>
                                    @if ($coach->offer_group == 'yes')
                                        有
                                    @else
                                        沒有
                                    @endif

                                </td>

                                <!--                    <td><input class ="must" type="radio" name ="groupClass" value="yes"> 有 <input class ="must" type="radio" name ="groupClass" value="no"> 沒有 <span id="groupClassError"> </span></td>-->
                            </tr>


                        </table>


                        {{--<h5  @php if ($coach->approved == '0') echo 'hidden'; @endphp>i am approved coach</h5>--}}
                        {{--<h5  @php if ($coach->star == '0') echo 'hidden'; @endphp>i am star coach</h5>--}}

                        <br/>

                        <div class="right col-xs-12">
                        @if(isset($_SESSION['user']))

                            @if($_SESSION['user']['account_type'] == 'student')
                                <div style="color: red">如有興趣追蹤或報名教練課堂, 請"追蹤"教練, Gympal會專人盡快處理您的個案</div><br>
                                <div style="text-align: center;">
                                @if($interest == '1')
                                    <input class="btn" onclick="student_cancel_interest();" type="button" id="basicBack"
                                           value="取消追蹤"/>

                                @else
                                    <input class="btn" onclick="student_show_interest();" type="button" id="basicBack"
                                           value="追蹤"/>
                                @endif
                                </div>
                            @endif


                        @else
                            <div style="color: red">如有興趣追蹤或報名教練課堂, 請"追蹤"教練, Gympal會專人盡快處理您的個案</div><br>

                            <div style="text-align: center;">
                            <input class="btn" onclick="guest_show_interest();" type="button" id="basicBack" value="追蹤"/>
                            </div>


                        @endif



                        </div>

                    </div>


                    <div class="right col-xs-6">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="background-color: #888888; color: white; word-wrap:break-word; overflow:hidden; text-overflow: ellipsis;"> 自我介紹</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-12" style="/*text-align: center;*/ word-wrap:break-word; overflow:hidden; text-overflow: ellipsis;">
                                        {!!nl2br($coach->self_intro)!!}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="right col-xs-6">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="background-color: #888888; color: white; word-wrap:break-word; overflow:hidden; text-overflow: ellipsis;"> 教學履歷</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-12" style="/*text-align: center;*/ word-wrap:break-word; overflow:hidden; text-overflow: ellipsis;">
                                        {!!nl2br($coach->admin_intro)!!}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="right col-xs-6">
                        <div class="panel panel-default">
                            <div class="panel-heading" style=" background-color: #888888; color: white"> 授課地區</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="right col-xs-12">
                                        <form class="defaultHidden" id="districtForm" role="form"
                                              action="{{route('edit_coach_district')}}" method="post">
                                            <div class="form-group">
                                                {{--<p><b>授課地區 （可選擇多於一項）</b></p>--}}
                                            </div>
                                            <div class="left col-xs-6">

                                                <p style="color:blue;"><b>香港島</b></p>
                                                <hr>
                                                <!--<input type="checkbox" name="area[]" value="1"/> 中半山，薄扶林 <br>-->
                                                @foreach ($hkDistricts as $hkDistrict)
                                                    <input type="checkbox" name="area[]"
                                                           value="{!!$hkDistrict->district_id!!}"/> {!! $hkDistrict->name_chin !!}
                                                    <br>
                                            @endforeach

                                            <!-- 	<div id="hkIslandError"></div> -->
                                            </div>
                                            <div class="right col-xs-6">
                                                <p style="color:red;"><b>九龍區</b></p>
                                                <hr>
                                                @foreach ($knDistricts as $knDistrict)
                                                    <input type="checkbox" name="area[]"
                                                           value="{!!$knDistrict->district_id!!}"/> {!! $knDistrict->name_chin !!}
                                                    <br>
                                            @endforeach
                                            <!-- 				<div id="kowloonError"></div> -->
                                                <br>
                                            </div>
                                            <div class="left col-xs-6">
                                                <p style="color:green;"><b>新界區</b></p>
                                                <hr>
                                                @foreach ($ntDistricts as $ntDistrict)
                                                    <input type="checkbox" name="area[]"
                                                           value="{!!$ntDistrict->district_id!!}"/> {!! $ntDistrict->name_chin !!}
                                                    <br>
                                                @endforeach
                                            </div>
                                            <div class="right col-xs-6">
                                                <p style="color:grey;"><b>其他地區</b></p>
                                                <hr>
                                                @foreach ($otherDistricts as $otherDistrict)
                                                    <input type="checkbox" name="area[]"
                                                           value="{!!$otherDistrict->district_id!!}"/> {!! $otherDistrict->name_chin !!}
                                                    <br>
                                                @endforeach
                                            </div>
                                            <div id="areaError"></div>

                                            <input type="hidden" name="account_id" value="{!! $coach->account_id!!}">
                                            <div class="form-group">
                                                <input class="btn btn-primary districtForm_control" type="submit"
                                                       value="save"/> <input type="button"
                                                                             class="btn btn-warning districtForm_control"
                                                                             onclick="reset_all()" value="cancel"/>
                                            </div>
                                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                                        </form>
                                        @if(isset($_SESSION['user']))

                                            @if($_SESSION['user']['account_type'] == 'admin')
                                                <a class="btn btn-default" onclick="edit_districtForm()">edit</a>

                                            @endif
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- time Form -->
        <div class="left col-xs-6">

        </div>


        <!-- infoForm -->


    </div>

    <script>

        $(function () {
            $("#birthDatepicker").datepicker({
                dateFormat: "yy/mm/dd",
                yearRange: "-100:+0",
                changeMonth: true,
                changeYear: true
            });
        });

        $('#subjectForm').on('change', function () {
            $('input[name="categoryTitle"]').each(function (index, elem) {
                if ($(elem).is(":checked")) {
                    console.log($(elem).parent().children('div'));
                    $(elem).parent().children('div').show();
//                    $(elem).parent().children('div').animateCss('lightSpeedIn');
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

        });


        $(document).ready(function () {

            reset_all();
            var cnt_button = 0;
            var max_button = 10;
            $('#more_files').click(function () {
                if (cnt_button < max_button) {
                    $('#addFilesTable').append(
                        '<tr> <td><input type="file" name="coachCV[]" accept="application/pdf"></td><td><input type="button" class="btn btn-warning files_remove" value="刪除"/></td></td></tr>'
                    );
                    cnt_button++;
                }
            });

            $('#addFilesTable').on("click", '.files_remove', function () {
                $(this).parents("tr").remove();
                cnt_button--;
            });

            $("#newPassword").mask('ZZZZZZZZZZZZZZZ', {
                translation: {
                    'Z': {
                        pattern: /[a-zA-Z0-9]/, optional: true
                    }
                }
            });
            $("#HKID").mask("Z000000(0)",
                {
                    placeholder: "_______()",
                    translation: {
                        'Z': {
                            pattern: /[a-zA-Z0-9]/, optional: true
                        }
                    }
                }
            );
            $("#teleno").mask("00000000", {placeholder: "________"});
            $("#birthDatepicker").mask("0000/00/00", {
                placeholder: "yyyy/mm/dd",
            });
            $("#minHourlyWage").mask("00000");
            $("#idealHourlyWage").mask("00000");

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
                                alert('password changed successfully!');
                                window.location.reload();
                            }

                            else {
                                alert('failed to change password ! :' + data.error);
                            }
                        }
                    });

                    return false
                }
            });


            //TeachingInfoForm
            $("#districtForm").validate({
                rules: {
                    "area[]": {
                        required: true
                    },
                },
                messages: {
                    "area[]": {
                        required: "必須從三個地區中選擇其中一項或以上"
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
                        url: $('#districtForm').attr('action'),
                        data: $('#districtForm').serialize().replace(/%5B%5D/g, '[]'),
                        success: function (data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true) {
                                alert('password changed successfully!');
                                window.location.reload();
                            }

                            else {
                                alert('failed to change password ! :' + data.error);
                            }
                        }
                    });

                    return false
                }
            });


            //TeachingInfoForm

            $("#timeForm").validate({
                rules: {},
                messages: {},
                errorPlacement: function (error, element) {

                },
                submitHandler: function (form) {

                    $.ajax({
                        method: "POST",
                        url: $('#timeForm').attr('action'),
                        data: $('#timeForm').serialize().replace(/%5B%5D/g, '[]'),
                        success: function (data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true) {
                                alert('time changed successfully!');
                                window.location.reload();
                            }

                            else {
                                alert('failed to change time ! :' + data.error);
                            }
                        }
                    });

                    return false
                }
            });


            $('#infoForm').on('change', function () {


                if ($('input[name=provideClassroom]:checked').val() === "yes")
                    $("#classroomOption").show();
                else {
                    $("#classroomOption").hide();
                }
            });


            // Subject Form Validation
            $("#subjectForm").validate({
                rules: {
                    'category[]': {
                        required: true,
                    },
                    'extendCategory': {
                        required: "input:checkbox[id=otherCField]:checked"
                    },


                },
                messages: {
                    'category[]': {
                        required: "必須選擇一項或以上",
                    },
                    'extendCategory': {
                        required: "請填寫有關資料"
                    },


                },
                errorPlacement: function (error, element) {
                    if ((element.attr('name') === 'category[]')) {
                        error.appendTo("#categoryError");
                    }
                    else if ((element.attr('name') === 'extendCategory')) {
                        error.insertAfter(element);
                    }

                    else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function (form) {


                    $.ajax({
                        method: "POST",
                        url: $('#subjectForm').attr('action'),
                        data: $('#subjectForm').serialize().replace(/%5B%5D/g, '[]'),
                        success: function (data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true) {
                                alert('subject changed successfully!');
                                window.location.reload();
                            }

                            else {
                                alert('failed to change subject ! :' + data.error);
                            }
                        }
                    });


                    return false
                }
            });


            // info Form Validation
            $("#infoForm").validate({
                rules: {


                    engName: {
                        regex: "^[a-zA-Z ]*$"
                    },
                    chinName: {
                        regex: "^(?=.*[\u4e00-\u9eff]).{1,20}$"
                    },
                    teleno: {
                        regex: "^(?=.*?[0-9]).{8,}$"
                    },
                    classroomAddress: {
                        required: "input:radio[id=canProvideClassroom]:checked",
                    }

                },
                messages: {

                    engName: {
                        regex: "請填寫有效英文名稱"
                    },
                    chinName: {
                        regex: "請填寫有效中文名稱"
                    },
                    teleno: {
                        regex: "請填寫有效電話號碼"
                    },
                    gender: {
                        mRequired: "必須選擇"
                    },
                    groupClass: {
                        mRequired: "必須選擇"
                    },
                    provideClassroom: {
                        mRequired: "必須選擇"
                    },
                    classroomAddress: {
                        requried: "必須填寫"
                    }

                },
                errorPlacement: function (error, element) {

                    if ((element.attr('name') === 'gender')) {
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
                        url: $('#infoForm').attr('action'),
                        data: $('#infoForm').serialize().replace(/%5B%5D/g, '[]'),
                        success: function (data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true) {
                                alert('info changed successfully!');
                                window.location.reload();
                            }

                            else {
                                alert('failed to change info! :' + data.error);
                            }
                        }
                    });


                    return false
                }
            });


            $("#cvForm").validate({
                rules: {

                    experienceSelection: {
                        valueNotEquals: "default"
//                        regex:"^(?=.*?[0-9]).{1,}$"
                    },
                    occupationSelection: {
                        valueNotEquals: "default"
//                        regex:"^(?=.*[0-9A-Za-z\u4e00-\u9eff]).{1,20}$"
                    },
                    minHourlyWage: {
                        regex: "^[0-9]*$"
                    },
                    idealHourlyWage: {
                        regex: "^[0-9]*$"
                    },
                },
                messages: {
                    experienceSelection: {
//                        valueNotEquals:"請選擇相關項目"
                        regex: "請輸入有效資料"
                    },
                    occupationSelection: {
                        regex: "請輪入有效資料"
//                        valueNotEquals:"請選擇相關項目"
                    },
                    minHourlyWage: {
                        regex: "請輸入有效時數"
                    },
                    idealHourlyWage: {
                        regex: "請輸入有效時數"
                    }
                },
                errorPlacement: function (error, element) {
                    error.insertAfter(element);
                },
                submitHandler: function (form) {

                    var fd3 = document.getElementById('cvForm');
                    var dataObject = new FormData(fd3);

                    $.ajax({
                        method: "POST",
                        url: $('#cvForm').attr('action'),
                        dataType: 'json',
                        data: dataObject,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true) {
                                alert('info changed successfully!');
                                window.location.reload();
                            }

                            else {
                                alert('failed to change info! :' + data.error);
                            }
                        }
                    });
                    return false;
                }
            });
        })


        function reset_change_pw_form() {


            $('#oldPassword').prop('value', '');
            $('#newPassword').prop('value', '');
            $('#confirmPassword').prop('value', '');

            $('.account_info').show();
            $('.change_pw_form').hide();
        }


        function edit_districtForm() {
            reset_all();
            $("[name='area[]']").prop('disabled', false);
            $(".districtForm_control").show();
        }

        function edit_timeForm() {
            reset_all();
            $("[name='teachingTime[]']").prop('disabled', false);
            $(".timeForm_control").show();

        }

        function edit_change_pw_form() {
            reset_all();
            $('.change_pw_form').show();

        }

        function edit_subjectForm() {

            reset_all();
            $('.subjectForm_control').show();


            $("[name='category[]']").prop('disabled', false);
            $("[name='categoryTitle']").prop('disabled', false);
            $("#otherCField").prop('disabled', false);
            $("[name='extendCategory']").prop('disabled', false);

        }


        function reset_subjectForm() {

            $('.subjectForm_control').hide();
            @foreach ($available_subjects as $subject)


            @if ($subject->category_name == '其它')

                $("[name='extendCategory']").val('{!! $subject->subject_name !!}');
            $("#otherCField").prop('checked', true);
            @else

                $("[name='category[]']").filter($("[value='{!! $subject->subject_id !!}']")).prop('checked', true);
            $("[name='categoryTitle']").filter($("[value='{!! $subject->category_name !!}']")).prop('checked', true);


            @endif


            @endforeach

            $("#subjectForm").change();
            $("[name='category[]']").prop('disabled', true);
            $("[name='categoryTitle']").prop('disabled', 'true');
            $("#otherCField").prop('disabled', true);
            $("[name='extendCategory']").prop('disabled', true);
        }


        function reset_districtForm() {

            $('.districtForm_control').hide();
            @foreach ($available_districts as $district)

           $("[name='area[]']").filter($("[value='{!! $district->district_id !!}']")).prop('checked', 'true');

            @endforeach

            $("[name='area[]']").prop('disabled', 'true');
        }


        function reset_timeForm() {


            $('.timeForm_control').hide();


            $("[name='teachingTime[]']").filter($("[value='mon_6_9']")).prop('checked',{!! ($available_times->mon_6_9 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='tue_6_9']")).prop('checked',{!! ($available_times->tue_6_9 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='wed_6_9']")).prop('checked',{!! ($available_times->wed_6_9 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='thu_6_9']")).prop('checked',{!! ($available_times->thu_6_9 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='fri_6_9']")).prop('checked',{!! ($available_times->fri_6_9 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='sat_6_9']")).prop('checked',{!! ($available_times->sat_6_9 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='sun_6_9']")).prop('checked',{!! ($available_times->sun_6_9 == 1) ? 'true' : 'false'!!});


            $("[name='teachingTime[]']").filter($("[value='mon_9_12']")).prop('checked',{!! ($available_times->mon_9_12 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='tue_9_12']")).prop('checked',{!! ($available_times->tue_9_12 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='wed_9_12']")).prop('checked',{!! ($available_times->wed_9_12 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='thu_9_12']")).prop('checked',{!! ($available_times->thu_9_12 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='fri_9_12']")).prop('checked',{!! ($available_times->fri_9_12 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='sat_9_12']")).prop('checked',{!! ($available_times->sat_9_12 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='sun_9_12']")).prop('checked',{!! ($available_times->sun_9_12 == 1) ? 'true' : 'false'!!});


            $("[name='teachingTime[]']").filter($("[value='mon_12_15']")).prop('checked',{!! ($available_times->mon_12_15 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='tue_12_15']")).prop('checked',{!! ($available_times->tue_12_15 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='wed_12_15']")).prop('checked',{!! ($available_times->wed_12_15 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='thu_12_15']")).prop('checked',{!! ($available_times->thu_12_15 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='fri_12_15']")).prop('checked',{!! ($available_times->fri_12_15 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='sat_12_15']")).prop('checked',{!! ($available_times->sat_12_15 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='sun_12_15']")).prop('checked',{!! ($available_times->sun_12_15 == 1) ? 'true' : 'false'!!});


            $("[name='teachingTime[]']").filter($("[value='mon_15_18']")).prop('checked',{!! ($available_times->mon_15_18 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='tue_15_18']")).prop('checked',{!! ($available_times->tue_15_18 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='wed_15_18']")).prop('checked',{!! ($available_times->wed_15_18 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='thu_15_18']")).prop('checked',{!! ($available_times->thu_15_18 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='fri_15_18']")).prop('checked',{!! ($available_times->fri_15_18 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='sat_15_18']")).prop('checked',{!! ($available_times->sat_15_18 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='sun_15_18']")).prop('checked',{!! ($available_times->sun_15_18 == 1) ? 'true' : 'false'!!});


            $("[name='teachingTime[]']").filter($("[value='mon_18_21']")).prop('checked',{!! ($available_times->mon_18_21 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='tue_18_21']")).prop('checked',{!! ($available_times->tue_18_21 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='wed_18_21']")).prop('checked',{!! ($available_times->wed_18_21 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='thu_18_21']")).prop('checked',{!! ($available_times->thu_18_21 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='fri_18_21']")).prop('checked',{!! ($available_times->fri_18_21 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='sat_18_21']")).prop('checked',{!! ($available_times->sat_18_21 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='sun_18_21']")).prop('checked',{!! ($available_times->sun_18_21 == 1) ? 'true' : 'false'!!});


            $("[name='teachingTime[]']").filter($("[value='mon_21_24']")).prop('checked',{!! ($available_times->mon_21_24 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='tue_21_24']")).prop('checked',{!! ($available_times->tue_21_24 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='wed_21_24']")).prop('checked',{!! ($available_times->wed_21_24 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='thu_21_24']")).prop('checked',{!! ($available_times->thu_21_24 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='fri_21_24']")).prop('checked',{!! ($available_times->fri_21_24 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='sat_21_24']")).prop('checked',{!! ($available_times->sat_21_24 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='sun_21_24']")).prop('checked',{!! ($available_times->sun_21_24 == 1) ? 'true' : 'false'!!});


            $("[name='teachingTime[]']").filter($("[value='mon_all']")).prop('checked',{!! ($available_times->mon_all == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='tue_all']")).prop('checked',{!! ($available_times->tue_all == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='wed_all']")).prop('checked',{!! ($available_times->wed_all == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='thu_all']")).prop('checked',{!! ($available_times->thu_all == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='fri_all']")).prop('checked',{!! ($available_times->fri_all == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='sat_all']")).prop('checked',{!! ($available_times->sat_all == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='sun_all']")).prop('checked',{!! ($available_times->sun_all == 1) ? 'true' : 'false'!!});


            $("[name='teachingTime[]']").prop('disabled', true);


        }

        function edit_infoForm() {

            reset_all();

            $("[name='engName']").prop('disabled', false);
            $("[name='chinName']").prop('disabled', false);
            $("[name='HKID']").prop('disabled', false);
            $("[name='address']").prop('disabled', false);
            $("[name='teleno']").prop('disabled', false);
            $("[name='birthday']").prop('disabled', false);
            $("[name='gender']").prop('disabled', false);
            $("[name='groupClass']").prop('disabled', false);

            $("[name='provideClassroom']").prop('disabled', false);
            $("[name='classroomAddress']").prop('disabled', false);

            $('.infoForm_control').show();

        }


        function reset_infoForm() {
            $('.infoForm_control').hide();


            $("[name= 'groupClass']").filter($("[value= '{!!$coach->offer_group !!}']")).click();
            $("[name='groupClass']").prop('disabled', 'true');


            $("[name= 'provideClassroom']").filter($("[value= '{!! (($coach->offer_venue) == "") ? 'no' : 'yes' !!}']")).click();


            if ($('input[name=provideClassroom]:checked').val() === "yes") {

                $("#classroomOption").show();
                $("[name='classroomAddress']").val('{!! $coach->offer_venue !!}');
            }

            else {
                $("#classroomOption").hide();
            }


            $("[name='provideClassroom']").prop('disabled', 'true');
            $("[name='classroomAddress']").prop('disabled', 'true');


        }

        function edit_cvForm() {

            reset_all();

            $('.cvForm_control').show();

            $("[name='coachFacebook']").prop('disabled', false);
            $("[name='coachInstagram']").prop('disabled', false);
            $("[name='coachIntroduction']").prop('disabled', false);
            $("[name='experienceSelection']").prop('disabled', false);
            $("[name='occupationSelection']").prop('disabled', false);
            $("[name='minHourlyWage']").prop('disabled', false);
            $("[name='idealHourlyWage']").prop('disabled', false);
        }

        function reset_cvForm() {

            $('.cvForm_control').hide();

            $("[name='coachFacebook']").val('{!! $coach->facebook !!}');
            $("[name='coachFacebook']").prop('disabled', 'true');

            $("[name='coachInstagram']").val('{!! $coach->instagram !!}');
            $("[name='coachInstagram']").prop('disabled', 'true');


            $("[name='coachIntroduction']").val('@php  echo str_replace("\n", '\n', str_replace('"', '\"', addcslashes(str_replace("\r", '', (string)$coach->self_intro), "\0..\37'\\")));; @endphp');
            $("[name='coachIntroduction']").prop('disabled', 'true');


            $("[name='experienceSelection']").val('{!! $coach->year_of_teaching !!}');
            $("[name='experienceSelection']").prop('disabled', 'true');


            $("#experience_text").html($("[name='experienceSelection'] option:selected").html());


            $("[name='occupationSelection']").val('{!! $coach->profession !!}');
            $("[name='occupationSelection']").prop('disabled', 'true');

            $("[name='minHourlyWage']").val('{!! $coach->min_pay !!}');
            $("[name='minHourlyWage']").prop('disabled', 'true');

            $("[name='idealHourlyWage']").val('{!! $coach->well_pay !!}');
            $("[name='idealHourlyWage']").prop('disabled', 'true');
        }

        function reset_all() {
            reset_cvForm();
            reset_subjectForm();
            reset_infoForm();
            reset_timeForm();
            reset_districtForm();
            reset_change_pw_form();

        }


        function guest_show_interest() {

            alert("請先登入帳戶");

            window.location.href = "{{route('getLogin')}}";

        }

        @if(isset($_SESSION['user']))

        @if($_SESSION['user']['account_type'] == 'student')

        function student_show_interest() {


            if (confirm("立即追蹤 ?") == true) {

                $.ajax({
                    method: "POST",
                    url: "{!! route('student_show_interest') !!}",
                    data: {
                        "coach_id": "{!! $account->account_id !!}",
                        "student_id": "<?php echo $_SESSION['user']['account_id'] ?>",
                        "_token": "{{ Session::token() }}"
                    },
                    success: function (data) {
                        console.log("success ajax request!");
                        console.log(data.success);
                        if (data.success == true) {
                            alert('已追蹤');
                            window.location.reload();
                        }

                        else
                            alert('未能追蹤，請稍候重試');
                    }
                });
            }

        }

        function student_cancel_interest() {

            if (confirm("取消追蹤 ?") == true) {

                $.ajax({
                    method: "POST",
                    url: "{!! route('student_cancel_interest') !!}",
                    data: {
                        "coach_id": "{!! $account->account_id !!}",
                        "student_id": "<?php echo $_SESSION['user']['account_id']?>",
                        "_token": "{{ Session::token() }}"
                    },
                    success: function (data) {
                        console.log("success ajax request!");
                        console.log(data.success);
                        if (data.success == true) {
                            alert('已取消追蹤');
                            window.location.reload();
                        }

                        else
                            alert('未能取消，請稍後重試');
                    }
                });
            }


        }

        @endif
    @endif





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
            , "不能為空的");

        jQuery.validator.addClassRules({
            must: {
                mRequired: true,
            },
        });


    </script>
@endsection
