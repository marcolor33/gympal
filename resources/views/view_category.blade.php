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
            <h1 class="page-header"> Category and Subject  </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_home') }}">後台首頁</a></li>
                <li class="breadcrumb-item"><a href="{{ route('list_category') }}">所有科目</a></li>
                <li class="breadcrumb-item active">檢視科目</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
               <div class="panel-heading"> Category Information </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="editCategoryForm" action="edit_category/{!!$categoryInfo->category_id!!}">
                                    <table style="width:100%">
                                        <tr>
                                            <td>ID</td>
                                            <td><input  name="category_id" id="category_id" class="form-control" type="text" value="{!!$categoryInfo->category_id!!}" disabled></td>
                                        </tr>
                                        <tr>
                                            <td>Name</td>
                                            <td><input name="category_name" id="category_name" class="category_field form-control" type="text" value="{!!$categoryInfo->name!!}" disabled/></td>
                                        </tr>
                                        <tr>
                                            <td>Shown Name</td>
                                            <td><input name="category_name_chin" id="category_name_chin" class="category_field form-control" type="text" value="{!!$categoryInfo->name_chin!!}" disabled/></td>
                                        </tr>

                                    </table>

                                    <input class="btn btn-default" type="button" id="category_edit" value="Edit" />
                                    <input class="btn btn-primary defaultHidden" type="submit" id="category_save" value="Save"/>
                                    <input type="button" class="btn btn-warning defaultHidden" id="category_cancel" value="Cancel"/>
                                    <input type="hidden" id="token" name="_token" value="{{ Session::token() }}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
               <div class="panel-heading"> Subject Information </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                  <table id="categoryViewTable" width="100%" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Shown Name</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach ($subjectList as $subject)
                                        <tr>
                                            <td><input class="subject_checkbox" type="checkbox" name="subject_box[]" value="{!!$subject->subject_id !!}"/></td>
                                            <td>{!!$subject->subject_id !!}</td>
                                            <td>{!!$subject->name !!}       </td>
                                            <td>{!!$subject->name_chin!!}   </td>
                                            <td>
                                                <a class="btn btn-default option" href="{{route('view_subject',$subject->subject_id)}}">Edit</a>
                                                <a class="btn btn-danger option" onclick="delete_subject( {!!$subject->subject_id!!},'{!!$subject->name!!}','{{route('delete_subject',$subject->subject_id)}}')">Delete</a>
                                            </td>
                                        </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                                    <a href="{{route('add_subject',$categoryInfo->category_id)}}" class="btn btn-primary option">Add New Subject</a><br>
                                    <input type="checkbox" id="select_all" name="select_all"/>&nbsp Select All &nbsp
                                    <span><b>&nbsp Action of Selected box: &nbsp</b></span>
                            <!--        &nbsp<a class="option">Edit&nbsp</a>&nbsp-->
                                    &nbsp<a class="btn btn-danger" id="delete_selected" class="option">Delete</a>&nbsp
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <input class="btn btn-primary" id="back_button" type="button" value="Back">
        </div>
    </div>
    <!--<input class="btn btn-primary" id="back_button" type="button" value="Back">-->
    <script>
         $.validator.addMethod("regex",
            function(value, element, regexp) {
                var re = new RegExp(regexp);
                return this.optional(element) || re.test(value);}
            ,"格式錯誤");
        
        $(document).ready(function(){
            
             $('#categoryViewTable').DataTable();
            $("#editCategoryForm").validate({
                rules : {
                    category_name:{
                        required: true,
                        // regex:"^[a-zA-Z ]*$"
                    },
                    category_name_chin:{
                        required: true,
                        // regex:"^[\u4e00-\u9eff]*$"
                    }
                        
                },
                messages:{
                    category_name:{
                        required: "Please fill the blank",
                        // regex:"Invalid Formart"
                    },
                    category_name_chin:{
                        required: "Please fill the blank",
                        // regex:"Invalid Formart"
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
                            url: $('#editCategoryForm').attr( 'action' ),
                            data     : $('#editCategoryForm').serialize().replace(/%5B%5D/g, '[]')+"&category_id="+$('#category_id').val(),
                            success  : function(data) {
                                console.log("success ajax request!");
                                console.log(data);
                                alert("Submitted!");
                                $('#category_edit').show();
                                $('#category_save').hide();
                                $('#category_cancel').hide();
                                $('.category_field').prop('disabled',true);
                            }
                        });
                    return false
                }
            });
        });
        var c_name ="";
        var c_name_chin="";
        $('#category_edit').click(function(){
            $(this).hide();
            $('#category_save').show();
            $('#category_cancel').show();
            $('.category_field').prop('disabled',false);
            c_name=$('#category_name').val();
            c_name_chin=$('#category_name_chin').val();
        });
        
//        $('#category_save').click(function(){
//            //Testing : Using ajex method
//             $.ajax({
//                method     :"POST",
//                url: $('#editCategoryForm').attr( 'action' ),
//                data     : $('#editCategoryForm').serialize().replace(/%5B%5D/g, '[]')+"&category_id="+$('#category_id').val(),
//                success  : function(data) {
//                    console.log("success ajax request!");
//                    console.log(data);
//                    alert("Submitted!");
//                    $('#category_edit').show();
//                    $('#category_save').hide();
//                    $('#category_cancel').hide();
//                    $('.category_field').prop('disabled',true);
//                }
//            });
//        });
        
        $('#category_cancel').click(function(){
            $(this).hide();
            $('#category_save').hide();
            $('#category_edit').show();
            $('.category_field').prop('disabled',true);
            $('#category_name').val(c_name);
            $('#category_name_chin').val(c_name_chin);
        });
        
        $('#back_button').click(function(){
            console.log(window.location.href);
            //some problem with back button!
            window.location.href = "{{route('list_category')}}";
        })
        
        $('#select_all').click(function(){
            $('.subject_checkbox').prop( "checked" ,  $(this).prop("checked") ); 
        });
         function delete_subject(subject_id,subject_name,path){
            if (confirm("Are you sure deleting subject\n[ ID:" +subject_id+" Name:"+subject_name+"]?") == true){
                window.location.href = path;	
		  }
        }
        function post(path, parameters) {
            var form = $('<form></form>');

            form.attr("method", "post");
            form.attr("action", path);

            $.each(parameters, function(key, value) {
                if ( typeof value == 'object' || typeof value == 'array' ){
                    $.each(value, function(subkey, subvalue) {
                        var field = $('<input />');
                        field.attr("type", "hidden");
                        field.attr("name", key+'[]');
                        field.attr("value", subvalue);
                        form.append(field);
                    });
                } else {
                    var field = $('<input />');
                    field.attr("type", "hidden");
                    field.attr("name", key);
                    field.attr("value", value);
                    form.append(field);
                }
            });
            $(document.body).append(form);
            form.submit();
        }

        $('#delete_selected').click(function(){
            var checkedBox = [];
            var tokenVal = $('#token').val();
            if($(".subject_checkbox:checked").length >0 && confirm("Are you sure deleting selected subjects?") == true){
               $(".subject_checkbox:checked").each(function(){
                   console.log($(this).val());
                   checkedBox.push($(this).val());
                });
//                var redirect_url= $('#category_id').val()+'/delete_subjects'
                var redirect_url="{{route('delete_subjects')}}"
                post(redirect_url,{'checked_box':checkedBox,'_token':tokenVal});
           }
        });
    </script>

	
@endsection