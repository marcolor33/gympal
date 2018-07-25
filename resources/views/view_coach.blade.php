@extends($extend)

@section('content')

     <script src = "{{ URL::to('formValidateLib/jquery.validate.js') }}"></script>
    <!--
    <script src = "{{ URL::to('formValidateLib/inputmask/inputmask.js') }}"></script>
    <script src = "{{ URL::to('formValidateLib/inputmask/jquery.inputmask.js') }}"></script>
    -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <script src = "{{ URL::to('formValidateLib/jquery.mask.js') }}"></script>
    <script src = "{{ URL::to('formValidateLib/additional-methods.js') }}"></script>
    <script src = "{{ URL::to('formValidateLib/localization/messages_zh_TW.min.js') }}"></script>
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

        label.error{
            color: #f33;
            padding: 0;
            margin: 2px 0 0 0;
            font-size: 0.7em;
        }

    </style>
<div class="container">

    @if(isset($_SESSION['user']))

        @if($_SESSION['user']['account_type'] == 'admin')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> 檢視教練 </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_home') }}">後台首頁</a></li>
                <li class="breadcrumb-item"><a href="{{ route('public_list_coach') }}">所有教練</a></li>
                <li class="breadcrumb-item active">檢視教練</li>
            </ol>
        </div>
    </div>
        @else
        <h1 class="page-header">我的資料</h1>
        @endif
    @endif



    <div class="row account_info">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">帳戶資料</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id ="" role="form">
                                <div class="form-group">
                                    顯示名稱: <input class = "must form-control" type="text" name ="username" disabled value=" {!!$account->username!!}  "><br>
                                    登記電郵: <input class = "must form-control" type="text" name ="email" disabled value="{!!$account->email !!}"><br>
                                    <a class="btn btn-warning" onclick="edit_change_pw_form()">更改密碼</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row change_pw_form">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">更改密碼</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="change_pw_form" id="change_pw_form" role="form" action="{{route('change_password')}}" method="post">
                                <div class="form-group">
                                    舊密碼: <input class = "must form-control" type="password" id="OldPassword" name ="oldPassword"><br>
                                    新密碼: <input class = "must form-control" type="password" id="newPassword" name ="newPassword"><br>
                                    確認密碼: <input class = "must form-control" type="password" id="confirmPassword" name ="confirmPassword"><br>
                                    <input type="hidden" name="account_id" value="{!! $coach->account_id!!}">
                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type ="submit" value ="完成"/>&nbsp;<button class="btn btn-warning" type= "button" onclick="reset_all()">取消</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- district Form -->
    <div class="row defaultHidden" id = "districtFormRow">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"> 授課地區 </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form class = "defaultHidden" id = "districtForm" role="form" action="{{route('edit_coach_district')}}" method="post">
                                <div class="form-group">
                                    <p><b>授課地區 （可選擇多於一項）</b></p>
                                </div>
                                <div class="form-group">
                                    <p><b>香港島</b></p>
                                    <!--<input type="checkbox" name="area[]" value="1"/> 中半山，薄扶林 <br>-->
                                    @foreach ($hkDistricts as $hkDistrict)
                                        <input type="checkbox" name="area[]" value="{!!$hkDistrict->district_id!!}"/> {!! $hkDistrict->name_chin !!} <br>
                                    @endforeach

                                    <!-- 	<div id="hkIslandError"></div> -->
                                </div>
                                <div class="form-group">
                                    <p><b>九龍區</b></p>
                                    @foreach ($knDistricts as $knDistrict)
                                        <input type="checkbox" name="area[]" value="{!!$knDistrict->district_id!!}"/> {!! $knDistrict->name_chin !!} <br>
                                    @endforeach
                                    <!-- 				<div id="kowloonError"></div> -->
                                </div>
                                <div class="form-group">
                                    <p><b>新界區</b></p>
                                    @foreach ($ntDistricts as $ntDistrict)
                                        <input type="checkbox" name="area[]" value="{!!$ntDistrict->district_id!!}"/> {!! $ntDistrict->name_chin !!} <br>
                                    @endforeach
                                </div>
                                <div class="form-group">
                                <p><b>其它地區</b></p>
                                    @foreach ($otherDistricts as $otherDistrict)
                                        <input type="checkbox" name="area[]" value="{!!$otherDistrict->district_id!!}"/> {!! $otherDistrict->name_chin !!}<br>
                                    @endforeach
                                </div>
                                <div id="areaError"></div>

                                <input type="hidden" name="account_id" value="{!! $coach->account_id!!}">
                                <div class="form-group">
                                    <input class="btn btn-primary districtForm_control" type ="submit" value ="完成"/>   <input type ="button" class="btn btn-warning districtForm_control" onclick="reset_all()" value ="取消"/>
                                </div>
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                            </form>

                            <a class="btn btn-default" onclick="edit_districtForm()">修改</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- time Form -->
    <div class="row defaultHidden" id = "timeFormRow">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"> 授課時間 </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form class = "defaultHidden" id = "timeForm" role="form" action="{{route('edit_coach_time')}}" method="post">

                                <div class="form-group">
                                    <p><b>授課時間（可選擇多於一項）</b></p>
                                                       <table width="80%" id="classTimetable">
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
                                                <td>早上 (06:00-09:00)&nbsp;</td>
                                                <td><input type="checkbox" name="teachingTime[]" value="mon_6_9"/></td>
                                                <td><input type="checkbox" name="teachingTime[]" value="tue_6_9"/></td>
                                                <td><input type="checkbox" name="teachingTime[]" value="wed_6_9"/></td>
                                                <td><input type="checkbox" name="teachingTime[]" value="thu_6_9"/></td>
                                                <td><input type="checkbox" name="teachingTime[]" value="fri_6_9"/></td>
                                                <td><input type="checkbox" name="teachingTime[]" value="sat_6_9"/></td>
                                                <td><input type="checkbox" name="teachingTime[]" value="sun_6_9"/></td>
                                            </tr>
                                            <tr>
                                                <td>早上 (09:00-12:00)&nbsp;</td>
                                                <td><input type="checkbox" name="teachingTime[]" value="mon_9_12"/></td>
                                                <td><input type="checkbox" name="teachingTime[]" value="tue_9_12"/></td>
                                                <td><input type="checkbox" name="teachingTime[]" value="wed_9_12"/></td>
                                                <td><input type="checkbox" name="teachingTime[]" value="thu_9_12"/></td>
                                                <td><input type="checkbox" name="teachingTime[]" value="fri_9_12"/></td>
                                                <td><input type="checkbox" name="teachingTime[]" value="sat_9_12"/></td>
                                                <td><input type="checkbox" name="teachingTime[]" value="sun_9_12"/></td>
                                            </tr>
                                            <tr>
                                                <td>下午 (12:00-15:00)&nbsp;</td>
                                                <td><input type="checkbox" name="teachingTime[]" value="mon_12_15"/></td>
                                                <td><input type="checkbox" name="teachingTime[]" value="tue_12_15"/></td>
                                                <td><input type="checkbox" name="teachingTime[]" value="wed_12_15"/></td>
                                                <td><input type="checkbox" name="teachingTime[]" value="thu_12_15"/></td>
                                                <td><input type="checkbox" name="teachingTime[]" value="fri_12_15"/></td>
                                                <td><input type="checkbox" name="teachingTime[]" value="sat_12_15"/></td>
                                                <td><input type="checkbox" name="teachingTime[]" value="sun_12_15"/></td>
                                            </tr>
                                            <tr>
                                                <td>下午 (15:00-18:00)&nbsp;</td>
                                                <td><input type="checkbox" name="teachingTime[]" value="mon_15_18"/></td>
                                                <td><input type="checkbox" name="teachingTime[]" value="tue_15_18"/></td>
                                                <td><input type="checkbox" name="teachingTime[]" value="wed_15_18"/></td>
                                                <td><input type="checkbox" name="teachingTime[]" value="thu_15_18"/></td>
                                                <td><input type="checkbox" name="teachingTime[]" value="fri_15_18"/></td>
                                                <td><input type="checkbox" name="teachingTime[]" value="sat_15_18"/></td>
                                                <td><input type="checkbox" name="teachingTime[]" value="sun_15_18"/></td>
                                            </tr>
                                            <tr>
                                                <td>晚上 (18:00-21:00)&nbsp;</td>
                                                <td><input type="checkbox" name="teachingTime[]" value="mon_18_21"/></td>
                                                <td><input type="checkbox" name="teachingTime[]" value="tue_18_21"/></td>
                                                <td><input type="checkbox" name="teachingTime[]" value="wed_18_21"/></td>
                                                <td><input type="checkbox" name="teachingTime[]" value="thu_18_21"/></td>
                                                <td><input type="checkbox" name="teachingTime[]" value="fri_18_21"/></td>
                                                <td><input type="checkbox" name="teachingTime[]" value="sat_18_21"/></td>
                                                <td><input type="checkbox" name="teachingTime[]" value="sun_18_21"/></td>
                                            </tr>
                                            <tr>
                                                <td>晚上 (21:00-00:00)&nbsp;</td>
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
                                    <input class="btn btn-primary timeForm_control" type ="submit" value ="完成"/>   <input type ="button" class="btn btn-warning timeForm_control" onclick="reset_all()" value ="取消"/>
                                </div>
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                            </form>

                            <a class="btn btn-default" onclick="edit_timeForm()">修改</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- subjectInformation Form -->
    <div class="row defaultHidden" id = "subjectFormRow">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"> 基本資料 </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form class = "defaultHidden" id = "subjectForm" role="form" action="{{route('edit_coach_subject')}}" method="post">
                                <div class="form-group">
                                     <p><b>請選擇教練登記類別 （可選擇多於一項）</b></p>
                                    <div id="categoryList">
                                        @foreach ($categories as $category)
                                         @if($category->name!='Other')
                                            <?php $sccnt=0 ?>
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

                                                            <?php $cnt++ ?>
                                                             &nbsp;&nbsp;&nbsp;
                                                           <input type="checkbox" name="category[]" value="{!! $subcategory->subject_id !!}"/> {!! $subcategory->subject_chin !!} <br>

                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            @endif
                                        @endif
                                        @endforeach
                                    </div>
                                    <div>
                                        <input type="checkbox" id="otherCField" name="category[]" value="" /><span style="font-weight: 900">其他</span> <input class="defaultHidden form-control" type="text" name="extendCategory" id ="extendCategory"/>
                                    </div>
                                    <div id="categoryError">
                                    </div>
                                </div>
                                <input type="hidden" name="account_id" value="{!! $coach->account_id!!}">
                                <div class="form-group">
                                    <input class="btn btn-primary subjectForm_control" type ="submit" value ="完成"/> <input class="btn btn-warning subjectForm_control" type ="button" onclick="reset_all()" value ="取消"/>
                                </div>
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                            </form>
                            <a class="btn btn-default" onclick="edit_subjectForm()">修改</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- infoForm -->
    <div class="row defaultHidden" id = "infoFormRow">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"> 基本資料 </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form class = "defaultHidden" id = "infoForm" role="form" action="{{route('edit_coach_info')}}" method="post">

                                <p><b>個人資料</b></p>
                                <div class="form-group">


                                    英文姓名<input class = "form-control" type="text" name ="engName"><br>
                                    中文姓名<input class = "form-control" type="text" name ="chinName"><br>
                                    身份證號碼<input class = "must form-control" type="text" id="HKID" name ="HKID"><br>
                                    住宅地址<input class = "must form-control" type="text" name ="address"><br>
<!--                                    住宅區域<input class = "must form-control" type="text" name ="area"><br>-->
                                    電話號碼<input class = "must form-control" type="text" id="teleno" name ="teleno"><br>
                                    出生日期<input class = "must form-control" type="text" id="birthDatepicker" name ="birthday"><br>
                                </div>
                                <div class="form-group">
                                    性別<br />
                                    <input class ="must" type="radio" name = "gender" value="male"/>男 <input class ="must" type="radio" name = "gender" value="female"/>女 <span id="genderError"> </span><br />
                                </div>
                                <div class="form-group">
                                    能否提供上課場地<br />
                                    <input class="must" type="radio" id="canProvideClassroom" name ="provideClassroom" value="yes"> 可以 <input class="must" type="radio" name ="provideClassroom" value="no"> 不可以 <span id="provideClassroomError"> </span><br>
                                    <div id="classroomOption" class="defaultHidden" >
                                        地址<input class="form-control" id="classroomAddress" type="text" name ="classroomAddress"><br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    現時有安排小組課堂<br />
                                    <input class ="must" type="radio" name ="groupClass" value="yes"> 有 <input class ="must" type="radio" name ="groupClass" value="no"> 沒有 <span id="groupClassError"> </span><br>
                                </div>
                                <input type="hidden" name="account_id" value="{!! $coach->account_id!!}">
                                <div class="form-group">
                                    <input class="btn btn-primary infoForm_control" type ="submit" value ="完成"/>  <input class="btn btn-warning infoForm_control" type ="button" onclick="reset_all()" value ="取消"/>
                                </div>
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                            </form>
                            <a class="btn btn-default" onclick="edit_infoForm()">修改</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Coach CV Form -->
     <div class="row" id = "cvFormRow">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"> 教練履歷 </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="defaultHidden" id = "cvForm" action="{{route('edit_coach_cv')}}" method="post" role="form">
<!--                            <form class="defaultHidden" id = "coachCVForm" role="form">-->


                                    <div class="form-group">
                                    <p><b>個人簡介</b></p>
                                    相片上傳
                                    <p><b>請上傳相片，可以更容易找到成功個案及有機會登上Top10教練。</b></p>

                                    <div>
                                    @if ($coach->profile_pic != '')

                                        <img height=200px width=200px src='{{$coach->profile_pic}}'/>
                                        <br>
                                        <a class="cvForm_control"onclick="delete_profile_pic('{{$coach->profile_pic}}','{{route('delete_profile_pic')}}')">刪除個人照片</a>
                                    @elseif ($coach->sex == 'male')
                                        <img height=200px width=200px src='/front/storage/app/profileImg/profile-male.jpg'/>

                                    @else
                                        <img height=200px width=200px src='/front/storage/app/profileImg/profile-female.jpg'/>

                                    @endif

                                    </div>



                                    <input type="file" name="coachPhotos" id="coachPhotos" accept="image/*" data-msg-accept="請上傳正確的檔案格式"  /><b class="cvForm_control">(檔案格式:jpeg, png, bmp, gif, svg)</b><br><br>
                                    Facebook<input class="form-control" type="text" name="coachFacebook"><br>
                                    Instagram<input class="form-control" type="text" name="coachInstagram"><br>
                                    自我介紹(請詳細講述教學經驗,過往履歷及相關資格)<br>
                                    <textarea class = "must form-control" rows="10" cols="80"  id='coachIntroduction' name="coachIntroduction"></textarea>
                                     <p id='showWordCount'></p><br>
                                    教學履歷<br>
                                    <textarea class = "form-control" rows="10" cols="80"  name="admin_intro"></textarea> <br>

                                </div>



                                <div class="form-group">
                                    <b>教學經驗</b><br>
                                    教學年資
                                    <select name="experienceSelection" id="experienceSelection">
                                        <option value="default">--請選擇--</option>
                                        <option value="none">沒有</option>
                                        <option value="lessthanoneyear">少於一年</option>
                                        <option value="onetotwoyear">一至兩年</option>
                                        <option value="twotofouryear">兩年至四年</option>
                                        <option value="fivetotenyear">五年至十年</option>
                                        <option value="atleasttenyear">十年或以上</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    現時職業
<!--                                    <input class="must" type="text" name="occupationSelection" id="occupationSelection"/><br>-->
                                    <select name = "occupationSelection" id="occupationSelection">
                                        <option value="default">--請選擇--</option>
                                        <option value="sports_cultureandentainment">體育、文化和娛樂業</option>
                                        <option value="education">教育</option>
                                        <option value="finance">金融業</option>
                                        <option value="retail">批發和零售業</option>
                                        <option value="manufacturing">製造業</option>
                                        <option value="building">建築業</option>
                                        <option value="transportation">運輸業</option>
                                        <option value="it">資訊及通訊</option>
                                        <option value="estate">房地產業</option>
                                        <option value="public_administration">公共行政</option>
                                        <option value="health_and_social_welfare">衛生及社會福利業</option>
                                        <option value="other">其他</option>

                                    </select><br>
                                </div>

                                <div class="form-group">

                                   <p><b class="cvForm_control">履歷資料（請透過PDF檔案上傳有關教練資格證明，可以更有效找到成功個案，有機會登上Top10教練，如未能提供有關證明，如能成功申請個案，請在第一堂時侯帶同有關資格證明副本）</b></p>

                                    <p>

                                    <table id="FileTable" style="width:100%">
                                    @foreach ($files as $file)
                                        <tr>
                                            <td><a href="{{$file->path}}">{{$file->name}}</a> </td>
                                            <td><input type="button" class=" cvForm_control btn btn-warning files_remove" value="刪除" onclick="delete_file('{{$file->name}}','{{$file->path}}','{{route('delete_file')}}')"/></td>
                                        </tr>
                                    @endforeach
                                    </table>

                                    </p>


                                    <input class="btn btn-default cvForm_control" type="button" id="more_files" value="新增上傳檔案"/>
                                    <table class="cvForm_control" id="addFilesTable" style="width:100%">
                                        <tr>
                                            <td><input type="file" name="coachCV[]" accept="application/pdf,application/msword,
      application/vnd.openxmlformats-officedocument.wordprocessingml.document" data-msg-accept="請上傳正確的檔案格式" /></td>
                                            <td><input type="button" class="btn btn-warning files_remove" value="刪除"/></td>
                                        </tr>
                                    </table>
                                </div>


                                <div class="form-group">
                                    <b>教練時薪</b><br>
                                    最低教練時薪（小時）<input class = "must form-control" type="text" id="minHourlyWage" name="minHourlyWage"><br>
                                    理想教練時薪（小時）<input class = "must form-control" type="text" id="idealHourlyWage" name="idealHourlyWage"><br>
                                </div>

                                <input type="hidden" name="account_id" value="{!! $coach->account_id!!}">
                                <div class="form-group">
                                    <input  class="btn btn-primary cvForm_control" type ="submit" value ="完成"/> <input type="button"  class="btn btn-warning cvForm_control" onclick="reset_all()" value="取消"/>
                                </div>
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                            </form>
                            <a class="btn btn-default" onclick="edit_cvForm()">修改</a>
                        </div>
                    </div>

                </div>
            </div>
         </div>
</div>
</div>

<script>

     $( function() {
            $( "#birthDatepicker" ).datepicker({
              dateFormat:"yy/mm/dd",
              yearRange: "-100:+0",
              changeMonth: true,
              changeYear: true
            });
        });

        $.fn.extend({
            animateCss: function (animationName, cb) {
                var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
                this.addClass('animated ' + animationName).one(animationEnd, function() {
                    $(this).removeClass('animated ' + animationName);
                    if(cb){
                        cb();
                    }
                });
            }
        });

        $.validator.addMethod("mRequired", $.validator.methods.required,
            "必須填寫");

        $.validator.addMethod('ImgWidth', function (value, element) {
            if ($(element).data('width')) {
                // console.log("The width is "+$(element).data('width'));
                // console.log(($(element).data('width') >= 200));
                return $(element).data('width') >= 200;
            }
            return true;
        }, '圖片比例最少為200x200');

         $.validator.addMethod('ImgHeight', function (value, element) {
            if ($(element).data('height')) {
                // console.log("the height is "+$(element).data('height'));
                //  console.log(($(element).data('height') >= 200));
                return $(element).data('height') >= 200;
            }
            return true;
        }, '圖片比例最少為200x200');


        $.validator.addMethod('daterange', function(value, element, arg) {
                if (this.optional(element) && !value) {
                    return true;
                }

                var d = new Date();
                var deadline = d.getFullYear()+"/12/31";
                var startDate = Date.parse(arg[0]);
                var endDate = Date.parse(deadline);
                var enteredDate = Date.parse(value);


                if (isNaN(enteredDate)) {
                    return false;
                }

                return ( (isNaN(startDate) || (startDate <= enteredDate)) &&
                         (isNaN(endDate) || (enteredDate <= endDate)));


               }, $.validator.format("請填寫有效日期"));


        $.validator.addMethod("wordsMax",
           function(value, element, params) {
              var count = getWordsLength(value);
              if(count <= params[0]) {
                 return true;
              }
           },
           $.validator.format("最多 300 個字")
        );



        $.validator.addMethod("regex",
            function(value, element, regexp) {
                var re = new RegExp(regexp);
                return this.optional(element) || re.test(value);}
            ,"格式錯誤");



        $.validator.addMethod('filesize', function (value, element, param) {
            return this.optional(element) || (element.files[0].size <= param)
        }, '檔案大小不能超出{0} MB');


        $.validator.addMethod("valueNotEquals", function(value, element, arg){
                return arg != value;}
            ,"Value must not equal arg.");

        jQuery.validator.addClassRules({
            must:{
                mRequired : true,
            },
        });

        $("#loginPassword").mask('ZZZZZZZZZZZZZZZZ', {
            placeholder: "密碼須由英文字母及數字組合組成，長度為8 - 16",
            translation: {
                'Z': {
                    pattern: /[a-zA-Z0-9]/, optional: true
                }
            }
        });
        $("#HKID").mask("Z000000L",
            {
                placeholder: "請輸入所有英文字母及數字，無須輸入括號。例如你的香港身份證號碼是 A123456(7)，則輸入A1234567",
                translation: {
                    'Z': {
                        pattern: /[a-zA-Z0-9]/, optional: true
                    },
                    'L': {
                        pattern: /[A0-9]/, optional: true
                    }
                }
            }
        );
        $("#teleno").mask("00000000", {placeholder: ""});
        $("#birthDatepicker").mask("0000/00/00", {
            placeholder: "年/月/日",
        });
        $("#minHourlyWage").mask("00000");
        $("#idealHourlyWage").mask("00000");



          $('#subjectForm').on('change',function(){
            $('input[name="categoryTitle"]').each(function(index, elem) {
                if($(elem).is(":checked")){
                    // console.log($(elem).parent().children('div'));
                    $(elem).parent().children('div').show();
//                    $(elem).parent().children('div').animateCss('lightSpeedIn');
                }
                else{
                    $(elem).parent().children('div').hide();
                    $(elem).parent().children('div').find("[name='category[]']").prop('checked', false);;

                }

            });

            if($("#otherCField").is(":checked")){
                 $("#extendCategory").show();
            }
            else{
                 $("#extendCategory").hide();
                 $("#extendCategory").val("");
            }

        });


        $('#timeForm').on('change',function(){
            $('input[name="teachingTime[]"]').each(function(index, elem) {
                if($(elem).is(":checked")){
                    var allDayCheck = $(elem).val().split("_")
                    var status = allDayCheck[allDayCheck.length-1];
                    var week;
                    if(status==="all"){
                        week=allDayCheck[0];
                        $('input[name="teachingTime[]"]').each(function(index2, elem2) {
                            var getWeek = $(elem2).val().split("_");
                            if(getWeek[0]===week && getWeek[getWeek.length-1]!="all"){
                                $(elem2).prop('checked', false);
                                $(elem2).attr("disabled", true);
                            }
                        });
                    }
                }
                else{
                    $(elem).attr("disabled", false);
                }

            });
        });


    $('#infoForm').on('change',function(){


            if($('input[name=provideClassroom]:checked').val() === "yes")
                $("#classroomOption").show();
            else{
                $("#classroomOption").hide();
            }
        });

    $('#coachPhotos').on('change',function(){

            var files = this.files;
            var file_temp = files[0];
            if(files && file_temp){
                var reader = new FileReader();

                reader.readAsDataURL(file_temp);
                reader.onload = function (_file_temp) {
                    var image  = new Image();
                    image.src = _file_temp.target.result;
                    image.onload = function() {
                        $('#coachPhotos').data('height', this.height);
                        $('#coachPhotos').data('width', this.width);
                    }
                }
            }
        });


    function getWordsLength(words){
        var matches = words.match(/[\u00ff-\uffff]|\S+/g);
        return matches ? matches.length : 0;

    }

      $('#coachIntroduction').on('keyup',function(){
            var count = getWordsLength($(this).val());
            $('#showWordCount').html("Words: "+count);
            // console.log(count);
        });


	$(document).ready(function(){

        reset_all();
             var cnt_button = 0;
            var max_button =10;
            $('#addFilesTable').on("click",'.files_remove',function(){
                    $(this).parents("tr").remove();
                    cnt_button--;
                });

            $('#more_files').click(function(){
                if(cnt_button < max_button){
                    $('#addFilesTable').append(
                        '<tr> <td><input type="file" name="coachCV[]" accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" data-msg-accept="請上傳正確的檔案格式"/>(檔案格式:doc, docx, pdf)</td><td><input type="button" class="btn btn-warning files_remove" value="刪除"/></td></td></tr>'
                    );
                    cnt_button++;
                }
            });


         $("#infoForm").submit(function(e) {
                e.preventDefault();
            }).validate({

              rules : {

                    engName:{
                        regex:"^[a-zA-Z ]*$",
                        maxlength: 24,
                        required:{
                        depends: function(element){
                            return $("#chinName").val()=='';
                            }
                        }
                    },
                    chinName:{
                        regex:"^[\u4E00-\u9FA5]*$",
                        maxlength:8,
                        required:{
                        depends: function(element){
                             return $("#engName").val()=='';
                            }
                        }
                    },

                    address:{
                       wordsMax:['80'],
                    },
                    teleno:{
                        regex:"^(?=.*?[0-9]).{8,}$"
                    },
                    classroomAddress:{
                        required:"input:radio[id=canProvideClassroom]:checked",
                        // regex:"^[-',0-9A-Za-z \u4e00-\u9eff]{1,100}$"
                    },
                    birthday:{
                        dateISO: true,
                        daterange:["1800/01/01"]
                    },
                    HKID:{
                         regex:"^([A-Z]{1})([0-9]{6})([A0-9])$"
                    },
                     coachPhotos:{
                        accept:"image/*",
                        ImgWidth:true,
                        ImgHeight:true
                    },

                },
                messages:{

                    engName:{
                        required:"請填寫中文或英文名字",
                        regex:"請填寫有效英文名稱",
                        maxlength: "請填寫最多24位有效英文名稱"
                    },
                    chinName:{
                        required:"請填寫中文或英文名字",
                        regex:"請填寫有效中文名稱",
                        maxlength: "請填寫最多8位有效中文名稱"
                    },
                    teleno:{
                        regex:"請填寫有效電話號碼"
                    },
                    username:{
                       maxlength:"請輸入最長24位有效名稱"
                    },
                    address:{
                       // regex:"請輸入位有效地址",
                       wordsMax:"請填寫最多80字有效地址"
                    },
                    gender:{
                        mRequired:"必須選擇"
                    },
                    groupClass:{
                        mRequired:"必須選擇"
                    },
                    provideClassroom:{
                        mRequired:"必須選擇"
                    },
                    classroomAddress:{
                        requried:"必須填寫"
                    },
                    birthday:{
                        dateISO:"請填寫有效日期及留意格式(YYYY/MM/DD)"
                    },
                     coachPhotos:{
                        accept:"請上傳正確的檔案格式",
                    },
                     HKID:{
                        regex:"請輸入所有英文字母及數字，無須輸入括號。例如你的香港身份證號碼是 A123456(7)，則輸入A1234567",
                    }

                },
                errorPlacement: function(error, element) {
                    if((element.attr('name') === 'category[]')){
                        error.appendTo("#categoryError");
                    }
                    else if ((element.attr('name') === 'extendCategory')){
                        error.insertAfter(element);
                    }
                    else if ((element.attr('name') === 'gender')){
                        error.appendTo(genderError)
                    }
                    else if ((element.attr('name') === 'groupClass')){
                        error.appendTo(groupClassError)
                    }
                    else if ((element.attr('name') === 'provideClassroom')){
                        error.appendTo(provideClassroomError)
                    }
                    else {
                        error.insertAfter(element);
                    }
                },

                submitHandler: function (form) {

                     $.ajax({
                        method     :"POST",
                        url: $('#infoForm').attr( 'action' ),
                        data     : $('#infoForm').serialize().replace(/%5B%5D/g, '[]'),
                        success  : function(data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true)
                                {
                                   alert('修改完成!');
                                    window.location.reload();
                                }

                            else
                                {
//                                    alert('修改失敗! :'+ data.error);
                                    alert('修改失敗!');
                                }
                        }
                    });


                return false;
                }
            });



        $("#change_pw_form").validate({
            rules : {

                'newPassword':{
                    regex: "^(?=.*[A-Za-z])(?=.*?[0-9]).{8,}$"
                },
                confirmPassword:{
                    equalTo:"#newPassword"
                },

            },
            messages:{

                newPassword:{
                    regex:"密碼至少8位由英文字母及數字組合組成"
                },
                confirmPassword:{
                    equalTo:"與已填寫密碼不相同"
                }


            },
            errorPlacement: function(error, element) {
                if((element.attr('name') === 'category[]')){
                    error.appendTo("#categoryError");
                }
                else if ((element.attr('name') === 'extendCategory')){
                    error.insertAfter(element);
                }
                else if ((element.attr('name') === 'gender')){
                    error.appendTo(genderError)
                }
                else if ((element.attr('name') === 'groupClass')){
                    error.appendTo(groupClassError)
                }
                else if ((element.attr('name') === 'provideClassroom')){
                    error.appendTo(provideClassroomError)
                }
                else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {

                $.ajax({
                    method     :"POST",
                    url: $('#change_pw_form').attr( 'action' ),
                    data     : $('#change_pw_form').serialize().replace(/%5B%5D/g, '[]'),
                    success  : function(data) {
                        console.log("success ajax request!");
                        console.log(data.success);
                        if (data.success == true)
                            {
                               alert('成功更改密碼!');
                                window.location.reload();
                            }

                        else
                            {
//                                alert('更改密碼失敗! :'+ data.error);
                                   alert('更改密碼失敗! 請輸入正確的舊密碼');
                            }
                    }
                });

                return false
            }
        });


                 //TeachingInfoForm
            $("#districtForm").validate({
                rules:{
                    "area[]":{
                        required:true
                    },
                },
                messages: {
                    "area[]":{
                        required:"必須從三個地區中選擇其中一項或以上"
                    },
                },
                errorPlacement: function(error, element) {
                    if((element.attr('name') === 'area[]')){
                        error.appendTo("#areaError");
                    }
                    else{
                        error.insertAfter(element);
                    }
                },
                submitHandler: function (form) {

                    $.ajax({
                        method     :"POST",
                        url: $('#districtForm').attr('action'),
                        data     : $('#districtForm').serialize().replace(/%5B%5D/g, '[]'),
                        success  : function(data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true)
                                {
                                   alert('修改完成!');
                                    window.location.reload();
                                }

                            else
                                {
//                                    alert('修改失敗! :'+ data.error);
                                    alert('修改失敗!');
                                }
                        }
                    });

                    return false
                }
            });


                 //TeachingInfoForm

            $("#timeForm").validate({
                rules:{

                },
                messages: {

                },
                errorPlacement: function(error, element) {

                },
                submitHandler: function (form) {

                    $.ajax({
                        method     :"POST",
                        url: $('#timeForm').attr( 'action' ),
                        data     : $('#timeForm').serialize().replace(/%5B%5D/g, '[]'),
                        success  : function(data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true)
                                {
                                   alert('修改完成!');
                                    window.location.reload();
                                }

                            else
                                {
//                                    alert('修改失敗! :'+ data.error);
                                    alert('修改失敗!');
                                }
                        }
                    });

                    return false
                }
            });





                  // Subject Form Validation
            $("#subjectForm").validate({
                rules : {
                    'category[]':{
                        required: true,
                    },
                    'extendCategory':{
                        required:"input:checkbox[id=otherCField]:checked"
                    },


                },
                messages:{
                    'category[]':{
                        required: "必須選擇一項或以上",
                    },
                    'extendCategory':{
                        required:"請填寫有關資料"
                    },


                },
                errorPlacement: function(error, element) {
                    if((element.attr('name') === 'category[]')){
                        error.appendTo("#categoryError");
                    }
                    else if ((element.attr('name') === 'extendCategory')){
                        error.insertAfter(element);
                    }

                    else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function (form) {


                     $.ajax({
                        method     :"POST",
                        url: $('#subjectForm').attr( 'action' ),
                        data     : $('#subjectForm').serialize().replace(/%5B%5D/g, '[]'),
                        success  : function(data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true)
                                {
                                   alert('修改完成!');
                                    window.location.reload();
                                }

                            else
                                {
//                                    alert('修改失敗! :'+ data.error);
                                    alert('修改失敗!');
                                }
                        }
                    });


                    return false
                }
            });



           // info Form Validation





             $("#cvForm").submit(function(e) {
                e.preventDefault();
            }).validate({
                rules:{
                    coachIntroduction:{
                        wordsMax:['300'],
                        // maxlength:5000,
                        regex:"^[\u4E00-\u9FA5a-zA-Z0-9 !@#$%}{\/\\\n\r\^&*)?，。；、'(:+=,._-]*$",
                    },
                    "coachCV[]":{
                        filesize: 2097152
                    },
                    coachPhotos:{
                        accept:"image/*",
                        ImgWidth:true,
                        ImgHeight:true,
                        filesize: 2097152
                    },

                    coachFacebook:{
                        // regex:"^[-',:/.0-9A-Za-z \u4e00-\u9eff]{1,100}$"
                    },
                    coachInstagram:{
                        // regex:"^[-'0-9A-Za-z]{1,30}$"
                    },
                    experienceSelection:{
                        valueNotEquals:"default"
//                        regex:"^(?=.*?[0-9]).{1,}$"
                    },

                    occupationSelection:{
                        valueNotEquals:"default"
//                        regex:"^(?=.*[0-9A-Za-z\u4e00-\u9eff]).{1,20}$"
                    },
                    minHourlyWage:{
                        digits:true,
//                        regex:"^[0-9]*$"
                    },
                    idealHourlyWage:{
                        digits:true,
//                        regex:"^[0-9]*$"
                    },
                },
                messages: {
                    // coachIntroduction:{
                    //     wordCount:"字數限制：1000字內",
                        // regex:"請輸入有效格式"
                    // },
                    // coachFacebook:{
                    //     regex:"請輸入有效格式"
                    // },
                    // coachInstagram:{
                    //     regex:"請輸入有效格式"
                    // },
                    coachPhotos:{
                        accept:"請上傳正確的檔案格式",
                        filesize:"檔案大小不能超出2 MB"
                    },
                    coachIntroduction:{
                      regex:"請填寫有效字符"
                    },
                     "coachCV[]":{
                        filesize: "檔案大小不能超出2 MB"
                    },
                    experienceSelection:{
                        valueNotEquals:"請選擇相關項目"
//                        regex:"請輸入有效資料"
                    },
                    occupationSelection:{
//                        regex:"請輪入有效資料"
                        valueNotEquals:"請選擇相關項目"
                    },
                    minHourlyWage:{
                        digits:"請輸入有效時數"
                    },
                    idealHourlyWage:{
                        digits:"請輸入有效時數"
                    }
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element);
                },
                submitHandler: function (form) {

                    var fd3 = document.getElementById('cvForm');
                    var dataObject = new FormData(fd3);

                    $.ajax({
                        method     :"POST",
                        url: $('#cvForm').attr( 'action' ),
                        dataType : 'json',
                        data     : dataObject,
                        processData: false,
                        contentType: false,
                        success  : function(data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true)
                                {
                                   alert('修改完成!');
                                    window.location.reload();
                                }

                            else
                                {
//                                    alert('修改失敗! :'+ data.error);

                                    alert('修改失敗!');
                                }
                        }
                     });
                    return false;
                }
            });
})



    function reset_change_pw_form()
    {


        $('#oldPassword').prop('value','');
        $('#newPassword').prop('value','');
        $('#confirmPassword').prop('value','');

        $('.account_info').show();
        $('.change_pw_form').hide();
    }


    function edit_districtForm(){
        reset_all();
        $("[name='area[]']").prop('disabled',false);
        $(".districtForm_control").show();
    }

    function edit_timeForm()
    {
        reset_all();
        $("[name='teachingTime[]']").prop('disabled',false);
        $(".timeForm_control").show();

    }

    function edit_change_pw_form()
    {
        reset_all();
        $('.change_pw_form').show();

    }

    function edit_subjectForm()
    {

        reset_all();
        $('.subjectForm_control').show();


        $("[name='category[]']").prop('disabled',false);
        $("[name='categoryTitle']").prop('disabled',false);
        $("#otherCField").prop('disabled',false);
        $("[name='extendCategory']").prop('disabled',false);

    }


    function reset_subjectForm()
    {

        $('.subjectForm_control').hide();
        @foreach ($available_subjects as $subject)


        @if ($subject->category_name == '其他')

            $("[name='extendCategory']").val('{!! $subject->subject_name !!}');
            $("#otherCField").prop('checked',true);
        @else

            $("[name='category[]']").filter($("[value='{!! $subject->subject_id !!}']")).prop('checked',true);
            $("[name='categoryTitle']").filter($("[value='{!! $subject->category_name !!}']")).prop('checked',true);


        @endif


        @endforeach

        $("#subjectForm").change();
        $("[name='category[]']").prop('disabled',true);
        $("[name='categoryTitle']").prop('disabled','true');
        $("#otherCField").prop('disabled',true);
        $("[name='extendCategory']").prop('disabled',true);
    }





    function reset_districtForm()
    {

        $('.districtForm_control').hide();
         @foreach ($available_districts as $district)

        $("[name='area[]']").filter($("[value='{!! $district->district_id !!}']")).prop('checked','true');

        @endforeach

        $("[name='area[]']").prop('disabled','true');
    }


    function reset_timeForm()
    {


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



        $("[name='teachingTime[]']").prop('disabled',true);


    }

    function edit_infoForm()
    {

        reset_all();

        $("[name='engName']").prop('disabled',false);
        $("[name='chinName']").prop('disabled',false);
        $("[name='HKID']").prop('disabled',false);
        $("[name='address']").prop('disabled',false);
        $("[name='teleno']").prop('disabled',false);
        $("[name='birthday']").prop('disabled',false);
        $("[name='gender']").prop('disabled',false);
        $("[name='groupClass']").prop('disabled',false);

        $("[name='provideClassroom']").prop('disabled',false);
        $("[name='classroomAddress']").prop('disabled',false);

        $('.infoForm_control').show();

    }


    function reset_infoForm()
    {
        $('.infoForm_control').hide();
        $("[name='engName']").val('{!! $coach->eng_name !!}');
        $("[name='engName']").prop('disabled','true');

        $("[name='chinName']").val('{!! $coach->chin_name !!}');
        $("[name='chinName']").prop('disabled','true');

        $("[name='HKID']").val('{!! $coach->idcard_no !!}');
        $("[name='HKID']").prop('disabled','true');

        $("[name='address']").val({!! json_encode($coach->address) !!});
        $("[name='address']").prop('disabled','true');

        $("[name='teleno']").val('{!! $coach->teleno !!}');
        $("[name='teleno']").prop('disabled','true');

        $("[name='birthday']").val('{!! $coach->birth_year !!}');
        $("[name='birthday']").prop('disabled','true');

        $("[name= 'gender']").filter($("[value= '{!!$coach->sex !!}']")).click();
        $("[name='gender']").prop('disabled','true');

        $("[name= 'groupClass']").filter($("[value= '{!!$coach->offer_group !!}']")).click();
        $("[name='groupClass']").prop('disabled','true');


        $("[name= 'provideClassroom']").filter($("[value= '{!! (($coach->offer_venue) == "") ? 'no' : 'yes' !!}']")).click();


        if($('input[name=provideClassroom]:checked').val() === "yes")
            {

                $("#classroomOption").show();
                $("[name='classroomAddress']").val('{!! $coach->offer_venue !!}');
            }

            else{
                $("#classroomOption").hide();
            }


        $("[name='provideClassroom']").prop('disabled','true');
        $("[name='classroomAddress']").prop('disabled','true');


    }

    function edit_cvForm()
    {

        reset_all();

        $('.cvForm_control').show();

        $("[name=coachPhotos]").show();
        $("[name='coachFacebook']").prop('disabled',false);
        $("[name='coachInstagram']").prop('disabled',false);
        $("[name='coachIntroduction']").prop('disabled',false);

        @if(isset($_SESSION['user']))

            @if($_SESSION['user']['account_type'] == 'admin')

                $("[name='admin_intro']").prop('disabled',false);

            @endif

        @endif




        $("[name='experienceSelection']").prop('disabled',false);
        $("[name='occupationSelection']").prop('disabled',false);
        $("[name='minHourlyWage']").prop('disabled',false);
        $("[name='idealHourlyWage']").prop('disabled',false);
    }

    function reset_cvForm()
    {

        $('.cvForm_control').hide();

        $("[name=coachPhotos]").hide();

        $("[name='coachFacebook']").val('{!! $coach->facebook !!}');
        $("[name='coachFacebook']").prop('disabled','true');

        $("[name='coachInstagram']").val('{!! $coach->instagram !!}');
        $("[name='coachInstagram']").prop('disabled','true');



        $("[name='coachIntroduction']").val('@php  echo str_replace("\n", '\n', str_replace('"', '\"', addcslashes(str_replace("\r", '', (string)$coach->self_intro), "\0..\37'\\")));; @endphp');
        $("[name='coachIntroduction']").prop('disabled','true');

        $("[name='admin_intro']").val('@php  echo str_replace("\n", '\n', str_replace('"', '\"', addcslashes(str_replace("\r", '', (string)$coach->admin_intro), "\0..\37'\\")));; @endphp');
        $("[name='admin_intro']").prop('disabled','true');


        $("[name='experienceSelection']").val('{!! $coach->year_of_teaching !!}');
        $("[name='experienceSelection']").prop('disabled','true');


        $("[name='occupationSelection']").val('{!! $coach->profession !!}');
        $("[name='occupationSelection']").prop('disabled','true');

        $("[name='minHourlyWage']").val('{!! $coach->min_pay !!}');
        $("[name='minHourlyWage']").prop('disabled','true');

        $("[name='idealHourlyWage']").val('{!! $coach->well_pay !!}');
        $("[name='idealHourlyWage']").prop('disabled','true');
    }

    function reset_all()
    {
        reset_cvForm();
        reset_subjectForm();
        reset_infoForm();
        reset_timeForm();
        reset_districtForm();
        reset_change_pw_form();

    }

   	function delete_file(name,path,url){

		if (confirm("你確定刪除文件 [" + name+ "] ?") == true){


            $.ajax({
                        method     :"POST",
                        url: url,
                        data: {
                            name: name,
                            _token :"{{ Session::token()}}"
                        },
                        success  : function(data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true)
                                {
                                    alert('文件已刪除');
                                    window.location.reload();
                                }

                            else
                                alert('刪除文件失敗!');
                        }
            });


		}
	}


       	function delete_profile_pic(path,url){

		if (confirm("你確定刪除個人照片?") == true){


            $.ajax({
                        method     :"POST",
                        url: url,
                        data: {
                            path: path,
                            _token :"{{ Session::token()}}"
                        },
                        success  : function(data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true)
                                {
                                    alert('個人照片已刪除');
                                    window.location.reload();
                                }

                            else
                                alert('刪除個人照片失敗!');
                        }
            });


		}
	}



</script>
@endsection
