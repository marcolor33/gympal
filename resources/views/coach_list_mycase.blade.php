@extends('masters.coach_home_master')

@section('content')




    <script src="http://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" />


     <link href="{{ URL::to('css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ URL::to('css/modern-business.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ URL::to('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('https://fonts.googleapis.com/icon?family=Material+Icons') }}" rel="stylesheet">

    
    <script src="{{ URL::to('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{  URL::to('vendor/metisMenu/metisMenu.min.js') }}"></script>

    <script src="{{ URL::to('js/sb-admin-2.js') }}"></script>


    
      
    <div hidden class="well">
        <h4><img src="images/searchCase.png"/>個案搜尋</h4>
        <br/>

        <div class="row">
            <div class="col-lg-4">
                <ul class="list-unstyled" style="margin-left: 30%">
                    <li><div class ="select-style" style="text-align:center;"><select  name="category">
                            <option value ="default">運動類型</option>
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
                                <option value ="default">上課地區</option>
                                <option value="" disabled><p><b>---香港島---</b></p></option>
                                @foreach ($hkDistricts as $hkDistrict)
                                    <option  value="{!!$hkDistrict->district_id!!}"/> {!! $hkDistrict->name_chin !!} </option>
                                @endforeach
                                <option value="" disabled><p><b>---九龍區---</b></p></option>
                                @foreach ($knDistricts as $knDistrict)
                                    <option value="{!!$knDistrict->district_id!!}"/> {!! $knDistrict->name_chin !!} </option>
                                @endforeach
                                <option value="" disabled><p><b>---新界區---</b></p></option>
                                @foreach ($ntDistricts as $ntDistrict)
                                    <option  value="{!!$ntDistrict->district_id!!}"/> {!! $ntDistrict->name_chin !!} </option>
                                @endforeach
                                <option value="" disabled><p><b>---其他地區---</b></p></option>
                                @foreach ($otherDistricts as $otherDistrict)
                                    <option  value="{!!$otherDistrict->district_id!!}"/> {!! $otherDistrict->name_chin !!} </option>
                                @endforeach

                            </select>
                        </div>
                    </li>
                    <br/>
                    <li><div class ="select-style"><select name='venue'>

                                <option value="default">上課地點</option>
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

                                <option value="default">上課模式</option>
                                <option value="single">單對單</option>
                                <option value="group">小組訓練</option>
                                <option value="coachArrange">參加教練安排課堂</option>


                            </select>
                        </div>
                    </li>
                    <br/>
                    <li>    <div class="select-style">

                            <select name='frequency'>

                                <option value="default">上課次數</option>
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
                   <div>時薪：</div>
                   <br/>
                   <div class ="form-group" style="text-align:left;">
                        由 <input size="5" name="min_pay" type=number>
                       <br/> <br/>
                            至 <input size="5"name="max_pay" type="number">
                   </div>
               </li>

                </ul>
            </div>

            <!-- /.col-lg-6 -->
        </div>

        <!-- /.row -->
        <br/>
        <div class ="form-group" style="text-align: center">
            <button type="button" onclick="update_table()">清除</button>
            <button type="button" onclick="update_table()">搜尋</button>
        </div>
    </div>
    <br/>
    <hr/>
  <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> 我的個案 </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="panel-body">
<!--                    <table id="mytable" width="100%" class="table table-striped table-bordered table-hover">-->
                    <table class="stripe" id="mytable">
                         <thead><tr><th>個案日期</th><th>case id</th><th>學生性別</th><th>教練性別</th><th>運動類別</th><th>subject id</th><th>上堂地區</th><th>district id</th><th>上堂場地</th><th>上堂模式</th><th>上堂次數</th><th>每堂收費</th><th>詳細</th></tr></thead>
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
         
        ],
        "order": [[0,"desc"]],
         "bLengthChange" : false,
        "iDisplayLength" : -1,
        "paging": false,
        "searching" : false,
        "bInfo" : false,
        "bSort": false
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
        
        time_created = '{!! $case->time_created !!}'.split(' ')[0];
        
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
        
        
        view_url = '{{route("public_view_case",$case->case_id)}}';
        
        action = '<a class="btn btn-default" href='+view_url+'>詳細</a>';
        
        
        
        $('#mytable_body').append('<tr><td>'+time_created+'</td><td>'+case_id+'</td><td>'+student_sex+'</td><td>'+coach_sex+'</td><td>'+subject_name+'</td><td>'+subject_id+'</td><td>'+district_name+'</td><td>'+district_id+'</td><td>'+venue+'</td><td>'+mode+'</td><td>'+frequency+'</td><td>$'+fee+'</td><td>'+action+'</td></tr>');
    
@endforeach

        
}
    
    



</script>
	

@endsection
