@extends('masters.guest_master')

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
            font-size: 12px;
        }
        .defaultHidden{
            display:none;
        }
    </style>

 
    <body>
      <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Something went wrong! </h1>
            </div>
        </div>

        <div class="row" id="fail">
            <div class="col-lg-12">
                <div class="panel panel-danger">
                    <div class="panel-heading"> Error Message </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    The page won't load. 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </body>

    <script>

//         function backpage(){
//             $('#fail').hide();
//             $('#fail').animateCss('slideInRight');
//             $('#BasicInformationFormRow').show();
//             $('#BasicInformationForm').show();
//             $('#BasicInformationFormRow').animateCss('slideInLeft');
//         }

//         $( function() {
//             $( "#birthDatepicker" ).datepicker({
//               dateFormat:"yy/mm/dd",
//               yearRange: "-100:+0",
//               changeMonth: true,
//               changeYear: true
//             });
//         });

//         $.fn.extend({
//             animateCss: function (animationName, cb) {
//                 var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
//                 this.addClass('animated ' + animationName).one(animationEnd, function() {
//                     $(this).removeClass('animated ' + animationName);
//                     if(cb){
//                         cb();
//                     }
//                 });
//             }
//         });

//         $.validator.addMethod("mRequired", $.validator.methods.required,
//             "必須填寫");

//         $.validator.addMethod('ImgWidth', function (value, element) {
//             if ($(element).data('width')) {
//                 // console.log("The width is "+$(element).data('width'));
//                 // console.log(($(element).data('width') >= 200));
//                 return $(element).data('width') >= 200;
//             }
//             return true;
//         }, '圖片比例最少為200x200');

//          $.validator.addMethod('ImgHeight', function (value, element) {
//             if ($(element).data('height')) {
//                 // console.log("the height is "+$(element).data('height'));
//                 //  console.log(($(element).data('height') >= 200));
//                 return $(element).data('height') >= 200;
//             }
//             return true;
//         }, '圖片比例最少為200x200');


//         $.validator.addMethod('daterange', function(value, element, arg) {
//                 if (this.optional(element) && !value) {
//                     return true;
//                 }

//                 var d = new Date();
//                 var deadline = d.getFullYear()+"/12/31";
//                 var startDate = Date.parse(arg[0]);
//                 var endDate = Date.parse(deadline);
//                 var enteredDate = Date.parse(value);


//                 if (isNaN(enteredDate)) {
//                     return false;
//                 }

//                 return ( (isNaN(startDate) || (startDate <= enteredDate)) &&
//                          (isNaN(endDate) || (enteredDate <= endDate)));


//                }, $.validator.format("請填寫有效日期"));

//         $.validator.addMethod("wordsMax",
//            function(value, element, params) {
//               var count = getWordsLength(value);
//               if(count <= params[0]) {
//                  return true;
//               }
//            },
//            $.validator.format("最多 300 個字")
//         );


//         $.validator.addMethod("regex",
//             function(value, element, regexp) {
//                 var re = new RegExp(regexp);
//                 return this.optional(element) || re.test(value);}
//             ,"格式錯誤");

//         $.validator.addMethod("valueNotEquals", function(value, element, arg){
//                 return arg != value;}
//             ,"Value must not equal arg.");

//         jQuery.validator.addClassRules({
//             must:{
//                 mRequired : true,
//             },
//         });

//         $("#loginPassword").mask('ZZZZZZZZZZZZZZZZ', {
//             placeholder: "密碼須由英文字母及數字組合組成，長度為8 - 16",
//             translation: {
//                 'Z': {
//                     pattern: /[a-zA-Z0-9]/, optional: true
//                 }
//             }
//         });
//         $("#HKID").mask("Z000000L",
//             {
//                 placeholder: "請輸入所有英文字母及數字，無須輸入括號。例如你的香港身份證號碼是 A123456(7)，則輸入A1234567",
//                 translation: {
//                     'Z': {
//                         pattern: /[a-zA-Z0-9]/, optional: true
//                     },
//                     'L': {
//                         pattern: /[A0-9]/, optional: true
//                     }
//                 }
//             }
//         );
//         $("#teleno").mask("00000000", {placeholder: ""});
//         $("#birthDatepicker").mask("0000/00/00", {
//             placeholder: "請輸入有效的日期 (YYYY/MM/DD)",
//         });
//         $("#minHourlyWage").mask("00000");
//         $("#idealHourlyWage").mask("00000");

        
        
//         $('#BasicInformationForm').on('change',function(){


//             $('input[name="categoryTitle"]').each(function(index, elem) {
//                 if($(elem).is(":checked")){

//                     $(elem).parent().children('div').show();
// //                    $(elem).parent().children('div').animateCss('lightSpeedIn');
//                 }
//                 else{
//                     $(elem).parent().children('div').hide();
//                 }
                
//             });
            
//             if($("#otherCField").is(":checked")){
//                  $("#extendCategory").show();
//             }
//             else{
//                  $("#extendCategory").hide();
//                  $("#extendCategory").val("");
//             }
            
//             if($('input[name=provideClassroom]:checked').val() === "yes")
//                 $("#classroomOption").show();
//             else{
//                 $("#classroomOption").hide();
//             }
//         });


//         $('#teachingInfoForm').on('change',function(){
//             $('input[name="teachingTime[]"]').each(function(index, elem) {
//                 if($(elem).is(":checked")){
//                     var allDayCheck = $(elem).val().split("_")
//                     var status = allDayCheck[allDayCheck.length-1];
//                     var week;
//                     if(status==="all"){
//                         week=allDayCheck[0];
//                         $('input[name="teachingTime[]"]').each(function(index2, elem2) {
//                             var getWeek = $(elem2).val().split("_");
//                             if(getWeek[0]===week && getWeek[getWeek.length-1]!="all"){
//                                 $(elem2).prop('checked', false); 
//                                 $(elem2).attr("disabled", true);
//                             }
//                         });
//                     }
//                 }
//                 else{
//                     $(elem).attr("disabled", false);
//                 }
                
//             });
//         });


//         $('#coachPhotos').on('change',function(){

//             var files = this.files;
//             var file_temp = files[0];
//             if(files && file_temp){
//                 var reader = new FileReader();
               
//                 reader.readAsDataURL(file_temp);
//                 reader.onload = function (_file_temp) {
//                     var image  = new Image();
//                     image.src = _file_temp.target.result;
//                     image.onload = function() {
//                         $('#coachPhotos').data('height', this.height);
//                         $('#coachPhotos').data('width', this.width);
//                     }
//                 }
//             }
//         });


//     function getWordsLength(words){
//         var matches = words.match(/[\u00ff-\uffff]|\S+/g);
//         return matches ? matches.length : 0;

//     }
        
//      // $('#coachIntroduction').on('keyup',function(){
//      //        var count = getWordsLength($(this).val());
//      //        $('#showWordCount').html("Words: "+count);
//      //        // console.log(count);
//      //    });

//         $(document).ready(function(){
//             var cnt_button = 1;
//             var max_button =10;
//             $('#addFilesTable').on("click",'.files_remove',function(){
//                     $(this).parents("tr").remove();
//                     cnt_button--;
//                 });
                
//             $('#more_files').click(function(){
//                 if(cnt_button < max_button){
//                     $('#addFilesTable').append(
//                         '<tr> <td><input type="file" name="coachCV[]" accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" data-msg-accept="請上傳正確的檔案格式" />(檔案格式: doc, docx, pdf)</td><td><input type="button" class="btn btn-warning files_remove" value="刪除"/></td></td></tr>'
//                     );
//                     cnt_button++;
//                 }
//             });
            

//             //

//             $('#basicBack').click(function(){
//                 $('#declarationFormRow').show();
//                 $('#declarationForm').show();
//                 $('#BasicInformationFormRow').hide();
//                 $('#BasicInformationForm').hide();
//                 $('#declarationFormRow').animateCss('slideInRight');
//                 // $('#declarationForm').animateCss('slideInRight');
//             });

//             $('#teachBack').click(function(){
//                 $('#BasicInformationFormRow').show();
//                 $('#BasicInformationForm').show();
//                 $('#teachingInfoFormRow').hide();
//                 $('#teachingInfoForm').hide();
//                 $('#BasicInformationFormRow').animateCss('slideInRight');
                
//             });

//             $('#coachBack').click(function(){
//                 $('#teachingInfoFormRow').show();
//                 $('#teachingInfoForm').show();
//                 $('#coachCVFormRow').hide();
//                 $('#coachCVForm').hide();
//                 $('#teachingInfoFormRow').animateCss('slideInRight');
//             });

// //Marked
//             $('#fail').hide();
//             $('#success').hide();
//             // Declaration Form Validation
//             $("#declarationForm").submit(function(e) {
//                 e.preventDefault();
//             }).validate({
//                 rules : {
//                     'agreeDeclarationBox':{
//                         required: true,
//                     }
//                 },
//                 messages:{
//                     'agreeDeclarationBox':{
//                         required: "請細閱並同意私隱政策、使用條款及收費須知",
//                     }
//                 },
//                 errorPlacement: function(error, element) {
//                     if((element.attr('name') === 'agreeDeclarationBox')){
//                         error.insertAfter("#dcError");
//                     }
//                 },
//                 submitHandler: function (form) {
//                     $('#declarationFormRow').animateCss('slideOutRight', function(){
//                             $('#declarationFormRow').hide();
//                             $('#declarationForm').hide();
//                             $('#BasicInformationFormRow').show();
//                             $('#BasicInformationForm').show();
//                             $('#BasicInformationFormRow').animateCss('slideInLeft');
//                             // $('#BasicInformationForm').animateCss('slideInLeft');
//                         }
//                     );

//                     return false
//                 }
//             });
//             // Basic  Form Validation
//             $("#BasicInformationForm").submit(function(e) {
//                 e.preventDefault();
//             }).validate({
//                 rules : {
//                     'category[]':{
//                         required: true,
//                     },
//                     'extendCategory':{
//                         required:"input:checkbox[id=otherCField]:checked",
//                         // regex:"^[-'0-9A-Za-z \u4e00-\u9eff]{1,100}$"
//                     },
//                     'loginEmail':{
//                         email:true,
//                     },
//                     'loginPassword':{
//                         regex: "^(?=.*[A-Za-z])(?=.*?[0-9]).{8,16}$"
//                     },
//                     confirmPassword:{
//                         equalTo:"#loginPassword"
//                     },
//                     engName:{
//                         regex:"^[a-zA-Z ]*$",
//                         maxlength: 24,
//                         required:{
//                         depends: function(element){
//                             return $("#chinName").val()=='';
//                             }
//                         }
//                     },
//                     chinName:{
//                         regex:"^[\u4E00-\u9FA5]*$",
//                         maxlength:8,
//                         required:{
//                         depends: function(element){
//                              return $("#engName").val()=='';
//                             }
//                         }
//                     },
//                     username:{
//                         maxlength: 24
//                     },
//                     address:{
//                        wordsMax:['80']
//                     },
//                     district:{
//                         valueNotEquals:"default"
//                     },
//                     teleno:{
//                         regex:"^(?=.*?[0-9]).{8,}$"
//                     },
//                     classroomAddress:{
//                         required:"input:radio[id=canProvideClassroom]:checked",
//                     },
//                     birthday:{
//                         dateISO: true,
//                         daterange:["1800/01/01"]
//                     },
//                     HKID:{
//                          regex:"^([A-Z]{1})([0-9]{6})([A0-9])$"
//                     }

//                 },
//                 messages:{
//                     'category[]':{
//                         required: "必須選擇一項或以上",
//                     },
//                     'extendCategory':{
//                         required:"請填寫有關資料",
//                         // regex:"請輸入有效格式"
//                     },
//                     'loginEmail':{
//                         email:"請輸入有效的電子郵件"
//                     },
//                     loginPassword:{
//                         regex:"密碼須由英文字母及數字組合組成，長度為8 - 16"
//                     },
//                     confirmPassword:{
//                         equalTo:"與已填寫密碼不相同"
//                     },
//                     engName:{
//                         required:"請填寫中文或英文名字",
//                         regex:"請填寫有效英文名稱",
//                         maxlength: "請填寫最多24位有效英文名稱"
//                     },
//                     chinName:{
//                         required:"請填寫中文或英文名字",
//                         regex:"請填寫有效中文名稱",
//                         maxlength: "請填寫最多8位有效中文名稱"
//                     },
//                     teleno:{
//                         regex:"請填寫有效電話號碼"
//                     },
//                     username:{
//                        maxlength:"請輸入最長24位有效名稱"
//                     },
//                     address:{
//                        wordsMax: "請填寫最多80字有效地址"
//                     },
//                     district:{
//                         valueNotEquals:"請選擇有效地區"
//                     },
//                     gender:{
//                         mRequired:"必須選擇"
//                     },
//                     groupClass:{
//                         mRequired:"必須選擇"
//                     },
//                     provideClassroom:{
//                         mRequired:"必須選擇"
//                     },
//                     classroomAddress:{
//                         requried:"必須填寫"
//                     },
//                     birthday:{
//                         dateISO:"請填寫有效日期及留意格式(YYYY/MM/DD)"
//                     },
//                      HKID:{
//                         regex:"請輸入所有英文字母及數字，無須輸入括號。例如你的香港身份證號碼是 A123456(7)，則輸入A1234567",
//                     }

//                 },
//                 errorPlacement: function(error, element) {
//                     if((element.attr('name') === 'category[]')){
//                         error.appendTo("#categoryError");
//                     }
//                     else if ((element.attr('name') === 'extendCategory')){
//                         error.insertAfter(element);
//                     }
//                     else if ((element.attr('name') === 'gender')){
//                         error.appendTo(genderError)
//                     }
//                     else if ((element.attr('name') === 'groupClass')){
//                         error.appendTo(groupClassError)
//                     }
//                     else if ((element.attr('name') === 'provideClassroom')){
//                         error.appendTo(provideClassroomError)
//                     }
//                     else {
//                         error.insertAfter(element);
//                     }
//                 },
//                 submitHandler: function (form) {
//                     $('#BasicInformationFormRow').animateCss('slideOutRight', function(){
//                             $('#BasicInformationFormRow').hide();
//                             $('#BasicInformationForm').hide();
//                             $('#teachingInfoFormRow').show();
//                             $('#teachingInfoForm').show();
//                             $('#teachingInfoFormRow').animateCss('slideInLeft');
//                             // $('#teachingInfoForm').animateCss('slideInLeft');
//                         }
//                     );

//                     return false
//                 }
//             });

//             //TeachingInfoForm
//             $("#teachingInfoForm").submit(function(e) {
//                 e.preventDefault();
//             }).validate({
//                 rules:{
//                    "area[]":{
//                        required:true
//                    },
//                 },
//                 messages: {
//                    "area[]":{
//                        required:"必須從四個地區中選擇其中一項或以上"
//                    },
//                 },
//                 errorPlacement: function(error, element) {
//                     if((element.attr('name') === 'area[]')){
//                         error.appendTo("#areaError");
//                     }
//                     else{
//                         error.insertAfter(element);
//                     }
//                 },
//                 submitHandler: function (form) {
//                             $('#teachingInfoFormRow').hide();
//                             $('#teachingInfoForm').hide();
//                             $('#coachCVFormRow').show();
//                             $('#coachCVForm').show();
//                             $('#coachCVFormRow').animateCss('slideInLeft');
//                     return false
//                 }
//             });
//             $("#coachCVForm").submit(function(e) {
//                 e.preventDefault();
//             }).validate({
//                 rules:{
//                     coachIntroduction:{
//                         wordsMax:['300'],
                       
//                     },
//                     coachPhotos:{
//                         accept:"image/*",
//                         ImgWidth:true,
//                         ImgHeight:true
//                     },
//                     experienceSelection:{
//                         valueNotEquals:"default"
//                     },
//                     occupationSelection:{
//                         valueNotEquals:"default"
//                     },
//                     minHourlyWage:{
//                         digits:true,
//                     },
//                     idealHourlyWage:{
//                         digits:true,
//                     },
//                 },
//                 messages: {
//                      coachPhotos:{
//                         accept:"請上傳正確的檔案格式",
//                     },
//                     experienceSelection:{
//                         valueNotEquals:"請選擇相關項目"
//                     },
//                     occupationSelection:{
//                         valueNotEquals:"請選擇相關項目"
//                     },
//                     minHourlyWage:{
//                         digits:"請輸入有效時數"
//                     },
//                     idealHourlyWage:{
//                         digits:"請輸入有效時數"
//                     }
//                 },
//                 errorPlacement: function(error, element) {
//                     if((element.attr('name') === 'coachPhotos')){
//                         error.appendTo("#coachPhotosError");
//                     }
//                     error.insertAfter(element);
//                 },
//                 submitHandler: function (form) {
//                     $('#coachCVFormRow').hide();
//                     $('#coachCVForm').hide();
//                     var fd3 = document.getElementById('coachCVForm');
//                     var dataObject = new FormData(fd3);
//                     var fd1 = $('#BasicInformationForm').serializeArray();
//                     $.each(fd1,function(key,input){
//                         dataObject.append(input.name,input.value);
//                     });
//                     var fd2 = $('#teachingInfoForm').serializeArray();
//                     $.each(fd2,function(key,input){
//                         dataObject.append(input.name,input.value);
//                     });
//                     $.ajax({
//                         method     :"POST",
//                         url: $('#coachCVForm').attr( 'action' ),
//                         dataType : 'json',
//                         data     :dataObject,
//                         processData: false,  // tell jQuery not to process the data
//                         contentType: false,   // tell jQuery not to set contentType
//                         success  : function(data) {
//                             $('#success').show();
//                             $('#success').animateCss('slideInLeft');
//                         },
//                         error: function(err){
//                             if(err.responseJSON.errors.loginEmail){
//                                 $('#BasicInformationFormRow').show();
//                                 $('#BasicInformationForm').show();
//                                 $('#loginEmailError').html("電郵已被登記，請重新輸入");
//                                 $('#loginEmailError').show();
//                             }
//                             else{
//                                 $('#fail').show();
//                                 $('#fail').animateCss('slideInLeft');
//                             }                           
//                         }
//                      });
//                     return false;
//                 }
//             });

//         });

    </script>


@endsection