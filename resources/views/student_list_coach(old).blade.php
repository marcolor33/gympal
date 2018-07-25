@extends('masters.student_home_master')

@section('content')
	<link rel="stylesheet" href=" {{ URL::to('vendor/datatables-plugins/dataTables.bootstrap.css') }} ">
	<link rel="stylesheet" href=" {{ URL::to('vendor/datatables-responsive/dataTables.responsive.css') }} ">

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"> Public Coach List </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('student_home') }}">學生首頁</a></li>
                <li class="breadcrumb-item active">現有教練</li>
            </ol>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Coach List
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
                        <div class="panel-group" id="accordion">
                                    <p><b>???????</b></p>
                                    <div id="categoryList">
                                     @foreach ($categories as $category)
                                        <div class="panel panel-default categoryMenu">
                                            <div class="panel-heading panel-collapse-clickable" data-toggle="collapse" data-parent="#accordion" href="#collapse{!!$category->category_id!!}">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse{!!$category->category_id!!}" >{!!$category->name_chin!!}</a>
                                                    <span class="pull-right panel-collapse-clickable" data-toggle="collapse" data-parent="#accordion" href="#filterPanel">
                                                        <span class="fa arrow"></span>
                                                    </span>
                                                </h4>
                                            </div>
                                            <!--<input type="radio" name="categoryTitle" value="{!! $category->name_chin !!}"/><b>{!!$category->name_chin!!}</b> -->
                                            <?php $cnt = 0; ?>
                                            <div id="collapse{!!$category->category_id!!}" class="panel-collapse collapse categorySubTitle defaultHidden">
                                                <div class="panel-body">
                                                @foreach ($categoriesTable as $subcategory)
                                                    @if( $category->category_id === $subcategory->category_id)
                                                        @if ($cnt %3 ==0)
                                                            &nbsp
                                                        @endif
                                                        <?php $cnt++ ?>
                                                       <input type="radio" class="category" id="{!! $subcategory->subject_id !!}" name="category[]" value="{!! $subcategory->subject_id !!}"/> {!! $subcategory->subject_chin !!}
                                                        @if ($cnt %3 ==0)
                                                            <br>
                                                        @endif
                                                    @endif
                                                @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
<!--
                                    @foreach ($categories as $category)
                                        <p>{!! $category->name_chin !!} </p>
                                        @foreach ($categoriesTable as $subcategory)
                                            @if( $category->category_id === $subcategory->category_id)
                                               <input class="must" type="radio" name="caseCategory" value="{!! $subcategory->subject_id !!}"/> {!! $subcategory->subject_chin !!} <br>                            
                                            @endif
                                        @endforeach
                                    @endforeach
-->
                                     </div>
                        </div>
                        
                    
                    
					<table id="mytable" width="100%" class="table table-striped table-bordered table-hover">
						<thead><tr><th>chin_name</th><th>chin_name</th><th>subjects</th><th>subject_id</th><th>action</th></tr></thead>
						<tbody>
						@foreach ($coachs as $coach)

							<tr><td> {!!$coach->chin_name !!}</td><td> {!!$coach->eng_name !!}</td><td> {!!$coach->subjects !!}</td><td> {!!$coach->subject_id !!}</td>
								<td><a class="btn btn-default" href="{{route('student_view_coach',$coach->account_id)}}">view</a></td></tr>

						@endforeach
						</tbody>
					</table>
					<!-- /.table-responsive -->
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>

<script>

    var filter;
    
    $.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
    
        
        var temp = data[3].split(","); // use data for the age column
 
        if (temp.indexOf(filter) >= 0 || filter =='')
            {   
                return true; 
            }
        else return false;
    
    }
);
    

    
	$(document).ready(function(){
        
    @if($filter)
        filter = '{!! $filter !!}';
        
    @else
        
        filter = '';
    @endif
    
    
    var table = $('#mytable').DataTable({
        "columnDefs": [
            {
                "targets": [ 3 ],
                "visible": false
            },
         
        ]
    } );

        
    $('.category').click(function(){
        filter = this.id;
        table.draw();
    });


});

	
		
</script>
	

@endsection
