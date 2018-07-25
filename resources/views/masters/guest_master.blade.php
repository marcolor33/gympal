<!DOCTYPE html>
<html lang="en">

<head>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-108276866-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-108276866-1');
</script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0">
    <meta name="description" content="Gympal是全港首個網上互動運動教練配對平台，為教練及學生提供配對服務，藉此令大眾更方便，有效地接觸和學習各式各樣運動。Gympal會為各項運動提供最優質、最專業的教練及導師，所有教練會員都經過嚴格審核，確保能使所有學生得到最好的服務，學生亦可以自由選擇上堂學費、時間及地點，運動種類如健身、瑜伽、游水、球類、泰拳、跳舞、武術、跑步等等，無論是單對單訓練、小組訓練或參加教練安排的課堂，Gympal都可以全方位照顧每一位學生的需要。">
    <meta name="author" content="">
    <meta name="google-site-verification" content="NcoRICT3COwf7nFTnetmbQEWefHPRYdt-QzaO058g7k" />
    <meta name="norton-safeweb-site-verification" content="47ppsvu1sbn7qs64cjkks3yum1se3928-i0tk3bmql012y5cki8p4tb9fg0r6c3u8tn7fsrzzyqqkvq-dkkcwawbnur9m29pbf8-17i-72glbor64101wewqik9zwr4g" />
 
    <title>Gympal | 您的運動教練配對平台</title>

    <link rel="icon" href="/front/storage/app/profileImg/logo_0607.png">

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

    <style>


        li a {
            font-size: 14px;
        }

        /*img {*/

        /*image-rendering: -webkit-optimize-contrast;*/

        /*}*/

        footer {
            /*background: #595856;*/
            background: #888888;
            color: white;
            position: relative;
            bottom: -300px;
            width: 100%;

        }

        footer a {
            color: white;
        }

        @media (min-width: 768px) {
            .seven-cols .col-md-1,
            .seven-cols .col-sm-1,
            .seven-cols .col-lg-1 {
                width: 100%;
                *width: 100%;
            }
        }

        @media (min-width: 992px) {
            .seven-cols .col-md-1,
            .seven-cols .col-sm-1,
            .seven-cols .col-lg-1 {
                width: 14.285714285714285714285714285714%;
                *width: 14.285714285714285714285714285714%;
            }
        }

        /**
         *  The following is not really needed in this case
         *  Only to demonstrate the usage of @media for large screens
         */
        @media (min-width: 1200px) {
            .seven-cols .col-md-1,
            .seven-cols .col-sm-1,
            .seven-cols .col-lg-1 {
                width: 14.285714285714285714285714285714%;
                *width: 14.285714285714285714285714285714%;
            }
        }

        html, body { overflow-x: hidden; }

    </style>

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


<nav class="navbar navbar-inverse navbar-fixed-top" id="cNavBar" role="navigation" style="background: #888888; border-color:#888888">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {{--<a class="navbar-brand" id="cGympal" href="{{ route('home') }}"><b style="font-size: 20px;">GymPal</b></a>--}}

            <a class="navbar-brand" id="cGympal" href="{{ route('home') }}"><img width="40px" height="40px" style="position:relative; top:-10px" src="/front/storage/app/profileImg/logo_0607.png"/></a>
            <!--<a class="fa fa-copyright" style="font-size:14px;color:white"></a>-->
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
                    <a id="cUserLogin" href="{{route('getLogin')}}">會員登入</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<img width="100%" min-height="250px" src="/front/storage/app/profileImg/logobanner_0531.jpg"/>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2" style=" text-align: center;">
    <ul class="nav navbar-nav navbar-default" style="display:inline-block;float: none;vertical-align:top;">
        <li>
            <a id="topNavBar" href="{{ route('home') }}">首頁</a>
        </li>
        <li>
            <a id="topNavBar" href="{{ route('public_list_case') }}">學生個案</a>
        </li>

        <li>
            <a id="topNavBar" href="{{ route('public_list_coach') }}">教練資料庫</a>
        </li>
        <li>
            <a id="topNavBar" href="{{route('view_static','find_coach')}}">流程教學</a>
        </li>
        <li>
            <a id="topNavBar" href="{{route('view_static','real_case')}}">真實個案</a>
        </li>
        <li>
            <a id="topNavBar" href="{{route('view_static','latest_news')}}">最新消息</a>
        </li>
        <li>
            <a id="topNavBar" href="{{route('view_static','common_question')}}">常見問題</a>
        </li>
        <li>
            <a id="topNavBar" href="{{route('view_static','about_us')}}">關於我們</a>
        </li>
    </ul>
</div>

<!--<img width="1280" height="256" src="/front/storage/app/profileImg/logobanner.jpg"/>-->


@if(isset($actionName))
    @if($actionName=="home")
        <!-- Header Carousel -->
        <div id="wrapper">
            <div class="row">
                <!--<div class="col-lg-2 col-md-2 col-sm-2"></div>-->
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <header id="myCarousel" class="carousel slide" data-interval="15000">
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
                                <div class="fill" onclick="window.location.href ='{{route('view_static','latest_news')}}';" style="height: 80%; cursor: pointer;">
                                    <img class="img-responsive" style="margin: 0 auto;"  src="/front/storage/app/slider/slide1.jpg"/>
                                </div>
                                <div class="carousel-caption">
                                    {{--<h2>Caption 1</h2>--}}
                                </div>
                            </div>
                            <div class="item">
                                <div class="fill" onclick="window.location.href ='{{route('view_static','latest_news')}}';" style="height: 80%; cursor: pointer;">
                                    <img class="img-responsive" style="margin: 0 auto;" src="/front/storage/app/slider/slide2.jpg"/>
                                </div>
                                <div class="carousel-caption">
                                    {{--<h2>Caption 2</h2>--}}
                                </div>
                            </div>
                            <div class="item">
                                <div class="fill" onclick="window.location.href ='{{route('view_static','latest_news')}}';" style="height: 80%; cursor: pointer;">
                                    <img class="img-responsive" style="margin: 0 auto;" src="/front/storage/app/slider/slide3.jpg"/>
                                </div>
                                <div class="carousel-caption">
                                    {{--<h2>Caption 3</h2>--}}
                                </div>
                            </div>
                            <div class="item">
                                <div class="fill" onclick="window.location.href ='{{route('view_static','latest_news')}}';" style="height: 80%; cursor: pointer;">
                                    <img class="img-responsive" style="margin: 0 auto;" src="/front/storage/app/slider/slide4.jpg"/>
                                </div>
                                <div class="carousel-caption">
                                    {{--<h2>Caption 4</h2>--}}
                                </div>
                            </div>
                            <div class="item">
                                <div class="fill" onclick="window.location.href ='{{route('view_static','latest_news')}}';" style="height: 80%; cursor: pointer;">
                                    <img class="img-responsive" style="margin: 0 auto;" src="/front/storage/app/slider/slide5.jpg"/>
                                </div>
                                <div class="carousel-caption">
                                    {{--<h2>Caption 5</h2>--}}
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
                </div>
                <!--<div class="col-lg-2 col-md-2 col-sm-2"></div>-->
            </div>
        </div>
    @endif
@endif

<div id="wrapper">
    <!--This is cotent-->
    @yield('content')
</div>


</body>

<footer>

    <br/>

    <div class="container-fluid" style="text-align: center">
        <div class="row" style="text-align: center;">

            <br/>
            <br/>

            <div class="navbar navbar-inverse" id="bs-example-navbar-collapse-2" style="background: #888888; border-color:#888888; text-align: center;">
                <ul class="nav navbar-nav" style="color:white; display:inline-block;float: none;vertical-align:top;">
                    <li>
                        <a id="bottomNavBar" href="{{ route('view_static','privacy_policy') }}">私隱政策</a>
                    </li>
                    <li>
                        <a id="bottomNavBar" href="{{route('view_static','terms')}}">服務條款</a>
                    </li>

                    <li>
                        <a id="bottomNavBar" href="{{route('public_list_case')}}">學生個案</a>
                    </li>
                    <li>
                        <a id="bottomNavBar" href="{{route('public_list_coach')}}">教練資料庫</a>
                    </li>
                    <li>
                        <a id="bottomNavBar" href="{{route('view_static','find_coach')}}">找教練流程</a>
                    </li>
                    <li>
                        <a id="bottomNavBar" href="{{route('view_static','find_student')}}">找學生流程</a>
                    </li>
                    <li>
                        <a id="bottomNavBar" href="{{route('view_static','payment_info')}}">收費須知</a>
                    </li>
                </ul>
            </div>
            <!--
            <div class="row seven-cols" style="text-align: center; padding-left:21.5%; width: 80%">
                <div class="col-md-1">
                    <a id="navBar" style="color: white;" href="{{ route('view_static','privacy_policy') }}">私隱政策</a>
                </div>
                <div class="col-md-1">
                    <a id="navBar" style="color: white;" href="{{route('view_static','terms')}}">服務條款</a>
                </div>
                <div class="col-md-1">
                    <a id="navBar" style="color: white;" href="{{route('public_list_case')}}">學生個案</a>
                </div>
                <div class="col-md-1">
                    <a id="navBar" style="color: white;" href="{{route('public_list_coach')}}">教練資料庳</a>
                </div>
                <div class="col-md-1">
                    <a id="navBar" style="color: white;" href="{{route('view_static','find_coach')}}">找教練流程</a>
                </div>
                <div class="col-md-1">
                    <a id="navBar" style="color: white;" href="{{route('view_static','find_student')}}">找學生流程</a>
                </div>
                <div class="col-md-1">
                    <a id="navBar" style="color: white;" href="{{route('view_static','payment_info')}}">收費須知</a></div>
            </div>
            -->
            <!--<br/>
            <br/>
            -->
            <div class="navbar navbar-inverse" id="bs-example-navbar-collapse-2" style="background: #888888; border-color:#888888; text-align: center;">
                <ul class="nav navbar-nav" style="color:white; display:inline-block;float: none;vertical-align:top;">
                    <li>
                        <a id="bottomNavBar" href="{{route('view_static','latest_news')}}">最新消息</a>
                    </li>
                    <li>
                        <a id="bottomNavBar" href="{{route('view_static','real_case')}}">真實個案</a>
                    </li>

                    <li>
                        <a id="bottomNavBar" href="{{route('view_static','common_question')}}">常見問題</a>
                    </li>
                    <li>
                        <a id="bottomNavBar" href="{{route('view_static','advertisment')}}">廣告服務</a>
                    </li>
                    <li>
                        <a id="bottomNavBar" href="{{route('view_static','contact_us')}}">聯絡我們</a>
                    </li>
                    <li>
                        <a id="bottomNavBar" href="{{route('view_static','about_us')}}">關於我們</a>
                    </li>
                    <li>
                        <a id="bottomNavBar" href="{{route('view_static','online_payment')}}">網上付款</a>
                    </li>
                </ul>
            </div>
            <!--
            <div class="row seven-cols" style="text-align: center; padding-left:21.5%; width: 80%">
                <div class="col-md-1">
                    <a id="navBar" style="color: white;" href="{{route('view_static','latest_news')}}">最新消息</a>
                </div>
                <div class="col-md-1">
                    <a id="navBar" style="color: white;" href="{{route('view_static','real_case')}}">真實個案</a>
                </div>
                <div class="col-md-1">
                    <a id="navBar" style="color: white;" href="{{route('view_static','common_question')}}">常見問題</a>
                </div>
                <div class="col-md-1">
                    <a id="navBar" style="color: white;" href="{{route('view_static','advertisment')}}">廣告服務</a>
                </div>
                <div class="col-md-1">
                    <a id="navBar" style="color: white;" href="{{route('view_static','contact_us')}}">聯絡我們</a>
                </div>
                <div class="col-md-1">
                    <a id="navBar" style="color: white;" href="{{route('view_static','about_us')}}">關於我們</a>
                </div>
                <div class="col-md-1">
                    <a id="navBar" style="color: white;" href="{{route('getLogin')}}">網上付款</a>
                </div>
            </div>
            -->
            <br/>
            <br/>
            <br/>

            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="https://www.facebook.com/gympalhk/"><img style="margin-bottom: 5%; padding-left: -5%;" border="0"
                                             src="https://gympal.com.hk/front/storage/app/upload/Image/facebook.png"
                                             width="55"
                                             height="55"></a></a>
                            <a href="https://www.instagram.com/gympalhk/" style="padding-left: 1%;"><img style="margin-bottom: 5%;" border="0"
                                                                       src="https://gympal.com.hk/front/storage/app/upload/Image/instagram.png"
                                                                       width="55"
                                                                       height="55"></a>
                            <a href="https://www.youtube.com/channel/UCmE7_OT8BkXinsdZJ4Z5iZw" style="padding-left: 1%;"><img style="margin-bottom: 5%;" border="0"
                                                                       src="https://gympal.com.hk/front/storage/app/upload/Image/youtube.png"
                                                                       width="55"
                                                                       height="55"></a>
                            <a href="{{route('view_static','contact_us')}}" style="padding-left: 1%;"><img style="margin-bottom: 5%;" border="0"
                                                                       src="https://gympal.com.hk/front/storage/app/upload/Image/email.png"
                                                                       width="55"
                                                                       height="55"></a>
                            <a href="{{route('view_static','contact_us')}}" style="padding-left: 1%;"><img style="margin-bottom: 5%;" border="0"
                                                                       src="https://gympal.com.hk/front/storage/app/upload/Image/whatsapp.png"
                                                                       width="55"
                                                                       height="55"></a>
                            <a href="{{route('view_static','contact_us')}}" style="padding-left: 1%;"><img style="margin-bottom: 5%;" border="0"
                                                                       src="https://gympal.com.hk/front/storage/app/upload/Image/phone.png"
                                                                       width="55"
                                                                       height="55"></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" style="text-align: right;">
                            <div style="padding-right: 20px">© Copyright 2017 Gympal 版權所有</div>
                        </div>
                    </div>
                </div>
            </div>


            <br/>

        </div>

    </div>

</footer>


</html>
