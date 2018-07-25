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
            <h1 class="page-header"> District  </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_home') }}">後台首頁</a></li>
                <li class="breadcrumb-item"><a href="{{ route('list_district') }}">所有地區</a></li>
                <li class="breadcrumb-item active">檢視地區</li>
            </ol>
        </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
           <div class="panel-heading"> District Information </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="editDistrictForm" action="edit_district/{!!$districtInfo->district_id!!}">
                                <table id="districtViewTable" style="width:100%">
                                    <tr>
                                        <td>ID</td>
                                        <td>{!!$districtInfo->district_id!!}</td>
                                    </tr>
                                     <tr>
                                        <td>Name</td>
                                        <td><input name="district_name" id="district_name" class="district_field form-control" type="text" value="{!!$districtInfo->name!!}" disabled/></td>
                                    </tr>
                                    <tr>
                                        <td>Shown Name</td>
                                        <td><input name="district_name_chin" id="district_name_chin" class="district_field form-control" type="text" value="{!!$districtInfo->name_chin!!}" disabled/></td>
                                    </tr>
                                    <tr>
                                        <td>Region</td>
                                        <td> <select class="district_field form-control" name="district_region" id="district_region" disabled>
                                        <option value="HK">香港</option>
                                        <option value="NT">新界</option>
                                        <option value="KN">九龍</option>
                                        <option value="Other">其它</option>
                                    </select></td>
                                    </tr>

                                </table>
                                <input type="button" class="btn btn-default" id="district_edit" value="Edit"/>
                                <input class="defaultHidden" type="submit" id="district_save" value="Save"/>
                                <input class="defaultHidden" type="button" id="district_cancel" value="Cancel"/>
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

    
    <input type="button" class="btn btn-warning" onclick='javascript:location.href="{{route('list_district')}}"' value="Back"/>
    <script>
        $.validator.addMethod("regex",
            function(value, element, regexp) {
                var re = new RegExp(regexp);
                return this.optional(element) || re.test(value);}
            ,"格式錯誤");
        
        $(document).ready(function(){
            
            $("#district_region option[value={!!$districtInfo->region!!}]").prop("selected",true); 

            
            $("#editDistrictForm").validate({
                rules : {
                    district_name:{
                        required: true,
                        //regex:"^[a-zA-Z0-9 ]*$"
                    },
                    district_name_chin:{
                        required: true,
                        //regex:"^[0-9\u4e00-\u9eff ]*$"
                    }
                        
                },
                messages:{
                    district_name:{
                        required: "Please fill the blank",
                        regex:"Invalid Formart"
                    },
                    district_name_chin:{
                        required: "Please fill the blank",
                        regex:"Invalid Formart"
                    }
                },
                errorPlacement: function(error, element) {
                     error.insertAfter(element);
                },
                submitHandler: function (form) {
                    $.ajax({
                        method     :"POST",
                        url: $('#editDistrictForm').attr( 'action' ),
                        data     : $('#editDistrictForm').serialize().replace(/%5B%5D/g, '[]'),
                        success  : function(data) {
                            console.log("success ajax request!");
                            console.log(data);
                            alert("Submitted!");
                            $('#district_edit').show();
                            $('#district_save').hide();
                            $('#district_cancel').hide();
                            $('.district_field').prop('disabled',true);
                        },
//                        error: function(err){
//                            alert("Opps! Operation Fail [ Error 422 ].");

//                        }
                    });
                }
            });
        });
        var d_name ="";
        var d_name_chin="";
        var d_region=""
        $('#district_edit').click(function(){
            $(this).hide();
            $('#district_save').show();
            $('#district_cancel').show();
            $('.district_field').prop('disabled',false);
            d_name=$('#district_name').val();
            d_name_chin=$('#district_name_chin').val();
            d_region=$('#district_region').val();
        });
        
        $('#district_cancel').click(function(){
            $(this).hide();
            $('#district_save').hide();
            $('#district_edit').show();
            $('.district_field').prop('disabled',true);
            $('#district_name').val(d_name);
            $('#district_name_chin').val(d_name_chin);
            $('#district_region option[value="' + d_region +'"]').prop("selected", true);
        });
        
        
    </script>

	
@endsection