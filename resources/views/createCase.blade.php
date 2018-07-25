@extends('masters.student_home_master')

@section('content')
    <!--/* JQuery was added in the master*/-->
    <script src = "{{ URL::to('formValidateLib/jquery.validate.js') }}"></script>
    <!--
    <script src = "{{ URL::to('formValidateLib/inputmask/inputmask.js') }}"></script>
    <script src = "{{ URL::to('formValidateLib/inputmask/jquery.inputmask.js') }}"></script>
    -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <script src = "{{ URL::to('formValidateLib/jquery.mask.js') }}"></script>
    <script src = "{{ URL::to('formValidateLib/additional-methods.js') }}"></script>
    <script src = "{{ URL::to('formValidateLib/localization/messages_zh_TW.min.js') }}"></script>
    <link rel="stylesheet" href=" {{ URL::to('formValidateLib/animate.min.css') }} ">


  <link href="{{ URL::to('css/modern-business.css') }}" rel="stylesheet">

    <style>
        input.btn{
            border-radius: 28px;
            padding: 12px 12px 12px 12px;
            font-size: 12px
        }
        label.error{
            color: #f33;
            padding: 0;
            margin: 2px 0 0 0;
            font-size: 0.7em;
        }
        .defaultHidden{
            display:none;
        }
    </style>
    <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> 申請個案 </h1>
           <!--  <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('student_home') }}">學生首頁</a></li>
                <li class="breadcrumb-item active">申請課堂</li>
            </ol> -->
        </div>
    </div>


    <div class="row" id = "lessonInfoFormRow">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"> 課堂資料 </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{route('store_case')}}" id = "lessonInfoForm" role="form">
<!--
                                <div class="form-group">
                                    <p><b>授課地區 （可選擇多於一項）</b></p>
                                </div>
-->
                                <div class="form-group">
                                    學生性別<br><input class ="must" type="radio" name = "studentGender" value="male"/>&nbsp 男 &nbsp &nbsp &nbsp <input class ="must" type="radio" name = "studentGender" value="female"/>&nbsp 女 <span id="genderError"> </span><br />
                                </div>
                                <div>
                                    學生年齡<input class ="must form-control" type="text" id="studentAge" name = "studentAge"/><br>
                                </div>
                                <div class="form-group">
                                    上堂模式<br>
                                    <lable class="checkbox-inline"><input class="must" type="radio" name="classType" value="single"/>&nbsp 單對單</lable>
                                    <label class="checkbox-inline"><input class="must" type="radio" id="gpTrainningLocation" name="classType" value="group"/>&nbsp 小組訓練</label>
                                    <label class="checkbox-inline"><input class="must" type="radio" id="coachArrangeLocation" name="classType" value="coachArrange"/>&nbsp 參加教練安排課堂</label><span id="classTypeError"> </span>
                                     <div class="defaultHidden" id=classMemberNoOption>
                                        人數<input class = "must form-control" type="text"  id="classMemberNo" name ="classMemberNo" disabled/><br>
                                    </div>
                                    
                                </div>
                                 <div class="form-group">
                                    <p><b>運動類別</b></p>
                                    <div id="categoryList">
                                     @foreach ($categories as $category)
                                        @if($category->name!='Other')
                                            <?php $sccnt=0 ?>
                                            @foreach ($categoriesTable as $subcategory)
                                                @if( $category->category_id === $subcategory->category_id)
                                                    <?php $sccnt++ ?>
                                                    @if( $sccnt == 1)
                                                        <?php $temp_chin_name = $subcategory->subject_chin?>
                                                        <?php $temp_subject_id = $subcategory->subject_id ?>
                                                    @endif
                                                @endif
                                            @endforeach
                                            @if($sccnt==1)
                                                <input class="must" type="radio" name="caseCategory" value="{!! $temp_subject_id !!}"/>&nbsp <b>{!!$category->name_chin!!}</b><br>
                                            @elseif ($sccnt > 1)
                                                <div class="categoryMenu">
                                                    <input type="checkbox" name="categoryTitle" value="{!! $category->name_chin !!}"/>&nbsp <b>{!!$category->name_chin!!}</b> 
                                                    <?php $cnt = 0; ?>
                                                    <div class="categorySubTitle defaultHidden">
                                                    @foreach ($categoriesTable as $subcategory)
                                                        @if( $category->category_id === $subcategory->category_id)
                                                            
                                                            <?php $cnt++ ?>
                                                             &nbsp;&nbsp;&nbsp;
                                                           <input class="must" type="radio" name="caseCategory" value="{!! $subcategory->subject_id !!}"/> &nbsp {!! $subcategory->subject_chin !!} <br>
                                                          
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>  
                                            @endif
                                        @endif
                                        @endforeach
                                     </div>
                                    <div>
                                        <input class="must" type="radio" id="otherCField" name="caseCategory" value=""/><span style="font-weight: 900">&nbsp 其他</span> <input class="defaultHidden form-control" type="text" name="extendCategory" id ="extendCategory"/>
                                    </div>
                                    <div id="caseCategoryError"></div>
                                </div>

                                <div class="from-group">
                                    最快上堂日期 <!--input date-->
                                    <input class="must form-control" type="text" id="start_date" name="start_date" placeholder="YYYY/MM/DD"/>
                                    <br>
                                </div>
                                <div class="from-group">
                                    上堂時間 <br>
                                    <input class="must" type="checkbox" name="start_time[]" value="6_9">&nbsp 早上 (06:00-09:00) <br>
                                    <input class="must" type="checkbox" name="start_time[]" value="9_12">&nbsp 早上 (09:00-12:00)<br>
                                    <input class="must" type="checkbox" name="start_time[]" value="12_15">&nbsp 下午 (12:00-15:00)<br>
                                    <input class="must" type="checkbox" name="start_time[]" value="15_18">&nbsp 下午 (15:00-18:00)<br>
                                    <input class="must" type="checkbox" name="start_time[]" value="18_21">&nbsp 晚上 (18:00-21:00)<br>
                                    <input class="must" type="checkbox" name="start_time[]" value="21_24">&nbsp 晚上 (21:00-00:00)<br>
                                    <input class="must" type="checkbox" name="start_time[]" value="anytime">&nbsp 任何時間<br>
                                    <div id="timeError"></div>
                                    <br>
                                </div>
                                <div class="from-group">
                                    上堂次數 <!--number-->
                                    <select class="mustChoose form-control" name="frequency">
                                        <option value ="default" >--請選擇--</option>
                                        <option value ="1">每周一堂</option>
                                        <option value ="2">每周兩堂</option>
                                        <option value ="3">每周三堂</option>
                                        <option value ="4">每周四堂</option>
                                        <option value ="5">每周五堂</option>
                                        <option value ="6">每周六堂</option>
                                        <option value ="7">每周七堂</option>
                                        <option value ="8">每周七堂或以上</option>
                                    </select>
                                    <br>
                                </div>
                                <div class="from-group">
                                    上堂日子<br>
                                    <input class="must" type="checkbox" name="weeks[]" value="mon"/>&nbsp 星期一<br>
                                    <input class="must" type="checkbox" name="weeks[]" value="tue"/>&nbsp 星期二<br>
                                    <input class="must" type="checkbox" name="weeks[]" value="wed"/>&nbsp 星期三<br>
                                    <input class="must" type="checkbox" name="weeks[]" value="thu"/>&nbsp 星期四<br>
                                    <input class="must" type="checkbox" name="weeks[]" value="fri"/>&nbsp 星期五<br>
                                    <input class="must" type="checkbox" name="weeks[]" value="sat"/>&nbsp 星期六<br>
                                    <input class="must" type="checkbox" name="weeks[]" value="sun"/>&nbsp 星期日<br>
                                    <input class="must" type="checkbox" name="weeks[]" value="anytime"/>&nbsp 任何時間<br>

                                    <div id="weeksError"></div>
                                    
<!--
                                    <select class="mustChoose form-control" name="weeks">
                                        <option value ="default" >--請選擇--</option>
                                        <option value ="1">星期一</option>
                                        <option value ="2">星期二</option>
                                        <option value ="3">星期三</option>
                                        <option value ="4">星期四</option>
                                        <option value ="5">星期五</option>
                                        <option value ="6">星期六</option>
                                        <option value ="7">星期日</option>
                                    </select>
-->
                                    <br>
                                </div>
                                <div class="from-group">
                                    課堂長度
                                    <select class="mustChoose form-control" name="classDuration">
                                        <option value ="default" >--請選擇--</option>
                                        <option value ="0.5">每堂30分鐘</option>
                                        <option value ="0.75">每堂45分鐘</option>
                                        <option value ="1.0">每堂1小時</option>
                                        <option value ="1.5">每堂1.5小時</option>
                                        <option value ="2.0">每堂2小時</option>
                                        <option value ="2.5">每堂2.5小時</option>
                                        <option value ="3.0">每堂3小時</option>
                                        <option value ="3.5">每堂3.5小時</option>
                                        <option value ="4.0">每堂4小時</option>
                                        <option value ="4.5">每堂4.5小時</option>
                                        <option value ="5.0">每堂5小時或以上</option>
                                    </select>
                                    <br>
                                </div>
                                <div class="from-group">
                                    上堂地點<span style="color: red">*</span><br>
                                    <input class="must" type="radio" name="venue" id="FacilitiesAndVenuesOfLCSD_venue" value="Facilities&VenuesOfLCSD"/>&nbsp 康文署體育館/ 場地<br>
                                    <input class="must" type="radio" name="venue" id="Clubhouse_venue" value="Clubhouse"/>&nbsp 私人會所/ 場地<br>
                                    <input class="must" type="radio" name="venue" id="SchoolOrCommunityCenter_venue" value="SchoolOrCommunityCenter"/>&nbsp 學校/ 社區中心<br>
                                    <input class="must" type="radio" name="venue" id="CoachAssign_venue" value="CoachAssign"/>&nbsp 教練提供場地<br>
                                    <input class="must" type="radio" name="venue" id="other_venue" value="Other"/>&nbsp 其他 <br>
                                    <div id="venueError"></div>
<!--                                    參考地址<input type="text" name="refAddress" id="refAddress" />-->
                                    <div class="defaultHidden" id="refAddressOption">
                                        參考地址
                                        <input type="text"  class ="must form-control" name="refAddress" id="refAddress" />
                                    </div>
                                    <br>
                                </div>
<!--
                                <div class="from-group">
                                    <div id="refAddressOption">
                                        參考地址
                                        <input type="text"  class ="must form-control" name="refAddress" id="refAddress" />
                                    </div>
                                </div>
-->
                                <div class="form-group">
                                    上堂地區
                                    <select class="mustChoose form-control" name="district">
                                        <option value ="default">--請選擇--</option>
                                        <option value="" disabled><p><b>---香港島---</b></p></option>
                                        @foreach ($hkDistricts as $hkDistrict)
                                            <option  value="{!!$hkDistrict->district_id!!}"/> {!! $hkDistrict->name_chin !!} </option>
                                        @endforeach
                                        <option value="" disabled><p><b>---九龍區---</b></p></option>
                                        @foreach ($knDistricts as $knDistrict)
                                            <option value="{!!$knDistrict->district_id!!}"/> {!! $knDistrict->name_chin !!} </option>
                                        @endforeach
                                        <option value="" disabled><p><b>---新界區---</b></p></option>
                                        @foreach ($ntDistricts as $ntDistrict)
                                            <option  value="{!!$ntDistrict->district_id!!}"/> {!! $ntDistrict->name_chin !!} </option>
                                        @endforeach
                                        <option value="" disabled><p><b>---其他地區---</b></p></option>
                                        @foreach ($otherDistricts as $otherDistrict)
                                            <option  value="{!!$otherDistrict->district_id!!}"/> {!! $otherDistrict->name_chin !!} </option>
                                        @endforeach
                                    <!--<input type="checkbox" name="area[]" value="1"/> 中半山，薄扶林 <br>-->
                                    </select>
<!--                                    <div id="districtError"></div>-->
                                </div>
                                <div class="from-group">
                                    每堂學費<span style="color: red">**</span><br>
<!--                                    <div class="col-lg-6">-->
                                        <input class="must form-control" id="fee" type="text" name="fee" value="" placeholder=""/>
<!--                                    </div>-->
<!--
                                    <div class="col-lg-6">
                                        <select class="mustChoose form-control" name="payUnit">
                                            <option value ="default">--請選擇貨幣單位--</option>
                                            <option value="HKD"><p><b>HKD</b></p></option>
                                            <option value="USD"><p><b>USD</b></p></option>
                                            <option value="RMB"><p><b>RMB</b></p></option>
                                        <input type="checkbox" name="area[]" value="1"/> 中半山，薄扶林 <br>
                                        </select>
                                        <br>
                                    </div>
-->
                                    <br>
                                </div>
                                <div class="form-group">
                                    教練性別
                                    &nbsp &nbsp &nbsp<input class="must" type="radio" name="coachSex" value="male"/>&nbsp 男
                                    &nbsp &nbsp &nbsp<input class="must" type="radio" name="coachSex" value="female"/>&nbsp 女
                                    &nbsp &nbsp &nbsp<input class="must" type="radio" name="coachSex" value="undefined"/>&nbsp 無所謂
                                    <div id="coachSexError"></div>
                                </div>
                                <div class="form-group">
                                    教練特別要求
                                    <textarea class="form-control" name="special_requirement" rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <div style="text-align: center;"> 
                                        <input class="btn" type ="submit" value ="完成申請"/>
                                    </div>
                                </div>
                                <br><br>
                                <p><span style="color: red">*</span> 注意: 若課堂地點由教練提供場地, 學生或需負責場地費用; 若課堂地點為康文署/私人場地; 學生或需負責教練之場地費用; 若使用康文署健身室設施, 學生與教練需年滿 15 歲或以上及具備康文署之設施的所需資格</p>
                                <p><span style="color: red">**</span> 如報名小組訓練,請寫上小組人數每堂學費的總和, 不會視為平均個人的每堂學費</p>
                                <input type="hidden" name="account_id" value="@php session_start(); echo $_SESSION['user']['account_id']; @endphp">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="success">
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading"> 完成申請 </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                          <div style="text-align: center;">
                                    <img src="../public/images/case_success.png" height="10%" width="10%" />
                                    <h1> 完成申請個案</h1>
                                    <br>
                                    <div style="font-size: 16px">
                                        <p>閣下個案已成功申請</p>
                                        <p>閣下個案已刊登於學生個案，並可以立即查閱</p>
                                        <p>當發現合適教練，Gympal團隊會以電郵及Whatsapp通知您，由您決定自己的心水教練</p>
                                        <p>如對申請個案有任何問題，可致電熱線或發送電郵與我們同事聯絡</p>
                                        <br>
                                    </div>
                                    <input type="button" class="btn" onclick='location.href="{{route("home")}}";' value="返回主頁" />
                          </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="fail">
        <div class="col-lg-12">
            <div class="panel panel-danger">
                <div class="panel-heading"> 資料有誤 </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- 登記資料不符合格式或資料有誤, 請<a href="{{ route('create_case')}}">按此</a>返回重新核對資料. -->
                            登記資料不符合格式或資料有誤, 請<a href="javascript:backPage()">按此</a>返回重新核對資料.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>

        function backPage(){
            $('#fail').hide();
            $('#fail').animateCss('slideInRight');
            $('#lessonInfoFormRow').show();
            $('#lessonInfoForm').show();
            $('#lessonInfoFormRow').animateCss('slideInLeft');
        }
        
         $( function() {
            $( "#start_date" ).datepicker({
              dateFormat:"yy/mm/dd",
              yearRange: "-100:+0",
              changeMonth: true,
              changeYear: true
            });
        });
        
        
        $.fn.extend({
            animateCss: function (animationName, cb) {
                var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
                this.addClass('animated ' + animationName).one(animationEnd, function() {
                    $(this).removeClass('animated ' + animationName);
                    if(cb){
                        cb();
                    }
                });
            }
        });


         $.validator.addMethod("wordsMax",
           function(value, element, params) {
              var count = getWordsLength(value);
              if(count <= params[0]) {
                 return true;
              }
           },
           $.validator.format("最多 100 個字")
        );

        $.validator.addMethod("mRequired", $.validator.methods.required,
            "必須填寫");

        $.validator.addMethod("regex",
            function(value, element, regexp) {
                var re = new RegExp(regexp);
                return this.optional(element) || re.test(value);}
            ,"格式錯誤");

        $.validator.addMethod('daterange', function(value, element, arg) {
                if (this.optional(element) && !value) {
                    return true;
                }

                var d = new Date();
                var deadline = d.getFullYear()+"/12/31";
                var startDate = Date.parse(arg[0]);
                var endDate = Date.parse(deadline);
                var enteredDate = Date.parse(value);


                if (isNaN(enteredDate)) {
                    return false;
                }

                return ( (isNaN(startDate) || (startDate <= enteredDate)) &&
                         (isNaN(endDate) || (enteredDate <= endDate)));


               }, $.validator.format("請填寫有效日期"));


        $.validator.addMethod("valueNotEquals", function(value, element, arg){
                return arg != value;}
            ,"必須選擇");

        jQuery.validator.addClassRules({
            must:{
                mRequired : true,
            },
        });
        
        jQuery.validator.addClassRules({
            mustChoose:{
                valueNotEquals:"default"
            }
        });

        function getWordsLength(words){
            var matches = words.match(/[\u00ff-\uffff]|\S+/g);
            return matches ? matches.length : 0;
        }

        /*
        $("#studentAge").inputmask({mask: "[99]", greedy: 'false'});
        $("#classMemberNo").inputmask({mask:"[999]", greedy: 'false'});
        $("#start_time").inputmask({mask: "[9999]/[99]/[99]", greedy: 'false'});
        $("#fee").inputmask({mask: "[99999]", greedy: 'false'});
        */

        $("#studentAge").mask("00", {placeholder: ""});
        $("#classMemberNo").mask("000", {placeholder: ""});
        $("#start_date").mask("0000/00/00", {
            placeholder: "",
        });
//        $("#start_time").mask("00/00/0000", {placeholder: "DD/MM/YYYY"});
        $("#fee").mask("00000", {placeholder: ""});

        $(document).ready(function(){            
            $('#lessonInfoForm').on('change',function(){
                $('input[name="categoryTitle"]').each(function(index, elem) {
                    if($(elem).is(":checked")){
                        console.log("checked!");
                        console.log($(elem).parent().children('div'));
                        $(elem).parent().children('div').show();
                    }
                    else{
                        $(elem).parent().children('div').hide();
                    }
                });
                
                if($("#otherCField").is(":checked")){
                     $("#extendCategory").show();
                }
                else{
                     $("#extendCategory").hide();
                     $("#extendCategory").val("");
                }
                
                
                if($("#gpTrainningLocation").is(":checked") || $('#coachArrangeLocation').is(":checked")){
                    $("#classMemberNoOption").show();
                    $("#classMemberNo").prop('disabled', false);;
                } 
                else{
                     $("#classMemberNoOption").hide();
                     $("#classMemberNo").val("");
                     $("#classMemberNo").prop('disabled', true);;

                }
                
                
                if($("#FacilitiesAndVenuesOfLCSD_venue").is(":checked") || $("#Clubhouse_venue").is(":checked") ||
                   $("#SchoolOrCommunityCenter_venue").is(":checked") || $("#other_venue").is(":checked")){
                     $('#refAddressOption').show();
//                    $("#refAddress").addClass("must");  
                }
                else{
                    $('#refAddressOption').hide();
                    $('#refeAddress').val("");
//                    $("#refAddress").removeClass("must");
                }
            
            });
            $('#fail').hide();
            $('#success').hide();
            //TeachingInfoForm
            $("#lessonInfoForm").validate({
                rules:{
                    studentAge:{
//                        regex:"^(?=.*?[0-9]).{1,}$"
                        digits:true,
                        range:[1,99],
                    },
                    classMemberNo:{
                         regex:"^(?=.*?[0-9]).{1,}$"
                    },
                    special_requirement:{
                         wordsMax:['100'],
                     },
                    refAddress:{
                         wordsMax:['50']
                     },
                    fee :{
                        digits :true,
                        range :[50,999999],
                    },
                    // refAddress:{ 
                    //    regex:"^[-',0-9A-Za-z \u4e00-\u9eff]{1,100}$"
                    // },
                    'extendCategory':{
                        required:"input:radio[id=otherCField]:checked",
                        // regex:"^[-',0-9A-Za-z \u4e00-\u9eff]{1,500}$"
                    },
                    start_date:{
                        daterange:["1800/01/01"]
                    },
                    
                },
                messages: {
                    caseCategory:{
                     mRequired:"必須選擇"
                    },
                     studentGender:{
                        mRequired:"必須選擇"
                    },
                    "classType":{
                        mRequired:"必須選擇"
                    },
                     "venue":{
                        mRequired:"必須選擇"
                    },
                    "coachSex":{
                        mRequired:"必須選擇"
                    },
                    "weeks[]":{
                        mRequired:"必須選擇"
                    },
                    "start_time[]":{
                        mRequired:"必須選擇"
                    },
                    studentAge:{
                        digits:"請輸入有效年齡",
                        range:"請輸入有效年齡(1-99)"
                    },
                    classMemberNo:{
                        regex:"請輸入有效數字",
                    },
                    // special_requirement:{
                    //     regex:"請使用中文或英文輸入相關資料"
                    // },
                    fee:{
                        digits: "請輸入有效金額",
                        range: "請輸入正確每堂學費，最低每堂學費至少為$50"
                    },
                    refAddress:{ 
                       wordsMax:"最多 50 個字"
                    },
                    extendCategory:{
                        required:"必須填寫",
                        // regex:"輸入有效格式"
                    }
                     
                },
                errorPlacement: function(error, element) {
                    if((element.attr('name') === 'area[]')){
                        error.appendTo("#areaError");
                    }
                    else if ((element.attr('name') === 'studentGender')){
                        error.appendTo("#genderError")
                    }
                    else if ((element.attr('name') === 'classType')){
                        error.appendTo("#classTypeError")
                    }
                    else if ((element.attr('name') === 'venue')){
                        error.appendTo("#venueError")
                    } 
                    else if ((element.attr('name') === 'coachSex')){
                        error.appendTo("#coachSexError")
                    } 
                    else if ((element.attr('name') === 'weeks[]')){
                        error.appendTo("#weeksError")
                    } 
                    else if ((element.attr('name') === 'caseCategory')){
                        error.appendTo("#caseCategoryError")
                    }
                    else if ((element.attr('name') === 'start_time[]')){
                        error.appendTo("#timeError");
                    }
                    else{
                        error.insertAfter(element);
                    }
                },
                submitHandler: function (form) {
                    /*
                    $('#lessonInfoFormRow').animateCss('slideOutRight', function(){
                            $('#lessonInfoFormRow').hide();
                            $('#lessonInfoForm').hide();
                        }
                    );
                    */
                    $('#lessonInfoFormRow').hide();
                    $('#lessonInfoForm').hide();
                    $.ajax({
                        method     :"POST",
                        dataType:"json",
                        url: $('#lessonInfoForm').attr( 'action' ),
//                        url: "studentCase",
                        data     : $('#lessonInfoForm').serialize().replace(/%5B%5D/g, '[]'),
                        success  : function(data) {
                            $('#success').animateCss('slideInLeft');
                            $('#success').show();
                            // console.log("success ajax request!");
                            // console.log(data);
                        },
                        error: function(data){
                            $('#fail').animateCss('slideInLeft');
                            $('#fail').show();
                        }
                     });
//                    return false
                }
            });
        });

    </script>


@endsection