@extends('masters.admin_master')

@section('content')

	<link rel="stylesheet" href=" {{ URL::to('vendor/datatables-plugins/dataTables.bootstrap.css') }} ">
	<link rel="stylesheet" href=" {{ URL::to('vendor/datatables-responsive/dataTables.responsive.css') }} ">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"> 所有學生 </h1>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('home') }}">後台首頁</a></li>
				<li class="breadcrumb-item active">所有學生</li>
			</ol>

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
<!--
				<div class="panel-heading">
					Student List
				</div>
-->
				<!-- /.panel-heading -->
				<div class="panel-body">
					<table id="mytable" width="100%" class="table table-striped table-bordered table-hover">
                        <thead><tr><th>登記日期</th><th>學生ID</th><th>學生電郵</th><th>中文姓名</th><th>英文姓名</th><th>性別</th><th>電郵驗證</th><th>Action</th></tr></thead>
						<tbody id="mytable_content">
                            
                            @foreach ($students as $student)

					       <tr>
                               
                               <td>{!! explode(" ",$student->time_created)[0] !!}</td>
                               <td> {!!$student->account_code !!}</td>
                               <td> {!!$student->email !!}</td>
                               <td> {!!$student->chin_name !!}</td>
                               <td> {!!$student->eng_name !!}</td>
                               <td> {!! ($student->sex == 'male') ? 'M':'F' !!}</td>
                               <td> {!! ($student->activated == 0) ? 'N':'Y' !!}</td>
					           <td>
                                   <a class="btn btn-default" href=student/{!! $student->account_id!!}>view</a><a class="btn btn-primary" onclick="enable_student({!! $student->account_id!!},'{!! $student->username!!}',{!! $student->activated!!},'{{route("enable_account",$student->account_id)}}')">enable/disable</a>
                                   
                                   <a class="btn btn-danger" onclick="delete_student({!! $student->account_id!!},'{!! $student->username!!}','{{ route("delete_account",$student->account_id)}}')">delete</a></td>
                            
                        </tr>

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
       // prepare_data();
    	        table = $('#mytable').DataTable({
       
        "order": [[0,"desc"]]
    
        
    });
        
 


	});
    
    function prepare_data()
    {
        
        
            @foreach ($students as $student)
            
            var account_code,username,activated,email,action,date,sex,chin_name,eng_name,account_id,enable_account_url,time_created,action;
             account_id = '{!! $student->account_id !!}';
             account_code = '{!!$student->account_code !!}';
             username = '{!!$student->username !!}';
             email = '{!! $student->email !!}';
             chin_name = '{!! $student->chin_name !!}';
             eng_name = '{!! $student->eng_name !!}';
             sex = "{!! ($student->sex == 'male') ? 'M':'F' !!}";
             date = '{!! $student->time_created !!}';
             activated = "{!! ($student->activated == 0) ? 'N':'Y' !!}";
             enable_account_url = '{{route("enable_account",$student->account_id)}}';
             delete_account_url = '{{ route("delete_account",$student->account_id)}}';
             time_created = '{!! $student->time_created !!}'.split(' ')[0];
             
             action = "<a class='btn btn-default' href=student/"+account_id+">view</a> <a class='btn btn-primary' onclick='enable_student("+account_id+","+'"'+username+'"'+","+{!! $student->activated!!}+","+'"'+enable_account_url+'"'+")'>enable/disable</a> <a class='btn btn-danger' onclick='delete_student("+account_id+","+'"'+username+'"'+","+'"'+delete_account_url+'"'+")'>delete</a>";
             
           $('#mytable_content').append('<tr><td>'+time_created+ '</td><td>'+account_code+ '</td><td>'+email+'</td><td>'+chin_name+'</td><td>'+eng_name+'</td><td>'+sex+'</td><td>'+activated+'</td><td>'+action+'</td><tr>')
            @endforeach
        
        
        
    }

	function delete_student(account_id,username,url){

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


	function enable_student(account_id,username, activated,url){

		if (activated == 1)

		{
			alert('activated = 1');
			if (confirm("are you sure to disable student [" + username + "] ?") == true){
		
				            
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

			if (confirm("are you sure to enable student [" + username + "] ?") == true){
		
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
                                alert('failed to enable student!');
                        }
            });
			}
		}
        
    }


</script>
	

@endsection
