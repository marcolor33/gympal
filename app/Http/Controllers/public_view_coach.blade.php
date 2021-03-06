@extends($extend)

@section('content')



    <script src="{{ URL::to('formValidateLib/jquery.validate.js') }}"></script>
    <!--
    <script src = "{{ URL::to('formValidateLib/inputmask/inputmask.js') }}"></script>
    <script src = "{{ URL::to('formValidateLib/inputmask/jquery.inputmask.js') }}"></script>
    -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <script src="{{ URL::to('formValidateLib/jquery.mask.js') }}"></script>
    <script src="{{ URL::to('formValidateLib/additional-methods.js') }}"></script>
    <script src="{{ URL::to('formValidateLib/localization/messages_zh_TW.min.js') }}"></script>
    <link rel="stylesheet" href=" {{ URL::to('formValidateLib/animate.min.css') }} ">



    <link href="{{ URL::to('css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ URL::to('css/modern-business.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ URL::to('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('https://fonts.googleapis.com/icon?family=Material+Icons') }}" rel="stylesheet">


    <script src="{{ URL::to('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{  URL::to('vendor/metisMenu/metisMenu.min.js') }}"></script>

    <script src="{{ URL::to('js/sb-admin-2.js') }}"></script>

    <style>
        input.btn {
            border-radius: 30px;
            font-size: 15px;
            padding: 10px;
        }

        hr {
            background-color: dimgrey;
            color: dimgrey !important;
            height: 0px;
            width: 220px;
            border-style: dotted;
        }

        @media screen and (max-width: 1000px) {
            hr {
                display:none;
            }
        }

/*
        input:checked {
            height: 50px;
            width: 50px;
        }
*/

    </style>


    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="font-size: 36px; font-weight: bold; text-align: center">教練資料庫</h1>

            </div>
        </div>

        <div class="row defaultHidden" id="districtFormRow">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="left col-xs-6">
                        <table style="width:100%; border-collapse:separate; border-spacing:2em; text-align: left">
                            <tr>

                                <td>
                                    <div>
                                        @if ($coach->profile_pic != '')
                                            {{--<img class="img-responsive img-hover" src='http://piq.codeus.net/static/media/userpics/piq_157628_400x400.png'/><a class="cvForm_control"onclick="delete_profile_pic('{{$coach->profile_pic}}','{{route('delete_profile_pic')}}')">clear profile pic</a>--}}
                                            <img height=200px width=200px src='{{$coach->profile_pic}}'/><a
                                                    class="cvForm_control"
                                                    onclick="delete_profile_pic('{{$coach->profile_pic}}','{{route('delete_profile_pic')}}')">clear
                                                profile pic</a>
                                        @elseif ($coach->sex == 'male')
                                            <img height=200px width=200px
                                                 src='/front/storage/app/profileImg/profile-male.jpg'/><a
                                                    class="cvForm_control"
                                                    onclick="delete_profile_pic('{{$coach->profile_pic}}','{{route('delete_profile_pic')}}')">clear
                                                profile pic</a>

                                        @else
                                            <img height=200px width=200px
                                                 src='/front/storage/app/profileImg/profile-female.jpg'/><a
                                                    class="cvForm_control"
                                                    onclick="delete_profile_pic('{{$coach->profile_pic}}','{{route('delete_profile_pic')}}')">clear
                                                profile pic</a>

                                        @endif

                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>  @if ($coach->chin_name == "")
                                        <!--<h5>{!!$coach->eng_name !!}</h5>-->
                                        <b><p style="font-size:16px; font-weight:bold;">{!!$coach->eng_name !!}</p></b>
                                    @else
                                        <!--<h5>{!!$coach->chin_name !!}</h5>-->
                                        <b><p style="font-size:16px; font-weight:bold;">{!!$coach->chin_name !!}</p></b>
                                    @endif</td>
                            </tr>
                            
                            <tr>
                                <td><h5 @php if ($coach->approved == '0') echo 'hidden'; @endphp><img height="20"
                                                                                                      width="20"
                                                                                                      src="/front/public/images/approved.png"/><b>       專業認證</b>
                                    </h5>
                                    <h5 @php if ($coach->star == '0') echo 'hidden'; @endphp><img height="20" width="20"
                                                                                                  src="/front/public/images/stared.png"/><b>   星級教練</b>
                                    </h5>
                                </td>
                            </tr>
                            <tr>
                                <td>性別</td>
                                <td>
                                    @if ($coach->sex == 'male') 男 @else 女 @endif

                                </td>
                            </tr>
    
                            <tr>
                                <td>年齡</td>
                                <td>
                                    @php

                                        $birthDate = explode("-", $coach->birth_year); $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md") ? ((date("Y") - $birthDate[0]) - 1) : (date("Y") - $birthDate[0]));
                                      echo $age;
                                    @endphp

                                </td>
                            </tr>
                            <tr>
                                
                                <td>運動類別</td>
                                <td>
                                    <h5>
                                        @php echo $coach->subjects;
                                            $temp = explode(",",$coach->subjects);
                                            $count = 1;
                                            $result = temp[0];


                                            While ($count < sizeof($coach->subjects) )
                                            {

                                                $result = $result.", " .$temp[$count];
                                                $count++;
                                            }

                                            echo $result;
                                        @endphp
                                    </h5>
                                </td>
                            </tr>
                            <tr>
                                <td>教學年資</td>
                                <td id=experience_text></td>
                                <td hidden><select class="must" name="experienceSelection" id="experienceSelection">
                                        <option value="default">--請選擇--</option>
                                        <option value="none">沒有</option>
                                        <option value="lessthanoneyear">少於一年</option>
                                        <option value="onetotwoyear">一至兩年</option>
                                        <option value="twotofouryear">兩年至四年</option>
                                        <option value="fivetotenyear">五年至十年</option>
                                        <option value="atleasttenyear">十年或以上</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>最低時薪（小時）</td>
                                <td>${!! $coach->min_pay !!}</td>
                            </tr>
                            <tr>
                                <td>理想時薪（小時）</td>
                                <td>${!! $coach->well_pay !!}</td>
                            </tr>
                            <tr>
                                <td>能否提供課地</td>
                                <td>
                                    @if ($coach->offer_group == 'no')
                                        不可以
                                    @else
                                        可以
                                    @endif
                                </td>
                                <!--                    <td><input class="must" type="radio" id="canProvideClassroom" name ="provideClassroom" value="yes"> 可以 <input class="must" type="radio" name ="provideClassroom" value="no"> 不可以 <span id="provideClassroomError"> </span></td>-->
                            </tr>
                            <tr>
                                <td>能否安排小組課堂</td>
                                <td>
                                    @if ($coach->offer_venue == '')
                                        有
                                    @else
                                        沒有
                                    @endif

                                </td>

                                <!--                    <td><input class ="must" type="radio" name ="groupClass" value="yes"> 有 <input class ="must" type="radio" name ="groupClass" value="no"> 沒有 <span id="groupClassError"> </span></td>-->
                            </tr>


                        </table>


                        {{--<h5  @php if ($coach->approved == '0') echo 'hidden'; @endphp>i am approved coach</h5>--}}
                        {{--<h5  @php if ($coach->star == '0') echo 'hidden'; @endphp>i am star coach</h5>--}}

                        <br/>

                        <div class="right col-xs-12">
                        @if(isset($_SESSION['user']))

                            @if($_SESSION['user']['account_type'] == 'student')
                                <div style="color: red">如有興趣追蹤或報名教練課堂, 請"追蹤"教練, Gympal會專人盡快處理您的個案</div><br>
                                <div style="text-align: center;">
                                @if($interest == '1')
                                    <input class="btn" onclick="student_cancel_interest();" type="button" id="basicBack"
                                           value="取消追蹤"/>

                                @else
                                    <input class="btn" onclick="student_show_interest();" type="button" id="basicBack"
                                           value="追蹤"/>
                                @endif

                            @endif
                                </div>

                        @else
                            <div style="color: red">如有興趣追蹤或報名教練課堂, 請"追蹤"教練, Gympal會專人盡快處理您的個案</div><br>

                            <div style="text-align: center;">
                            <input class="btn" onclick="guest_show_interest();" type="button" id="basicBack" value="追蹤"/>
                            </div>


                        @endif
                        </div>

                    </div>


                    <div class="right col-xs-6">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="background-color: #888888; color: white; word-wrap:break-word; overflow:hidden; text-overflow: ellipsis;"> 自我介紹</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-12" style="/*text-align: center;*/ word-wrap:break-word; overflow:hidden; text-overflow: ellipsis;">
                                        {!!nl2br($coach->self_intro)!!}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="right col-xs-6">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="background-color: #888888; color: white; word-wrap:break-word; overflow:hidden; text-overflow: ellipsis;"> 教學履歷</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-12" style="/*text-align: center;*/ word-wrap:break-word; overflow:hidden; text-overflow: ellipsis;">
                                        {!!nl2br($coach->admin_intro)!!}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="right col-xs-6">
                        <div class="panel panel-default">
                            <div class="panel-heading" style=" background-color: #888888; color: white"> 授課地區</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="right col-xs-12">
                                        <form class="defaultHidden" id="districtForm" role="form"
                                              action="{{route('edit_coach_district')}}" method="post">
                                            <div class="form-group">
                                                {{--<p><b>授課地區 （可選擇多於一項）</b></p>--}}
                                            </div>
                                            <div class="left col-xs-6">

                                                <p style="color:blue;"><b>香港島</b></p>
                                                <hr>
                                                <!--<input type="checkbox" name="area[]" value="1"/> 中半山，薄扶林 <br>-->
                                                @foreach ($hkDistricts as $hkDistrict)
                                                    <input type="checkbox" name="area[]"
                                                           value="{!!$hkDistrict->district_id!!}"/> {!! $hkDistrict->name_chin !!}
                                                    <br>
                                            @endforeach

                                            <!-- 	<div id="hkIslandError"></div> -->
                                            </div>
                                            <div class="right col-xs-6">
                                                <p style="color:red;"><b>九龍區</b></p>
                                                <hr>
                                                @foreach ($knDistricts as $knDistrict)
                                                    <input type="checkbox" name="area[]"
                                                           value="{!!$knDistrict->district_id!!}"/> {!! $knDistrict->name_chin !!}
                                                    <br>
                                            @endforeach
                                            <!-- 				<div id="kowloonError"></div> -->
                                                <br>
                                            </div>
                                            <div class="left col-xs-6">
                                                <p style="color:green;"><b>新界區</b></p>
                                                <hr>
                                                @foreach ($ntDistricts as $ntDistrict)
                                                    <input type="checkbox" name="area[]"
                                                           value="{!!$ntDistrict->district_id!!}"/> {!! $ntDistrict->name_chin !!}
                                                    <br>
                                                @endforeach
                                            </div>
                                            <div class="right col-xs-6">
                                                <p style="color:grey;"><b>其他地區</b></p>
                                                <hr>
                                                @foreach ($otherDistricts as $otherDistrict)
                                                    <input type="checkbox" name="area[]"
                                                           value="{!!$otherDistrict->district_id!!}"/> {!! $otherDistrict->name_chin !!}
                                                    <br>
                                                @endforeach
                                            </div>
                                            <div id="areaError"></div>

                                            <input type="hidden" name="account_id" value="{!! $coach->account_id!!}">
                                            <div class="form-group">
                                                <input class="btn btn-primary districtForm_control" type="submit"
                                                       value="save"/> <input type="button"
                                                                             class="btn btn-warning districtForm_control"
                                                                             onclick="reset_all()" value="cancel"/>
                                            </div>
                                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                                        </form>
                                        @if(isset($_SESSION['user']))

                                            @if($_SESSION['user']['account_type'] == 'admin')
                                                <a class="btn btn-default" onclick="edit_districtForm()">edit</a>

                                            @endif
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- time Form -->
        <div class="left col-xs-6">

        </div>

    <!--
    <div class="row defaultHidden" id = "timeFormRow">
        <div class="right col-xs-6">
            <div class="panel panel-default">
                <div class="panel-heading"> 授課時間 </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="right col-xs-6">
                            <form class = "defaultHidden" id = "timeForm" role="form" action="{{route('edit_coach_time')}}" method="post">

                                <div class="form-group">
                                    <p><b>授課時間</b></p>
                                    <table id="classTimetable">
                                        <tr>
                                            <th></th>
                                            <th>星期一</th>
                                            <th>星期二</th>
                                            <th>星期三</th>
                                            <th>星期四</th>
                                            <th>星期五</th>
                                            <th>星期六</th>
                                            <th>星期日</th>
                                        </tr>
                                        <tr>
                                            <td>06:00-09:00&nbsp;</td>
                                            <td><input type="checkbox" name="teachingTime[]" value="mon_6_9"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="tue_6_9"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="wed_6_9"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="thu_6_9"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="fri_6_9"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="sat_6_9"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="sun_6_9"/></td>
                                        </tr>
                                        <tr>
                                            <td>09:00-12:00&nbsp;</td>
                                            <td><input type="checkbox" name="teachingTime[]" value="mon_9_12"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="tue_9_12"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="wed_9_12"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="thu_9_12"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="fri_9_12"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="sat_9_12"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="sun_9_12"/></td>
                                        </tr>
                                        <tr>
                                            <td>12:00-15:00&nbsp;</td>
                                            <td><input type="checkbox" name="teachingTime[]" value="mon_12_15"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="tue_12_15"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="wed_12_15"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="thu_12_15"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="fri_12_15"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="sat_12_15"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="sun_12_15"/></td>
                                        </tr>
                                        <tr>
                                            <td>15:00-18:00&nbsp;</td>
                                            <td><input type="checkbox" name="teachingTime[]" value="mon_15_18"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="tue_15_18"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="wed_15_18"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="thu_15_18"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="fri_15_18"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="sat_15_18"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="sun_15_18"/></td>
                                        </tr>
                                        <tr>
                                            <td>18:00-21:00&nbsp;</td>
                                            <td><input type="checkbox" name="teachingTime[]" value="mon_18_21"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="tue_18_21"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="wed_18_21"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="thu_18_21"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="fri_18_21"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="sat_18_21"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="sun_18_21"/></td>
                                        </tr>
                                        <tr>
                                            <td>21:00-00:00&nbsp;</td>
                                            <td><input type="checkbox" name="teachingTime[]" value="mon_21_24"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="tue_21_24"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="wed_21_24"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="thu_21_24"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="fri_21_24"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="sat_21_24"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="sun_21_24"/></td>
                                        </tr>
                                        <tr>
                                            <td>全日&nbsp;</td>
                                            <td><input type="checkbox" name="teachingTime[]" value="mon_all"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="tue_all"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="wed_all"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="thu_all"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="fri_all"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="sat_all"/></td>
                                            <td><input type="checkbox" name="teachingTime[]" value="sun_all"/></td>
                                        </tr>

                                    </table>
                                </div>
                                <input type="hidden" name="account_id" value="{!! $coach->account_id!!}">
                                <div class="form-group">
                                    <input class="btn btn-primary timeForm_control" type ="submit" value ="save"/>   <input type ="button" class="btn btn-warning timeForm_control" onclick="reset_all()" value ="cancel"/>
                                </div>
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                            </form>

                            @if(isset($_SESSION['user']))

        @if($_SESSION['user']['account_type'] == 'admin')
            <a class="btn btn-default" onclick="edit_timeForm()">edit</a>

@endif
    @endif


            </div>
        </div>
    </div>
</div>
</div>
</div>
-->


        <!-- subjectInformation Form -->

    <!--
    <div class="left col-xs-6">

    </div>

    <div class="row defaultHidden" id = "subjectFormRow">
        <div class="right col-xs-6">
            <div class="panel panel-default">
                <div class="panel-heading"> 基本資料 </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="right col-xs-6">
                            <form class = "defaultHidden" id = "subjectForm" role="form" action="{{route('edit_coach_subject')}}" method="post">
                                <div class="form-group">
                                    <p><b>請選擇教練登記類別 （可選擇多於一項）</b></p>

                                    /*Example of original checkbox*/
                                    <input type="checkbox" name="category[]" value="fitness"/> 健身 <br>

                                    <div id="categoryList">
                                        @foreach ($categories as $category)
        @if($category->name!='Other')
            <?php $sccnt = 0 ?>
            @foreach ($categoriesTable as $subcategory)
                @if( $category->category_id === $subcategory->category_id)
                    <?php $sccnt++ ?>
                    @if( $sccnt == 1)
                        <?php $temp_chin_name = $subcategory->subject_chin?>
                        <?php $temp_subject_id = $subcategory->subject_id ?>
                    @endif
                @endif
            @endforeach
            @if($sccnt==1)
                <input type="checkbox" name="category[]" value="{!! $temp_subject_id !!}"/><b>{!!$category->name_chin!!}</b><br>
                                                @elseif ($sccnt > 1)
                <div class="categoryMenu">
                    <input type="checkbox" name="categoryTitle" value="{!! $category->name_chin !!}"/><b>{!!$category->name_chin!!}</b>
                                                        <?php $cnt = 0; ?>
                        <div class="categorySubTitle defaultHidden">
@foreach ($categoriesTable as $subcategory)
                    @if( $category->category_id === $subcategory->category_id)
                        @if ($cnt %3 ==0)
                            &nbsp
@endif
                        <?php $cnt++ ?>
                                <input type="checkbox" name="category[]" value="{!! $subcategory->subject_id !!}"/> {!! $subcategory->subject_chin !!}
                        @if ($cnt %3 ==0)
                            <br>
@endif
                    @endif
                @endforeach
                        </div>
                    </div>
@endif
        @endif
    @endforeach
            </div>
            <div>
                <input type="checkbox" id="otherCField" name="category[]" value="" /> 其它 <input class="defaultHidden form-control" type="text" name="extendCategory" id ="extendCategory"/>
                                    </div>
                                    <div id="categoryError">
                                    </div>
                                </div>
                                <input type="hidden" name="account_id" value="{!! $coach->account_id!!}">
                                <div class="form-group">
                                    <input class="btn btn-primary subjectForm_control" type ="submit" value ="save"/> <input class="btn btn-warning subjectForm_control" type ="button" onclick="reset_all()" value ="cancel"/>
                                </div>
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                            </form>

                            @if(isset($_SESSION['user']))

        @if($_SESSION['user']['account_type'] == 'admin')
            <a class="btn btn-default" onclick="edit_subjectForm()">edit</a>

@endif
    @endif


            </div>

        </div>

    </div>

</div>

</div>
<div class="row">
<div class="right col-xs-5">
</div>
<div class="right col-xs-4">
    <a class="btn btn-default" href="http://www.google.com">報名</a>
</div>
</div>
</div>
-->


        <!-- infoForm -->
        {{--<div class="row defaultHidden" id = "infoFormRow">--}}
        {{--<div class="col-lg-12">--}}
        {{--<div class="panel panel-default">--}}
        {{--<div class="panel-heading"> 基本資料 </div>--}}
        {{--<div class="panel-body">--}}
        {{--<div class="row">--}}
        {{--<div class="col-lg-12">--}}
        {{--<form class = "defaultHidden" id = "infoForm" role="form" action="{{route('edit_coach_info')}}" method="post">--}}
        {{----}}
        {{--<p><b>個人資料</b></p>--}}
        {{--<div class="form-group">--}}
        {{----}}
        {{----}}
        {{--英文姓名<input class = "must form-control" type="text" name ="engName"><br>--}}
        {{--中文姓名<input class = "must form-control" type="text" name ="chinName"><br>--}}
        {{--身份證號碼<input class = "must form-control" type="text" id="HKID" name ="HKID"><br>--}}
        {{--住宅地址<input class = "must form-control" type="text" name ="address"><br>--}}
        {{--<!--                                    住宅區域<input class = "must form-control" type="text" name ="area"><br>-->--}}
        {{--電話號碼<input class = "must form-control" type="text" id="teleno" name ="teleno"><br>--}}
        {{--出生日期<input class = "must form-control" type="text" id="birthDatepicker" name ="birthday"><br>--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
        {{--性別<br />--}}
        {{--<input class ="must" type="radio" name = "gender" value="male"/>男 <input class ="must" type="radio" name = "gender" value="female"/>女 <span id="genderError"> </span><br />--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
        {{--能否提供上課場地<br />--}}
        {{--<input class="must" type="radio" id="canProvideClassroom" name ="provideClassroom" value="yes"> 可以 <input class="must" type="radio" name ="provideClassroom" value="no"> 不可以 <span id="provideClassroomError"> </span><br>--}}
        {{--<div id="classroomOption" class="defaultHidden" >--}}
        {{--地址<input class="form-control" id="classroomAddress" type="text" name ="classroomAddress"><br>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
        {{--現時有安排小組課堂<br />--}}
        {{--<input class ="must" type="radio" name ="groupClass" value="yes"> 有 <input class ="must" type="radio" name ="groupClass" value="no"> 沒有 <span id="groupClassError"> </span><br>--}}
        {{--</div>--}}
        {{--<input type="hidden" name="account_id" value="{!! $coach->account_id!!}">--}}
        {{--<div class="form-group">--}}
        {{--<input class="btn btn-primary infoForm_control" type ="submit" value ="save"/>  <input class="btn btn-warning infoForm_control" type ="button" onclick="reset_all()" value ="cancel"/>--}}
        {{--</div>--}}
        {{--<input type="hidden" name="_token" value="{{ Session::token() }}">--}}
        {{--</form>--}}
        {{----}}
        {{--@if(isset($_SESSION['user']))--}}

        {{--@if($_SESSION['user']['account_type'] == 'admin')--}}
        {{--<a class="btn btn-default" onclick="edit_infoForm()">edit</a>--}}
        {{----}}
        {{--@endif--}}
        {{--@endif--}}
        {{----}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}


        {{--<!-- Coach CV Form -->--}}
        {{--<div class="row" id = "cvFormRow">--}}
        {{--<div class="col-lg-12">--}}
        {{--<div class="panel panel-default">--}}
        {{--<div class="panel-heading"> 教練履歷 </div>--}}
        {{--<div class="panel-body">--}}
        {{--<div class="row">--}}
        {{--<div class="col-lg-12">--}}
        {{--<form class="defaultHidden" id = "cvForm" action="{{route('edit_coach_cv')}}" method="post" role="form">--}}
        {{--<!--                            <form class="defaultHidden" id = "coachCVForm" role="form">-->--}}

        {{--<div class="form-group">--}}
        {{--<p><b>個人簡介</b></p>--}}
        {{----}}
        {{--@if ($coach->profile_pic != '')--}}
        {{--<img src='{{$coach->profile_pic}}'/> <a class="cvForm_control"onclick="delete_profile_pic('{{$coach->profile_pic}}','{{route('delete_profile_pic')}}')">clear profile pic</a>--}}
        {{--@endif--}}
        {{----}}
        {{--<p><b>請上傳相片，可以更容易找到成功個案及有機會登上Top10教練。</b></p>--}}
        {{----}}
        {{--相片上傳<input class='cvForm_control' type="file" name="coachPhotos" id="coachPhotos" accept="image/*" /><br>--}}
        {{----}}
        {{----}}
        {{--Facebook<input class="form-control" type="text" name="coachFacebook"><br>--}}
        {{--Instagram<input class="form-control" type="text" name="coachInstagram"><br>--}}
        {{--自我介紹(請詳細講述教學經驗,過往履歷及相關資格)<br>--}}
        {{--<textarea class = "must form-control" rows="10" cols="80"  name="coachIntroduction"></textarea> <br>--}}
        {{--</div>--}}

        {{--<div class="form-group">--}}
        {{--<b>教學經驗</b><br>--}}
        {{--教學年資--}}
        {{--<select name="experienceSelection" id="experienceSelection">--}}
        {{--<option value="default">--請選擇--</option>--}}
        {{--<option value="none">沒有</option>--}}
        {{--<option value="lessthanoneyear">少於一年</option>--}}
        {{--<option value="onetotwoyear">一至兩年</option>--}}
        {{--<option value="twotofouryear">兩年至四年</option>--}}
        {{--<option value="fivetotenyear">五年至十年</option>--}}
        {{--<option value="atleasttenyear">十年或以上</option>--}}
        {{--</select>--}}
        {{--</div>--}}
        {{----}}
        {{--<div class="form-group">--}}
        {{--現時職業--}}
        {{--<!--                                    <input class="must" type="text" name="occupationSelection" id="occupationSelection"/><br>-->--}}
        {{--<select name = "occupationSelection" id="occupationSelection">--}}
        {{--<option value="default">--請選擇--</option>--}}
        {{--<option value="sports_cultureandentainment">體育、文化和娛樂業</option>--}}
        {{--<option value="education">教育</option>--}}
        {{--<option value="finance">金融業</option>--}}
        {{--<option value="retail">批發和零售業</option>--}}
        {{--<option value="manufacturing">製造業</option>--}}
        {{--<option value="building">建築業</option>--}}
        {{--<option value="transportation">運輸業</option>--}}
        {{--<option value="it">資訊及通訊</option>--}}
        {{--<option value="estate">房地產業</option>--}}
        {{--<option value="public_administration">公共行政</option>--}}
        {{--<option value="health_and_social_welfare">衛生及社會福利業</option>--}}
        {{--<option value="other">其它</option>--}}

        {{--</select><br>--}}
        {{--</div>--}}

        {{--<div class="form-group">--}}
        {{----}}
        {{--<p><b>履歷資料（請透過PDF檔案上傳有關教練資格證明，可以更有效找到成功個案，有機會登上Top10教練，如未能提供有關證明，如能成功申請個案，請在第一堂時侯帶同有關資格證明副本）</b></p>--}}
        {{----}}
        {{--<p>--}}
        {{--@foreach ($files as $file)--}}
        {{----}}
        {{--<a href="{{$file->path}}">{{$file->name}}</a> <a class="cvForm_control" onclick="delete_file('{{$file->name}}','{{$file->path}}','{{route('delete_file')}}')">delete</a>--}}
        {{--@endforeach--}}
        {{----}}
        {{--</p>--}}
        {{----}}
        {{----}}
        {{--<input class="btn btn-default cvForm_control" type="button" id="more_files" value="新增上傳檔案"/>--}}
        {{--<table class="cvForm_control" id="addFilesTable" style="width:100%">--}}
        {{--<tr>--}}
        {{--<td><input type="file" name="coachCV[]" accept="application/pdf"></td>--}}
        {{--<td><input type="button" class="btn btn-warning files_remove" value="刪除"/></td>--}}
        {{--</tr>--}}
        {{--</table>--}}
        {{--</div>--}}
        {{----}}
        {{----}}
        {{--<div class="form-group">--}}
        {{--<b>教練時薪</b><br>--}}
        {{--最低教練時薪（小時）<input class = "must form-control" type="text" id="minHourlyWage" name="minHourlyWage"><br>--}}
        {{--理想教練時薪（小時）<input class = "must form-control" type="text" id="idealHourlyWage" name="idealHourlyWage"><br>--}}
        {{--</div>--}}

        {{--<input type="hidden" name="account_id" value="{!! $coach->account_id!!}">--}}
        {{--<div class="form-group">--}}
        {{--<input  class="btn btn-primary cvForm_control" type ="submit" value ="save"/> <input type="button"  class="btn btn-warning cvForm_control" onclick="reset_all()" value="cancel"/>--}}
        {{--</div>--}}
        {{--<input type="hidden" name="_token" value="{{ Session::token() }}">--}}
        {{--</form>--}}
        {{----}}
        {{--@if(isset($_SESSION['user']))--}}

        {{--@if($_SESSION['user']['account_type'] == 'admin')--}}
        {{--<a class="btn btn-default" onclick="edit_cvForm()">edit</a>--}}
        {{----}}
        {{--@endif--}}
        {{--@endif--}}
        {{----}}
        {{--</div>--}}
        {{--</div>--}}
        {{----}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}

    </div>

    <script>

        $(function () {
            $("#birthDatepicker").datepicker({
                dateFormat: "yy/mm/dd",
                yearRange: "-100:+0",
                changeMonth: true,
                changeYear: true
            });
        });

        $('#subjectForm').on('change', function () {
            $('input[name="categoryTitle"]').each(function (index, elem) {
                if ($(elem).is(":checked")) {
                    console.log($(elem).parent().children('div'));
                    $(elem).parent().children('div').show();
//                    $(elem).parent().children('div').animateCss('lightSpeedIn');
                }
                else {
                    $(elem).parent().children('div').hide();
                }

            });

            if ($("#otherCField").is(":checked")) {
                $("#extendCategory").show();
            }
            else {
                $("#extendCategory").hide();
                $("#extendCategory").val("");
            }

        });


        $(document).ready(function () {

            reset_all();
            var cnt_button = 0;
            var max_button = 10;
            $('#more_files').click(function () {
                if (cnt_button < max_button) {
                    $('#addFilesTable').append(
                        '<tr> <td><input type="file" name="coachCV[]" accept="application/pdf"></td><td><input type="button" class="btn btn-warning files_remove" value="刪除"/></td></td></tr>'
                    );
                    cnt_button++;
                }
            });

            $('#addFilesTable').on("click", '.files_remove', function () {
                $(this).parents("tr").remove();
                cnt_button--;
            });

            $("#newPassword").mask('ZZZZZZZZZZZZZZZ', {
                translation: {
                    'Z': {
                        pattern: /[a-zA-Z0-9]/, optional: true
                    }
                }
            });
            $("#HKID").mask("Z000000(0)",
                {
                    placeholder: "_______()",
                    translation: {
                        'Z': {
                            pattern: /[a-zA-Z0-9]/, optional: true
                        }
                    }
                }
            );
            $("#teleno").mask("00000000", {placeholder: "________"});
            $("#birthDatepicker").mask("0000/00/00", {
                placeholder: "yyyy/mm/dd",
            });
            $("#minHourlyWage").mask("00000");
            $("#idealHourlyWage").mask("00000");

            $("#change_pw_form").validate({
                rules: {

                    'newPassword': {
                        regex: "^(?=.*[A-Za-z])(?=.*?[0-9]).{8,}$"
                    },
                    confirmPassword: {
                        equalTo: "#newPassword"
                    },

                },
                messages: {

                    newPassword: {
                        regex: "密碼至少8位由英文字母及數字組合組成"
                    },
                    confirmPassword: {
                        equalTo: "與已填寫密碼不相同"
                    }


                },
                errorPlacement: function (error, element) {
                    if ((element.attr('name') === 'category[]')) {
                        error.appendTo("#categoryError");
                    }
                    else if ((element.attr('name') === 'extendCategory')) {
                        error.insertAfter(element);
                    }
                    else if ((element.attr('name') === 'gender')) {
                        error.appendTo(genderError)
                    }
                    else if ((element.attr('name') === 'groupClass')) {
                        error.appendTo(groupClassError)
                    }
                    else if ((element.attr('name') === 'provideClassroom')) {
                        error.appendTo(provideClassroomError)
                    }
                    else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function (form) {

                    $.ajax({
                        method: "POST",
                        url: $('#change_pw_form').attr('action'),
                        data: $('#change_pw_form').serialize().replace(/%5B%5D/g, '[]'),
                        success: function (data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true) {
                                alert('password changed successfully!');
                                window.location.reload();
                            }

                            else {
                                alert('failed to change password ! :' + data.error);
                            }
                        }
                    });

                    return false
                }
            });


            //TeachingInfoForm
            $("#districtForm").validate({
                rules: {
                    "area[]": {
                        required: true
                    },
                },
                messages: {
                    "area[]": {
                        required: "必須從三個地區中選擇其中一項或以上"
                    },
                },
                errorPlacement: function (error, element) {
                    if ((element.attr('name') === 'area[]')) {
                        error.appendTo("#areaError");
                    }
                    else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function (form) {

                    $.ajax({
                        method: "POST",
                        url: $('#districtForm').attr('action'),
                        data: $('#districtForm').serialize().replace(/%5B%5D/g, '[]'),
                        success: function (data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true) {
                                alert('password changed successfully!');
                                window.location.reload();
                            }

                            else {
                                alert('failed to change password ! :' + data.error);
                            }
                        }
                    });

                    return false
                }
            });


            //TeachingInfoForm

            $("#timeForm").validate({
                rules: {},
                messages: {},
                errorPlacement: function (error, element) {

                },
                submitHandler: function (form) {

                    $.ajax({
                        method: "POST",
                        url: $('#timeForm').attr('action'),
                        data: $('#timeForm').serialize().replace(/%5B%5D/g, '[]'),
                        success: function (data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true) {
                                alert('time changed successfully!');
                                window.location.reload();
                            }

                            else {
                                alert('failed to change time ! :' + data.error);
                            }
                        }
                    });

                    return false
                }
            });


            $('#infoForm').on('change', function () {


                if ($('input[name=provideClassroom]:checked').val() === "yes")
                    $("#classroomOption").show();
                else {
                    $("#classroomOption").hide();
                }
            });


            // Subject Form Validation
            $("#subjectForm").validate({
                rules: {
                    'category[]': {
                        required: true,
                    },
                    'extendCategory': {
                        required: "input:checkbox[id=otherCField]:checked"
                    },


                },
                messages: {
                    'category[]': {
                        required: "必須選擇一項或以上",
                    },
                    'extendCategory': {
                        required: "請填寫有關資料"
                    },


                },
                errorPlacement: function (error, element) {
                    if ((element.attr('name') === 'category[]')) {
                        error.appendTo("#categoryError");
                    }
                    else if ((element.attr('name') === 'extendCategory')) {
                        error.insertAfter(element);
                    }

                    else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function (form) {


                    $.ajax({
                        method: "POST",
                        url: $('#subjectForm').attr('action'),
                        data: $('#subjectForm').serialize().replace(/%5B%5D/g, '[]'),
                        success: function (data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true) {
                                alert('subject changed successfully!');
                                window.location.reload();
                            }

                            else {
                                alert('failed to change subject ! :' + data.error);
                            }
                        }
                    });


                    return false
                }
            });


            // info Form Validation
            $("#infoForm").validate({
                rules: {


                    engName: {
                        regex: "^[a-zA-Z ]*$"
                    },
                    chinName: {
                        regex: "^(?=.*[\u4e00-\u9eff]).{1,20}$"
                    },
                    teleno: {
                        regex: "^(?=.*?[0-9]).{8,}$"
                    },
                    classroomAddress: {
                        required: "input:radio[id=canProvideClassroom]:checked",
                    }

                },
                messages: {

                    engName: {
                        regex: "請填寫有效英文名稱"
                    },
                    chinName: {
                        regex: "請填寫有效中文名稱"
                    },
                    teleno: {
                        regex: "請填寫有效電話號碼"
                    },
                    gender: {
                        mRequired: "必須選擇"
                    },
                    groupClass: {
                        mRequired: "必須選擇"
                    },
                    provideClassroom: {
                        mRequired: "必須選擇"
                    },
                    classroomAddress: {
                        requried: "必須填寫"
                    }

                },
                errorPlacement: function (error, element) {

                    if ((element.attr('name') === 'gender')) {
                        error.appendTo(genderError)
                    }
                    else if ((element.attr('name') === 'groupClass')) {
                        error.appendTo(groupClassError)
                    }
                    else if ((element.attr('name') === 'provideClassroom')) {
                        error.appendTo(provideClassroomError)
                    }
                    else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function (form) {

                    $.ajax({
                        method: "POST",
                        url: $('#infoForm').attr('action'),
                        data: $('#infoForm').serialize().replace(/%5B%5D/g, '[]'),
                        success: function (data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true) {
                                alert('info changed successfully!');
                                window.location.reload();
                            }

                            else {
                                alert('failed to change info! :' + data.error);
                            }
                        }
                    });


                    return false
                }
            });


            $("#cvForm").validate({
                rules: {

                    experienceSelection: {
                        valueNotEquals: "default"
//                        regex:"^(?=.*?[0-9]).{1,}$"
                    },
                    occupationSelection: {
                        valueNotEquals: "default"
//                        regex:"^(?=.*[0-9A-Za-z\u4e00-\u9eff]).{1,20}$"
                    },
                    minHourlyWage: {
                        regex: "^[0-9]*$"
                    },
                    idealHourlyWage: {
                        regex: "^[0-9]*$"
                    },
                },
                messages: {
                    experienceSelection: {
//                        valueNotEquals:"請選擇相關項目"
                        regex: "請輸入有效資料"
                    },
                    occupationSelection: {
                        regex: "請輪入有效資料"
//                        valueNotEquals:"請選擇相關項目"
                    },
                    minHourlyWage: {
                        regex: "請輸入有效時數"
                    },
                    idealHourlyWage: {
                        regex: "請輸入有效時數"
                    }
                },
                errorPlacement: function (error, element) {
                    error.insertAfter(element);
                },
                submitHandler: function (form) {

                    var fd3 = document.getElementById('cvForm');
                    var dataObject = new FormData(fd3);

                    $.ajax({
                        method: "POST",
                        url: $('#cvForm').attr('action'),
                        dataType: 'json',
                        data: dataObject,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true) {
                                alert('info changed successfully!');
                                window.location.reload();
                            }

                            else {
                                alert('failed to change info! :' + data.error);
                            }
                        }
                    });
                    return false;
                }
            });
        })


        function reset_change_pw_form() {


            $('#oldPassword').prop('value', '');
            $('#newPassword').prop('value', '');
            $('#confirmPassword').prop('value', '');

            $('.account_info').show();
            $('.change_pw_form').hide();
        }


        function edit_districtForm() {
            reset_all();
            $("[name='area[]']").prop('disabled', false);
            $(".districtForm_control").show();
        }

        function edit_timeForm() {
            reset_all();
            $("[name='teachingTime[]']").prop('disabled', false);
            $(".timeForm_control").show();

        }

        function edit_change_pw_form() {
            reset_all();
            $('.change_pw_form').show();

        }

        function edit_subjectForm() {

            reset_all();
            $('.subjectForm_control').show();


            $("[name='category[]']").prop('disabled', false);
            $("[name='categoryTitle']").prop('disabled', false);
            $("#otherCField").prop('disabled', false);
            $("[name='extendCategory']").prop('disabled', false);

        }


        function reset_subjectForm() {

            $('.subjectForm_control').hide();
            @foreach ($available_subjects as $subject)


            @if ($subject->category_name == '其它')

                $("[name='extendCategory']").val('{!! $subject->subject_name !!}');
            $("#otherCField").prop('checked', true);
            @else

                $("[name='category[]']").filter($("[value='{!! $subject->subject_id !!}']")).prop('checked', true);
            $("[name='categoryTitle']").filter($("[value='{!! $subject->category_name !!}']")).prop('checked', true);


            @endif


            @endforeach

            $("#subjectForm").change();
            $("[name='category[]']").prop('disabled', true);
            $("[name='categoryTitle']").prop('disabled', 'true');
            $("#otherCField").prop('disabled', true);
            $("[name='extendCategory']").prop('disabled', true);
        }


        function reset_districtForm() {

            $('.districtForm_control').hide();
            @foreach ($available_districts as $district)

           $("[name='area[]']").filter($("[value='{!! $district->district_id !!}']")).prop('checked', 'true');

            @endforeach

            $("[name='area[]']").prop('disabled', 'true');
        }


        function reset_timeForm() {


            $('.timeForm_control').hide();


            $("[name='teachingTime[]']").filter($("[value='mon_6_9']")).prop('checked',{!! ($available_times->mon_6_9 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='tue_6_9']")).prop('checked',{!! ($available_times->tue_6_9 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='wed_6_9']")).prop('checked',{!! ($available_times->wed_6_9 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='thu_6_9']")).prop('checked',{!! ($available_times->thu_6_9 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='fri_6_9']")).prop('checked',{!! ($available_times->fri_6_9 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='sat_6_9']")).prop('checked',{!! ($available_times->sat_6_9 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='sun_6_9']")).prop('checked',{!! ($available_times->sun_6_9 == 1) ? 'true' : 'false'!!});


            $("[name='teachingTime[]']").filter($("[value='mon_9_12']")).prop('checked',{!! ($available_times->mon_9_12 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='tue_9_12']")).prop('checked',{!! ($available_times->tue_9_12 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='wed_9_12']")).prop('checked',{!! ($available_times->wed_9_12 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='thu_9_12']")).prop('checked',{!! ($available_times->thu_9_12 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='fri_9_12']")).prop('checked',{!! ($available_times->fri_9_12 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='sat_9_12']")).prop('checked',{!! ($available_times->sat_9_12 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='sun_9_12']")).prop('checked',{!! ($available_times->sun_9_12 == 1) ? 'true' : 'false'!!});


            $("[name='teachingTime[]']").filter($("[value='mon_12_15']")).prop('checked',{!! ($available_times->mon_12_15 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='tue_12_15']")).prop('checked',{!! ($available_times->tue_12_15 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='wed_12_15']")).prop('checked',{!! ($available_times->wed_12_15 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='thu_12_15']")).prop('checked',{!! ($available_times->thu_12_15 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='fri_12_15']")).prop('checked',{!! ($available_times->fri_12_15 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='sat_12_15']")).prop('checked',{!! ($available_times->sat_12_15 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='sun_12_15']")).prop('checked',{!! ($available_times->sun_12_15 == 1) ? 'true' : 'false'!!});


            $("[name='teachingTime[]']").filter($("[value='mon_15_18']")).prop('checked',{!! ($available_times->mon_15_18 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='tue_15_18']")).prop('checked',{!! ($available_times->tue_15_18 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='wed_15_18']")).prop('checked',{!! ($available_times->wed_15_18 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='thu_15_18']")).prop('checked',{!! ($available_times->thu_15_18 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='fri_15_18']")).prop('checked',{!! ($available_times->fri_15_18 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='sat_15_18']")).prop('checked',{!! ($available_times->sat_15_18 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='sun_15_18']")).prop('checked',{!! ($available_times->sun_15_18 == 1) ? 'true' : 'false'!!});


            $("[name='teachingTime[]']").filter($("[value='mon_18_21']")).prop('checked',{!! ($available_times->mon_18_21 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='tue_18_21']")).prop('checked',{!! ($available_times->tue_18_21 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='wed_18_21']")).prop('checked',{!! ($available_times->wed_18_21 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='thu_18_21']")).prop('checked',{!! ($available_times->thu_18_21 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='fri_18_21']")).prop('checked',{!! ($available_times->fri_18_21 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='sat_18_21']")).prop('checked',{!! ($available_times->sat_18_21 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='sun_18_21']")).prop('checked',{!! ($available_times->sun_18_21 == 1) ? 'true' : 'false'!!});


            $("[name='teachingTime[]']").filter($("[value='mon_21_24']")).prop('checked',{!! ($available_times->mon_21_24 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='tue_21_24']")).prop('checked',{!! ($available_times->tue_21_24 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='wed_21_24']")).prop('checked',{!! ($available_times->wed_21_24 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='thu_21_24']")).prop('checked',{!! ($available_times->thu_21_24 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='fri_21_24']")).prop('checked',{!! ($available_times->fri_21_24 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='sat_21_24']")).prop('checked',{!! ($available_times->sat_21_24 == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='sun_21_24']")).prop('checked',{!! ($available_times->sun_21_24 == 1) ? 'true' : 'false'!!});


            $("[name='teachingTime[]']").filter($("[value='mon_all']")).prop('checked',{!! ($available_times->mon_all == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='tue_all']")).prop('checked',{!! ($available_times->tue_all == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='wed_all']")).prop('checked',{!! ($available_times->wed_all == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='thu_all']")).prop('checked',{!! ($available_times->thu_all == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='fri_all']")).prop('checked',{!! ($available_times->fri_all == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='sat_all']")).prop('checked',{!! ($available_times->sat_all == 1) ? 'true' : 'false'!!});
            $("[name='teachingTime[]']").filter($("[value='sun_all']")).prop('checked',{!! ($available_times->sun_all == 1) ? 'true' : 'false'!!});


            $("[name='teachingTime[]']").prop('disabled', true);


        }

        function edit_infoForm() {

            reset_all();

            $("[name='engName']").prop('disabled', false);
            $("[name='chinName']").prop('disabled', false);
            $("[name='HKID']").prop('disabled', false);
            $("[name='address']").prop('disabled', false);
            $("[name='teleno']").prop('disabled', false);
            $("[name='birthday']").prop('disabled', false);
            $("[name='gender']").prop('disabled', false);
            $("[name='groupClass']").prop('disabled', false);

            $("[name='provideClassroom']").prop('disabled', false);
            $("[name='classroomAddress']").prop('disabled', false);

            $('.infoForm_control').show();

        }


        function reset_infoForm() {
            $('.infoForm_control').hide();
            $("[name='engName']").val('{!! $coach->eng_name !!}');
            $("[name='engName']").prop('disabled', 'true');

            $("[name='chinName']").val('{!! $coach->chin_name !!}');
            $("[name='chinName']").prop('disabled', 'true');

            $("[name='HKID']").val('{!! $coach->idcard_no !!}');
            $("[name='HKID']").prop('disabled', 'true');

            $("[name='address']").val('{!! $coach->address !!}');
            $("[name='address']").prop('disabled', 'true');

            $("[name='teleno']").val('{!! $coach->teleno !!}');
            $("[name='teleno']").prop('disabled', 'true');

            $("[name='birthday']").val('{!! $coach->birth_year !!}');
            $("[name='birthday']").prop('disabled', 'true');

            $("[name= 'gender']").filter($("[value= '{!!$coach->sex !!}']")).click();
            $("[name='gender']").prop('disabled', 'true');

            $("[name= 'groupClass']").filter($("[value= '{!!$coach->offer_group !!}']")).click();
            $("[name='groupClass']").prop('disabled', 'true');


            $("[name= 'provideClassroom']").filter($("[value= '{!! (($coach->offer_venue) == "") ? 'no' : 'yes' !!}']")).click();


            if ($('input[name=provideClassroom]:checked').val() === "yes") {

                $("#classroomOption").show();
                $("[name='classroomAddress']").val('{!! $coach->offer_venue !!}');
            }

            else {
                $("#classroomOption").hide();
            }


            $("[name='provideClassroom']").prop('disabled', 'true');
            $("[name='classroomAddress']").prop('disabled', 'true');


        }

        function edit_cvForm() {

            reset_all();

            $('.cvForm_control').show();

            $("[name='coachFacebook']").prop('disabled', false);
            $("[name='coachInstagram']").prop('disabled', false);
            $("[name='coachIntroduction']").prop('disabled', false);
            $("[name='experienceSelection']").prop('disabled', false);
            $("[name='occupationSelection']").prop('disabled', false);
            $("[name='minHourlyWage']").prop('disabled', false);
            $("[name='idealHourlyWage']").prop('disabled', false);
        }

        function reset_cvForm() {

            $('.cvForm_control').hide();

            $("[name='coachFacebook']").val('{!! $coach->facebook !!}');
            $("[name='coachFacebook']").prop('disabled', 'true');

            $("[name='coachInstagram']").val('{!! $coach->instagram !!}');
            $("[name='coachInstagram']").prop('disabled', 'true');


            $("[name='coachIntroduction']").val('@php  echo str_replace("\n", '\n', str_replace('"', '\"', addcslashes(str_replace("\r", '', (string)$coach->self_intro), "\0..\37'\\")));; @endphp');
            $("[name='coachIntroduction']").prop('disabled', 'true');


            $("[name='experienceSelection']").val('{!! $coach->year_of_teaching !!}');
            $("[name='experienceSelection']").prop('disabled', 'true');


            $("#experience_text").html($("[name='experienceSelection'] option:selected").html());


            $("[name='occupationSelection']").val('{!! $coach->profession !!}');
            $("[name='occupationSelection']").prop('disabled', 'true');

            $("[name='minHourlyWage']").val('{!! $coach->min_pay !!}');
            $("[name='minHourlyWage']").prop('disabled', 'true');

            $("[name='idealHourlyWage']").val('{!! $coach->well_pay !!}');
            $("[name='idealHourlyWage']").prop('disabled', 'true');
        }

        function reset_all() {
            reset_cvForm();
            reset_subjectForm();
            reset_infoForm();
            reset_timeForm();
            reset_districtForm();
            reset_change_pw_form();

        }


        function guest_show_interest() {

            alert("請先登入帳戶");

            window.location.href = "{{route('getLogin')}}";

        }

        @if(isset($_SESSION['user']))

        @if($_SESSION['user']['account_type'] == 'student')

        function student_show_interest() {


            if (confirm("立即追蹤 ?") == true) {

                $.ajax({
                    method: "POST",
                    url: "{!! route('student_show_interest') !!}",
                    data: {
                        "coach_id": "{!! $account->account_id !!}",
                        "student_id": "<?php echo $_SESSION['user']['account_id'] ?>",
                        "_token": "{{ Session::token() }}"
                    },
                    success: function (data) {
                        console.log("success ajax request!");
                        console.log(data.success);
                        if (data.success == true) {
                            alert('已追蹤');
                            window.location.reload();
                        }

                        else
                            alert('未能追蹤，請稍候重試');
                    }
                });
            }

        }

        function student_cancel_interest() {

            if (confirm("取消追蹤 ?") == true) {

                $.ajax({
                    method: "POST",
                    url: "{!! route('student_cancel_interest') !!}",
                    data: {
                        "coach_id": "{!! $account->account_id !!}",
                        "student_id": "<?php echo $_SESSION['user']['account_id']?>",
                        "_token": "{{ Session::token() }}"
                    },
                    success: function (data) {
                        console.log("success ajax request!");
                        console.log(data.success);
                        if (data.success == true) {
                            alert('已取消追蹤');
                            window.location.reload();
                        }

                        else
                            alert('未能取消，請稍後重試');
                    }
                });
            }


        }

        @endif
    @endif





                $.fn.extend({
            animateCss: function (animationName, cb) {
                var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
                this.addClass('animated ' + animationName).one(animationEnd, function () {
                    $(this).removeClass('animated ' + animationName);
                    if (cb) {
                        cb();
                    }
                });
            }
        });

        $.validator.addMethod("mRequired", $.validator.methods.required,
            "必須填寫");

        $.validator.addMethod("regex",
            function (value, element, regexp) {
                var re = new RegExp(regexp);
                return this.optional(element) || re.test(value);
            }
            , "格式錯誤");

        $.validator.addMethod("valueNotEquals", function (value, element, arg) {
                return arg != value;
            }
            , "不能為空的");

        jQuery.validator.addClassRules({
            must: {
                mRequired: true,
            },
        });


    </script>
@endsection