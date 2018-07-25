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
            <h1 class="page-header"> Add New Categories  </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_home') }}">後台首頁</a></li>
                <li class="breadcrumb-item"><a href="{{ route('list_category') }}">所有科目</a></li>
                <li class="breadcrumb-item active">新增科目</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
               <div class="panel-heading"> New Category Form </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="addNewCategoryForm" method="post" action="{{route('create_category')}}" onsubmit="return validation()">
                                        <input class="btn btn-default" type="button" id="more_new_category" value="Add More Field"/>

                                        <table id="addNewCategoryTable" style="width:100%">
                                        <tr>
                                            <th>Name</th>
                                            <th>Shown Name</th>
                                            <th></th>
                                        </tr>
                                        @if (!empty($validationError))
                                            @foreach ($dataArray as $data)
                                                <tr>
                                                    <td><input name="new_category_name[]" type=text value="{!!data['new_category_name']!!}"></td>
                                                    <td><input name="new_category_name_chin[]" type=text value="{!!data['new_category_name']!!}"></td>
                                                    <td> <input type="button" class="btn btn-warning new_category_remove" value="Remove"/></td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td><input name="new_category_name[]" type=text ></td>
                                                <td><input name="new_category_name_chin[]" type=text></td>
                                                <td> <input type="button" class="btn btn-warning new_category_remove" value="Remove"/></td>
                                            </tr>
                                        @endif
                                    </table>
                                    <input class="btn btn-primary" type="submit" id="new_category_save" value="Save"/>
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
        var max_button = 10;
        var cnt_button=0;
        
        function validation(){ 
            var validation = true;
            // var nameFormatFilter = /^[a-zA-Z ]*$/i;
            // var nameChinFormatFilter = /^[\u4e00-\u9eff]*$/i;
            var name_required =true;
            var name_chin_required =true;
            // var name_format = true;
            // var name_chin_format = true;
            $('[name="new_category_name[]"]').each( function(){
                // console.log($(this).val());
                if ( !$(this).val() ){       
                    name_required = false;
                }
                // else if ($(this).val()&&!nameFormatFilter.test($(this).val())){
                //     name_format = false;
                // }    
            });
            
            $('[name="new_category_name_chin[]"]').each( function(){
                if ( !$(this).val() ){                    
                    name_chin_required = false;
 
                }
                // else if ($(this).val()&&!nameChinFormatFilter.test($(this).val())){
                //     name_chin_format = false;
                // }    
            });
            
            if(!name_chin_required||!name_required){
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



        
        $('#addNewCategoryTable').on("click",'.new_category_remove',function(){
            $(this).parents("tr").remove();
            cnt_button--;
        });

        $('#more_new_category').click(function(){
            if(cnt_button < max_button){
                $('#addNewCategoryTable').append(
                    '<tr><td><input name="new_category_name[]" type=text></td><td><input name="new_category_name_chin[]" type=text></td><td> <input type="button" class="btn btn-warning new_category_remove" value="Remove"/></td></tr>'
                );
                cnt_button++;
            }
        })
        
         function delete_subject(subject_id,subject_name){
            if (confirm("Are you sure deleting subject\n[ ID:" +subject_id+" Name:"+subject_name+"]?") == true){
                window.location.href = "delete_subject/" + subject_id;	
		  }
        
        
        }
    </script>

	
@endsection