@extends('masters.admin_master')

@section('content')

<!--
    <script src = "{{ URL::to('formValidateLib/jquery.validate.js') }}"></script>
    <script src = "{{ URL::to('formValidateLib/additional-methods.js') }}"></script>
    <script src = "{{ URL::to('formValidateLib/localization/messages_zh_TW.min.js') }}"></script>
-->
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
            <h1 class="page-header"> Add New Subjects  </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_home') }}">後台首頁</a></li>
                <li class="breadcrumb-item"><a href="{{ route('list_category') }}">所有科目</a></li>
                <li class="breadcrumb-item"><a href="{{ route('view_category', $category_id) }}">檢視科目</a></li>
                <li class="breadcrumb-item active">新增科目</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
               <div class="panel-heading"> New Subject Form </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="addNewSubjectForm" method="post" action="{{route('create_subject',$category_id)}}" onsubmit="return validation()">
                                        <input type="button" class="btn btn-default" id="more_new_subject" value="Add More Field"/>

                                        <table id="addNewSubjectTable" style="width:100%">
                                        <tr>
                                            <th>Name</th>
                                            <th>Shown Name</th>
                                            <th></th>
                                        </tr>
                                        @if (!empty($validationError))
                                            @foreach ($dataArray as $data)
                                                <tr>
                                                    <td><input name="new_subject_name[]" type=text value="{!!data['new_subject_name']!!}"></td>
                                                    <td><input name="new_subject_name_chin[]" type=text value="{!!data['new_subject_name']!!}"></td>
                                                    <td> <input type="button" class="btn btn-warning new_subject_remove" value="Remove"/></td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td><input name="new_subject_name[]" type=text ></td>
                                                <td><input name="new_subject_name_chin[]" type=text></td>
                                                <td> <input type="button" class="btn btn-warning new_subject_remove" value="Remove"/></td>
                                            </tr>
                                        @endif
                                    </table>
    <!--                                <input type="hidden" name="category_id" value="{!!$category_id!!}"/>-->
                                    <input  type="submit" class="btn btn-primary" id="new_subject_save" value="Save"/>
                                    <br><label class="error"></label>
                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <input class="btn btn-warning" type="button" onclick="history.back()" value="Back">
        </div>
    </div>
    <script>
        
        $(document).ready(function(){
             $('#subjectViewTable').DataTable();
        });
        var c_name ="";
        var c_name_chin="";
        
         function validation(){ 
            var validation = true;
            // var nameFormatFilter = /^[a-zA-Z ]*$/i;
            // var nameChinFormatFilter = /^[\u4e00-\u9eff]*$/i;
            var name_required =true;
            var name_chin_required =true;
            // var name_format = true;
            // var name_chin_format = true;
            $('[name="new_subject_name[]"]').each( function(){
                console.log($(this).val());
                if ( !$(this).val() ){       
                    name_required = false;
                }
                // else if ($(this).val()&&!nameFormatFilter.test($(this).val())){
                //     name_format = false;
                // }    
            });
            
            $('[name="new_subject_name_chin[]"]').each( function(){
                if ( !$(this).val() ){                    
                    name_chin_required = false;
 
                }
                // else if ($(this).val()&&!nameChinFormatFilter.test($(this).val())){
                //     name_chin_format = false;
                // }    
            });
            
            if(!name_chin_format||!name_chin_required||!name_format||!name_required){
                validation=false;
                // if(!name_chin_format||!name_format){
                //     $('.error').html('Format Error');
                // }
                // else 
                if(!name_chin_required||!name_required){
                    $('.error').html('Text-field must be filled out');
                }
            }
            else{
                $('.error').html('');
            }
            
            return validation; 
        }
        
        $('#addNewSubjectTable').on("click",'.new_subject_remove',function(){
            $(this).parents("tr").remove();
        });

        $('#more_new_subject').click(function(){
            $('#addNewSubjectTable').append(
                '<tr><td><input name="new_subject_name[]" type=text></td><td><input name="new_subject_name_chin[]" type=text></td><td> <input type="button" class="btn btn-warning new_subject_remove" value="Remove"/></td></tr>'
            );
        })
        
    </script>

	
@endsection