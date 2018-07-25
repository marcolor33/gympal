@extends($extend)

@section('content')
    <link rel="stylesheet" href=" {{ URL::to('vendor/datatables-plugins/dataTables.bootstrap.css') }} ">
    <link rel="stylesheet" href=" {{ URL::to('vendor/datatables-responsive/dataTables.responsive.css') }} ">


    <link href="{{ URL::to('css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ URL::to('css/modern-business.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ URL::to('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('https://fonts.googleapis.com/icon?family=Material+Icons') }}" rel="stylesheet">


    <script src="{{ URL::to('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{  URL::to('vendor/metisMenu/metisMenu.min.js') }}"></script>

    <script src="{{ URL::to('js/sb-admin-2.js') }}"></script>

<style>
    @media (min-width: 1000px) {

        #desktop {
            display: inherit !important;
        }

        #mobile {
            display: none !important;
        }

    }

    @media (max-width: 1000px) {

        #mobile{
            display: inherit !important;
        }
        #desktop {
            display: none !important;
        }
    }

</style>


    <br/>

    {{--<div class="container-fluid">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-12">--}}
    {{--<div class="row"style="width:1500px;padding-left: 20%;text-align: center;">--}}
    {{--<div class="col-md-1">--}}
    {{--</div>--}}
    {{--<div class="col-md-1">--}}
    {{--<a style="color: #0c0c0c; cursor: pointer;" onclick="show_category(0)"><img src="http://gympal.com.hk/front/storage/app/upload/Image/all.png"/></a>--}}
    {{--</div>--}}
    {{--<div class="col-md-1">--}}
    {{--<a style="color: #0c0c0c; cursor: pointer;" onclick="show_category(0)"><img src="http://gympal.com.hk/front/storage/app/upload/Image/all.png"/></a>--}}
    {{--</div>--}}
    {{--<div class="col-md-1">--}}
    {{--<a style="color: #0c0c0c; cursor: pointer;" onclick="show_category(0)"><img src="http://gympal.com.hk/front/storage/app/upload/Image/all.png"/></a>--}}
    {{--</div>--}}
    {{--<div class="col-md-1">--}}
    {{--<a style="color: #0c0c0c; cursor: pointer;" onclick="show_category(0)"><img src="http://gympal.com.hk/front/storage/app/upload/Image/all.png"/></a>--}}
    {{--</div>--}}
    {{--<div class="col-md-1">--}}
    {{--<a style="color: #0c0c0c; cursor: pointer;" onclick="show_category(0)"><img src="http://gympal.com.hk/front/storage/app/upload/Image/all.png"/></a>--}}
    {{--</div>--}}
    {{--<div class="col-md-1">--}}
    {{--<a style="color: #0c0c0c; cursor: pointer;" onclick="show_category(0)"><img src="http://gympal.com.hk/front/storage/app/upload/Image/all.png"/></a>--}}
    {{--</div>--}}
    {{--<div class="col-md-1">--}}
    {{--<a style="color: #0c0c0c; cursor: pointer;" onclick="show_category(0)"><img src="http://gympal.com.hk/front/storage/app/upload/Image/all.png"/></a>--}}
    {{--</div>--}}
    {{--<div class="col-md-1">--}}
    {{--<a style="color: #0c0c0c; cursor: pointer;" onclick="show_category(0)"><img src="http://gympal.com.hk/front/storage/app/upload/Image/all.png"/></a>--}}
    {{--</div>--}}
    {{--<div class="col-md-1">--}}
    {{--<a style="color: #0c0c0c; cursor: pointer;" onclick="show_category(0)"><img src="http://gympal.com.hk/front/storage/app/upload/Image/all.png"/></a>--}}
    {{--</div>--}}
    {{--<div class="col-md-1">--}}
    {{--<a style="color: #0c0c0c; cursor: pointer;" onclick="show_category(0)"><img src="http://gympal.com.hk/front/storage/app/upload/Image/all.png"/></a>--}}
    {{--</div>--}}
    {{--<div class="col-md-1">--}}
    {{--<a style="color: #0c0c0c; cursor: pointer;" onclick="show_category(0)"><img src="http://gympal.com.hk/front/storage/app/upload/Image/all.png"/></a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}


    <div class="collapse navbar-collapse" id="desktop"
         style="align-items: center; text-align: center; margin-left: 0%;">
        <ul class="nav navbar-nav navbar-default"
            style="align-items: center;display:inline-block;float: none;vertical-align:top;">

                <div class="col-md-2">
                    <li><a style="color: #0c0c0c; cursor: pointer;" onclick="show_category(0)"><img
                                    src="https://gympal.com.hk/front/storage/app/upload/Image/all.png"/></a></li>
                </div>
                <div class="col-md-2">
                    <li><a style="color: #0c0c0c; cursor: pointer;" onclick="show_category(1)"><img
                                    src="https://gympal.com.hk/front/storage/app/upload/Image/1.png"/></a></li>
                </div>
                <div class="col-md-2">
                    <li><a style="color: #0c0c0c; cursor: pointer;" onclick="show_category(2)"><img
                                    src="https://gympal.com.hk/front/storage/app/upload/Image/2.png"/></a></li>
                </div>
                <div class="col-md-2">
                    <li><a style="color: #0c0c0c; cursor: pointer;" onclick="show_category(3)"><img
                                    src="https://gympal.com.hk/front/storage/app/upload/Image/3.png"/></a></li>
                </div>
                <div class="col-md-2">
                    <li><a style="color: #0c0c0c; cursor: pointer;" onclick="show_category(4)"><img
                                    src="https://gympal.com.hk/front/storage/app/upload/Image/4.png"/></a></li>
                </div>
                <div class="col-md-2">
                    <li><a style="color: #0c0c0c; cursor: pointer;" onclick="show_category(5)"><img
                                    src="https://gympal.com.hk/front/storage/app/upload/Image/5.png"/></a></li>
                </div>


            <div class="row row-centered" style="margin-left: 5%;">

                <div class="col-md-2">
                    <li><a style="color: #0c0c0c; cursor: pointer;" onclick="show_category(6)"><img
                                    src="https://gympal.com.hk/front/storage/app/upload/Image/6.png"/></a></li>
                </div>
                <div class="col-md-2" style="margin-left: 2%;">
                    <li><a style="color: #0c0c0c; cursor: pointer;" onclick="show_category(7)"><img
                                    src="https://gympal.com.hk/front/storage/app/upload/Image/7.png"/></a></li>
                </div>
                <div class="col-md-2" style="margin-left: 2%;">
                    <li><a style="color: #0c0c0c; cursor: pointer;" onclick="show_category(8)"><img
                                    src="https://gympal.com.hk/front/storage/app/upload/Image/8.png"/></a></li>
                </div>
                <div class="col-md-2" style="margin-left: 2%;">
                    <li><a style="color: #0c0c0c; cursor: pointer;" onclick="show_category(9)"><img
                                    src="https://gympal.com.hk/front/storage/app/upload/Image/9.png"/></a></li>
                </div>
                <div class="col-md-2" style="margin-left: 2%;">
                    <li><a style="color: #0c0c0c; cursor: pointer;" onclick="show_category(10)"><img
                                    src="https://gympal.com.hk/front/storage/app/upload/Image/10.png"/></a></li>
                </div>
            </div>

            @foreach ($categories as $category)
                {{--<li>--}}
                {{--<a style="color: #0c0c0c; cursor: pointer;" onclick="show_category({!! $category->category_id !!})">{!! $category->name_chin  !!}</a>--}}
                {{--<a style="color: #0c0c0c; cursor: pointer;" onclick="show_category({!! $category->category_id !!})">{!! $category->category_id !!}</a></a>--}}
                {{--</li>--}}
            @endforeach

        </ul>
    </div>


    <div class="" id="mobile"
         style="align-items: center; text-align: center;">
        <ul class="nav navbar-nav navbar-default"
            style="align-items: center;display:inline-block;float: none;vertical-align:top;">

            @foreach ($categories as $category)
                <li>
                <a style="color: #0c0c0c; cursor: pointer; font-weight: bold; font-size: 17px;" onclick="show_category({!! $category->category_id !!})">{!! $category->name_chin  !!}</a>
                </li>
            @endforeach

        </ul>
    </div>


    <br/>
    <br/>


    <!--
                  @foreach ($coachs as $coach)

        @php

            $temp = explode(",",$coach->category_id);
            if (in_array($category->category_id,$temp))
            {
                $print = true;
            }
            else
                {

                    $print = false;
                }

        @endphp

        @if ($print)
        @endif
    @endforeach
            -->


    <div class="container" style="text-align: center;">
        <div class="category_row" id="0" style="text-align: center;">

            <h1><b>全部</b></h1>
            <br>
            <br>
            <br>
            <div class="row" style="text-align: center;">
                @foreach($coachs as $coach)
                    <div class="col-md-3 img-portfolio" style="text-align: center;min-height:350px;">

                        @if ($coach->profile_pic != '')

                            <a href="{{route('public_view_coach',$coach->account_id)}}"><img height=200px width=200px
                                                                                             src="{{$coach->profile_pic}}"/></a>
                        @elseif ($coach->sex == 'male')
                            <a href="{{route('public_view_coach',$coach->account_id)}}"><img height=200px width=200px
                                                                                             src='/front/storage/app/profileImg/profile-male.jpg'/></a>

                        @else
                            <a href="{{route('public_view_coach',$coach->account_id)}}"><img height=200px width=200px
                                                                                             src='/front/storage/app/profileImg/profile-female.jpg'/></a>

                        @endif


                        @if ($coach->chin_name == "")
                            <a href="{{route('public_view_coach',$coach->account_id)}}"><h5>{!!$coach->eng_name !!}</h5>
                            </a>

                        @else
                            <a href="{{route('public_view_coach',$coach->account_id)}}">
                                <h5>{!!$coach->chin_name !!}</h5></a>
                        @endif
                        <div style="min-height:50px;max-height:50px">
                            <h5>
                                @php
                                    $temp = explode(",",$coach->categories);
                                    $count = 1;
                                    $result = $temp[0];


                                    while ($count < 5 && $count < sizeof($temp))
                                    {

                                        $result = $result.", " .$temp[$count];
                                        $count++;
                                    }

                                    echo $result;
                                @endphp
                            </h5>


                        </div>

                        <div style="min-height:50px;">
                            @php if ($coach->approved == '1'){
                                echo '<img width="20" height="20" src="images/approved.png"/><b>專業認證</b><br>';
                                }
                            @endphp

                            @php if ($coach->star == '1'){
                                echo '<img width="20" height="20" src="images/stared.png"/><b>星級教練</b>';
                                }
                            @endphp

                            @php if ($coach->star == '0' && $coach->approved == '0'){
                                    echo '<br/>';
                                }
                            @endphp

                        </div>


                    </div>




                @endforeach
            </div>

        </div>

        @foreach($categories as $category)

            <div class="category_row" id='{!! $category->category_id !!}' style="text-align: center;">
                <h1><b>{!! $category->name_chin !!}</b></h1>
                <br>
                <br>
                <br>
                <div class="row" style="text-align: center;">
                    @foreach($coachs as $coach)


                        @php

                            $temp = explode(",",$coach->category_id);
                            if (in_array($category->category_id,$temp))
                            {
                                $print = true;
                            }
                            else
                                {

                                    $print = false;
                                }

                        @endphp

                        @if ($print)
                            <div class="col-md-3 img-portfolio" style="text-align: center;min-height:350px;">

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
                                    <a href="{{route('public_view_coach',$coach->account_id)}}">
                                        <h5>{!!$coach->eng_name !!}</h5></a>

                                @else
                                    <a href="{{route('public_view_coach',$coach->account_id)}}">
                                        <h5>{!!$coach->chin_name !!}</h5></a>
                                @endif
                                <div style="min-height:50px;max-height:50px">
                                    <h5>
                                        @php
                                            $temp = explode(",",$coach->categories);
                                            $count = 1;
                                            $result = $temp[0];


                                            while ($count < 5 && $count < sizeof($temp))
                                            {

                                                $result = $result.", " .$temp[$count];
                                                $count++;
                                            }

                                            echo $result;
                                        @endphp
                                    </h5>


                                </div>

                                <div style="min-height:50px;">
                                    @php if ($coach->approved == '1'){
                                echo '<img width="20" height="20" src="images/approved.png"/><b>專業認證</b><br>';
                                }
                                    @endphp

                                    @php if ($coach->star == '1'){
                                echo '<img width="20" height="20" src="images/stared.png"/><b>星級教練</b>';
                                }
                                    @endphp

                                    @php if ($coach->star == '0' && $coach->approved == '0'){
                                    echo '<br/>';
                                }
                                    @endphp

                                </div>


                            </div>
                        @endif





                    @endforeach
                </div>
            </div>
        @endforeach


    </div>


    <script>

        var filter;


        $(document).ready(function () {

            hide_all_category();


            @if (isset($_GET['category_id']))
                show_category({!! $_GET['category_id'] !!})

            @else
              show_category(0);

            @endif




        });

        function hide_all_category() {
            $('.category_row').hide();
        }


        function show_category(category_id) {
            hide_all_category();

            $('.category_row').filter($('[id=' + category_id + ']')).show();

        }

        function guest_show_interest() {

            alert('請先登入');
            window.location.href = "{{route('getLogin')}}";

        }


    </script>


@endsection
