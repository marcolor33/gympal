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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Gympal是全港首個網上互動運動教練配對平台，為教練及學生提供配對服務，藉此令大眾更方便，有效地接觸和學習各式各樣運動。Gympal會為各項運動提供最優質、最專業的教練及導師，所有教練會員都經過嚴格審核，確保能使所有學生得到最好的服務，學生亦可以自由選擇上堂學費、時間及地點，運動種類如健身、瑜伽、游水、球類、泰拳、跳舞、武術、跑步等等，無論是單對單訓練、小組訓練或參加教練安排的課堂，Gympal都可以全方位照顧每一位學生的需要。"/>
    <meta name="author" content="">
    <meta name="google-site-verification" content="NcoRICT3COwf7nFTnetmbQEWefHPRYdt-QzaO058g7k" />
    <meta name="norton-safeweb-site-verification" content="47ppsvu1sbn7qs64cjkks3yum1se3928-i0tk3bmql012y5cki8p4tb9fg0r6c3u8tn7fsrzzyqqkvq-dkkcwawbnur9m29pbf8-17i-72glbor64101wewqik9zwr4g" />

    <title>Gympal | 您的運動教練配對平台</title>

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

    <div id="wrapper">

        <!-- Navigation -->
        @include('includes.navbar')

        <div id="page-wrapper">
            @yield('content')
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


</body>

</html>
