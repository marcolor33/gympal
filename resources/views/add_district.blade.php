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
            <h1 class="page-header"> Add New Districts  </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_home') }}">後台首頁</a></li>
                <li class="breadcrumb-item"><a href="{{ route('list_district') }}">所有地區</a></li>
                <li class="breadcrumb-item active">新增地區</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
               <div class="panel-heading"> New District Form </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="addNewDistrictForm" method="post" action="{{route('create_district')}}" onsubmit="return validation()">
                                        <input class="btn btn-default" type="button" id="more_new_district" value="Add More Field"/>

                                        <table id="addNewDistrictTable" style="width:100%">
                                        <tr>
                                            <th>Name</th>
                                            <th>Shown Name</th>
                                            <th>Region</th>
                                            <th></th>
                                        </tr>
                                        @if (!empty($validationError))
                                            @foreach ($dataArray as $data)
                                                <tr>
                                                    <td><input name="new_district_name[]" type=text value="{!!data['new_district_name']!!}"></td>
                                                    <td><input name="new_district_name_chin[]" type=text value="{!!data['new_district_name']!!}"></td>
                                                    <td><select class="district_field form-control" name="new_district_region[]" id="district_region" >
                                                        <option value="HK" selected>香港</option>
                                                        <option value="NT">新界</option>
                                                        <option value="KN">九龍</option>
                                                        <option value="Other">其它</option>
                                                    </select>
                                                    </td>
                                                    <td> <input type="button" class="btn btn-warning new_district_remove" value="Remove"/></td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td><input name="new_district_name[]" type=text ></td>
                                                <td><input name="new_district_name_chin[]" type=text></td>
                                                <td><select class="district_field form-control" name="new_district_region[]" id="district_region" >
                                                        <option value="HK" selected>香港</option>
                                                        <option value="NT">新界</option>
                                                        <option value="KN">九龍</option>
                                                        <option value="Other">其它</option>
                                                    </select>
                                                </td>
                                                <td> <input type="button" class="btn btn-warning new_district_remove" value="Remove"/></td>
                                            </tr>
                                        @endif
                                    </table>
                                    <input class="btn btn-primary" type="submit" id="new_district_save" value="Save"/>
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
        
        var max_button = 10;
        var cnt_button=0;
        
        function validation(){ 
            var validation = true;
            var name_required =true;
            var name_chin_required =true;
            $('[name="new_district_name[]"]').each( function(){
                console.log($(this).val());
                if ( !$(this).val() ){       
                    name_required = false;
                }
            });
            
            $('[name="new_district_name_chin[]"]').each( function(){
                if ( !$(this).val() ){                    
                    name_chin_required = false;
 
                }
            });
            
            if(!name_chin_required||!name_required){
                validation=false;
                if(!name_chin_required||!name_required){
                    $('.error').html('Text-field must be filled out');
                }
            }
            else{
                $('.error').html('');
            }
            
            return validation; 
        }



        
        $('#addNewDistrictTable').on("click",'.new_district_remove',function(){
            $(this).parents("tr").remove();
            cnt_button--;
        });

        $('#more_new_district').click(function(){
            if(cnt_button < max_button){
                $('#addNewDistrictTable').append(
                    '<tr><td><input name="new_district_name[]" type=text></td><td><input name="new_district_name_chin[]" type=text></td><td><select class="district_field form-control" name="new_district_region[]" id="district_region" ><option value="HK" selected>香港</option><option value="NT">新界</option><option value="KN">九龍</option><option value="Other">其它</option></select></td><td> <input type="button" class="btn btn-warning new_district_remove" value="Remove"/></td></tr>'
                );
                cnt_button++;
            }
        })

        
    </script>

	
@endsection