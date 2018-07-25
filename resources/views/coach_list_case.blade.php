@extends('masters.coach_home_master')

@section('content')


    <script src="http://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" />

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> 尋找新個案 </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('coach_home') }}">教練首頁</a></li>
                <li class="breadcrumb-item active">尋找新個案</li>
            </ol>
        </div>
    </div>
    <!--
<table id="mytable" >
	<thead><tr><th>case id</th><th>action</th></tr></thead>
	<tbody>
@foreach ($cases as $case)

        <tr><td> {!!$case->case_id !!}</td><td><a href='{{route("coach_view_case",$case->case_id)}}'>view</a></td></tr>    
@endforeach
        </tbody>
</table>
    -->



    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Coach List
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table id="mytable" width="100%" class="table table-striped table-bordered table-hover">
                         <thead><tr><th> time created </th><th>case id</th><th>student sex</th><th>coach sex</th><th>subject name</th><th>subject id</th><th>district name</th><th>district id</th><th>mode </th><th>venue </th><th>frequency</th><th>pay</th><th>action</th></tr></thead>
                        <tbody id="mytable_body">
                       
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



    <div id="somediv">
      Click me!
    </div>

<script>
		$(document).ready(function(){
        
    prepare_data();    
        
    var table = $('#mytable').DataTable({
        "columnDefs": [
            {
                "targets": [ 1,5,7 ],
                "visible": false
            },
         
        ]
    });
            
});
            

        

    
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
        
        time_created = '{!! $case->time_created !!}';
        case_id = '{!!$case->case_id !!}';
        student_sex = $('[name="student_sex"] option[value="{!! $case->student_Sex !!}"]').html();
        coach_sex = $('[name="coach_sex"] option[value="{!! $case->sex !!}"]').html();
        
        subject_name = '{!! $case->subject_name !!}';
        subject_id = '{!! $case->subject_id !!}';
        
        district_name = '{!! $case->district_name !!}';
        district_id = '{!! $case->district_id !!}';
        
        mode = $('[name="mode"] option[value="{!! $case->mode !!}"]').html();
    
        venue = $('[name="venue"] option[value="{!! $case->venue !!}"]').html();
        
        frequency = $('[name="frequency"] option[value="{!! $case->lesson_per_week !!}"]').html();
        
        fee = '{!! $case->fee!!}';
        
        
        view_url = '{{route("coach_view_case",$case->case_id)}}';
        
        action = '<a href='+view_url+'>view</a>';
        
        
        
        $('#mytable_body').append('<tr><td>'+time_created+'</td><td>'+case_id+'</td><td>'+student_sex+'</td><td>'+coach_sex+'</td><td>'+subject_name+'</td><td>'+subject_id+'</td><td>'+district_name+'</td><td>'+district_id+'</td><td>'+mode+'</td><td>'+venue+'</td><td>'+frequency+'</td><td>'+fee+'</td><td>'+action+'</td></tr>');
    
@endforeach

        
}
    
    


</script>
	

@endsection
