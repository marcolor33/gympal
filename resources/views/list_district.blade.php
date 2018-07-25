@extends('masters.admin_master')

@section('content')
    <link rel="stylesheet" href=" {{ URL::to('vendor/datatables-plugins/dataTables.bootstrap.css') }} ">
    <link rel="stylesheet" href=" {{ URL::to('vendor/datatables-responsive/dataTables.responsive.css') }} ">
<style>
        .option{
            cursor:pointer
        }
        .defaultHidden{
            display:none;
        }
</style>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> 所有地區 </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_home') }}">後台首頁</a></li>
                <li class="breadcrumb-item active">所有地區</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    District List
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table id="districtTable    " width="100%" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th></th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Shown Name</th>
                            <th>Region</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($districts as $district)
                            <tr>
                                <td><input class="district_checkbox" type="checkbox" name="district_box[]" value="{!!$district->district_id !!}"/></td>
                                <td>{!!$district->district_id !!}</td>
                                <td>{!!$district->name !!}       </td>
                                <td>{!!$district->name_chin!!}   </td>
                                <td>
                                    <a class="btn btn-default option" href="{{route('view_district',$district->district_id)}}">Edit</a>
                                    <a class="btn btn-danger option" onclick="delete_district( {!!$district->district_id!!},'{!!$district->name!!}' , '{{route('delete_district',$district->district_id)}}')">Delete</a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                    <a href="{{route('add_district')}}" class="btn btn-primary option">Add New District</a><br>
                    <input type="checkbox" id="select_all" name="select_all"/>&nbsp Select All &nbsp
                    <span><b>&nbsp Action of Selected box: &nbsp</b></span>
                    &nbsp<a id="delete_selected" class="btn btn-danger option">Delete</a>&nbsp
                    <input id="token" type="hidden" name="_token" value="{{ Session::token() }}">
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>

<script>
	$(document).ready(function(){
        $('#districtTable').DataTable();
    });
    $('#select_all').click(function(){
       $('.district_checkbox').prop( "checked" ,  $(this).prop("checked") ); 
    });
    function delete_district(district_id,district_name,path){
        if (confirm("Are you sure deleting district\n[ ID:" +district_id+" Name:"+district_name+"]? The subjects under this district will be deleted.") == true){
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
        if($(".district_checkbox:checked").length >0 && confirm("Are you sure deleting selected districts?\nThe subjects under this district will be deleted.") == true){
           $(".district_checkbox:checked").each(function(){
               console.log($(this).val());
               checkedBox.push($(this).val());
            });
            
            post("{{route('delete_districts')}}",{'checked_box':checkedBox,'_token':tokenVal});
       }
    });
</script>
	

@endsection
