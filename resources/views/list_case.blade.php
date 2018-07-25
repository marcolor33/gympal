
@extends($extend)

@section('content')
    <style>
        .roundUpBtn {
            -moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
            -webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
            box-shadow:inset 0px 1px 0px 0px #ffffff;
            background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ffffff), color-stop(1, #f6f6f6));
            background:-moz-linear-gradient(top, #ffffff 5%, #f6f6f6 100%);
            background:-webkit-linear-gradient(top, #ffffff 5%, #f6f6f6 100%);
            background:-o-linear-gradient(top, #ffffff 5%, #f6f6f6 100%);
            background:-ms-linear-gradient(top, #ffffff 5%, #f6f6f6 100%);
            background:linear-gradient(to bottom, #ffffff 5%, #f6f6f6 100%);
            filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#f6f6f6',GradientType=0);
            background-color:#ffffff;
            -moz-border-radius:12px;
            -webkit-border-radius:12px;
            border-radius:12px;
            border:2px solid #dcdcdc;
            display:inline-block;
            cursor:pointer;
            color:#666666;
            font-family:Arial;
            font-size:15px;
            font-weight:bold;
            padding:6px 24px;
            text-decoration:none;
            text-shadow:0px 1px 0px #ffffff;
        }
        .roundUpBtn:hover {
            background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #f6f6f6), color-stop(1, #ffffff));
            background:-moz-linear-gradient(top, #f6f6f6 5%, #ffffff 100%);
            background:-webkit-linear-gradient(top, #f6f6f6 5%, #ffffff 100%);
            background:-o-linear-gradient(top, #f6f6f6 5%, #ffffff 100%);
            background:-ms-linear-gradient(top, #f6f6f6 5%, #ffffff 100%);
            background:linear-gradient(to bottom, #f6f6f6 5%, #ffffff 100%);
            filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f6f6f6', endColorstr='#ffffff',GradientType=0);
            background-color:#f6f6f6;
        }
        .roundUpBtn:active {
            position:relative;
            top:1px;
        }

        select {
            max-width:106%;
        }

    </style>


    <!-- CSS -->
    <!-- Bootstrap Core CSS -->
    

    <link href="{{ URL::to('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('vendor/metisMenu/metisMenu.min.css')  }}" rel="stylesheet">

    <link rel="stylesheet" href=" {{ URL::to('vendor/datatables-plugins/dataTables.bootstrap.css') }} ">
    <link rel="stylesheet" href=" {{ URL::to('vendor/datatables-responsive/dataTables.responsive.css') }} ">

    <!-- Custom CSS -->
    <link href="{{ URL::to('css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ URL::to('css/modern-business.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ URL::to('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('https://fonts.googleapis.com/icon?family=Material+Icons') }}" rel="stylesheet">

    <!-- jQuery -->
    <script src="{{ URL::to('vendor/jquery/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->

    <script src="{{ URL::to('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{  URL::to('vendor/metisMenu/metisMenu.min.js') }}"></script>

    <script src="{{ URL::to('js/sb-admin-2.js') }}"></script>

    <script src="{{ URL::to('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>

<!--
    <script src="{{ URL::to('vendor/datatables-plugins/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ URL::to('vendor/datatables-responsive/dataTables.responsive.js') }}"></script>
-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/i18n/defaults-*.min.js"></script>-->


        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src = "{{ URL::to('formValidateLib/jquery.validate.js') }}"></script>

    <script src = "{{ URL::to('formValidateLib/jquery.mask.js') }}"></script>
    <script src = "{{ URL::to('formValidateLib/additional-methods.js') }}"></script>
    <script src = "{{ URL::to('formValidateLib/localization/messages_zh_TW.min.js') }}"></script>
    <link rel="stylesheet" href=" {{ URL::to('formValidateLib/animate.min.css') }} ">




    <!--<br/>-->
    <div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"> 所有個案 </h1>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('home') }}">後台首頁</a></li>
				<li class="breadcrumb-item active">所有個案</li>
			</ol>
		</div>
	</div>
        <div class="well">
            <h4><img src="images/searchCase.png"/>個案搜尋</h4>
            <br/>

            <div class="row">
                <div class="col-lg-4">
                    <ul class="list-unstyled" style="margin-left: 30%">
                        <li><div class ="select-style" style="text-align:center;"><select  name="category">
                                <option value ="default">運動類別</option>
                                @foreach($categories as $category)

                                    <option value="{!! $category->category_id !!}">{!! $category->name_chin !!}</option>
                                @endforeach

                            </select>
                            </div>
                        </li>
                        <br/>
                        <li><div class="select-style">


                                <select name='coach_sex'>
                                    <option value="default">教練性別</option>
                                    <option value="male">男</option>
                                    <option value="female">女</option>
                                    <option value="undefined">無所謂</option>
                                </select>

                            </div>
                        </li>
                        <br/>
                        <li>  <div class="select-style">

                                <select name='student_sex'>
                                    <option value="default">學生性別</option>
                                    <option value="male">男</option>
                                    <option value="female">女</option>
                                </select>

                            </div>
                        </li>
                    </ul>
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-4" >
                    <ul class="list-unstyled" style="margin-left: 20%">
                        <li>
                        </li>
                        <li>  <div class="select-style" >

                                <select  name="district">
                                    <option value ="default">上堂地區</option>
                                    <option value="" disabled><p><b>---香港島---</b></p></option>
                                    @foreach ($hkDistricts as $hkDistrict)
                                    <option  value="{!!$hkDistrict->district_id!!}"> {!! $hkDistrict->name_chin !!}</option>
                                    @endforeach
                                    <option value="" disabled><p><b>---九龍區---</b></p></option>
                                    @foreach ($knDistricts as $knDistrict)
                                        <option value="{!!$knDistrict->district_id!!}"> {!! $knDistrict->name_chin !!} </option>
                                    @endforeach
                                    <option value="" disabled><p><b>---新界區---</b></p></option>
                                    @foreach ($ntDistricts as $ntDistrict)
                                        <option  value="{!!$ntDistrict->district_id!!}"> {!! $ntDistrict->name_chin !!} </option>
                                    @endforeach
                                    <option value="" disabled><p><b>---其它地區---</b></p></option>
                                    @foreach ($otherDistricts as $otherDistrict)
                                        <option  value="{!!$otherDistrict->district_id!!}"> {!! $otherDistrict->name_chin !!} </option>
                                    @endforeach

                                </select>
                            </div>
                        </li>
                        <br/>
                        <li><div class ="select-style"><select name='venue'>

                                    <option value="default">上堂場地</option>
                                    <option value="Facilities&VenuesOfLCSD">康文署體育館/ 場地</option>
                                    <option value="Clubhouse">私人會所/ 場地</option>
                                    <option value="SchoolOrCommunityCenter">學校/ 社區中心</option>
                                    <option value="CoachAssign">教練提供場地</option>
                                    <option value="Other">其他</option>


                                </select>
                            </div>
                        </li>
                        <br/>
                        <li> <div class="select-style">
                                <select name='mode'>

                                    <option value="default">上堂模式</option>
                                    <option value="single">單對單</option>
                                    <option value="group">小組訓練</option>
                                    <option value="coachArrange">參加教練安排課堂</option>


                                </select>
                            </div>
                        </li>
                        <br/>
                        <li>    <div class="select-style">

                                <select name='frequency'>

                                    <option value="default">上堂次數</option>
                                    <option value="1">每周一堂</option>
                                    <option value="2">每周兩堂</option>
                                    <option value="3">每周三堂</option>
                                    <option value="4">每周四堂</option>
                                    <option value="5">每周五堂</option>
                                    <option value="6">每周六堂</option>
                                    <option value="7">每周七堂</option>
                                    <option value="8">每周七堂或以上</option>
                                </select>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-4">
                    <ul class="list-unstyled" style="margin-left: 10%">
                        <li><div class ="form-group">
                            <input size="30" name="search" type="text" placeholder="搜尋關鍵字">
                        </div>
                        </li>
                        <br/>
                   <li>
                       <div>每堂學費：</div>
                       <br/>
                       <div class ="form-group" style="text-align:left;">
                            由 <input size="5" name="min_pay" type=number>
                           <br/> <br/>
                                至 <input size="5"name="max_pay" type="number">
                       </div>
                   </li>

                    </ul>
                </div>

                <div class="col-lg-4">
                    <ul class="list-unstyled" style="margin-left: 10%">

                   <li>
                       <div>個案日期：</div>
                       <br/>
                       <div class ="form-group" style="text-align:left;">
                            由 <input size="20" id="min_time" name="min_time" type="text">
                           <br/> <br/>
                                至 <input size="20"id="max_time" name="max_time" type="text">
                       </div>
                   </li>

                    </ul>
                </div>

                <!-- /.col-lg-6 -->
            </div>

            <!-- /.row -->
            <br/>
            <div class ="form-group" style="text-align: center">

                <button class="roundUpBtn" style=" "type="button" onclick="reset_table()">清除</button>

                <button class="roundUpBtn" style="margin-left: 15%; "type="button" onclick="update_table()">搜尋</button>
            </div>
        </div>
    <br/>
    <hr/>


<table class="table table-striped table-bordered table-hover" id="mytable">
    
    <thead><tr><th>個案編號</th><th>個案日期</th><th>學生ID</th><th>學生性別</th><th>教練性別</th><th>運動類別</th><th>運動編號</th><th>上堂地區</th><th>地區編號</th><th>上堂場地</th><th>上堂模式</th><th>每堂學費</th><th>留言數目</th><th>Status</th><th>類別編號</th><th>類別名稱</th><th>Action</th></tr></thead>
	<tbody id="mytable_body">
 
        </tbody>
</table>

    </div>
 
<script>
    var table
    
    $(function() {
            $( "#min_time" ).datepicker({
                dateFormat:"yy-mm-dd",
                yearRange: "-100:+0",
                changeMonth: true,
                changeYear: true
            });
        
            $( "#max_time" ).datepicker({
                dateFormat:"yy-mm-dd",
                yearRange: "-100:+0",
                changeMonth: true,
                changeYear: true
            });
        });
	$(document).ready(function(){
        
    prepare_data(); 
        $("#min_time").mask("0000-00-00", {
                placeholder: "yyyy-mm-dd",
            });
        
        $("#max_time").mask("0000-00-00", {
                placeholder: "yyyy-mm-dd",
            });
        
        
        table = $('#mytable').DataTable({
        "columnDefs": [
            {
                "targets": [ 6,8,14,15 ],
                "visible": false,
                
            },
            
           
         
        ],
        "order": [[0,"desc"]],
        "searching" : true,
    
        
    });
        
    
        
  
     
     @if (isset($_GET['category_id']))
         
         
          $('[name="category"]').val({!! $_GET['category_id'] !!});
        update_table();
      
      
    @endif
    $('#mytable_filter').prop('hidden',true);        
        
})
    
    
    	function delete_case(delete_url){
            
			if (confirm("are you sure to delete case?") == true){
				   $.ajax({
                        method     :"POST",
                        url: delete_url,
                        data : {
                            
                            _token : "{{Session::token()}}",
                            
                            
                        },
                        success  : function(data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true)
                                {
                                    console.log('Interest cancelled!');
                                    window.location.reload(); 
                                }
                                                    
                            else
                                console.log('failed to delete!');
                        }
                     });
                
                
			}	
		}
    
    
    function update_table()
    {
        
//        alert($('[name="search"]').val());
//        alert($('[name="search"]').val() == '');
        
            
        table.search($('[name="search"]').val()).draw();

        
    }
    
    
    function reset_table()
    {
        $('[name="search"]').val('');
        
        $('[name="student_sex"]').val('default');
        
        $('[name="coach_sex"]').val('default');
        
        $('[name="district"]').val('default');
        
        $('[name="mode"]').val('default');
        
        $('[name="venue"]').val('default');
        
        $('[name="frequency"]').val('default');
        
        $('[name="category"]').val('default');
        
        $('[name="min_pay"]').val('');
        
        $('[name="max_pay"]').val('');
        
        $('[name="min_time"]').val('');
        
        $('[name="max_time"]').val('');
        
        
        update_table();
        
        
    }
 

    
    function prepare_data(){
        
        var time_created;
         var case_id ;
        var student_sex;
        var coach_sex;
        var subject_name;
        var subject_id;
        var district_id;
        var district_name;
        var district_id;
        var mode;
        var venue;
        var frequency;
        var fee;
        
        var url;
        
        @foreach ($cases as $case)
        
        //time_created = new Date(Date.parse('{!! $case->time_created !!}'));
        
        time_created = '{!! $case->time_created !!}'.split(' ')[0];
        
        case_id = '{!!$case->case_id !!}';
        
        student_sex = $('[name="student_sex"] option[value="{!! $case->student_Sex !!}"]').html();
        coach_sex = $('[name="coach_sex"] option[value="{!! $case->sex !!}"]').html();
        
        subject_name = '{!! $case->subject_name !!}';
        subject_id = '{!! $case->subject_id !!}';
        
        district_name = '{!! $case->district_name !!}';
        district_id = '{!! $case->district_id !!}';
        
        mode = $('[name="mode"] option[value="{!! $case->mode !!}"]').html();
        
        counter = '{!! $case->count == ''? 0 : $case->count !!}';
        
    
        venue = $('[name="venue"] option[value="{!! $case->venue !!}"]').html();
        
        frequency = $('[name="frequency"] option[value="{!! $case->lesson_per_week !!}"]').html();
        
        fee = '{!! $case->fee!!}';
        
        
        student_url = '{{route("view_student",$case->student_id)}}';
        
        student_code = '<a href='+student_url+'>{!! $case->account_code !!}</a>';
        
        
        category_name = '{!! $case->category_name !!}';
        category_id = '{!! $case->category_id !!}';
        
        status = '{!! $case->status == "open" ? "Open": ($case->status == "pending" ? "Pending" : "Closed")   !!}';
        
        view_url = '{{route("public_view_case",$case->case_id)}}';
        
        delete_url = '{{route("delete_case",$case->case_id)}}';
        
        
        action = '<a class="btn btn-default" href='+view_url+'>詳細</a><a class="btn btn-danger" onclick="delete_case('+"'"+ delete_url+"'"+')">delete</a>';
        
        
        
        $('#mytable_body').append('<tr><td>'+case_id+'</td><td>'+time_created+'</td><td>'+student_code+'</td><td>'+student_sex+'</td><td>'+coach_sex+'</td><td>'+subject_name+'</td><td>'+subject_id+'</td><td>'+district_name+'</td><td>'+district_id+'</td><td>'+venue+'</td><td>'+mode+'</td><td>$'+fee+'</td><td>'+counter+'</td><td>'+status+'</td><td>'+category_id+'</td><td>'+category_name+'</td><td>'+action+'</td></tr>');
    
        
@endforeach

        
    }
    
    
    $.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
    
         
    if ($('[name="student_sex"]').val() != 'default')
        {
            
            
            if ($('[name="student_sex"] :selected').text() != data[3])
                {
                   return false; 
                }
        }
        
        
    
        
      if ($('[name="coach_sex"]').val() != 'default')
        {
            
            
            if ($('[name="coach_sex"] :selected').text() != data[4])
                {
                    return false;
                }
        }
         
        
        
    
        
        if ($('[name="district"]').val() != 'default')
        {
            if ($('[name="district"]').val() != data[8])
                {
                   return false;
                }
        }
    
        
        
        
        if ($('[name="mode"]').val() != 'default')
        {
            if ($('[name="mode"] :selected').text() != data[10])
                {
                   return false;
                }
        }
        
        
            if ($('[name="venue"]').val() != 'default')
        {
            if ($('[name="venue"] :selected').text()!= data[9])
                {
                    return false;
                }
        }
        
            
//           if ($('[name="frequency"]').val() != 'default')
//        {
//            if ( $('[name="frequency"] :selected').text() != data[10])
//                {
//                    return false;
//                }
//        }
        
        if ($('[name="category"]').val() != 'default')
        {
            if ( $('[name="category"] :selected').val() != data[14])
                {
                    return false;
                }
        }
        
        if ($('[name="min_pay"]').val() != '')
        {
            if ( parseInt($('[name="min_pay"]').val()) > parseInt(data[11].replace("$","")))
                {
                    return false;
                }
        }
        
        if ($('[name="max_pay"]').val() != '')
        {
            if ( parseInt($('[name="max_pay"]').val()) < parseInt(data[11].replace("$","")))
                {
                    return false;
                }
        }
        
            if ($('[name="min_time"]').val() != '')
        {
            
            time = new Date(Date.parse(data[1]));
            min_time = new Date(Date.parse($('[name="min_time"]').val()));
            if ( min_time > time)
                {
                    return false;
                }
        }
        
                 if ($('[name="max_time"]').val() != '')
        {
            time = new Date(Date.parse(data[1]));
            max_time = new Date(Date.parse($('[name="max_time"]').val()));
            if ( max_time < time)
                {
                    return false;
                }
        }
        
        
        return true;
    
    })
    
    



</script>
	

@endsection
