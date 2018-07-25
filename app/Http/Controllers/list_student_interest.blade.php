@extends('masters.admin_master')

@section('content')
	<link rel="stylesheet" href=" {{ URL::to('vendor/datatables-plugins/dataTables.bootstrap.css') }} ">
	<link rel="stylesheet" href=" {{ URL::to('vendor/datatables-responsive/dataTables.responsive.css') }} ">

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"> 所有正待配對 </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_home') }}">後台首頁</a></li>
                <li class="breadcrumb-item active">所有正待配對</li>
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
					<table id="mytable" width="100%" class="table table-striped table-bordered table-hover">
                        <thead><tr><th>配對日期</th><th>學生ID</th><th>學生電郵</th><th>教練ID</th><th>教練電郵</th><th>中文姓名</th><th>英文姓名</th><th>性別</th><th>Status</th><th>Action</th></tr></thead>
						<tbody>
						@foreach ($interests as $interest)

                            <tr>
                                <td>date</td>
                                <td><a href="{!! route('view_student',$interest->student_id )!!}">{!! $interest->student_code !!}</a></td>
                                <td><a href="{!! route('view_student',$interest->student_id )!!}">{!! $interest->student_email !!}</a></td>
                                <td><a href="{!! route('view_coach',$interest->coach_id) !!}">{!! $interest->coach_code !!}</a></td>
                                <td><a href="{!! route('view_coach',$interest->coach_id) !!}">{!! $interest->coach_email !!}</a></td>
                                <td><a href="{!! route('view_coach',$interest->coach_id) !!}">{!! $interest->coach_name_chin !!}</a></td>
                                <td><a href="{!! route('view_coach',$interest->coach_id) !!}">{!! $interest->coach_name_eng !!}</a></td>
                                <td>{!! $interest->coach_sex !!}</td>
                                <td>{!! $interest->status !!}</td>
                                <td><a class="btn btn-primary "onclick="change_status({!! $interest->student_id !!},{!! $interest->coach_id !!},'{!! $interest->status !!}');">set seen/new</a><a class="btn btn-danger"onclick="delete_interest({!! $interest->student_id !!},{!! $interest->coach_id !!});">delete</a></td></tr>

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
	$(document).ready(function(){
    $('#mytable').DataTable();


});
    
    	function delete_interest(student_id,coach_id,status){


			if (confirm("are you sure to delete?") == true){
				   $.ajax({
                        method     :"POST",
                        url: "{!! route('student_interest_delete') !!}",
                        data : {
                            "_token" : "{{ Session::token() }}",
                            "coach_id" : coach_id,
                            "student_id" : student_id,
                        },
                        success  : function(data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true)
                                {
                                    alert('Interest deleted!');
                                    window.location.reload(); 
                                }
                                                    
                            else
                                alert('failed to cancell!');
                        }
                     });
                
                
			}	



	}



	function change_status(student_id,coach_id,status){

		if (status == 'new')

		{
			if (confirm("are you sure to set seen?") == true){
				   $.ajax({
                        method     :"POST",
                        url: "{!! route('student_interest_seen') !!}",
                        data : {
                            "_token" : "{{ Session::token() }}",
                            "coach_id" : coach_id,
                            "student_id" : student_id,
                        },
                        success  : function(data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true)
                                {
                                    alert('Interest cancelled!');
                                    window.location.reload(); 
                                }
                                                    
                            else
                                alert('failed to cancell!');
                        }
                     });
                
                
			}	
		}

		else

		{
            
            
			if (confirm("are you sure to set new?") == true){
				   $.ajax({
                        method     :"POST",
                        url: "{!! route('student_interest_new') !!}",
                        data : {
                            "_token" : "{{ Session::token() }}",
                            "coach_id" : coach_id,
                            "student_id" : student_id,
                        },
                        success  : function(data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true)
                                {
                                    alert('Interest cancelled!');
                                    window.location.reload(); 
                                }
                                                    
                            else
                                alert('failed to cancell!');
                        }
                     });
                
                
			}	
		}
		
		

		



	}


</script>
	

@endsection
