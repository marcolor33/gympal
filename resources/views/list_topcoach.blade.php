@extends('masters.admin_master')

@section('content')
	<link rel="stylesheet" href=" {{ URL::to('vendor/datatables-plugins/dataTables.bootstrap.css') }} ">
	<link rel="stylesheet" href=" {{ URL::to('vendor/datatables-responsive/dataTables.responsive.css') }} ">

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"> 所有Top教練 </h1>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('home') }}">後台首頁</a></li>
				<li class="breadcrumb-item active">所有top教練</li>
			</ol>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Top Coach List
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<table id="mytable" width="100%" class="table table-striped table-bordered table-hover">
                        <thead><tr><th>Rank</th><th>登記日期</th><th>教練ID</th><th>教練電郵</th><th>中文姓名</th><th>英文姓名</th><th>性別 </th><th>Action</th></tr></thead>
						<tbody>
                            
                         @php $rank =0;  @endphp
						@foreach ($coachs as $coach)
                            @php $rank++;  @endphp
                            <tr>
                                <td>{!! $rank !!}</td>
                                <td>{!! explode(' ',$coach->time_created)[0] !!}</td>
                                <td>{!!$coach->account_code !!}</td>
                                <td>{!!$coach->email !!}</td>
                                <td> {!!$coach->chin_name !!}</td>
                                <td> {!!$coach->eng_name !!}</td>
                                <td>{!!$coach->sex !!}</td>
								<td><a class="btn btn-default" href= "{!! route('public_view_coach',$coach->account_id) !!}">view</a> 
                                    
                                    <a class="btn btn-primary" onclick="move_topcoach('{!! route('up_topcoach',$coach->account_id) !!}')">up</a>
                                    <a class="btn btn-primary" onclick="move_topcoach('{!! route('down_topcoach',$coach->account_id) !!}')">down</a>
   
                                    
                                    <a class="btn btn-danger" onclick="untop_coach({!! $coach->account_id!!},'{!! $coach->username!!}','{!! route('top_coach',$coach->account_id) !!}')">untop coach</a></td></tr>

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
    $('#mytable').DataTable({
        
        
        "bSort": false
    });


});

	function untop_coach(account_id,username,url){

		if (confirm("are you sure remove this top coach [" + username + "] ?") == true){
            
            
            $.ajax({
                        method     :"POST",
                        url: url,
                        data: { 
                            _token :"{{ Session::token()}}"
                        },
                        success  : function(data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true)
                                {
                                    alert('top coach removed');
                                    window.location.reload(); 
                                }
                                                    
                            else
                                alert('failed to remove!');
                        }
            });
		
			
		}
	}
    
    function move_topcoach(url)
    {
        
              $.ajax({
                        method     :"POST",
                        url: url,
                        data: { 
                            _token :"{{ Session::token()}}"
                        },
                        success  : function(data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true)
                                {
                                    alert('top coach move');
                                    window.location.reload(); 
                                }
                                                    
                            else
                                alert('failed to move!');
                        }
            });
        
    }
    

       
    
    
     


</script>
	

@endsection
