@extends('masters.admin_master')

@section('content')
	<link rel="stylesheet" href=" {{ URL::to('vendor/datatables-plugins/dataTables.bootstrap.css') }} ">
	<link rel="stylesheet" href=" {{ URL::to('vendor/datatables-responsive/dataTables.responsive.css') }} ">

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"> 所有教練 </h1>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('home') }}">後台首頁</a></li>
				<li class="breadcrumb-item active">所有教練</li>
			</ol>
		</div>
	</div>
				<div class="panel-body">
					<table id="mytable" width="100%" class="table table-striped table-bordered table-hover">
                        <thead><tr><th>登記日期</th><th>教練ID</th><th>教練電郵</th><th>中文姓名</th><th>英文姓名</th><th>性別</th><th>電郵驗證</th><th>專業認證 </th><th>星級教練 </th><th>Top10教練</th><th>Action</th></tr></thead>
						<tbody id="mytable_content">
              
                                
                        @foreach ($coachs as $coach)
					       <tr>
                               <td>{!! explode(" ",$coach->time_created)[0] !!}</td>
                               <td> {!!$coach->account_code !!}</td>
                               <td> {!!$coach->email !!}</td>
                               <td> {!!$coach->chin_name !!}</td>
                               <td> {!!$coach->eng_name !!}</td>
                               <td> {!! ($coach->sex == 'male') ? 'M':'F' !!}</td>
                               <td> {!! ($coach->activated == 0) ? 'N':'Y' !!}</td>
                               <td> {!! ($coach->approved == 0) ? 'N':'Y' !!}</td>
                               <td> {!! ($coach->star == 0) ? 'N':'Y' !!}</td>
                               <td> {!! ($coach->top == 0) ? 'N':'Y' !!}</td>
                               
                               <td>
                                   <a class="btn btn-default" href='coach/{!! $coach->account_id !!}'>view</a>
                                   
                                   <a class="btn btn-primary" onclick="enable_account({!! $coach->account_id!!},'{!! $coach->username!!}',{!! $coach->activated!!},'{{route("enable_account",$coach->account_id)}}')">enable/disable</a>
                                   
                                    <a class="btn btn-primary" onclick="approve_coach({!! $coach->account_id!!},'{!! $coach->username!!}',{!! $coach->approved!!},'{{route("approve_coach",$coach->account_id)}}')">approve/disprove</a>
                                   
                                   <a class="btn btn-primary" onclick="star_coach({!! $coach->account_id!!},'{!! $coach->username!!}',{!! $coach->star!!},'{{route("star_coach",$coach->account_id)}}')">star/unstar</a>
                                   
                                   
                                   <a class="btn btn-primary" onclick="top_coach({!! $coach->account_id!!},'{!! $coach->username!!}',{!! $coach->top!!},'{{route("top_coach",$coach->account_id)}}')">top/untop</a>
                                   
                                   
                                   <a class="btn btn-danger" onclick="delete_coach({!! $coach->account_id!!},'{!! $coach->username!!}','{{ route("delete_account",$coach->account_id)}}')">delete</a></td>
                            

                            </tr>

			             @endforeach
                            

						</tbody>
					</table>
					<!-- /.table-responsive -->
				</div>
				<!-- /.panel-body -->
<script>
	$(document).ready(function(){
        
   // prepare_data();
            table = $('#mytable').DataTable({
   
        "order": [[0,"desc"]],    
        
    });


});
    
        function prepare_data()
    {
        
            @foreach ($coachs as $coach)
            
            var account_code,username,activated,email,action,date,sex,chin_name,eng_name,account_id,enable_account_url,time_created,star,approved,top;
             account_id = '{!! $coach->account_id !!}';
             account_code = '{!!$coach->account_code !!}';
             username = '{!!$coach->username !!}';
             email = '{!! $coach->email !!}';
             chin_name = '{!! $coach->chin_name !!}';
             eng_name = '{!! $coach->eng_name !!}';
             sex = "{!! ($coach->sex == 'male') ? 'M':'F' !!}";
             activated = "{!! ($coach->activated == 0) ? 'N':'Y' !!}";
             approved = "{!! ($coach->approved == 0) ? 'N':'Y' !!}";
            star = "{!! ($coach->star == 0) ? 'N':'Y' !!}";
            top = "{!! ($coach->top == 0) ? 'N':'Y' !!}";
             enable_account_url = '{{route("enable_account",$coach->account_id)}}';
             delete_account_url = '{{ route("delete_account",$coach->account_id)}}';
             time_created = '{!! $coach->time_created !!}'.split(' ')[0];
             view_url = "{!! route('public_view_coach',$coach->account_id) !!}";
             approve_url = "{!! route('approve_coach',$coach->account_id) !!}";
             star_url = "{!! route('star_coach',$coach->account_id) !!}";
             top_url = "{!! route('top_coach',$coach->account_id) !!}";
             
             action = '<a class="btn btn-default" href= "'+view_url+'">view</a><a class="btn btn-primary" onclick="enable_coach('+account_id+','+"'"+username+"'"+',{!! $coach->activated !!},'+"'"+enable_account_url+"'"+')">enable/disable</a><a class="btn btn-primary" onclick="approve_coach('+account_id+','+"'"+username+"'"+',{!! $coach->approved !!},'+"'"+approve_url+"'"+')">approve/disapprove</a><a class="btn btn-primary" onclick="star_coach('+account_id+','+"'"+username+"'"+',{!! $coach->star !!},'+"'"+star_url+"'"+')">star/unstar</a><a class="btn btn-primary" onclick="top_coach('+account_id+','+"'"+username+"'"+',{!! $coach->top !!},'+"'"+top_url+"'"+')">top/untop</a><a class="btn btn-danger" onclick="delete_coach('+account_id+','+"'"+username+"'"+','+"'"+delete_account_url+"'"+')">delete</a></td>';
                                    
                                      
           
           $('#mytable_content').append('<tr><td>'+time_created+ '</td><td>'+account_code+ '</td><td>'+email+'</td><td>'+chin_name+ '</td><td>'+eng_name+ '</td><td>'+sex+ '</td><td>'+activated+'</td><td>'+approved+ '</td><td>'+star+ '</td><td>'+top+ '</td><td>'+action+ '</td><tr>');
           @endforeach
        
        
        
    }

	function delete_coach(account_id,username,url){

		if (confirm("are you sure deleting coach [" + username + "] ?") == true){
            
            
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
                                    alert('account deleted');
                                    window.location.reload(); 
                                }
                                                    
                            else
                                alert('failed to account!');
                        }
            });
		
			
		}
	}

	function enable_account(account_id,username, activated,url){

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
                        },
                      
                       error: function(data){
                             alert('Fail to Top Coach, Max 10!');
                        }
                      
                      
            });
			}
		}
		
	}


</script>
	

@endsection
