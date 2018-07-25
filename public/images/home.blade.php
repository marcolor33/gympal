@extends($extend)

@section('content')

    <div id="wrapper">
        <header id="myCarousel" class="carousel slide">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="fill"
                         style="background-image:url('http://placehold.it/1900x1080&text=Slide One');"></div>
                    <div class="carousel-caption">
                        <h2>Caption 1</h2>
                    </div>
                </div>
                <div class="item">
                    <div class="fill"
                         style="background-image:url('http://placehold.it/1900x1080&text=Slide Two');"></div>
                    <div class="carousel-caption">
                        <h2>Caption 2</h2>
                    </div>
                </div>
                <div class="item">
                    <div class="fill"
                         style="background-image:url('http://placehold.it/1900x1080&text=Slide Three');"></div>
                    <div class="carousel-caption">
                        <h2>Caption 3</h2>
                    </div>
                </div>
                <div class="item">
                    <div class="fill"
                         style="background-image:url('http://placehold.it/1900x1080&text=Slide Four');"></div>
                    <div class="carousel-caption">
                        <h2>Caption 4</h2>
                    </div>
                </div>
                <div class="item">
                    <div class="fill"
                         style="background-image:url('http://placehold.it/1900x1080&text=Slide Five');"></div>
                    <div class="carousel-caption">
                        <h2>Caption 5</h2>
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

            <style>
                /*img {*/

                /*image-rendering: -webkit-optimize-contrast;*/

                /*}*/

                input.btn {
                    border-radius: 30px;
                    font-size: 15px;
                    padding: 10px;
                }


            </style>
        </header>
    </div>
    <body>

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


    <!-- Header Carousel -->
    {{--<header id="myCarousel" class="carousel slide">--}}
    {{--<!-- Indicators -->--}}
    {{--<ol class="carousel-indicators">--}}
    {{--<li data-target="#myCarousel" data-slide-to="0" class="active"></li>--}}
    {{--<li data-target="#myCarousel" data-slide-to="1"></li>--}}
    {{--<li data-target="#myCarousel" data-slide-to="2"></li>--}}
    {{--</ol>--}}

    {{--<!-- Wrapper for slides -->--}}
    {{--<div class="carousel-inner">--}}
    {{--<div class="item active">--}}
    {{--<div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide One');"></div>--}}
    {{--<div class="carousel-caption">--}}
    {{--<h2>Caption 1</h2>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="item">--}}
    {{--<div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Two');"></div>--}}
    {{--<div class="carousel-caption">--}}
    {{--<h2>Caption 2</h2>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="item">--}}
    {{--<div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Three');"></div>--}}
    {{--<div class="carousel-caption">--}}
    {{--<h2>Caption 3</h2>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<!-- Controls -->--}}
    {{--<a class="left carousel-control" href="#myCarousel" data-slide="prev">--}}
    {{--<span class="icon-prev"></span>--}}
    {{--</a>--}}
    {{--<a class="right carousel-control" href="#myCarousel" data-slide="next">--}}
    {{--<span class="icon-next"></span>--}}
    {{--</a>--}}
    {{--</header>--}}

    <!-- Header Carousel -->


    <!-- Page Content -->



        <!-- Marketing Icons Section -->


        <!-- Portfolio Section -->


        <div class="row" style="padding-left: 2%">
            <div class="col-lg-12">
                <h2 class="page-header"><img width="160px" min-height="110px"
                                             src="http://gympal.com.hk/front/storage/app/upload/Image/tCategories.jpg"/>
                </h2>
            </div>
        </div>

        @if(isset($_SESSION['user']))

            @if($_SESSION['user']['account_type'] == 'student')

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row" style="text-align:center;">
                                <div class="col-md-3">
                                    <a href="{{ route('public_list_coach') }}?category_id=3">
                                        <img width="80%" min-width="600px" src="images/fitness.jpg"  class
                                        ="img-rounded"></a>
                                </div>
                                <div class="col-md-3">
                                    <a href="{{ route('public_list_coach') }}?category_id=3">
                                        <img width="80%" min-width="600px" src="images/yoga.jpg" class
                                        ="img-rounded"></a>
                                </div>
                                <div class="col-md-3">
                                    <a href="{{ route('public_list_coach') }}?category_id=3">
                                        <img width="80%" min-width="600px" src="images/swim.jpg" class
                                        ="img-rounded">
                                    </a>                        </div>
                                <div class="col-md-3">
                                    <a href="{{ route('public_list_coach') }}?category_id=3">
                                        <img width="80%" min-width="600px" src="images/ball.jpg" class
                                        ="img-rounded"></a>
                                </div>
                            </div>

                            <br/>

                            <div class="row" style="text-align:center;">
                                <div class="col-md-3">
                                    <a href="{{ route('public_list_coach') }}?category_id=3">
                                        <img width="80%" min-width="600px" src="images/dance.jpg" class
                                        ="img-rounded"></a>
                                </div>
                                <div class="col-md-3">
                                    <a href="{{ route('public_list_coach') }}?category_id=3">
                                        <img width="80%" min-width="600px" src="images/boxing.jpg" class
                                        ="img-rounded"></a>
                                </div>
                                <div class="col-md-3">
                                    <a href="{{ route('public_list_coach') }}?category_id=3">
                                        <img width="80%" min-width="600px" src="images/kungFu.jpg" class
                                        ="img-rounded"></a>
                                </div>
                                <div class="col-md-3">
                                    <a href="{{ route('public_list_coach') }}?category_id=3">
                                        <img width="80%" min-width="600px" src="images/run.jpg" class
                                        ="img-rounded"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            @elseif ($_SESSION['user']['account_type'] == 'coach')


                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row" style="text-align:center;">
                                <div class="col-md-3">
                                    <a href="{{ route('public_list_coach') }}?category_id=3">
                                        <img width="80%" min-width="600px" src="images/fitness.jpg"  class
                                        ="img-rounded"></a>
                                </div>
                                <div class="col-md-3">
                                    <a href="{{ route('public_list_coach') }}?category_id=3">
                                        <img width="80%" min-width="600px" src="images/yoga.jpg" class
                                        ="img-rounded"></a>
                                </div>
                                <div class="col-md-3">
                                    <a href="{{ route('public_list_coach') }}?category_id=3">
                                        <img width="80%" min-width="600px" src="images/swim.jpg" class
                                        ="img-rounded">
                                    </a>                        </div>
                                <div class="col-md-3">
                                    <a href="{{ route('public_list_coach') }}?category_id=3">
                                        <img width="80%" min-width="600px" src="images/ball.jpg" class
                                        ="img-rounded"></a>
                                </div>
                            </div>

                            <br/>

                            <div class="row" style="text-align:center;">
                                <div class="col-md-3">
                                    <a href="{{ route('public_list_coach') }}?category_id=3">
                                        <img width="80%" min-width="600px" src="images/dance.jpg" class
                                        ="img-rounded"></a>
                                </div>
                                <div class="col-md-3">
                                    <a href="{{ route('public_list_coach') }}?category_id=3">
                                        <img width="80%" min-width="600px" src="images/boxing.jpg" class
                                        ="img-rounded"></a>
                                </div>
                                <div class="col-md-3">
                                    <a href="{{ route('public_list_coach') }}?category_id=3">
                                        <img width="80%" min-width="600px" src="images/kungFu.jpg" class
                                        ="img-rounded"></a>
                                </div>
                                <div class="col-md-3">
                                    <a href="{{ route('public_list_coach') }}?category_id=3">
                                        <img width="80%" min-width="600px" src="images/run.jpg" class
                                        ="img-rounded"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endif

        @else

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row" style="text-align: center;">
                            <div class="col-md-3">
                                <a href="{{ route('public_list_coach') }}?category_id=3">
                                    <img width="80%" min-width="600px" src="images/fitness.jpg"  class
                                    ="img-rounded"></a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('public_list_coach') }}?category_id=3">
                                    <img width="80%" min-width="600px" src="images/yoga.jpg" class
                                    ="img-rounded"></a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('public_list_coach') }}?category_id=3">
                                    <img width="80%" min-width="600px" src="images/swim.jpg" class
                                    ="img-rounded">
                                </a>                        </div>
                            <div class="col-md-3">
                                <a href="{{ route('public_list_coach') }}?category_id=3">
                                    <img width="80%" min-width="600px" src="images/ball.jpg" class
                                    ="img-rounded"></a>
                            </div>
                        </div>

                        <br/>

                        <div class="row" style="text-align:center;">
                            <div class="col-md-3">
                                <a href="{{ route('public_list_coach') }}?category_id=3">
                                    <img width="80%" min-width="600px" src="images/dance.jpg" class
                                    ="img-rounded"></a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('public_list_coach') }}?category_id=3">
                                    <img width="80%" min-width="600px" src="images/boxing.jpg" class
                                    ="img-rounded"></a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('public_list_coach') }}?category_id=3">
                                    <img width="80%" min-width="600px" src="images/kungFu.jpg" class
                                    ="img-rounded"></a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('public_list_coach') }}?category_id=3">
                                    <img width="80%" min-width="600px" src="images/run.jpg" class
                                    ="img-rounded"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        @endif

    <div class="container">

        @if(isset($_SESSION['user']))

            @if($_SESSION['user']['account_type'] == 'student')

                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header"><img width="160px" min-height="110px"
                                                     src="http://gympal.com.hk/front/storage/app/upload/Image/tStudentReg.jpg"/>
                        </h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="panel panel-default text-center">
                            <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              {{--<i class="fa fa-circle fa-stack-2x text-primary"></i>--}}
                            <i class="fa fa-group fa-stack-1x fa-inverse" style="color:#CC3623"></i>
                        </span>
                            </div>
                            <div class="panel-body">
                                <a href="{{ route('create_case') }}" class="btn btn-primary">新增個案</a>
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
                                <a href="{{ route('public_list_coach') }}" class="btn btn-primary">尋找教練</a>
                            </div>
                        </div>
                    </div>
                </div>

            @endif
        @else


            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header"><img width="160px" min-height="110px"
                                                 src="http://gympal.com.hk/front/storage/app/upload/Image/tStudentReg.jpg"/>
                    </h2>
                </div>
            </div>

            {{--<div class="row">--}}
            {{--<div class="col-md-6 col-sm-6">--}}
            {{--<div class="panel panel-default text-center">--}}
            {{--<div class="panel-heading">--}}
            {{--<span class="fa-stack fa-5x">--}}
            {{--<i class="fa fa-circle fa-stack-2x text-primary"></i>--}}
            {{--<i class="fa fa-group fa-stack-1x fa-inverse"  style="color:#CC3623"></i>--}}
            {{--</span>--}}
            {{--</div>--}}
            {{--<div class="panel-body">--}}
            {{--<a href="{{ route('studentApply') }}" class="btn btn-primary" >學生登記</a>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-6 col-sm-6">--}}
            {{--<div class="panel panel-default text-center">--}}
            {{--<div class="panel-heading">--}}
            {{--<span class="fa-stack fa-5x">--}}
            {{--<i class="fa fa-circle fa-stack-2x text-primary"></i>--}}
            {{--<i class="fa fa-briefcase fa-stack-1x fa-inverse" style="color:#5E9FFF"></i>--}}
            {{--</span>--}}
            {{--</div>--}}
            {{--<div class="panel-body">--}}
            {{--<a href="{{ route('coachApply') }}" class="btn btn-primary" >導師登記</a>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<a href="{{route('public_view_coach',$coach->account_id)}}"><img height=200px width=200px src='/front/storage/app/profileImg/profile-male.jpg'/></a>--}}

            <img width="80%" min-height="300px" src="/front/storage/app/bigpic/studentflow.jpg"/>
    @endif



    <!-- Features Section -->


        <div hidden class="well">
            <h4><img src="images/searchCase.png"/>個案搜尋</h4>
            <br/>

            <div class="row">
                <div class="col-lg-4">
                    <ul class="list-unstyled" style="margin-left: 30%">
                        <li>
                            <div class="select-style" style="text-align:center;"><select name="category">
                                    <option value="default">運動類型</option>
                                    @foreach($categories as $category)

                                        <option value="{!! $category->category_id !!}">{!! $category->name_chin !!}</option>
                                    @endforeach

                                </select>
                            </div>
                        </li>
                        <br/>
                        <li>
                            <div class="select-style">


                                <select name='coach_sex'>
                                    <option value="default">教練性別</option>
                                    <option value="male">男</option>
                                    <option value="female">女</option>
                                    <option value="undefined">無所謂</option>
                                </select>

                            </div>
                        </li>
                        <br/>
                        <li>
                            <div class="select-style">

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
                <div class="col-lg-4">
                    <ul class="list-unstyled" style="margin-left: 20%">
                        <li>
                        </li>
                        <li>
                            <div class="select-style">

                                <select name="district">
                                    <option value="default">上課地區</option>
                                    <option value="" disabled><p><b>---香港島---</b></p></option>
                                    @foreach ($hkDistricts as $hkDistrict)
                                        <option value="{!!$hkDistrict->district_id!!}"/> {!! $hkDistrict->name_chin !!} </option>
                                    @endforeach
                                    <option value="" disabled><p><b>---九龍區---</b></p></option>
                                    @foreach ($knDistricts as $knDistrict)
                                        <option value="{!!$knDistrict->district_id!!}"/> {!! $knDistrict->name_chin !!} </option>
                                    @endforeach
                                    <option value="" disabled><p><b>---新界區---</b></p></option>
                                    @foreach ($ntDistricts as $ntDistrict)
                                        <option value="{!!$ntDistrict->district_id!!}"/> {!! $ntDistrict->name_chin !!} </option>
                                    @endforeach
                                    <option value="" disabled><p><b>---其它地區---</b></p></option>
                                    @foreach ($otherDistricts as $otherDistrict)
                                        <option value="{!!$otherDistrict->district_id!!}"/> {!! $otherDistrict->name_chin !!} </option>
                                    @endforeach

                                </select>
                            </div>
                        </li>
                        <br/>
                        <li>
                            <div class="select-style"><select name='venue'>

                                    <option value="default">上課地點</option>
                                    <option value="Facilities&VenuesOfLCSD">康文署體育館/ 場地</option>
                                    <option value="Clubhouse">私人會所/ 場地</option>
                                    <option value="SchoolOrCommunityCenter">學校/ 社區中心</option>
                                    <option value="CoachAssign">教練提供場地</option>
                                    <option value="Other">其它</option>


                                </select>
                            </div>
                        </li>
                        <br/>
                        <li>
                            <div class="select-style">
                                <select name='mode'>

                                    <option value="default">上課模式</option>
                                    <option value="single">單對單</option>
                                    <option value="group">小組訓練</option>
                                    <option value="coachArrange">參加教練安排課堂</option>


                                </select>
                            </div>
                        </li>
                        <br/>
                        <li>
                            <div class="select-style">

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
                        <li>
                            <div class="form-group">
                                <input size="30" name="search" type="text" placeholder="搜尋關鍵字">
                            </div>
                        </li>
                        <br/>
                        <li>
                            <div>時薪：</div>
                            <br/>
                            <div class="form-group" style="text-align:left;">
                                由 <input size="5" name="min_pay" type=number>
                                <br/> <br/>
                                至 <input size="5" name="max_pay" type="number">
                            </div>
                        </li>

                    </ul>
                </div>

                <!-- /.col-lg-6 -->
            </div>

            <!-- /.row -->
            <br/>
            <div class="form-group" style="text-align: center">
                <button type="button" onclick="update_table()">清除</button>
                <button type="button" onclick="update_table()">搜尋</button>
            </div>
        </div>
        <br/>
        <hr/>


        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header"><img width="160px" min-height="110px"
                                             src="http://gympal.com.hk/front/storage/app/upload/Image/tLatestCase.jpg"/>
                </h2>
            </div>

            @if ($counter != 0)

                <h5 align="right">近期個案總數： {{$counter}}</h5>

            @endif


            <table class="stripe" id="mytable">


                <thead>
                <tr>
                    <th>個案日期</th>
                    <th>學生性別</th>
                    <th>教練性別</th>
                    <th>運動類別</th>
                    <th>上堂地區</th>
                    <th>上堂場地</th>
                    <th>上堂模式</th>
                    <th>上堂次數</th>
                    <th>每堂收費</th>
                    <th>立即申請</th>
                </tr>
                </thead>

                {{--<thead><tr><th>配對時間</th><th>個案編號</th><th>學生性別</th><th>教練性別</th><th>運動名稱</th><th>運動編號</th><th>地區</th><th>地區編號</th><th>模式</th><th>場地</th><th>上課週期</th><th>收費</th><th>類別編號</th><th>類別名稱</th><th>詳細</th></tr></thead>--}}
                <tbody id="mytable_body">

                </tbody>
            </table>

            <div style="text-align: center;">
                <br/>

                <input class="btn" onclick="guest_more_case();" type="button" value="更多個案"/>
            </div>


        </div>
        <!-- /.row -->

        <hr>

        <div class="row">

        </div>


        <div class="row">
            {{--<div class="col-lg-12">--}}
            <h2 class="page-header"><img width="170px" min-height="120px"
                                         src="http://gympal.com.hk/front/storage/app/upload/Image/tTopCoach.jpg"/></h2>

            <div class="panel panel-default" style="width: 100%;">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                    <div class="row">
                        @php
                            $count =0;
                        @endphp
                        
                        @foreach ($coachs as $coach)
                            @php
                                $count++;
                            @endphp
                            <div class="col-md-6 img-portfolio">
                                <img height=5px width=5px src='/front/public/images/medal1.png'/>
                                
                                <a href="{{route('public_view_coach',$coach->account_id)}}"><img
                                            class="img-responsive img-hover" src="{{$coach->profile_pic}}"/></a>

                                @if ($coach->profile_pic != '')

                                    <a href="{{route('public_view_coach',$coach->account_id)}}"><img height=200px
                                                                                                     width=200px
                                                                                                     src="{{$coach->profile_pic}}"/></a>
                                @elseif ($coach->sex == 'male')
                                    <a href="{{route('public_view_coach',$coach->account_id)}}"><img height=200px
                                                                                                     width=200px
                                                                                                     src='/front/storage/app/profileImg/profile-male.jpg'/></a>

                                @else
                                    <a href="{{route('public_view_coach',$coach->account_id)}}"><img height=200px
                                                                                                     width=200px
                                                                                                     src='/front/storage/app/profileImg/profile-female.jpg'/></a>

                                @endif


                                @if ($coach->chin_name == "")
                                    <h5>{!!$coach->eng_name !!}</h5>

                                @else
                                    <h5>{!!$coach->chin_name !!}</h5>
                                @endif
                                <h5>{!!$coach->subjects !!}</h5>
                                <h5>{!!$coach->self_intro !!}</h5>


                                <a class="btn btn-default"
                                   href="{{route('public_view_coach',$coach->account_id)}}">申請</a>

                            </div>


                        @endforeach
                    </div>
                </div>
            </div>
            <!-- /.col-lg-12 -->

        {{--</div>--}}



        <!-- /.row -->

            <hr>

            <!-- Footer -->


            <!-- /.container -->

            <!-- Script to Activate the Carousel -->


            <script>
                var table
                $(document).ready(function () {

                    prepare_data();

//    table = $('#mytable').DataTable({
//        "columnDefs": [
//            {
//                "targets": [ 1,5,7,12,13 ],
//                "visible": false,
//                
//            },
//            
//           
//         
//        ],
//        "order": [[0,"desc"]],
//         "bLengthChange" : false,
//        "iDisplayLength" : -1,
//        "paging": false,
//        "searching" : false,
//        "bInfo" : false,
//        
//        
//    });

                    table = $('#mytable').DataTable({

                        "order": [[0, "desc"]],
                        "bLengthChange": false,
                        "iDisplayLength": -1,
                        "paging": false,
                        "searching": false,
                        "bInfo": false,


                    });

                    $('#myCarousel').carousel({

                        interval: 3000

                    })


                })


                function update_table() {
                    alert('update!');
                    if ($('[name="search"]').val() == '') {
                        table.draw();
                    }

                    else {
                        table.search($('[name="search"]').val()).draw();
                    }

                }


                function prepare_data() {

                    var time_created;
                    var case_id;
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

                    venue = $('[name="venue"] option[value="{!! $case->venue !!}"]').html();

                    frequency = $('[name="frequency"] option[value="{!! $case->lesson_per_week !!}"]').html();

                    fee = '{!! $case->fee!!}';

                    category_name = '{!! $case->category_name !!}';
                    category_id = '{!! $case->category_id !!}';

                    view_url = '{{route("public_view_case",$case->case_id)}}';

                    action = '<a href=' + view_url + '>詳細</a>'


                    //time_created.getFullYear()+'-'+(time_created.getMonth()+1)+'-'+time_created.getDay()
                    $('#mytable_body').append('<tr><td>' + time_created + '</td><td>' + student_sex + '</td><td>' + coach_sex + '</td><td>' + subject_name + '</td><td>' + district_name + '</td><td>' + venue + '</td><td>' + mode + '</td><td>' + frequency + '</td><td>$' + fee + '</td><td>' + action + '</td></tr>');

                    @endforeach


                }


                function guest_more_case() {

                    window.location.href = "{{route('public_list_case')}}";


                }


            </script>


        </div>
    </body>


@endsection






