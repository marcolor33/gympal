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
    <link href="{{ URL::to('css/modern-business.css') }}" rel="stylesheet">

    <script src = "{{ URL::to('formValidateLib/jquery.mask.js') }}"></script>
    <script src = "{{ URL::to('formValidateLib/additional-methods.js') }}"></script>
    <script src = "{{ URL::to('formValidateLib/localization/messages_zh_TW.min.js') }}"></script>
    <link rel="stylesheet" href=" {{ URL::to('formValidateLib/animate.min.css') }} ">

    <!--
    <p class="account_info">
        <h5>Account Info</h5>

        <b>username : </b> {!!$account->username!!}<br>

        <b>password : </b> {!!$account->password !!}<br>

        <b>email : </b> {!!$account->email !!} <br>
        <a onclick="edit_change_pw()">change password</a>
    </p>
    -->

    <style>

        label.error{
            color: #f33;
            padding: 0;
            margin: 2px 0 0 0;
            font-size: 0.7em;
        }
 
    </style>
<div class="container">
    
    @if(isset($_SESSION['user']))

        @if($_SESSION['user']['account_type'] == 'admin')
            <h1 class="page-header">檢視學生</h1>
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin_home') }}">後台首頁</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('list_student') }}">所有學生</a></li>
                        <li class="breadcrumb-item active">檢視學生</li>
                    </ol>
                </div>
            </div>
        
    
        @else
        <h1 class="page-header">我的資料</h1>
        @endif
    @endif

    <div class="row account_info">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"> 帳戶資料</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id ="" role="form">
                                <div class="form-group">
                                    帳戶名稱: <input class = "must form-control" type="text" name ="username" disabled value=" {!!$account->username!!}  "><br>
<!--                                    Password: <input class = "must form-control" type="text" name ="password" disabled  value=" {!!$account->password !!}  "><br>-->
                                    登記電郵: <input class = "must form-control" type="text" name ="email" disabled value="{!!$account->email !!}"><br>
                                    <a class="btn btn-warning" onclick="edit_change_pw_form()">更改密碼</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row change_pw_form">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"> 設定新密碼 </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="change_pw_form" id="change_pw_form" role="form" action="{{route('change_password')}}" method="post">
                                <div class="form-group">
                                    舊密碼: <input class = "must form-control" type="password" id="OldPassword" name ="oldPassword"><br>
                                    新密碼: <input class = "must form-control" type="password" id="newPassword" name ="newPassword"><br>
                                    確認密碼: <input class = "must form-control" type="password" id="confirmPassword" name ="confirmPassword"><br>
                                    <input type="hidden" name="account_id" value="{!! $student->account_id!!}">
                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type ="submit" value ="確認更改"/>&nbsp;<button class="btn btn-warning" type= "button" onclick="reset_all()">取消</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <!-- district Form -->
    <div class="row defaultHidden profile" id = "districtFormRow">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"> 學生資料 </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="profile_form" id="profile_form" role="form" action="{{route('edit_student_profile')}}" method="post">
                                <div class="form-group">
                                    
                                    英文姓名<input class = "form-control" type="text" id="engName" name ="engName"><br>
                                    中文姓名<input class = "form-control" type="text" id="chinName" name ="chinName"><br>
                                    身份證號碼<input class = "must form-control" type="text" id="HKID" name ="HKID"><br>
                                </div>
                                <div class="form-group">
                                    住宅地址<input class = "must form-control" type="text" name ="address"><br>
                                    <!-- Should use select here -->
                                    住宅區域
                                    <select class="must form-control" name="district">
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
                                </div>
                                <div class="form-group">
                                    電話號碼<input class = "must form-control" type="text" id="teleno" name ="teleno"><br>
                                    出生日期<input class = "must form-control" type="text" id="birthday" name ="birthday"><br>
                                </div>
                                <div class="form-group">
                                    性別<br />
                                    <input class ="must" type="radio" name = "gender" value="male"/>男 <input class ="must" type="radio" name = "gender" value="female"/>女 <span id="genderError"> </span><br />
                                </div>
                                <div class="from-group">
                                    認識GYMPAL的途徑<br>
                                    <select class="mustChoose form-control" id="howToKnowGympal" name="howToKnowGympal" >
                                        <option value="default">--請選擇--</option>
                                        <option value="existingCustomer">舊有用戶，再次尋找教練</option>
                                        <option value="facebook">Facebook</option>
                                        <option value="instagram">Instagram</option>
                                        <option value="searchEngine">搜尋器(Google/Yahoo)</option>
                                        <option value="forum">討論區</option>
                                        <option value="friendsOrFamily">朋友家人</option>
                                        <option value="media">傳媒報導</option>
                                        <option value="poster">傳單海報</option>

                                    </select>
                                    <br>
                                </div>
                                <input name="account_id" hidden value="{!! $student->account_id!!}"/>
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <div class="form-group">
                                    <input class="btn btn-primary profile_form_control" type ="submit" value ="確認更改"/> <button class="btn btn-warning profile_form_control" type="button" onclick="reset_all()">取消</button>
                                </div>
                                
                            </form>
                            <a class="btn btn-default" onclick="edit_profile_form()">修改資料</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script>
    
    
    
        $( function() {
            $( "#birthday" ).datepicker({
              dateFormat:"yy/mm/dd",
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
                this.addClass('animated ' + animationName).one(animationEnd, function() {
                    $(this).removeClass('animated ' + animationName);
                    if(cb){
                        cb();
                    }
                });
            }
        });

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


        $("#loginPassword").mask('ZZZZZZZZZZZZZZZZ', {
            placeholder: "密碼須由英文字母及數字組合組成，長度為8 - 16",
            translation: {
                'Z': {
                    pattern: /[a-zA-Z0-9]/, optional: true
                }
            }
        });
        $("#HKID").mask("Z000000L",
            {
                placeholder: "請輸入所有英文字母及數字，無須輸入括號。例如你的香港身份證號碼是 A123456(7)，則輸入A1234567",
                translation: {
                    'Z': {
                        pattern: /[a-zA-Z0-9]/, optional: true
                    },
                    'L': {
                        pattern: /[A0-9]/, optional: true
                    }
                }
            }
        );
        $("#teleno").mask("00000000", {placeholder: ""});
        $("#birthday").mask("0000/00/00", {placeholder: "年/月/日"});

	$(document).ready(function(){


        reset_all();
        
                
                 $("#profile_form").validate({
                rules : {
                    engName:{
                        regex:"^[a-zA-Z ]*$",
                        maxlength: 24,
                        required:{
                        depends: function(element){
                            return $("#chinName").val()=='';
                            }
                        }
                    },
                    chinName:{
                        regex:"^[\u4E00-\u9FA5]*$",
                        maxlength:8,
                        required:{
                        depends: function(element){
                             return $("#engName").val()=='';
                            }
                        }
                    },
                    teleno:{
                        regex:"^(?=.*?[0-9]).{8,}$"
                    },
                    username:{
                        maxlength: 24
                    },
                    address:{
                       // regex:"^[-'0-9A-Za-z,/ \u4e00-\u9eff]{1,150}$",
                       wordsMax:['80']
                    },
                    birthday:{
                        dateISO: true,
                        daterange:["1800/01/01"]
                    },
                    HKID:{
                        regex:"^([A-Z]{1})([0-9]{6})([A0-9])$"
                    },
                },
                messages:{
                    engName:{
                       required:"請填寫中文或英文名字",
                        regex:"請填寫有效英文名稱",
                        maxlength: "請填寫最多24位有效英文名稱"
                    },
                    chinName:{
                        required:"請填寫中文或英文名字",
                        regex:"請填寫有效中文名稱",
                        maxlength: "請填寫最多8位有效中文名稱"
                    },
                    HKID:{
                        regex:"請輸入所有英文字母及數字，無須輸入括號。例如你的香港身份證號碼是 A123456(7)，則輸入A1234567",
                        mRequired:"請輸入身份證號碼"
                    },
                     address:{
                       // regex:"請輸入位有效地址",
                       wordsMax:"請填寫最多80字有效地址"
                    },
                    district:{
                        mRequired:"請選擇有效地區"
                    },
                    teleno:{
                        regex:"請填寫有效電話號碼"
                    },
                    gender:{
                        mRequired:"必須選擇"
                    },
                    username:{
                       maxlength:"請輸入最長24位有效名稱"
                    },

                },
                errorPlacement: function(error, element) {
                    if((element.attr('name') === 'category[]')){
                        error.appendTo("#categoryError");
                    }
                    else if ((element.attr('name') === 'extendCategory')){
                        error.insertAfter(element);
                    }
                    else if ((element.attr('name') === 'gender')){
                        error.appendTo(genderError)
                    }
                    else if ((element.attr('name') === 'groupClass')){
                        error.appendTo(groupClassError)
                    }
                    else if ((element.attr('name') === 'provideClassroom')){
                        error.appendTo(provideClassroomError)
                    }
                    else {
                        error.insertAfter(element);
                    }
                },
               
                submitHandler: function (form) {
                   
                    $.ajax({
                        method     :"POST",
                        url: $('#profile_form').attr( 'action' ),
                        data     : $('#profile_form').serialize().replace(/%5B%5D/g, '[]'),
                        success  : function(data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true)
                                {
                                    alert('修改完成!');
                                    window.location.reload(); 
                                }
                                
                            else
                                alert('修改失敗!');
                        }
                    });

                    return false;
                }
            });
    
        
           $("#change_pw_form").validate({
                rules : {
                    
                    'newPassword':{
                        regex: "^(?=.*[A-Za-z])(?=.*?[0-9]).{8,}$"
                    },
                    confirmPassword:{
                        equalTo:"#newPassword"
                    },
                    
                },
                messages:{
                    
                    newPassword:{
                        regex:"密碼至少8位由英文字母及數字組合組成"
                    },
                    confirmPassword:{
                        equalTo:"與已填寫密碼不相同"
                    }
                    

                },
                errorPlacement: function(error, element) {
                    if((element.attr('name') === 'category[]')){
                        error.appendTo("#categoryError");
                    }
                    else if ((element.attr('name') === 'extendCategory')){
                        error.insertAfter(element);
                    }
                    else if ((element.attr('name') === 'gender')){
                        error.appendTo(genderError)
                    }
                    else if ((element.attr('name') === 'groupClass')){
                        error.appendTo(groupClassError)
                    }
                    else if ((element.attr('name') === 'provideClassroom')){
                        error.appendTo(provideClassroomError)
                    }
                    else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function (form) {
                   
                    $.ajax({
                        method     :"POST",
                        url: $('#change_pw_form').attr( 'action' ),
                        data     : $('#change_pw_form').serialize().replace(/%5B%5D/g, '[]'),
                        success  : function(data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true)
                                {
                                   alert('成功更改密碼'); 
                                    window.location.reload();
                                }
                            
                            else
                                {
//                                    alert('更改密碼失敗! :'+ data.error);
                                     alert('更改密碼失敗! 請輸入正確的舊密碼');
                                }
                        }
                    });

                    return false 
                }
            });

        
});
    
    
    
    
    function reset_all()
    {
        
        
        reset_profile_form();
        
        reset_change_pw_form();
        
    }
    
    
    function reset_change_pw_form()
    {
        
        
        $('#oldPassword').prop('value','');
        $('#newPassword').prop('value','');
        $('#confirmPassword').prop('value','');
        
        $('.account_info').show();
        $('.change_pw_form').hide();
    }
    
    
       function edit_change_pw_form()
    {
        reset_all();
        $('.change_pw_form').show();

    }
    
      function reset_profile_form(){
        
          
        var birthday;
          
        birthday = "{!!$student->birth_year !!}".split('-');
          
        
          
        $("[name= 'engName']").val("{!!$student->eng_name !!}");
        $("[name= 'engName']").prop('disabled',true);
          
          
        $("[name= 'chinName']").val("{!!$student->chin_name !!}");
        $("[name= 'chinName']").prop('disabled',true);
          
          
        $("[name= 'HKID']").val("{!!$student->idcard_no !!}");
        $("[name= 'HKID']").prop('disabled',true);
          
          
        $("[name= 'address']").val("{!!$student->address !!}");
        $("[name= 'address']").prop('disabled',true);
          
        $("[name= 'district']").val("{!!$student->district_id !!}");
        $("[name= 'district']").prop('disabled',true);
          
          
        $("[name= 'teleno']").val("{!!$student->teleno !!}");
        $("[name= 'teleno']").prop('disabled',true);  
        
        $("[name= 'birthday']").val(birthday[0]+"/"+birthday[1]+"/"+birthday[2]);
        $("[name= 'birthday']").prop('disabled',true);
          
          
        $("[name= 'gender']").filter($("[value= '{!!$student->sex !!}']")).click();
        $("[name= 'gender']").prop('disabled',true);
          
        $("[name='howToKnowGympal']").val("{!! $student->howToKnowGympal !!}");
        $("[name= 'howToKnowGympal']").prop('disabled',true);
          
          
        $('.profile_form_control').hide();
    
          
        
    }
    
    
    
    function edit_profile_form(){
        
        reset_all();

        $("[name= 'engName']").prop('disabled',false);
          
        $("[name= 'chinName']").prop('disabled',false);
          

        $("[name= 'HKID']").prop('disabled',false);
          

        $("[name= 'address']").prop('disabled',false);
  
        $("[name= 'district']").prop('disabled',false);
          
      
        $("[name= 'teleno']").prop('disabled',false);  
        

        $("[name= 'birthday']").prop('disabled',false);
        
        $("[name= 'gender']").prop('disabled',false);
        
        $("[name='howToKnowGympal']").prop('disabled',false);
       
        $('.profile_form_control').show();
        
    }
    
    
    
        $('#profile_form').on('change',function(){
            /*
            if($("#otherCField").is(":checked")){
                $("#extendCategory").show();
            }
            else{
                $("#extendCategory").hide();
            }

            if($('input[name=provideClassroom]:checked').val() === "yes")
                $("#classroomOption").show();
            else{
                $("#classroomOption").hide();
            }
            */
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

        $.validator.addMethod("regex",
            function(value, element, regexp) {
                var re = new RegExp(regexp);
                return this.optional(element) || re.test(value);}
            ,"格式錯誤");

        $.validator.addMethod("valueNotEquals", function(value, element, arg){
                return arg != value;}
            ,"Value must not equal arg.");

        jQuery.validator.addClassRules({
            must:{
                mRequired : true,
            },
        });
    
    
    
    
</script>






	

@endsection
