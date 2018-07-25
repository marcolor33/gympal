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
    <!--<h1> Category List</h1>-->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> 所有運動類別 </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_home') }}">後台首頁</a></li>
                <li class="breadcrumb-item active">所有運動類別</li>
            </ol>
        </div>
    </div>

    <!--
<html>
    <table id="categoryTable">
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
                @foreach ($categories as $category)
            <tr>
                <td><input class="category_checkbox" type="checkbox" name="category_box[]" value="{!!$category->category_id !!}"/></td>
                <td>{!!$category->category_id !!}</td>
                <td>{!!$category->name !!}       </td>
                <td>{!!$category->name_chin!!}   </td>
                <td>
                    <a class="option" href="category/{!!$category->category_id!!}">Edit</a> 
                    <a class="option" onclick="delete_category( {!!$category->category_id!!},'{!!$category->name!!}')">Delete</a>
                    
                </td>
            </tr>
                @endforeach
        </tbody>
    </table>
        <a href="add_category" class="option">Add New Category</a><br>
        <input type="checkbox" id="select_all" name="select_all"/>&nbsp Select All &nbsp
        <span><b>&nbsp Action of Selected box: &nbsp</b></span>
        -->
        <!--&nbsp<a class="option">Edit&nbsp</a>&nbsp-->
        <!--
        &nbsp<a id="delete_selected" class="option">Delete</a>&nbsp
        <input id="token" type="hidden" name="_token" value="{{ Session::token() }}">
</html>
        -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Category List
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table id="categoryTable" width="100%" class="table table-striped table-bordered table-hover">
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
                        @foreach ($categories as $category)
                            <tr>
                                <td><input class="category_checkbox" type="checkbox" name="category_box[]" value="{!!$category->category_id !!}"/></td>
                                <td>{!!$category->category_id !!}</td>
                                <td>{!!$category->name !!}       </td>
                                <td>{!!$category->name_chin!!}   </td>
                                <td>
                                    <a class="btn btn-default option" href="{{route('view_category',$category->category_id)}}">Edit</a>
                                    <a class="btn btn-danger option" onclick="delete_category( {!!$category->category_id!!},'{!!$category->name!!}' , '{{route('delete_category',$category->category_id)}}')">Delete</a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                    <a href="{{route('add_category')}}" class="btn btn-primary option">Add New Category</a><br>
                    <input type="checkbox" id="select_all" name="select_all"/>&nbsp Select All &nbsp
                    <span><b>&nbsp Action of Selected box: &nbsp</b></span>
                    <!--&nbsp<a class="option">Edit&nbsp</a>&nbsp-->
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
        $('#categoryTable').DataTable();
    });
    $('#select_all').click(function(){
       $('.category_checkbox').prop( "checked" ,  $(this).prop("checked") ); 
    });
    function delete_category(category_id,category_name,path){
        if (confirm("Are you sure deleting category\n[ ID:" +category_id+" Name:"+category_name+"]? The subjects under this category will be deleted.") == true){
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
        if($(".category_checkbox:checked").length >0 && confirm("Are you sure deleting selected categories?\nThe subjects under this category will be deleted.") == true){
           $(".category_checkbox:checked").each(function(){
               console.log($(this).val());
               checkedBox.push($(this).val());
            });
            
            post("{{route('delete_categories')}}",{'checked_box':checkedBox,'_token':tokenVal});
       }
    });
</script>
	

@endsection
