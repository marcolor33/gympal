@extends('masters.admin_master')

@section('content')

    <script src = "{{ URL::to('formValidateLib/jquery.validate.js') }}"></script>
    <script src = "{{ URL::to('formValidateLib/additional-methods.js') }}"></script>
    <script src = "{{ URL::to('formValidateLib/localization/messages_zh_TW.min.js') }}"></script>
    <link rel="stylesheet" href=" {{ URL::to('formValidateLib/animate.min.css') }} ">


<style>
        label.error{
            color: #f33;
            padding: 0;
            margin: 2px 0 0 0;
            font-size: 0.7em;
        }
        .option{
            cursor:pointer
        }
        .defaultHidden{
            display:none;
        }
</style>
<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> Subject  </h1>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="panel panel-default">
           <div class="panel-heading"> Subject Information </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="editSubjectForm" action="edit_subject/{!!$subjectList->subject_id!!}">
                                <table style="width:100%">
                                    <tr>
                                        <td>ID</td>
                                        <td>{!!$subjectList->subject_id!!}</td>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td><input name="subject_name" id="subject_name" class="subject_field form-control" type="text" value="{!!$subjectList->name!!}" disabled/></td>
                                    </tr>
                                    <tr>
                                        <td>Shown Name</td>
                                        <td><input name="subject_name_chin" id="subject_name_chin" class="subject_field form-control" type="text" value="{!!$subjectList->name_chin!!}" disabled/></td>
                                    </tr>

                                </table>

                                <input type="button" id="subject_edit" value="Edit"/>
                                <input class="defaultHidden" type="submit" id="subject_save" value="Save"/>
                                <input class="defaultHidden" type="button" id="subject_cancel" value="Cancel"/>
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    
    <input type="button" onclick="history.back()" value="Back">
    <script>
        $.validator.addMethod("regex",
            function(value, element, regexp) {
                var re = new RegExp(regexp);
                return this.optional(element) || re.test(value);}
            ,"格式錯誤");
        
        $(document).ready(function(){
//             $('#subjectViewTable').DataTable();
            $("#editSubjectForm").validate({
                rules : {
                    subject_name:{
                        required: true,
                        regex:"^[a-zA-Z ]*$"
                    },
                    subject_name_chin:{
                        required: true,
                        regex:"^[\u4e00-\u9eff]*$"
                    }
                        
                },
                messages:{
                    subject_name:{
                        required: "Please fill the blank",
                        regex:"Invalid Formart"
                    },
                    subject_name_chin:{
                        required: "Please fill the blank",
                        regex:"Invalid Formart"
                    }
                },
                errorPlacement: function(error, element) {
                    console.log("error!");
                     error.insertAfter(element);
                },
                submitHandler: function (form) {
                    console.log("sumbit!");
                    $.ajax({
                        method     :"POST",
                        url: $('#editSubjectForm').attr( 'action' ),
                        data     : $('#editSubjectForm').serialize().replace(/%5B%5D/g, '[]'),
                        success  : function(data) {
                            console.log("success ajax request!");
                            console.log(data);
                            alert("Submitted!");
                            $('#subject_edit').show();
                            $('#subject_save').hide();
                            $('#subject_cancel').hide();
                            $('.subject_field').prop('disabled',true);
                        },
                        error: function(err){
                            alert("Opps! Operation Fail [ Error 422 ].");
                        }
                    });
                }
            });
        });
        var c_name ="";
        var c_name_chin="";
        $('#subject_edit').click(function(){
            $(this).hide();
            $('#subject_save').show();
            $('#subject_cancel').show();
            $('.subject_field').prop('disabled',false);
            c_name=$('#subject_name').val();
            c_name_chin=$('#subject_name_chin').val();
        });
        
//         $('#subject_save').click(function(){
//            //Testing : Using ajex method
//             $.ajax({
//                method     :"POST",
//                url: $('#editSubjectForm').attr( 'action' ),
//                data     : $('#editSubjectForm').serialize().replace(/%5B%5D/g, '[]'),
//                success  : function(data) {
//                    console.log("success ajax request!");
//                    console.log(data);
//                    alert("Submitted!");
//                    $('#subject_edit').show();
//                    $('#subject_save').hide();
//                    $('#subject_cancel').hide();
//                    $('.subject_field').prop('disabled',true);
//                }
//            });
//        });
        
        $('#subject_cancel').click(function(){
            $(this).hide();
            $('#subject_save').hide();
            $('#subject_edit').show();
            $('.subject_field').prop('disabled',true);
            $('#subject_name').val(c_name);
            $('#subject_name_chin').val(c_name_chin);
        });
        $('#select_all').click(function(){
            $('.subject_checkbox').prop( "checked" ,  $(this).prop("checked") ); 
        });
         function delete_subject(subject_id,subject_name){
            if (confirm("Are you sure deleting subject\n[ ID:" +subject_id+" Name:"+subject_name+"]?") == true){
                window.location.href = "delete_subject/" + subject_id;	
		  }
        
        
        }
    </script>

	
@endsection