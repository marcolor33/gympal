<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="icon" href= {{ URL::to("pageIcon.ico")}} type="image/ico">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GymPal</title>


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

    <script src="{{ URL::to('vendor/datatables-plugins/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ URL::to('vendor/datatables-responsive/dataTables.responsive.js') }}"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    

<form id="filterForm" hidden>
    <div class ="form-group">
        pay
        <input name="min_pay" type=number> to <input name="max_pay" type="number">
    </div>
    
    
    <div class="form-group">
                                    上課地區
                                    <select  name="district">
                                        <option value ="default">--請選擇--</option>
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
                                        <option value="" disabled><p><b>---其它地區---</b></p></option>
                                        @foreach ($otherDistricts as $otherDistrict)
                                            <option  value="{!!$otherDistrict->district_id!!}"/> {!! $otherDistrict->name_chin !!} </option>
                                        @endforeach
                                    
                                    </select>
    </div>



 <div class="form-group">
                                    category
                                    <select  name="category">
                                        <option value ="default">--請選擇--</option>
                                        @foreach($categories as $category)
                                        
                                        <option value="{!! $category->category_id !!}">{!! $category->name_chin !!}</option>
                                        @endforeach
                                    
                                    </select>
    </div>


 <div class="form-group">
    mode
        <select name='mode'>
        
        <option value="default">--select--</option>
        <option value="single">單對單</option>
        <option value="group">小組訓練</option>
        <option value="coachArrange">參加教練安排課堂</option>
        
        
    </select>
</div>

<div>
    search key
        <input name="search" type="text">
    
</div>


 <div class="form-group">
    venue
        <select name='venue'>
        
        <option value="default">--select--</option>
        <option value="Facilities&VenuesOfLCSD">康文署體育館/ 場地</option>
        <option value="Clubhouse">私人會所/ 場地</option>
        <option value="SchoolOrCommunityCenter">學校/ 社區中心</option>
        <option value="CoachAssign">教練提供場地</option>
        <option value="Other">其它</option>
        
        
    </select>
    </div>



  
    <div class="form-group">
    次數
        <select name='frequency'>
        
        <option value="default">--select--</option>
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
   <div class="form-group">
        教練性別
       
       <select name='coach_sex'>
             <option value="default">--select--</option>
        <option value="male">男</option>
        <option value="female">女</option>
        <option value="undefined">無所謂</option>
       </select>
                                    
    </div>


   <div class="form-group">
        student性別
       
       <select name='student_sex'>
             <option value="default">--select--</option>
        <option value="male">男</option>
        <option value="female">女</option>
       </select>
                                    
    </div>

<button type="button" onclick="update_table()">search</button>


</form>

    

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" id="cNavBar" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" id="cGympal" href="http://gympal.com.hk/front">Gympal</a>
            <a class="fa fa-copyright" style="font-size:14px;color:black" ></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a id="cStuReg" href="{{ route('studentApply') }}">學生登記</a>
                </li>
                <li>
                    <a id="cCoaReg" href="{{ route('coachApply') }}">教練登記</a>
                </li>
                <li>
                    <a id="cUserLogin" href="{{route('getLogin')}}">用家登入</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->

</nav>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2" style=" text-align: center;">
    <ul class="nav navbar-nav navbar-default" style="display:inline-block;float: none;vertical-align:top;">
        <li>
            <a id="cStuReg" href="{{ route('public_list_case') }}">學生個案</a>
        </li>
        <li>
            <a id="cCoaReg" href="{{ route('public_list_coach') }}">教練資料庫</a>
        </li>
        <li>
            <a id="cUserLogin" href="{{route('getLogin')}}">真實個案</a>
        </li>
        <li>
            <a id="cUserLogin" href="{{route('getLogin')}}">最新消息</a>
        </li>
        <li>
            <a id="cUserLogin" href="{{route('getLogin')}}">常見問題</a>
        </li>
        <li>
            <a id="cUserLogin" href="{{route('getLogin')}}">關於我們</a>
        </li>
    </ul>
</div>

<!-- Header Carousel -->
<header id="myCarousel" class="carousel slide">


    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides http://placehold.it/1900x1080&text=Slide Three-->
    <div class="carousel-inner" style="margin-top: 1px">
        <div class="item active">
            <div class="fill" style="background-image:url('https://hkm.nike.com.hk/images/s2_banner_03_d.jpg');"></div>
            <div class="carousel-caption">
                <h2>Caption 1</h2>
            </div>
        </div>
        <div class="item">
            <div class="fill" style="background-image:url('http://viewthevibe.com/wp-content/uploads/2015/04/nike.jpg');"></div>
            <div class="carousel-caption">
                <h2>Caption 2</h2>
            </div>
        </div>

        <div class="item">
            <div class="fill" style="background-image:url('http://demandware.edgesuite.net/sits_pod14-adidas/dw/image/v2/aagl_prd/on/demandware.static/-/Sites-adidas-AME-Library/default/dw24654717/brand/images/2015/11/adidas-p-running-fw15-ultraboost-media-slider-6_81937.jpg');"></div>
            <div class="carousel-caption">
                <h2>Caption 3</h2>
            </div>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>
</header>

<!-- Page Content -->
<div class="container">

    <!-- Marketing Icons Section -->


    <!-- Portfolio Section -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">運動類別</h2>
        </div>
    </div>
    <div class="row">

        <table align="center" border=0 cellspacing="0" class="table2">
            <tr>
                <td align="center" width="50">
                    <a href="{{ route('public_list_case') }}?category_id=3" >
                        <img src="images/fitness.jpg" width="200" height="200"></a>
                </td>
                <td align="center" width="50">
                    <a href="{{ route('public_list_case') }}?category_id=3" >
                        <img src="images/yoga.jpg" width="200" height="200"></a>
                </td>
                <td align="center" width="50">
                    <a href="{{ route('public_list_case') }}?category_id=3" >
                        <img src="images/swim.jpg" width="200" height="200">
                    </a>
                </td>
                <td align="center" width="50">
                    <a href="{{ route('public_list_case') }}?category_id=3" >
                        <img src="images/ball.jpg" width="200" height="200"></a>
                </td>
            </tr>
            <tr><td colspan=4><hr /></td></tr>
            <tr>
                <td align="center" width="50">
                    <a href="{{ route('public_list_case') }}?category_id=3" >
                        <img src="images/dance.jpg" width="200" height="200"></a>
                </td>
                <td align="center" width="50">
                    <a href="{{ route('public_list_case') }}?category_id=3" >
                        <img src="images/boxing.jpg" width="200" height="200"></a>
                </td>
                <td align="center" width="50">
                    <a href="{{ route('public_list_case') }}?category_id=3" >
                        <img src="images/kungFu.jpg" width="200" height="200"></a>
                </td>
                <td align="center" width="50">
                    <a href="{{ route('public_list_case') }}?category_id=3" >
                        <img src="images/run.jpg" width="200" height="200"></a>
                </td>
            </tr>
        </table>








    </div>
    <div class="row">




    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">立即登記</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              {{--<i class="fa fa-circle fa-stack-2x text-primary"></i>--}}
                            <i class="fa fa-group fa-stack-1x fa-inverse"  style="color:#CC3623"></i>
                        </span>
                </div>
                <div class="panel-body">
                    <a href="{{ route('studentApply') }}" class="btn btn-primary" >學生登記</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              {{--<i class="fa fa-circle fa-stack-2x text-primary"></i>--}}
                            <i class="fa fa-briefcase fa-stack-1x fa-inverse" style="color:#5E9FFF"></i>
                        </span>
                </div>
                <div class="panel-body">
                    <a href="{{ route('coachApply') }}" class="btn btn-primary" >導師登記</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">最新個案</h2>
        </div>
        
        
        <table id="mytable">
    <thead><tr><th> time created </th><th>case id</th><th>student sex</th><th>coach sex</th><th>subject name</th><th>subject id</th><th>district name</th><th>district id</th><th>mode </th><th>venue </th><th>frequency</th><th>pay</th><th>category_id</th><th>category_name</th><th>action</th></tr></thead>
	<tbody id="mytable_body">
 
        </tbody>
</table>
        
        
        
    </div>
    <!-- /.row -->

    <hr>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2" style=" text-align: center;">
        <ul class="nav navbar-nav navbar-default" style="display:inline-block;float: none;vertical-align:top;">
            <li>
                <a id="cStuReg" href="{{ route('studentApply') }}">教練資料庫</a>
            </li>
            <li>
                <a id="cCoaReg" href="{{ route('coachApply') }}">真實個案</a>
            </li>
            <li>
                <a id="cUserLogin" href="{{route('getLogin')}}">找教練流程</a>
            </li>
            <li>
                <a id="cUserLogin" href="{{route('getLogin')}}">找學生流程</a>
            </li>
            <li>
                <a id="cUserLogin" href="{{route('getLogin')}}">收費須知</a>
            </li>
            <li>
                <a id="cUserLogin" href="{{route('getLogin')}}">網上付款</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">最受歡迎教練</h2>
            <div class="panel panel-default">
            @foreach ($coachs as $coach)
                
        <div>
    <a href="{{route('public_view_coach',$coach->account_id)}}"><img  src="{{$coach->profile_pic}}"/></a>
    <h5>{!!$coach->chin_name !!}</h5>
    <h5>{!!$coach->eng_name !!}</h5>
    <h5>{!!$coach->subjects !!}</h5>
    
            
    <a class="btn btn-default" href="{{route('public_view_coach',$coach->account_id)}}">view</a>
    
                </div>
                
                
            @endforeach
        </div>
        <!-- /.col-lg-12 -->
    </div>




    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <footer>


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2" style=" text-align: center;">
            <ul class="nav navbar-nav navbar-default" style="display:inline-block;float: none;vertical-align:top;">
                <li>
                    <a id="cStuReg" href="{{ route('getLogin') }}">首頁</a>
                </li>
                <li>
                    <a id="cCoaReg" href="{{ route('getLogin') }}">私隱政策</a>
                </li>
                <li>
                    <a id="cUserLogin" href="{{route('getLogin')}}">服務條款</a>
                </li>
                <li>
                    <a id="cUserLogin" href="{{route('getLogin')}}">學生個案</a>
                    <a id="cUserLogin" href="{{route('getLogin')}}">教練資料庳</a>
                </li>
                <li>
                    <a id="cUserLogin" href="{{route('getLogin')}}">找教練流程</a>
                    <a id="cUserLogin" href="{{route('getLogin')}}">找學生流程</a>
                    <a id="cUserLogin" href="{{route('getLogin')}}">常見問題</a>
                </li>
                <li>
                    <a id="cUserLogin" href="{{route('getLogin')}}">最新消息</a>
                    <a id="cUserLogin" href="{{route('getLogin')}}">真實個案</a>
                </li>
                <li>
                    <a id="cUserLogin" href="{{route('getLogin')}}">收費須知</a>
                    <a id="cUserLogin" href="{{route('getLogin')}}">網上付款</a>
                </li>
                <li>
                    <a id="cUserLogin" href="{{route('getLogin')}}">關於我們</a>
                    <a id="cUserLogin" href="{{route('getLogin')}}">聯絡我們</a>
                    <a id="cUserLogin" href="{{route('getLogin')}}">廣告服務</a>
                </li>
            </ul>
        </div>
    </footer>

        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; GymPal Limited 2017</p>
            </div>
        </div>

</div>
<!-- /.container -->

<!-- Script to Activate the Carousel -->

    
<script>
    var table
	$(document).ready(function(){
        
    prepare_data();    
        
    table = $('#mytable').DataTable({
        "columnDefs": [
            {
                "targets": [ 1,5,7,12,13 ],
                "visible": false
            },
         
        ]
    });
        
            
        
})
    
    
            function update_table()
    {
        alert('update!');
        if ($('[name="search"]').val() == '')
            {
                table.draw();
            }
        
        else
        {
            table.search($('[name="search"]').val()).draw();
        }
        
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
        
        category_name = '{!! $case->category_name !!}';
        category_id = '{!! $case->category_id !!}';
        
        view_url = '{{route("public_view_case",$case->case_id)}}';
        
        action = '<a href='+view_url+'>view</a>'
        
        
        
        $('#mytable_body').append('<tr><td>'+time_created+'</td><td>'+case_id+'</td><td>'+student_sex+'</td><td>'+coach_sex+'</td><td>'+subject_name+'</td><td>'+subject_id+'</td><td>'+district_name+'</td><td>'+district_id+'</td><td>'+mode+'</td><td>'+venue+'</td><td>'+frequency+'</td><td>'+fee+'</td><td>'+category_id+'</td><td>'+category_name+'</td><td>'+action+'</td></tr>');
    
@endforeach

        
    }
    
    
    
    function view_case(link){
        
        
  var $dialog = $('#somediv')
  $dialog.html('<iframe style="border: 0px; " src="' + link + '" width="100%" height="100%"></iframe>')
  
  
  $dialog.dialog({
    title: "Page",
    autoOpen: false,
    dialogClass: 'dialog_fixed,ui-widget-header',
    modal: true,
    height: 500,
    minWidth: 400,
    minHeight: 400,
    position: 'top',
    draggable:true,
    /*close: function () { $(this).remove(); },*/
    buttons: { "Ok": function () {         $(this).dialog("close"); } }
  });
        
$dialog.position({
   my: "center",
   at: "center",
   of: window
});
        
        
  $dialog.dialog('open');
        
    }


</script>
    
    
</div>
</body>

</html>
