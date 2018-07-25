@extends('masters.admin_master')

@section('content')
	<link rel="stylesheet" href=" {{ URL::to('vendor/datatables-plugins/dataTables.bootstrap.css') }} ">
	<link rel="stylesheet" href=" {{ URL::to('vendor/datatables-responsive/dataTables.responsive.css') }} ">




	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">所有Static Pages</h1>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin_home') }}">後台首頁</a></li>
				<li class="breadcrumb-item active">所有Static Pages</li>
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
                    <a class="btn btn-default" href= "{!! route('new_static') !!}">Create Static Page</a>
					<table id="mytable" width="100%" class="table table-striped table-bordered table-hover">
                        <thead><tr><th>name</th><th>action</th></tr></thead>
						<tbody>
						@foreach ($statics as $static)

							<tr><td> {!!$static->name !!}</td>
                                <td>
                                    <a class="btn btn-default" href= "{!! route('view_static',$static->name) !!}">view</a>
                                    <a class="btn btn-danger" onclick="delete_static('{!! $static->name!!}','{{ route("delete_static",$static->name)}}')">delete</a>
                                
                                </td></tr>

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

	function delete_static(static_name,url){

		if (confirm("are you sure deleting coach [" + static_name + "] ?") == true){
            
            
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
                                    alert('static deleted');
                                    window.location.reload(); 
                                }
                                                    
                            else
                                alert('failed to account!');
                        }
            });
		
			
		}
	}

	function enable_coach(account_id,username, activated,url){

		if (activated == 1)

		{
			alert('activated = 1');
			if (confirm("are you sure to disable coach [" + username + "] ?") == true){
		
				            
            $.ajax({
                        method     :"POST",
                        url: url,
                        data: { 
                            
                            _token :"{{ Session::token()}}",
                        },
                        success  : function(data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true)
                                {
                                    alert('account disabled');
                                    window.location.reload(); 
                                }
                                                    
                            else
                                alert('failed to disable account!');
                        }
            });
			}	
		}

		else

		{
			alert('activated = 0');

			if (confirm("are you sure to enable coach [" + username + "] ?") == true){
		
				  $.ajax({
                        method     :"POST",
                        url: url,
                        data: { 
                            
                            _token :"{{ Session::token()}}",
                        },
                        success  : function(data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true)
                                {
                                    alert('account enabled');
                                    window.location.reload(); 
                                }
                                                    
                            else
                                alert('failed to enable account!');
                        }
            });
			}
		}
        
    }
        
        
        function star_coach(account_id,username, star,url){

		if (star == 1)

		{
			alert('star = 1');
			if (confirm("are you sure to unstar coach [" + username + "] ?") == true){
		
				            
            $.ajax({
                        method     :"POST",
                        url: url,
                        data: { 
                            
                            _token :"{{ Session::token()}}",
                        },
                        success  : function(data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true)
                                {
                                    alert('coach unstar');
                                    window.location.reload(); 
                                }
                                                    
                            else
                                alert('failed to unstar coach!');
                        }
            });
			}	
		}

		else

		{
			alert('star = 0');

			if (confirm("are you sure to star coach [" + username + "] ?") == true){
		
				  $.ajax({
                        method     :"POST",
                        url: url,
                        data: { 
                            
                            _token :"{{ Session::token()}}",
                        },
                        success  : function(data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true)
                                {
                                    alert('coach star');
                                    window.location.reload(); 
                                }
                                                    
                            else
                                alert('failed to star account!');
                        }
            });
			}
		}
		
	}
    
    
          
        function approve_coach(account_id,username, approve,url){

		if (approve == 1)

		{
			
			if (confirm("are you sure to dispprove coach [" + username + "] ?") == true){
		
				            
            $.ajax({
                        method     :"POST",
                        url: url,
                        data: { 
                            
                            _token :"{{ Session::token()}}",
                        },
                        success  : function(data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true)
                                {
                                    alert('coach dispproved');
                                    window.location.reload(); 
                                }
                                                    
                            else
                                alert('failed to dispprove coach!');
                        }
            });
			}	
		}

		else

		{
			

			if (confirm("are you sure to approve coach [" + username + "] ?") == true){
		
				  $.ajax({
                        method     :"POST",
                        url: url,
                        data: { 
                            
                            _token :"{{ Session::token()}}",
                        },
                        success  : function(data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true)
                                {
                                    alert('coach approved');
                                    window.location.reload(); 
                                }
                                                    
                            else
                                alert('failed to approve coach!');
                        }
            });
			}
		}
		
	}
    
    
    function top_coach(account_id,username, approve,url){

		if (approve == 1)

		{
			
			if (confirm("are you sure to top coach [" + username + "] ?") == true){
		
				            
            $.ajax({
                        method     :"POST",
                        url: url,
                        data: { 
                            
                            _token :"{{ Session::token()}}",
                        },
                        success  : function(data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true)
                                {
                                    alert('coach remove');
                                    window.location.reload(); 
                                }
                                                    
                            else
                                alert('failed to remove top coach!');
                        }
            });
			}	
		}

		else

		{
			

			if (confirm("are you sure to top coach [" + username + "] ?") == true){
		
				  $.ajax({
                        method     :"POST",
                        url: url,
                        data: { 
                            
                            _token :"{{ Session::token()}}",
                        },
                        success  : function(data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true)
                                {
                                    alert('coach topped');
                                    window.location.reload(); 
                                }
                                                    
                            else
                                alert('failed to top coach!');
                        }
            });
			}
		}
		
	}


</script>
	

@endsection
