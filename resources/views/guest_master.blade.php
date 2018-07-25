<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gympal</title>

    <!-- Share.css -->
    <link href="{{ URL::to('vendor/share-js/css/share.min.css') }}" rel="stylesheet">
    <!-- Share.js -->
    <script src="{{ URL::to('vendor/share-js/js/share.min.js') }}"></script>

    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::to('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ URL::to('vendor/metisMenu/metisMenu.min.css')  }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ URL::to('css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{  URL::to('vendor/morrisjs/morris.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ URL::to('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
    
    
    <!-- jQuery -->
    <script src="{{ URL::to('vendor/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::to('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{  URL::to('vendor/metisMenu/metisMenu.min.js') }}"></script>
    <!-- Morris Charts JavaScript -->
    <script src="{{ URL::to('vendor/raphael/raphael.min.js') }}"></script>

    <script src="{{ URL::to('vendor/morrisjs/morris.min.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ URL::to('js/sb-admin-2.js') }}"></script>
    
    <link rel="stylesheet" type="text/css" href="{{ URL::to('vendor/datatables/css/jquery.dataTables.min.css') }}">
    
    <script src="{{ URL::to('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>

    
<body>
    
    
    
    
    
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

            <a class="navbar-brand" id="cGympal" href="{{ route('home') }}">Gympal</a>
            <a class="fa fa-copyright" style="font-size:14px;color:white" ></a>
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
    <img width="1280" height="256" src="/front/storage/app/profileImg/logobanner.jpg"/>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2" style=" text-align: center;">
        <ul class="nav navbar-nav navbar-default" style="display:inline-block;float: none;vertical-align:top;">
	    <li>
                <a id="navBar" href="{{ route('getLogin') }}">首頁</a>
            </li>
            <li>
                <a id="navBar" href="{{ route('public_list_case') }}">學生個案</a>
            </li>
            
            <li>
                <a id="navBar" href="{{ route('public_list_coach') }}">教練資料庫</a>
            </li>
	    <li>
                <a id="navBar" href="{{route('view_static','find_coach')}}">找教練流程</a>
            </li>
            <li>
                <a id="navBar" href="{{route('view_static','real_case')}}">真實個案</a>
            </li>
            <li>
                <a id="navBar" href="{{route('view_static','latest_news')}}">最新消息</a>
            </li>
            <li>
                <a id="navBar" href="{{route('view_static','common_question')}}">常見問題</a>
            </li>
            <li>
                <a id="navBar" href="{{route('view_static','about_us')}}">關於我們</a>
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

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide One');"></div>
                <div class="carousel-caption">
                    <h2>Caption 1</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Two');"></div>
                <div class="carousel-caption">
                    <h2>Caption 2</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Three');"></div>
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

    


    <div id="wrapper">
            
<!--        this is cotent-->
                    @yield('content')
    </div>
    

</body>
    
     <footer>

         <div class="social-share" data-initialized="true" align="center">
             <a href="#" ><img style="margin-bottom: 5%" border="0" src="/front/storage/app/profileImg/fb.png" width="45" height="45"></a></a>
             <a href="#" ><img style="margin-bottom: 5%" border="0" src="/front/storage/app/profileImg/ig.png" width="42" height="42"></a>
             <a href="#" ><img style="margin-bottom: 5%" border="0" src="/front/storage/app/profileImg/yu.png" width="42" height="42"></a>
             <a href="#" ><img style="margin-bottom: 5%" border="0" src="/front/storage/app/profileImg/mail.png" width="42" height="42"></a>
             <a href="#" ><img style="margin-bottom: 5%" border="0" src="/front/storage/app/profileImg/ws.png" width="42" height="42"></a>
             <a href="#" ><img style="margin-bottom: 5%" border="0" src="/front/storage/app/profileImg/vv.ico" width="42" height="42"></a>
         </div>

         <br/>

         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2" style=" text-align: center;">
            <ul class="nav navbar-nav navbar-default" style="display:inline-block;float: none;vertical-align:top;">
                <li>
                    <a id="navBar" href="{{ route('getLogin') }}">首頁</a>
                </li>
                <li>
                    <a id="navBar" href="{{ route('view_static','privacy_policy') }}">私隱政策</a>
                </li>
                <li>
                    <a id="navBar" href="{{route('view_static','terms')}}">服務條款</a>
                </li>
                <li>
                    <a id="navBar" href="{{route('public_list_case')}}">學生個案</a>
                    <a id="navBar" href="{{route('public_list_coach')}}">教練資料庳</a>
                </li>
                <li>
                    <a id="navBar" href="{{route('view_static','find_coach')}}">找教練流程</a>
                    <a id="navBar" href="{{route('view_static','find_student')}}">找學生流程</a>
                    <a id="navBar" href="{{route('view_static','common_question')}}">常見問題</a>
                </li>
                <li>
                    <a id="navBar" href="{{route('view_static','latest_news')}}">最新消息</a>
                    <a id="navBar" href="{{route('view_static','real_case')}}">真實個案</a>
                </li>
                <li>
                    <a id="navBar" href="{{route('view_static','payment_info')}}">收費須知</a>
                    <a id="navBar" href="{{route('getLogin')}}">網上付款</a>
                </li>
                <li>
                    <a id="navBar" href="{{route('view_static','about_us')}}">關於我們</a>
                    <a id="navBar" href="{{route('view_static','contact_us')}}">聯絡我們</a>
                    <a id="navBar" href="{{route('view_static','advertisment')}}">廣告服務</a>
                </li>
            </ul>
        </div>
    </footer>

</html>
