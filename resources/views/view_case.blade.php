@extends($extend)

@section('content')


     <!--/* JQuery was added in the master*/-->
    <script src = "{{ URL::to('formValidateLib/jquery.validate.js') }}"></script>
    <!--
    <script src = "{{ URL::to('formValidateLib/inputmask/inputmask.js') }}"></script>
    <script src = "{{ URL::to('formValidateLib/inputmask/jquery.inputmask.js') }}"></script>
    -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link href="{{ URL::to('css/sb-admin-2.css') }}" rel="stylesheet">
    <script src = "{{ URL::to('formValidateLib/jquery.mask.js') }}"></script>
    <script src = "{{ URL::to('formValidateLib/additional-methods.js') }}"></script>
    <script src = "{{ URL::to('formValidateLib/localization/messages_zh_TW.min.js') }}"></script>
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
    </style>


     <div class="container">
     <div class="row">
         <div class="col-lg-12">
             <h1 class="page-header">Admin檢視個案</h1>
             
         </div>
         <!-- /.col-lg-12 -->
     </div>




@if(isset($_SESSION['user']))

    @if($_SESSION['user']['account_type'] == 'admin')
         
    <div class="row" >
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">教練留言</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            
                            <form action="{{route('edit_interested')}}" id = "interestedForm" role="form">
                            <div class="from-group">
                                @foreach ($coachs as $coach)
                            <div>
                                <br>
                                <input class="must" type="radio" name="interested" value="{!! $coach->account_id !!}"/><label >配對</label>
                            </div>
                        
                                
                                
                            留言日期: @php echo explode(' ',$coach->interest_time_created)[0] @endphp<br>
                            教練ID: {!! $coach->account_code !!}<br>
                            教練電郵 : {!! $coach->email !!}<br>
                            電話號碼 : {!! $coach->teleno !!}<br>
                            中文姓名 : {!! $coach->chin_name !!}<br>
                            英文姓名 : {!! $coach->eng_name !!}<br>
                            性別 : {!! ($coach->sex == 'male')?'男': '女' !!}<br>
                            留言 : <br>
                                {!! nl2br($coach->information) !!}
                                
                            <br>
                            
                            詳細 : <a class="btn btn-default" href='{{route("public_view_coach",$coach->account_id)}}'>view</a> <a class="btn btn-default" onclick='delete_interest({{$coach->account_id}},{{$case->case_id}},"{{route("delete_interest")}}")'>delete</a>
                                
                            @endforeach
                            </div>
                                
                                <div class="form-group">
                                    <input class="btn btn-primary interestedForm_control" type ="submit" value ="save"/> <button class="btn btn-warning interestedForm_control" type="button" onclick="reset_all()">cancel</button>
                                </div>
                                
                                <input type="hidden" name="case_id" value="{!!  $case->case_id  !!}">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                
                                
                            </form>
                            
                            <a class="btn btn-default" onclick="edit_interestedForm()">edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


        <div class="row" >
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Change status</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            
                            <form action="{{route('edit_case_status')}}" id = "statusForm" role="form">
                            <select class="mustChoose form-control" name="status">
                                <option value="default" >select</option>
                                <option value="open">open</option>
                                <option value="pending">pending</option>
                                <option value="closed">closed</option>
                                </select>
                                
                                <div class="form-group">
                                    <input class="btn btn-primary statusForm_control" type ="submit" value ="save"/> <button class="btn btn-warning statusForm_control" type="button" onclick="reset_all()">cancel</button>
                                </div>
                                <input type="hidden" name="case_id" value="{!!  $case->case_id  !!}">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                
                                
                            </form>
                            
                            <a class="btn btn-default" onclick="edit_statusForm()">edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
         
         
    <div class="row" >
        <div class="col-lg-12">
            <div class="panel panel-default">
            <div class="panel-heading">學生資料</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            
                            學生ID:  {!! $student->account_code !!} <br><br>
							
							學生電郵:  {!! $student->email !!}<br><br>
                            
                            電話號碼:  {!! $student->teleno !!} <br><br>
							
							中文姓名:  {!! $student->chin_name !!} <br><br>
							
							英文姓名:  {!! $student->eng_name !!}<br><br>
							
							性別:  {!! ($student->sex == 'male')?'男': '女' !!}<br><br>
                            
                            <a class="btn btn-default" href="{!! route('view_student',$student->account_id) !!}" >view</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        
        
    @endif
@endif




    <!-- Teaching Info Form -->
    <div class="row" id = "caseFormRow">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"> 課堂資料 </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{route('edit_case')}}" id = "caseForm" role="form">
<!--
                                <div class="form-group">
                                    <p><b>授課地區 （可選擇多於一項）</b></p>
                                </div>
-->
                                <div class="form-group">

                                    個案編號:  {!!$case->case_id!!}<br><br>
                                    

                                    <div class="form-group">
                                        <p>運動類別</p>
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
                                                        <input class="must" type="radio" name="caseCategory" value="{!! $temp_subject_id !!}"/><b>{!!$category->name_chin!!}</b><br>
                                                    @elseif ($sccnt > 1)
                                                        <div class="categoryMenu">
                                                            <input type="checkbox" name="categoryTitle" value="{!! $category->name_chin !!}"/><b>{!!$category->name_chin!!}</b> 
                                                            <?php $cnt = 0; ?>
                                                            <div class="categorySubTitle defaultHidden">
                                                            @foreach ($categoriesTable as $subcategory)
                                                                @if( $category->category_id === $subcategory->category_id)
                                                                    
                                                                    <?php $cnt++ ?>
                                                                     &nbsp;&nbsp;&nbsp;
                                                                   <input class="must" type="radio" name="caseCategory" value="{!! $subcategory->subject_id !!}"/> {!! $subcategory->subject_chin !!} <br>
                                                          
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>  
                                            @endif
                                        @endif
                                        @endforeach
                                        </div>
                                        <div>
                                            <input class="must" type="radio" id="otherCField" name="caseCategory" value=""/> 其它 <input class="defaultHidden form-control" type="text" name="extendCategory" id ="extendCategory"/>
                                        </div>
                                        <div id="caseCategoryError"></div>
                                    </div>

                                    學生性別<br><input class ="must" type="radio" name = "studentGender" value="male"/>男 <input class ="must" type="radio" name = "studentGender" value="female"/>女 <span id="genderError"> </span><br />

                                    <br>
                                    學生年齡<input class ="must form-control" type="text" id="studentAge" name = "studentAge"/><br>

                                </div>
                                <div>

                                </div>
                                <div class="form-group">
                                    課堂形式<br>
                                    <lable class="checkbox-inline"><input class="must" type="radio" name="classType" value="single"/>單對單</lable>
                                    <label class="checkbox-inline"><input class="must" type="radio" id="gpTrainningLocation" name="classType" value="group"/>小組訓練</label>
                                    <label class="checkbox-inline"><input class="must" type="radio" id="coachArrangeLocation" name="classType" value="coachArrange"/>參加教練安排課堂</label><span id="classTypeError"> </span>
                                     <div class="defaultHidden" id=classMemberNoOption>
                                        人數<input class = "must form-control" type="text" id="classMemberNo" name ="classMemberNo"/><br>
                                    </div>
                                    
                                </div>


                                <div class="from-group">
                                    最快上堂日期 <!--input date-->
                                    <input class="must form-control" type="text" id="start_date" name="start_date" placeholder="DD/MM/YYYY"/>
                                    <br>
                                </div>
                                <div class="from-group">
                                    上堂時間 <br>
                                    <input class="must" type="checkbox" name="start_time[]" value="6_9">早上 (06:00-09:00) <br>
                                    <input class="must" type="checkbox" name="start_time[]" value="9_12">早上 (09:00-12:00)<br>
                                    <input class="must" type="checkbox" name="start_time[]" value="12_15">下午 (12:00-15:00)<br>
                                    <input class="must" type="checkbox" name="start_time[]" value="15_18">下午 (15:00-18:00)<br>
                                    <input class="must" type="checkbox" name="start_time[]" value="18_21">晚上 (18:00-21:00)<br>
                                    <input class="must" type="checkbox" name="start_time[]" value="21_24">晚上 (21:00-00:00)<br>
                                    <input class="must" type="checkbox" name="start_time[]" value="anytime">任何時間<br>
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
                                    <input class="must" type="checkbox" name="weeks[]" value="mon"/>星期一
                                    <input class="must" type="checkbox" name="weeks[]" value="tue"/>星期二
                                    <input class="must" type="checkbox" name="weeks[]" value="wed"/>星期三
                                    <input class="must" type="checkbox" name="weeks[]" value="thu"/>星期四
                                    <input class="must" type="checkbox" name="weeks[]" value="fri"/>星期五
                                    <input class="must" type="checkbox" name="weeks[]" value="sat"/>星期六
                                    <input class="must" type="checkbox" name="weeks[]" value="sun"/>星期日
                                      <input class="must" type="checkbox" name="weeks[]" value="anytime"/>任何時間<br>

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
                                    上堂地點<br>
                                    <input class="must" type="radio" name="venue" id="FacilitiesAndVenuesOfLCSD_venue" value="Facilities&VenuesOfLCSD"/>康文署體育館/ 場地<br>
                                    <input class="must" type="radio" name="venue" id="Clubhouse_venue" value="Clubhouse"/>私人會所/ 場地<br>
                                    <input class="must" type="radio" name="venue" id="SchoolOrCommunityCenter_venue" value="SchoolOrCommunityCenter"/>學校/ 社區中心<br>
                                    <input class="must" type="radio" name="venue" id="CoachAssign_venue" value="CoachAssign"/>教練提供場地<br>
                                    <input class="must" type="radio" name="venue" id="other_venue" value="Other"/> 其他 <br>
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
                                        <option value="" disabled><p><b>---其它地區---</b></p></option>
                                        @foreach ($otherDistricts as $otherDistrict)
                                            <option  value="{!!$otherDistrict->district_id!!}"/> {!! $otherDistrict->name_chin !!} </option>
                                        @endforeach
                                    <!--<input type="checkbox" name="area[]" value="1"/> 中半山，薄扶林 <br>-->
                                    </select>
<!--                                    <div id="districtError"></div>-->
                                </div>
                                <div class="from-group">
                                    每堂學費<br>
<!--                                    <div class="col-lg-6">-->
                                        <input class="must form-control" id="fee" type="text" name="fee" value="" placeholder="只輸入銀碼(港幣)"/>
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
                                    <lable class="checkbox-inline"><input class="must" type="radio" name="coachSex" value="male"/>男</lable>
                                    <label class="checkbox-inline"><input class="must" type="radio" name="coachSex" value="female"/>女</label>
                                    <label class="checkbox-inline"><input class="must" type="radio" name="coachSex" value="undefined"/>無所謂</label>
                                    <div id="coachSexError"></div>
                                </div>
                                <div class="form-group">
                                    教練特別要求
                                    <textarea class="form-control" name="special_requirement"></textarea>
                                </div>
                                <div class="form-group">
                                   <input class="btn btn-primary caseForm_control" type ="submit" value ="save"/> <button class="btn btn-warning caseForm_control" type="button" onclick="reset_all()">cancel</button>
                                </div>
                                <input type="hidden" name="case_id" value="{{ $case->case_id }}">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">

                            </form>
                
                            @if(isset($_SESSION['user']))

                                @if($_SESSION['user']['account_type'] == 'admin')
                                    <a class="btn btn-default" onclick="edit_caseForm()">edit</a>
                                @endif
                            @endif
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@if(isset($_SESSION['user']))

    @if($_SESSION['user']['account_type'] == 'coach')

          <div class="row" id = "showInterestRow">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"> your submittion </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{route('show_interest',$case->case_id)}}" id = "showInterestForm" role="form">
                                <div class="form-group">
                                    your information<input class ="must form-control" type="textarea" id="information" name = "information"/>
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary showInterestForm_control" type ="submit" value ="save"/> <button class="btn btn-warning showInterestForm_control" type="button" onclick="cancel_sumbit()">cancel submittion</button>
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

<button onclick="guest_show_interest()">追蹤</button>

@endif



 {{--<div class="form-group">--}}


 </div>

<script>
    
        function getWordsLength(words){
            var matches = words.match(/[\u00ff-\uffff]|\S+/g);
            return matches ? matches.length : 0;

        }
            $( function() {
            $( "#start_date" ).datepicker({
              dateFormat:"dd/mm/yy",
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

        $.validator.addMethod("mRequired", $.validator.methods.required,
            "必須填寫");


        $.validator.addMethod("wordsMax",
           function(value, element, params) {
              var count = getWordsLength(value);
              if(count <= params[0]) {
                 return true;
              }
           },
           $.validator.format("最多 300 個字")
        );
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

        $.validator.addMethod("regex",
            function(value, element, regexp) {
                var re = new RegExp(regexp);
                return this.optional(element) || re.test(value);}
            ,"格式錯誤");

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

        $(document).ready(function(){
            
            
            reset_all();

            $('#fail').hide();
            $('#success').hide();
            //TeachingInfoForm
            
                
            $("#caseForm").validate({
                rules:{
                    studentAge:{
                        digits:true,
                        range:[1,99],
                    },
                    classMemberNo:{
                         regex:"^(?=.*?[0-9]).{1,}$"
                    },
                    start_date:{
                        daterange:["1800/01/01"]
                    },
                    fee :{
                        digits :true,
                        range :[50,999999],
                    },
                    special_requirement:{
                         wordsMax:['100']
                     },
                    refAddress:{
                         wordsMax:['50']
                     }  
                },
                messages: {
                    
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
                    "classDuration":{
                        mRequired:"必須選擇"
                    },
                    "weeks[]":{
                        mRequired:"必須選擇"
                    },
                    studentAge:{
                        regex:"請輸入有效年齡"
                    },
                    classMemberNo:{
                         regex:"請輸入有效數字"
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
                    special_requirement:{
                         wordsMax:"最多 100 個字"
                     },
                    refAddress:{
                         wordsMax:"最多 50 個字"
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
                    
                    else{
                        error.insertAfter(element);
                    }
                },
                submitHandler: function (form) {
  
        
                    $.ajax({
                        method     :"POST",
                        url: $('#caseForm').attr( 'action' ),
//                        url: "studentCase",
                        data     : $('#caseForm').serialize().replace(/%5B%5D/g, '[]'),
                        success  : function(data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true)
                                {
                                    console.log('case updated!');
                                    alert('修改完成!'); 
                                    window.location.reload(); 
                                }
                                                    
                            else
                                {
                                    
                                    console.log('failed to update profile!');
                                }
                                
                        }
                        
                     });
//                    return false
                }
            });
            
            
             $("#statusForm").validate({
                messages: {
                    
                     status:{
                        mRequired:"必須選擇"
                    },
                     
                },
                
                errorPlacement: function(error, element) {
                    if((element.attr('name') === 'area[]')){
                        error.appendTo("#areaError");
                    }
                    
                    
                    else{
                        error.insertAfter(element);
                    }
                },
                submitHandler: function (form) {
  
        
                    $.ajax({
                        method     :"POST",
                        url: $('#statusForm').attr( 'action' ),
//                        url: "studentCase",
                        data     : $('#statusForm').serialize().replace(/%5B%5D/g, '[]'),
                        success  : function(data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true)
                                {
                                    console.log('case updated!');
                                    window.location.reload(); 
                                }
                                                    
                            else
                                console.log('failed to update case!');
                        }
                     });
//                    return false
                }
            });
            
            
            
                     //TeachingInfoForm
            $("#interestedForm").validate({
                
                messages: {
                    
                     
                    "interested":{
                        mRequired:"必須選擇"
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
                    
                    else{
                        error.insertAfter(element);
                    }
                },
                
                
                submitHandler: function (form) {
  
                    $.ajax({
                        method     :"POST",
                        url: $('#interestedForm').attr( 'action' ),
//               
                        data     : $('#interestedForm').serialize().replace(/%5B%5D/g, '[]'),
                        success  : function(data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true)
                                {
                                    console.log('interested updated!');
                                    window.location.reload(); 
                                }
                                                    
                            else
                                {
                                console.log(error);
                                console.log('failed to update profile!');
                                    
                                }
                                
                        }
                    
                     });
                    return false
                }
            });
            
            
            
            
        });
    
                    
            
                     $("#showInterestForm").validate({
                rules:{
                          
                },
                messages: {
                    
                     information:{
                        mRequired:"必須輸入"
                    },
        
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
                    
                    else{
                        error.insertAfter(element);
                    }
                },
                submitHandler: function (form) {
  
        
                    $.ajax({
                        method     :"POST",
                        url: $('#showInterestForm').attr( 'action' ),
//                        url: "studentCase",
                        data     : $('#showInterestForm').serialize().replace(/%5B%5D/g, '[]'),
                        success  : function(data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true)
                                {
                                    console('interest updated!');
                                    window.location.reload(); 
                                }
                                                    
                            else
                                {
                                    console.log('failed to update interest!');
                                }
                               
                        }
                     });
//                    return false
                }
            });
            
            
         $('#caseForm').on('change',function(){
             
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
                } 
                else{
                     $("#classMemberNoOption").hide();
                     $("#classMemberNo").val("");
                }
                
                
                if($("#FacilitiesAndVenuesOfLCSD_venue").is(":checked") || $("#Clubhouse_venue").is(":checked") ||
                   $("#SchoolOrCommunityCenter_venue").is(":checked") || $("#other_venue").is(":checked")){
                     $('#refAddressOption').show();
//                    $("#refAddress").addClass("must");  
                }
                else{
                    $('#refAddressOption').hide();
                    $('#refAddress').val("");
//                    $("#refAddress").removeClass("must");
                }
            
            });
    
    
    function guest_show_interest()
    {
        
        alert('請先登入');
        window.location.href = "{{route('getLogin')}}";
        
    }
    
    function reset_all()
    
    {
        reset_caseForm();
        reset_interestedForm();
        reset_statusForm();
        reset_showInterestForm()
    }
    
    function reset_showInterestForm()
    {
        
        
        @if ($interest)
            $("[name='information']").val('@php  echo str_replace("\n", '\n', str_replace('"', '\"', addcslashes(str_replace("\r", '', (string)$interest->information), "\0..\37'\\")));; @endphp');
        @endif
    }
    
        function cancel_sumbit()
    
    {
        
        
                    $.ajax({
                        method     :"POST",
                        url: "{{route('cancel_interest',$case->case_id)}}",
//                       
                        data: {_token : "{{ Session::token() }}"},
                        success  : function(data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true)
                                {
                                    console.log('submittion cancelled!');
                                    window.location.reload(); 
                                }
                                                    
                            else
                                console.log('failed to ucancel submition!');
                        }
                    
                     });
        
    }
    
    function reset_interestedForm()
    {
        
      
        $("[name='interested']").filter("[value='{!! $case->coach_id !!}']").click();
        $("[name='interested']").prop('disabled',true);
        
        $(".interestedForm_control").hide()
        
    }
    
    
        function edit_interestedForm()
    {
        
        $("[name='interested']").prop('disabled',false);
        $(".interestedForm_control").show()
        
    }
        

    function reset_statusForm()
     {
         
         $("[name='status']").val('{!! $case->status !!}');
         $("[name='status']").prop('disabled',true);
         $(".statusForm_control").hide();
     }
    
    function reset_caseForm()
    {
        
        console.log('@php  echo str_replace("\n", '\n', str_replace('"', '\"', addcslashes(str_replace("\r", '', (string)$case->special_requirement), "\0..\37'\\")));; @endphp');
        
        
        $("[name='studentGender']").filter($("[value='{!!$case->student_Sex !!}']")).click();
        $("[name='studentGender']").prop('disabled',true);
        
        $("[name='studentAge']").val("{!! $case->student_Age !!}");
        $("[name='studentAge']").prop('disabled',true);
        
        $("[name='classType']").filter($("[value='{!!$case->mode!!}']")).click();
        $("[name='classType']").prop('disabled',true);
        
        
            
        @if ($case->category_name == '其它')
            
            $("[name='extendCategory']").val('{!! $case->subject_name !!}');
            $("#otherCField").click();
            
        
        @else
        
            
            $("[name='caseCategory']").filter($("[value='{!! $case->subject_id !!}']")).click();
            $("[name='categoryTitle']").filter($("[value='{!! $case->category_name !!}']")).click();
            
           
            
            
        @endif
        
        
        $("#caseForm").change();
        
        
        
        $("[name='caseCategory']").prop('disabled',true);
        
        $("[name='categoryTitle']").prop('disabled',true);
        
        $("[name='caseCategory']").filter($("[value='{!! $case->subject_id !!}']")).click();
        $("[name='caseCategory']").prop('disabled',true);
        
        $("#extendCategory").prop('disabled',true);
    
        
        
        $("[name='classMemberNo']").val("{!! $case->classMemberNo !!}");
        $("[name='classMemberNo']").prop('disabled',true);
        
        $("[name='start_time']").val("{!! $case->start_time !!}");
        $("[name='start_time']").prop('disabled',true);
        
        
        $("[name='frequency']").val("{!! $case->lesson_per_week !!}");
        $("[name='frequency']").prop('disabled',true);
        
        $("[name='start_date']").val("{!! $case->start_date !!}");
        $("[name='start_date']").prop('disabled',true);

        
        
        var str = "{!! $case->available_day !!}";
        var temp = str.split(",");
        
        for (var i in temp){
            
            $("[name='weeks[]']").filter($("[value='"+temp[i]+"']")).click();
        }
        
           $("[name='weeks[]']").prop('disabled',true);
        
        var str = "{!! $case->start_time !!}";
        var temp = str.split(",");
        
        for (var i in temp){
            
            $("[name='start_time[]']").filter($("[value='"+temp[i]+"']")).click();
        }
        $("[name='start_time[]']").prop('disabled',true);
        
     
        
        var fk = {!! $case->length !!};
        if(fk=='0.75')
            $("[name=classDuration]").val(fk.toFixed(2));
        else
            $("[name=classDuration]").val(fk.toFixed(1));

        $("[name=classDuration]").prop('disabled',true);
        
        $("[name=venue]").filter($("[value='{!! $case->venue !!}']")).click();
        $("[name=venue]").prop('disabled',true);
        
        $("[name='refAddress']").val("{!! $case->refAddress !!}");
        $("[name='refAddress']").prop('disabled',true);
        
        $("[name=district]").val("{!! $case->district_id !!}");
        $("[name=district]").prop('disabled',true);
        
        $("[name=fee]").val("{!! $case->fee !!}");
        $("[name=fee]").prop('disabled',true);
        
        
        $("[name='coachSex']").filter($("[value='{!! $case->sex !!}']")).click();
        $("[name=coachSex]").prop('disabled',true);
        
        
        $("[name=special_requirement]").val('@php  echo str_replace("\n", '\n', str_replace('"', '\"', addcslashes(str_replace("\r", '', (string)$case->special_requirement), "\0..\37'\\")));; @endphp');
        $("[name=special_requirement]").prop('disabled',true);
        
        
        $(".caseForm_control").hide();
                
    }
    
    
        function edit_caseForm()
    {
        
         $("[name='studentGender']").prop('disabled',false);

        $("[name='studentAge']").prop('disabled',false);
        
        $("[name='classType']").prop('disabled',false);
        
        
          $("[name='caseCategory']").prop('disabled',false);
        
        $("[name='categoryTitle']").prop('disabled',false);
        
        $("[name='caseCategory']").prop('disabled',false);
    
        $("[name='classMemberNo']").prop('disabled',false);

        $("[name='start_time']").prop('disabled',false);

        $("[name='frequency']").prop('disabled',false);

        $("[name='start_date']").prop('disabled',false);


           $("[name='weeks[]']").prop('disabled',false);
        
   
        $("[name='start_time[]']").prop('disabled',false);
        
   
        $("[name=classDuration]").prop('disabled',false);
        
        $("[name=venue]").prop('disabled',false);
        
        $("[name='refAddress']").prop('disabled',false);

        $("[name=district]").prop('disabled',false);
    
        $("[name=fee]").prop('disabled',false);

        $("[name=coachSex]").prop('disabled',false);
        

        $("[name=special_requirement]").prop('disabled',false);
        
   
        
        $(".caseForm_control").show();
        
    }
        
    function edit_statusForm(){
        
        $("[name='status']").prop('disabled',false);
        $(".statusForm_control").show();
        
    }
        
    function delete_interest(coach_id,case_id,delete_url){
            
			if (confirm("are you sure to delete?") == true){
				   $.ajax({
                        method     :"POST",
                        url: delete_url,
                        data : {
                            
                            coach_id: coach_id,
                            case_id: case_id,
                            
                            _token : "{{Session::token()}}",
                            
                            
                        },
                        success  : function(data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true)
                                {
                                    console.log('Interest cancelled!');
                                    window.location.reload(); 
                                }
                                                    
                            else
                                console.log('failed to delete!');
                        }
                     });
                
                
			}	
		}

    
</script>





@endsection
