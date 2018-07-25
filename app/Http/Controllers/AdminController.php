<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Classes\ImageManipulator;
use Redirect;
use Validator;
use Illuminate\Support\Facades\Route;

class AdminController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response

     */


     public function test_page()
     {


         return view('test_page');
     }


    public function admin_home()
    {


        return view('admin_home');
    }


    public function success()
    {

                session_start();
        if (isset($_SESSION['user'])) {



            if ($_SESSION['user']['account_type'] == 'admin')

            {

                $extend = 'masters.admin_master';
               return view('admin_home');

            }


            elseif($_SESSION['user']['account_type'] == 'student')
            {

                $extend = 'masters.student_home_master';

            }

            elseif ($_SESSION['user']['account_type'] == 'coach')
            {
               $extend = 'masters.coach_home_master';

            }


        } else {


            $extend = 'masters.guest_master';

             return redirect()->route('getLogin');


        }

        return view('success',['extend'=>$extend]);
    }

        public function payment()
    {

                session_start();
        if (isset($_SESSION['user'])) {



            if ($_SESSION['user']['account_type'] == 'admin')

            {

                $extend = 'masters.admin_master';
               return view('admin_home');

            }


            elseif($_SESSION['user']['account_type'] == 'student')
            {

                $extend = 'masters.student_home_master';

            }

            elseif ($_SESSION['user']['account_type'] == 'coach')
            {
               $extend = 'masters.coach_home_master';

            }


        } else {


            $extend = 'masters.guest_master';
             return redirect()->route('getLogin');


        }

        return view('payment',['extend'=>$extend]);
    }


    public function home()
    {


        $coachs = DB::select('SELECT T.*,A.*,C.* from `topCoach` T
left join `coach` C on T.coach_id = C.account_id
left join `account` A  on A.account_id = T.coach_id
order by T.order asc limit 10');
//        $coachs = DB::SELECT("SELECT * FROM `coach` C
//
//left JOIN
//(
//SELECT coach_id,GROUP_CONCAT(subject_name SEPARATOR ',') as subjects, GROUP_CONCAT(distinct category_name SEPARATOR ',') as categories ,GROUP_CONCAT(distinct category_id SEPARATOR ',') as category_id,GROUP_CONCAT(K.subject_id SEPARATOR ',') as subject_id FROM (SELECT C.*,T.subject_name,T.category_name, T.category_id FROM `coachAvailableSubject` C left Join (SELECT S.name_chin as subject_name,S.subject_id,S.category_id, Z.name_chin as category_name FROM `subject` S left join `category` Z on Z.category_id = S.category_id) T on T.subject_id = C.subject_id) K GROUP BY coach_id
//
//  ) K2 on K2.coach_id = C.account_id
//
//  where C.account_id in (SELECT T.coach_id FROM `topCoach` T )");

        $categories = DB::select('SELECT * FROM category');
        $hkDistricts = DB::select('SELECT * FROM district WHERE region = "HK"');
        $knDistricts = DB::select('SELECT * FROM district WHERE region = "KN"');
        $ntDistricts = DB::select('SELECT * FROM district WHERE region = "NT"');
        $otherDistricts = DB::select('SELECT * FROM district WHERE region = "OTHER"');

        $categoriesTable = DB::select('SELECT C.category_id,S.subject_id,C.name_chin as category_chin ,S.name_chin as subject_chin FROM  `category` AS C INNER JOIN subject AS S ON C.category_id = S.category_id');

        $cases = DB::table('case')->leftJoin('subject','case.subject_id','=','subject.subject_id')->leftJoin('district','case.district_id','=','district.district_id')->leftjoin('category','category.category_id','=','subject.category_id')->select('case.*','subject.name_chin as subject_name','category.name_chin as category_name','category.category_id as category_id' ,'district.name_chin as district_name')->orderBy('case_id','desc')->take(15)->get();


        $some = DB::raw('DATE_SUB(CURDATE(),INTERVAL 7 DAY)');
        $counter = DB::table('case')->where('time_created','>',$some)->count();

        $actionName = Route::getCurrentRoute()->getPath();

        $fitnessCatNo = DB::table('category')->select('category_id')->where('name_chin','=','健身')->first();
        $yogaCatNo = DB::table('category')->select('category_id')->where('name_chin','=','瑜伽')->first();
        $swimCatNo = DB::table('category')->select('category_id')->where('name_chin','=','游水')->first();
        $ballCatNo = DB::table('category')->select('category_id')->where('name_chin','=','球類')->first();
        $boxingCatNo = DB::table('category')->select('category_id')->where('name_chin','=','拳擊')->first();
        $wuxuCatNo = DB::table('category')->select('category_id')->where('name_chin','=','武術')->first();
        $dancingCatNo = DB::table('category')->select('category_id')->where('name_chin','=','舞蹈')->first();
        $joggingCatNo = DB::table('category')->select('category_id')->where('name_chin','=','跑步')->first();
        $fitnessCatNo=$this->check_category_no_valid($fitnessCatNo);
        $yogaCatNo=$this->check_category_no_valid($yogaCatNo);
        $swimCatNo=$this->check_category_no_valid($swimCatNo);
        $ballCatNo=$this->check_category_no_valid($ballCatNo);
        $boxingCatNo=$this->check_category_no_valid($boxingCatNo);
        $wuxuCatNo=$this->check_category_no_valid($wuxuCatNo);
        $dancingCatNo=$this->check_category_no_valid($dancingCatNo);
        $joggingCatNo=$this->check_category_no_valid($joggingCatNo);



        session_start();
        if (isset($_SESSION['user'])) {



            if ($_SESSION['user']['account_type'] == 'admin')

            {

                $extend = 'masters.admin_master';
               return view('admin_home');

            }


            elseif($_SESSION['user']['account_type'] == 'student')
            {

                $extend = 'masters.student_home_master';

            }

            elseif ($_SESSION['user']['account_type'] == 'coach')
            {
               $extend = 'masters.coach_home_master';

            }


        } else {


            $extend = 'masters.guest_master';


        }

        return view('home',['coachs'=>$coachs,'cases'=>$cases,'categories'=>$categories,'categoriesTable'=>$categoriesTable,
                            'hkDistricts'=>$hkDistricts,'knDistricts'=>$knDistricts,'ntDistricts'=>$ntDistricts,'otherDistricts'=>$otherDistricts,
                            'extend'=>$extend, 'actionName'=>$actionName,'counter'=>$counter, 'fitnessCatNo'=>$fitnessCatNo, 'yogaCatNo'=>$yogaCatNo,
                            'swimCatNo'=>$swimCatNo, 'ballCatNo'=>$ballCatNo, 'dancingCatNo'=>$dancingCatNo, 'boxingCatNo'=>$boxingCatNo,
                            'wuxuCatNo'=>$wuxuCatNo, 'joggingCatNo'=>$joggingCatNo]);


    }

    public function check_category_no_valid($CatNo){
        if (count($CatNo)==0){
            $CatNo = "invalid";
            return $CatNo;
        } else {
            $CatNo = $CatNo->category_id;
            return $CatNo;
        }
    }

    public function list_topcoach()
    {
        session_start();
        if (isset($_SESSION['user'])) {

            if ($_SESSION['user']['account_type'] == 'admin')

            {

                $coachs = DB::select('SELECT T.*,A.*,C.* from `topCoach` T
left join `coach` C on T.coach_id = C.account_id
left join `account` A  on A.account_id = T.coach_id
order by T.order asc');



                return view('list_topcoach',['coachs'=>$coachs]);

            }


            else
            {
                return redirect()->route('getLogin');
            }


        } else {

            return redirect()->route('getLogin');
        }




    }






    public function my_profile()

    {
            session_start();
           if (isset($_SESSION['user'])) {



            if ($_SESSION['user']['account_type'] == 'admin')

            {
               return redirect()->route('admin_home');

            }


            elseif($_SESSION['user']['account_type'] == 'student')
            {


            }

            elseif ($_SESSION['user']['account_type'] == 'coach')
            {

            }

            else
            {

                return redirect()->route('getLogin');
            }


    }

    }


    public function list_student()
    {
        session_start();
        if (isset($_SESSION['user'])) {



            if ($_SESSION['user']['account_type'] == 'admin')

            {
                $students = DB::table('account')->where('account.account_type', '=', 'student')->leftJoin('student','student.account_id','=','account.account_id')->orderBy('time_created','desc')->get();
                return view('list_student', ['students' => $students, 'user' => $_SESSION['user']]);

            }


            else
            {
                return redirect()->route('getLogin');
            }


        } else {

            return redirect()->route('getLogin');
        }

    }

    public function list_coach()
    {

        session_start();
        if (isset($_SESSION['user'])) {

            if ($_SESSION['user']['account_type'] == 'admin')

            {

                $coachs = DB::select('SELECT A.*,C.*, if(C.account_id in (SELECT T.coach_id FROM `topCoach` T WHERE 1),1,0) as amtop from `account` A
left join `coach` C on A.account_id = C.account_id
where A.account_type = "coach" ORDER BY time_created desc' );




                return view('list_coach',['coachs'=>$coachs]);

            }


            else
            {
                return redirect()->route('getLogin');
            }


        } else {

            return redirect()->route('getLogin');
        }

    }


        public function public_list_coach()
    {

        session_start();
        if (isset($_SESSION['user'])) {

            if ($_SESSION['user']['account_type'] == 'admin')

            {
               $extend = 'masters.admin_master';

                $coachs = DB::select('SELECT A.*,C.*, if(C.account_id in (SELECT T.coach_id FROM `topCoach` T WHERE 1),1,0) as top from `account` A
left join `coach` C on A.account_id = C.account_id
where A.account_type = "coach"');


                return view('list_coach',['coachs'=>$coachs]);

            }

            elseif($_SESSION['user']['account_type'] == 'student')
            {

               $extend = 'masters.student_home_master';
            }

            elseif ($_SESSION['user']['account_type'] == 'coach')
            {
                $extend = 'masters.coach_home_master';
            }


        } else {

            $extend = 'masters.guest_master';


        }


                $categories = DB::select('SELECT * FROM category');
                $hkDistricts = DB::select('SELECT * FROM district WHERE region = "HK"');
                $knDistricts = DB::select('SELECT * FROM district WHERE region = "KN"');
                $ntDistricts = DB::select('SELECT * FROM district WHERE region = "NT"');
                $otherDistricts = DB::select('SELECT * FROM district WHERE region = "OTHER"');

                $categoriesTable = DB::select('SELECT C.category_id,S.subject_id,C.name_chin as category_chin ,S.name_chin as subject_chin FROM  `category` AS C INNER JOIN subject AS S ON C.category_id = S.category_id');

//	           $coachs = DB::SELECT("SELECT * FROM `coach` C
//
//left JOIN
//(
//SELECT coach_id,GROUP_CONCAT(subject_name SEPARATOR ',') as subjects, GROUP_CONCAT(distinct category_name SEPARATOR ',') as categories ,GROUP_CONCAT(distinct category_id SEPARATOR ',') as category_id,GROUP_CONCAT(K.subject_id SEPARATOR ',') as subject_id FROM (SELECT C.*,T.subject_name,T.category_name, T.category_id FROM `coachAvailableSubject` C left Join (SELECT S.name_chin as subject_name,S.subject_id,S.category_id, Z.name_chin as category_name FROM `subject` S left join `category` Z on Z.category_id = S.category_id) T on T.subject_id = C.subject_id) K GROUP BY coach_id
//
//  ) K2 on K2.coach_id = C.account_id ORDER BY star desc, approved desc");



    $coachs = DB::SELECT("SELECT * from coach
LEFT join (SELECT I.coach_id,GROUP_CONCAT(DISTINCT C.name_chin ORDER by C.category_id) as categories,GROUP_CONCAT(DISTINCT C.category_id ) as category_id,GROUP_CONCAT(DISTINCT S.name_chin ) as subjects,GROUP_CONCAT(DISTINCT S.subject_id ) as subject_id from coachAvailableSubject I

Left JOIN subject S on S.subject_id = I.subject_id

LEFT JOIN category C on C.category_id = S.category_id

GROUP by coach_id) T on T.coach_id = coach.account_id

where coach.account_id in (select account_id from account where activated = 1)

 ORDER BY star desc, approved desc, coach.account_id asc
");

//

                $subjects = DB::table('coachAvailableSubject')->leftJoin('subject','coachAvailableSubject.subject_id','=','subject.subject_id');



                if (isset($_GET['category_filter']))
                {
                    $category_filter = $_GET['category_filter'];
                }
                else
                {
                    $category_filter = '';
                }

                return view('public_list_coach',['coachs'=>$coachs, 'subjects'=>$subjects , 'category_filter'=>$category_filter, 'categoriesTable' => $categoriesTable,
                'categories' => $categories,'extend' =>$extend]);



    }


    public function public_list_case()
    {

           session_start();

                $categories = DB::select('SELECT * FROM category');
        $hkDistricts = DB::select('SELECT * FROM district WHERE region = "HK"');
        $knDistricts = DB::select('SELECT * FROM district WHERE region = "KN"');
        $ntDistricts = DB::select('SELECT * FROM district WHERE region = "NT"');
        $otherDistricts = DB::select('SELECT * FROM district WHERE region = "OTHER"');

        $categoriesTable = DB::select('SELECT C.category_id,S.subject_id,C.name_chin as category_chin ,S.name_chin as subject_chin FROM  `category` AS C INNER JOIN subject AS S ON C.category_id = S.category_id');

        $temp_table = DB::Raw('(SELECT case_id,COUNT(coach_id) as count from `interested` GROUP by case_id) as B');

	   $cases = DB::table('case')->leftJoin('subject','case.subject_id','=','subject.subject_id')->leftJoin('district','case.district_id','=','district.district_id')->leftjoin('category','category.category_id','=','subject.category_id')->leftJoin($temp_table,'B.case_id','=','case.case_id')->leftJoin('account','account.account_id','=','case.student_id')->select('case.*','account.account_code','subject.name_chin as subject_name','category.name_chin as category_name','category.category_id as category_id' ,'district.name_chin as district_name','B.count')->orderBy('time_created','desc')->get();


        if (isset($_SESSION['user'])) {

            if ($_SESSION['user']['account_type'] == 'admin')

            {
               $extend = 'masters.admin_master';
                return view('list_case',['cases'=>$cases,'categories'=>$categories,'categoriesTable'=>$categoriesTable,'hkDistricts'=>$hkDistricts,'knDistricts'=>$knDistricts,'ntDistricts'=>$ntDistricts,'otherDistricts'=>$otherDistricts,'extend'=>$extend]);

            }

            elseif($_SESSION['user']['account_type'] == 'student')
            {

               $extend = 'masters.student_home_master';
            }

            elseif ($_SESSION['user']['account_type'] == 'coach')
            {
                $extend = 'masters.coach_home_master';
            }


        } else {

            $extend = 'masters.guest_master';


        }



        return view('public_list_case',['cases'=>$cases,'categories'=>$categories,'categoriesTable'=>$categoriesTable,'hkDistricts'=>$hkDistricts,'knDistricts'=>$knDistricts,'ntDistricts'=>$ntDistricts,'otherDistricts'=>$otherDistricts,'extend'=>$extend]);

    }


    public function public_view_case($case_id)
    {

        $hkDistricts = DB::table('district')->where('district.region','=','HK')->get();
        $knDistricts = DB::table('district')->where('district.region','=','KN')->get();
        $ntDistricts = DB::table('district')->where('district.region','=','NT')->get();
        $otherDistricts = DB::select('SELECT * FROM district WHERE region = "OTHER"');

        $categories = DB::table('category')->get();


        $categoriesTable = DB::select('SELECT C.category_id,S.subject_id,C.name_chin as category_chin ,S.name_chin as subject_chin FROM  `category` AS C INNER JOIN subject AS S ON C.category_id = S.category_id');




           session_start();
        if (isset($_SESSION['user'])) {

            if ($_SESSION['user']['account_type'] == 'admin')

            {
               $extend = 'masters.admin_master';
                $interest ='';

               $case = DB::table('case')->where('case.case_id','=',$case_id)->leftJoin('subject','subject.subject_id','=','case.subject_id')->leftJoin('category','category.category_id','=','subject.category_id')->select('case.*','subject.name_chin as subject_name','category.name_chin as category_name')->first();

              //  $case = DB::table('case')->where('case.case_id','=',$case_id)->leftJoin('subject','subject.subject_id','=','case.subject_id')->leftJoin('category','category.category_id','=','subject.category_id')->leftJoin('student','student.account_id','=','case.student_id')->select('case.*','student.*','subject.name_chin as subject_name','category.name_chin as category_name')->first();


				$student_id = $case->student_id;

				$student = DB::table('student')->where('student.account_id','=',$student_id)->leftJoin('account','account.account_id','=','student.account_id')->first();

                $coachs= DB::table('interested')->where('interested.case_id','=',$case_id)->leftJoin('account','account.account_id','=','interested.coach_id')->leftJoin('coach','coach.account_id','=','interested.coach_id')->select('interested.time_created as interest_time_created','interested.information','account.*','coach.*')->get();


                return view('view_case',['case'=>$case,'student'=>$student,'hkDistricts'=>$hkDistricts,'knDistricts'=>$knDistricts,'ntDistricts'=>$ntDistricts,'otherDistricts'=>$otherDistricts,'categoriesTable'=>$categoriesTable,'categories'=>$categories, 'coachs'=>$coachs,'extend'=>$extend,'interest'=>$interest]);
            }

            elseif($_SESSION['user']['account_type'] == 'student')
            {

               $extend = 'masters.student_home_master';
                $interest ='';
            }

            elseif ($_SESSION['user']['account_type'] == 'coach')
            {
                $extend = 'masters.coach_home_master';

                $interest = DB::table('interested')->where('interested.case_id','=',$case_id)->where('interested.coach_id','=',$_SESSION['user']['account_id'])->first();


            }


        } else {
            $interest ='';

            $extend = 'masters.guest_master';

        }



        $case = DB::table('case')->where('case.case_id','=',$case_id)->leftJoin('subject','subject.subject_id','=','case.subject_id')->leftJoin('category','category.category_id','=','subject.category_id')->leftJoin('district','district.district_id','=','case.district_id')->select('case.*','subject.name_chin as subject_name','category.name_chin as category_name','district.name_chin as district_name')->first();



        $coachs = DB::select('SELECT * FROM `interested` I Left join `coach` C on I.coach_id = C.account_id');

        return view('public_view_case',['case'=>$case,'hkDistricts'=>$hkDistricts,'knDistricts'=>$knDistricts,'ntDistricts'=>$ntDistricts,'otherDistricts'=>$otherDistricts,'categoriesTable'=>$categoriesTable,'categories'=>$categories, 'coachs'=>$coachs,'extend'=>$extend,'interest'=>$interest]);


    }

    public function mycase()

    {

        session_start();
        if (isset($_SESSION['user'])) {

            if ($_SESSION['user']['account_type'] == 'student')
            {

                $cases = DB::table('case')->where('case.student_id','=',$_SESSION['user']['account_id'])->leftJoin('subject','case.subject_id','=','subject.subject_id')->leftJoin('district','case.district_id','=','district.district_id')->select('case.*','subject.name_chin as subject_name','district.name_chin as district_name')->orderBy('case_id','desc')->get();

                $hkDistricts = DB::table('district')->where('district.region','=','HK')->get();
                $knDistricts = DB::table('district')->where('district.region','=','KN')->get();
                $ntDistricts = DB::table('district')->where('district.region','=','NT')->get();
                $otherDistricts = DB::select('SELECT * FROM district WHERE region = "OTHER"');

                $categories = DB::table('category')->get();


                $categoriesTable = DB::select('SELECT C.category_id,S.subject_id,C.name_chin as category_chin ,S.name_chin as subject_chin FROM  `category` AS C INNER JOIN subject AS S ON C.category_id = S.category_id');

                return view('student_list_mycase',['cases'=>$cases,'hkDistricts'=>$hkDistricts,'knDistricts'=>$knDistricts,'ntDistricts'=>$ntDistricts,'otherDistricts'=>$otherDistricts,'categoriesTable'=>$categoriesTable,'categories'=>$categories]);

            }


            elseif ($_SESSION['user']['account_type'] == 'coach')

            {
                 $hkDistricts = DB::table('district')->where('district.region','=','HK')->get();
                $knDistricts = DB::table('district')->where('district.region','=','KN')->get();
                $ntDistricts = DB::table('district')->where('district.region','=','NT')->get();
                $otherDistricts = DB::select('SELECT * FROM district WHERE region = "OTHER"');

                $categories = DB::table('category')->get();


                $categoriesTable = DB::select('SELECT C.category_id,S.subject_id,C.name_chin as category_chin ,S.name_chin as subject_chin FROM  `category` AS C INNER JOIN subject AS S ON C.category_id = S.category_id');


                $cases = DB::table('interested')->leftJoin('case','interested.case_id','=','case.case_id')->where('interested.coach_id','=',$_SESSION['user']['account_id'])->get();

                $cases = DB::table('interested')->leftJoin('case','interested.case_id','=','case.case_id')->where('interested.coach_id','=',$_SESSION['user']['account_id'])->leftJoin('subject','case.subject_id','=','subject.subject_id')->leftJoin('district','case.district_id','=','district.district_id')->select('case.*','subject.name_chin as subject_name','district.name_chin as district_name')->orderBy('interested.time_created','desc')->get();

                    return view('coach_list_mycase',['cases'=>$cases,'hkDistricts'=>$hkDistricts,'knDistricts'=>$knDistricts,'ntDistricts'=>$ntDistricts,'otherDistricts'=>$otherDistricts,'categoriesTable'=>$categoriesTable,'categories'=>$categories]);

            }


        } else {

            return redirect()->route('getLogin');
        }
    }

    public function myprofile()
    {


        session_start();
        if (isset($_SESSION['user'])) {

            if ($_SESSION['user']['account_type'] == 'student')

            {

                $account = DB::table('account')->where('account.account_id','=',$_SESSION['user']['account_id'])->first();
                $student = DB::table('student')->where('student.account_id','=',$_SESSION['user']['account_id'])->first();
                $district = DB::table('district')->where('district.district_id','=',$student->district_id)->first();
                $hkDistricts = DB::table('district')->where('district.region','=','HK')->get();
                $knDistricts = DB::table('district')->where('district.region','=','KN')->get();
                $ntDistricts = DB::table('district')->where('district.region','=','NT')->get();
                $otherDistricts = DB::select('SELECT * FROM district WHERE region = "OTHER"');


                $extend = 'masters.student_home_master';

                return view('view_student',['student'=>$student, 'district'=>$district, 'account'=>$account,'hkDistricts'=>$hkDistricts,'knDistricts'=>$knDistricts,'ntDistricts'=>$ntDistricts,'otherDistricts'=>$otherDistricts,'extend'=>$extend]);
            }

            elseif ($_SESSION['user']['account_type'] == 'coach')

            {

                    $account_id = $_SESSION['user']['account_id'];

                    $account = DB::table('account')->where('account.account_id','=',$_SESSION['user']['account_id'])->first();

                    $coach = DB::table('coach')->where('coach.account_id','=',$_SESSION['user']['account_id'])->first();


                    $hkDistricts = DB::table('district')->where('district.region','=','HK')->get();
                    $knDistricts = DB::table('district')->where('district.region','=','KN')->get();
                    $ntDistricts = DB::table('district')->where('district.region','=','NT')->get();
                    $otherDistricts = DB::select('SELECT * FROM district WHERE region = "OTHER"');

                    $categories = DB::table('category')->get();


                    $categoriesTable = DB::select('SELECT C.category_id,S.subject_id,C.name_chin as category_chin ,S.name_chin as subject_chin FROM  `category` AS C INNER JOIN subject AS S ON C.category_id = S.category_id');

                    $subjects = DB::table('subject')->get();

                    $available_times = DB::table('coachAvailableTime')->where('coach_id','=',$_SESSION['user']['account_id'])->first();

                    $available_subjects = DB::table('coachAvailableSubject')->where('coach_id','=',$account_id)->leftJoin('subject','subject.subject_id','=','coachAvailableSubject.subject_id')->leftJoin('category','category.category_id','=','subject.category_id')->select('coachAvailableSubject.*','subject.name_chin as subject_name','category.name_chin as category_name')->get();

                    $available_districts = DB::table('coachAvailableDistrict')->where('coach_id','=',$_SESSION['user']['account_id'])->get();


                    $extend = 'masters.coach_home_master';

                     $files = DB::table('uploadFile')->where('coach_id','=',$_SESSION['user']['account_id'])->get();

                    return view('view_coach',['coach'=>$coach,'account'=>$account,'hkDistricts'=>$hkDistricts,'knDistricts'=>$knDistricts,'ntDistricts'=>$ntDistricts,'otherDistricts'=>$otherDistricts,'categoriesTable'=>$categoriesTable,'categories'=>$categories,'available_subjects'=>$available_subjects,'available_times'=>$available_times,'available_districts'=>$available_districts,'extend'=>$extend,'files'=>$files]);
            }


            else
            {
                return redirect()->route('getLogin');
            }


        } else {

            return redirect()->route('getLogin');
        }
    }

    public function list_case()
    {
        $categories = DB::select('SELECT * FROM category');
        $hkDistricts = DB::select('SELECT * FROM district WHERE region = "HK"');
        $knDistricts = DB::select('SELECT * FROM district WHERE region = "KN"');
        $ntDistricts = DB::select('SELECT * FROM district WHERE region = "NT"');
        $otherDistricts = DB::select('SELECT * FROM district WHERE region = "OTHER"');

         $categoriesTable = DB::select('SELECT C.category_id,S.subject_id,C.name_chin as category_chin ,S.name_chin as subject_chin FROM  `category` AS C INNER JOIN subject AS S ON C.category_id = S.category_id');

	$cases = DB::table('case')->leftJoin('subject','case.subject_id','=','subject.subject_id')->leftJoin('district','case.district_id','=','district.district_id')->select('case.*','subject.name_chin as subject_name','district.name_chin as district_name')->get();

        return view('list_case',['cases'=>$cases,'categories'=>$categories,'categoriesTable'=>$categoriesTable,'hkDistricts'=>$hkDistricts,'knDistricts'=>$knDistricts,'ntDistricts'=>$ntDistricts,'otherDistricts'=>$otherDistricts]);
    }

    public function list_category()
    {
	$categories = DB::table('category')->get();

        return view('list_category',['categories'=>$categories]);
    }

    public function list_district()
    {
	$districts = DB::table('district')->get();

        return view('list_district',['districts'=>$districts]);
    }

    public function view_district($district_id)
    {
        $districtInfo = DB::table('district')->where('district.district_id','=',$district_id)->first();
        return view('view_district',['districtInfo'=>$districtInfo]);
    }

    public function view_category($category_id)
    {
        $categoryInfo = DB::table('category')->where('category.category_id','=',$category_id)->first();
        $subjectList = DB::table('subject')->where('subject.category_id','=',$category_id)->get();
        return view('view_category',['categoryInfo'=>$categoryInfo,'subjectList'=>$subjectList]);
    }




    public function view_subject($subject_id)
    {
        $subjectList = DB::table('subject')->where('subject.subject_id','=',$subject_id)->first();
        return view('view_subject',['subjectList'=>$subjectList]);
    }


    public function view_case($case_id)
    {

        $hkDistricts = DB::table('district')->where('district.region','=','HK')->get();
        $knDistricts = DB::table('district')->where('district.region','=','KN')->get();
        $ntDistricts = DB::table('district')->where('district.region','=','NT')->get();
        $otherDistricts = DB::select('SELECT * FROM district WHERE region = "OTHER"');

        $categories = DB::table('category')->get();


        $categoriesTable = DB::select('SELECT C.category_id,S.subject_id,C.name_chin as category_chin ,S.name_chin as subject_chin FROM  `category` AS C INNER JOIN subject AS S ON C.category_id = S.category_id');


        $case = DB::table('case')->where('case.case_id','=',$case_id)->leftJoin('subject','subject.subject_id','=','case.subject_id')->leftJoin('category','category.category_id','=','subject.category_id')->select('case.*','subject.name_chin as subject_name','category.name_chin as category_name')->first();

        $coachs = DB::select('SELECT * FROM `interested` I Left join `coach` C on I.coach_id = C.account_id');

        	return view('view_case',['case'=>$case,'hkDistricts'=>$hkDistricts,'knDistricts'=>$knDistricts,'ntDistricts'=>$ntDistricts,'otherDistricts'=>$otherDistricts,'categoriesTable'=>$categoriesTable,'categories'=>$categories, 'coachs'=>$coachs]);

        return view('view_case',['case'=>$case]);

    }


    public function view_student($account_id)
    {

    $account = DB::table('account')->where('account.account_id','=',$account_id)->first();
	$student = DB::table('student')->where('student.account_id','=',$account_id)->first();
	$district = DB::table('district')->where('district.district_id','=',$student->district_id)->first();
    $hkDistricts = DB::table('district')->where('district.region','=','HK')->get();
    $knDistricts = DB::table('district')->where('district.region','=','KN')->get();
    $ntDistricts = DB::table('district')->where('district.region','=','NT')->get();
    $otherDistricts = DB::select('SELECT * FROM district WHERE region = "OTHER"');

      session_start();

    if (isset($_SESSION['user']))
        {

            if ($_SESSION['user']['account_type'] == 'admin')

            {
               $extend = 'masters.admin_master';
            }
            else
            {
                 return redirect()->route('getLogin');
            }
        }


        return view('view_student',['student'=>$student, 'district'=>$district, 'account'=>$account,'hkDistricts'=>$hkDistricts,'knDistricts'=>$knDistricts,'ntDistricts'=>$ntDistricts,'otherDistricts' =>$otherDistricts,'extend'=>$extend]);
    }



    public function public_view_coach($account_id)
    {


    session_start();

    if (isset($_SESSION['user']))
        {

            if ($_SESSION['user']['account_type'] == 'admin')

            {
               $extend = 'masters.admin_master';
                $interest ='';
                $account = DB::table('account')->where('account.account_id','=',$account_id)->first();

    //$coach = DB::table('coach')->where('coach.account_id','=',$account_id)->first();


    $hkDistricts = DB::table('district')->where('district.region','=','HK')->get();
    $knDistricts = DB::table('district')->where('district.region','=','KN')->get();
    $ntDistricts = DB::table('district')->where('district.region','=','NT')->get();
    $otherDistricts = DB::select('SELECT * FROM district WHERE region = "OTHER"');

	$categories = DB::table('category')->get();


    $categories = DB::select('SELECT * FROM category');
                $hkDistricts = DB::select('SELECT * FROM district WHERE region = "HK"');
                $knDistricts = DB::select('SELECT * FROM district WHERE region = "KN"');
                $ntDistricts = DB::select('SELECT * FROM district WHERE region = "NT"');
                $otherDistricts = DB::select('SELECT * FROM district WHERE region = "OTHER"');

                $categoriesTable = DB::select('SELECT C.category_id,S.subject_id,C.name_chin as category_chin ,S.name_chin as subject_chin FROM  `category` AS C INNER JOIN subject AS S ON C.category_id = S.category_id');

	               $coachs = DB::select("SELECT * FROM `coach` C

left JOIN
(
SELECT coach_id,GROUP_CONCAT(subject_name ORDER BY category_id,subject_id) as subjects, GROUP_CONCAT(distinct category_name SEPARATOR ',') as categories ,GROUP_CONCAT(distinct category_id SEPARATOR ',') as category_id,GROUP_CONCAT(K.subject_id SEPARATOR ',') as subject_id FROM (SELECT C.*,T.subject_name,T.category_name, T.category_id FROM `coachAvailableSubject` C left Join (SELECT S.name_chin as subject_name,S.subject_id,S.category_id, Z.name_chin as category_name FROM `subject` S left join `category` Z on Z.category_id = S.category_id) T on T.subject_id = C.subject_id) K GROUP BY coach_id

  ) K2 on K2.coach_id = C.account_id
  where C.account_id = $account_id" );

    $coach = $coachs[0];



	$available_subjects = DB::table('coachAvailableSubject')->where('coach_id','=',$account_id)->leftJoin('subject','subject.subject_id','=','coachAvailableSubject.subject_id')->leftJoin('category','category.category_id','=','subject.category_id')->select('coachAvailableSubject.*','subject.name_chin as subject_name','category.name_chin as category_name')->get();

	$available_districts = DB::table('coachAvailableDistrict')->where('coach_id','=',$account_id)->get();

    $files = DB::table('uploadFile')->where('coach_id','=',$account_id)->get();

    $available_times = DB::table('coachAvailableTime')->where('coach_id','=',$account_id)->first();

    $extend = 'masters.admin_master';

	return view('view_coach',['coach'=>$coach,'account'=>$account,'hkDistricts'=>$hkDistricts,'knDistricts'=>$knDistricts,'ntDistricts'=>$ntDistricts,'otherDistricts' =>$otherDistricts,'categoriesTable'=>$categoriesTable,'categories'=>$categories,'available_subjects'=>$available_subjects,'available_times'=>$available_times,'available_districts'=>$available_districts,'extend'=>$extend,'files'=>$files]);

            }

            elseif ($_SESSION['user']['account_type'] == 'student')
            {

               $extend = 'masters.student_home_master';
                $dumb = DB::table('studentInterested')->where('studentInterested.student_id','=',$_SESSION['user']['account_id'])->where('studentInterested.coach_id','=',$account_id)->first();

                if($dumb)
                {
                    $interest ='1';
                }

                else
                {
                    $interest = '0';
                }

            }

            elseif ($_SESSION['user']['account_type'] == 'coach')
            {
                $extend = 'masters.coach_home_master';
                $interest = '0';

            }


        } else {
            $interest ='0';

            $extend = 'masters.guest_master';

        }


	$account = DB::table('account')->where('account.account_id','=',$account_id)->first();

    $coach = DB::table('coach')->where('coach.account_id','=',$account_id)->first();


    $hkDistricts = DB::table('district')->where('district.region','=','HK')->get();
    $knDistricts = DB::table('district')->where('district.region','=','KN')->get();
    $ntDistricts = DB::table('district')->where('district.region','=','NT')->get();
	$otherDistricts = DB::select('SELECT * FROM district WHERE region = "OTHER"');



	$categories = DB::table('category')->get();


    $categoriesTable = DB::select('SELECT C.category_id,S.subject_id,C.name_chin as category_chin ,S.name_chin as subject_chin FROM  `category` AS C INNER JOIN subject AS S ON C.category_id = S.category_id');


    $coachs = DB::select("SELECT * FROM `coach` C

left JOIN
(
SELECT coach_id,GROUP_CONCAT(subject_name ORDER BY category_id, subject_id) as subjects, GROUP_CONCAT(distinct category_name SEPARATOR ',') as categories ,GROUP_CONCAT(distinct category_id SEPARATOR ',') as category_id,GROUP_CONCAT(K.subject_id SEPARATOR ',') as subject_id FROM (SELECT C.*,T.subject_name,T.category_name, T.category_id FROM `coachAvailableSubject` C left Join (SELECT S.name_chin as subject_name,S.subject_id,S.category_id, Z.name_chin as category_name FROM `subject` S left join `category` Z on Z.category_id = S.category_id) T on T.subject_id = C.subject_id) K GROUP BY coach_id

  ) K2 on K2.coach_id = C.account_id
  where C.account_id = $account_id" );

    $coach = $coachs[0];

    $subjects = DB::table('subject')->get();

	$available_times = DB::table('coachAvailableTime')->where('coach_id','=',$account_id)->first();

	$available_subjects = DB::table('coachAvailableSubject')->where('coach_id','=',$account_id)->leftJoin('subject','subject.subject_id','=','coachAvailableSubject.subject_id')->leftJoin('category','category.category_id','=','subject.category_id')->select('coachAvailableSubject.*','subject.name_chin as subject_name','category.name_chin as category_name')->get();

	$available_districts = DB::table('coachAvailableDistrict')->where('coach_id','=',$account_id)->get();

        $files = DB::table('uploadFile')->where('coach_id','=',$account_id)->get();

	return view('public_view_coach',['coach'=>$coach,'account'=>$account,'hkDistricts'=>$hkDistricts,'knDistricts'=>$knDistricts,'ntDistricts'=>$ntDistricts,'otherDistricts'=>$otherDistricts,'categoriesTable'=>$categoriesTable,'categories'=>$categories,'available_subjects'=>$available_subjects,'available_times'=>$available_times,'available_districts'=>$available_districts,'extend'=>$extend,'files'=>$files,'interest'=>$interest]);

}



	public function view_coach($account_id)
    {


	$account = DB::table('account')->where('account.account_id','=',$account_id)->first();

    $coach = DB::table('coach')->where('coach.account_id','=',$account_id)->first();


    $hkDistricts = DB::table('district')->where('district.region','=','HK')->get();
    $knDistricts = DB::table('district')->where('district.region','=','KN')->get();
    $ntDistricts = DB::table('district')->where('district.region','=','NT')->get();
    $otherDistricts = DB::select('SELECT * FROM district WHERE region = "OTHER"');

	$categories = DB::table('category')->get();


    $categoriesTable = DB::select('SELECT C.category_id,S.subject_id,C.name_chin as category_chin ,S.name_chin as subject_chin FROM  `category` AS C INNER JOIN subject AS S ON C.category_id = S.category_id');


	$available_times = DB::table('coachAvailableTime')->where('coach_id','=',$account_id)->first();

	$available_subjects = DB::table('coachAvailableSubject')->where('coach_id','=',$account_id)->leftJoin('subject','subject.subject_id','=','coachAvailableSubject.subject_id')->leftJoin('category','category.category_id','=','subject.category_id')->select('coachAvailableSubject.*','subject.name_chin as subject_name','category.name_chin as category_name')->get();

	$available_districts = DB::table('coachAvailableDistrict')->where('coach_id','=',$account_id)->get();

    $files = DB::table('uploadFile')->where('coach_id','=',$account_id)->get();

    $extend = 'masters.admin_master';

	return view('view_coach',['coach'=>$coach,'account'=>$account,'hkDistricts'=>$hkDistricts,'knDistricts'=>$knDistricts,'ntDistricts'=>$ntDistricts,'otherDistricts' =>$otherDistricts,'categoriesTable'=>$categoriesTable,'categories'=>$categories,'available_subjects'=>$available_subjects,'available_times'=>$available_times,'available_districts'=>$available_districts,'extend'=>$extend,'files'=>$files]);

}


	public function enable_account($account_id)
	{
		DB::beginTransaction();
            try {

                $student = DB::table('account')->where('account.account_id','=',$account_id)->first();
                if ($student->activated == '0')
                {
                    $student = DB::table('account')->where('account.account_id','=',$account_id)->update(array('activated' => 1));
                }
                else
                {
                      $student = DB::table('account')->where('account.account_id','=',$account_id)->update(array('activated' => 0));
                }



                DB::commit();
                return response()->json(['success'=>true]);
            } catch (\Exception $e){
                DB::rollback();
                return  response()->json(['success'=>false, 'errors'=>$e->getMessage()],422);
            }

	}

    	public function approve_coach($account_id)
	{
		DB::beginTransaction();
            try {

                $coach = DB::table('coach')->where('coach.account_id','=',$account_id)->first();
                if ($coach->approved == '0')
                {
                    $coach = DB::table('coach')->where('coach.account_id','=',$account_id)->update(array('approved' => 1));
                }
                else
                {
                      $coach = DB::table('coach')->where('coach.account_id','=',$account_id)->update(array('approved' => 0));
                }



                DB::commit();
                return response()->json(['success'=>true]);
            } catch (\Exception $e){
                DB::rollback();
                return  response()->json(['success'=>false, 'errors'=>$e->getMessage()],422);
            }

	}

        	public function star_coach($account_id)
	{
		DB::beginTransaction();
            try {

                $coach = DB::table('coach')->where('coach.account_id','=',$account_id)->first();
                if ($coach->star == '0')
                {
                    $coach = DB::table('coach')->where('coach.account_id','=',$account_id)->update(array('star' => 1));
                }
                else
                {
                      $coach = DB::table('coach')->where('coach.account_id','=',$account_id)->update(array('star' => 0));
                }



                DB::commit();
                return response()->json(['success'=>true]);
            } catch (\Exception $e){
                DB::rollback();
                return  response()->json(['success'=>false, 'errors'=>$e->getMessage()],422);
            }

	}

    public function top_coach($account_id)

    {
		DB::beginTransaction();
            try {

                $coach = DB::table('topCoach')->where('topCoach.coach_id','=',$account_id)->first();
                $count = DB::table('topCoach')->count();
                $max = DB::table('topCoach')->max('order');
                $min = DB::table('topCoach')->min('order');




                if ($coach)
                {


                    $coach = DB::table('topCoach')->where('topCoach.coach_id','=',$account_id)->delete();
                }
                else
                {

                    if ($count < '10')
                    {

                         $coach = DB::table('topCoach')->insert(array('coach_id' => $account_id,'order'=>$max+1));
                    }

                    else
                    {
                        throw new Exception('Already reach max!');

                    }

                }

                DB::commit();
                return response()->json(['success'=>true]);
            } catch (\Exception $e){
                DB::rollback();
                return  response()->json(['success'=>false, 'errors'=>$e->getMessage()],422);
            }

	}


    public function up_topcoach($account_id)
    {

        DB::beginTransaction();
            try {


        $min = DB::table('topCoach')->min('order');



        $coach = DB::table('topCoach')->where('topCoach.coach_id','=',$account_id)->first();

        if ($coach->order != $min)
        {
            $coach2 = DB::table('topCoach')->where('topCoach.order','<',$coach->order)->orderBy('order','desc')->first();

            $dumb =  DB::table('topCoach')->where('topCoach.coach_id','=',$coach->coach_id)->update(array('order'=>$coach2->order));
            $dumb2 =  DB::table('topCoach')->where('topCoach.coach_id','=',$coach2->coach_id)->update(array('order'=>$coach->order));

        }



                DB::commit();
                return response()->json(['success'=>true]);
            } catch (\Exception $e){
                DB::rollback();
                return  response()->json(['success'=>false, 'errors'=>$e->getMessage()],422);
            }

    }



    public function down_topcoach($account_id)
    {

        DB::beginTransaction();
            try {


        $max = DB::table('topCoach')->max('order');



        $coach = DB::table('topCoach')->where('topCoach.coach_id','=',$account_id)->first();

        if ($coach->order != $max)
        {
            $coach2 = DB::table('topCoach')->where('topCoach.order','>',$coach->order)->orderBy('order','asc')->first();

            $dumb =  DB::table('topCoach')->where('topCoach.coach_id','=',$coach->coach_id)->update(array('order'=>$coach2->order));
            $dumb2 =  DB::table('topCoach')->where('topCoach.coach_id','=',$coach2->coach_id)->update(array('order'=>$coach->order));

        }



                DB::commit();
                return response()->json(['success'=>true]);
            } catch (\Exception $e){
                DB::rollback();
                return  response()->json(['success'=>false, 'errors'=>$e->getMessage()],422);
            }








    }




    public function delete_account($account_id)
	{

        DB::beginTransaction();
            try {

                $account = DB::table('account')->where('account.account_id','=',$account_id)->first();

                if ($account->account_type == 'student')
                {
                    $student = DB::table('student')->where('student.account_id','=',$account_id)->delete();
                    $studentInterest = DB::table('studentInterested')->where('studentInterested.student_id','=',$account_id)->delete();
                }

                elseif ($account->account_type == 'coach')
                {

                    $coach = DB::table('coach')->where('coach.account_id','=',$account_id)->delete();

                    $topcoach = DB::table('topCoach')->where('coach_id','=',$account_id)->delete();


                    $coachAvailableDistrict = DB::table('coachAvailableDistrict')->where('coachAvailableDistrict.coach_id','=',$account_id)->delete();
                    $coachAvailableSubject = DB::table('coachAvailableSubject')->where('coachAvailableSubject.coach_id','=',$account_id)->delete();
                    $coachAvailableTime = DB::table('coachAvailableTime')->where('coachAvailableTime.coach_id','=',$account_id)->delete();

                }
                else
                {

                }

                $account = DB::table('account')->where('account.account_id','=',$account_id)->delete();

                DB::commit();
                return response()->json(['success'=>true]);
            } catch (\Exception $e){
                DB::rollback();
                return  response()->json(['success'=>false, 'errors'=>$e->getMessage()],422);
            }


	}

      public function delete_case($case_id)
	{

        DB::beginTransaction();
            try {

                $case = DB::table('case')->where('case.case_id','=',$case_id)->delete();

                $interested = DB::table('interested')->where('interested.case_id','=',$case_id)->delete();

                DB::commit();
                return response()->json(['success'=>true]);
            } catch (\Exception $e){
                DB::rollback();
                return  response()->json(['success'=>false, 'errors'=>$e->getMessage()],422);
            }


	}

    public function delete_district($district_id)
	{
		$district_deleted = DB::table('district')->where('district.district_id','=',$district_id)->delete();
        return back();

	}

    public function delete_districts(Request $request){
        if(!empty($request->input('checked_box'))){
            foreach($_POST['checked_box'] as $district_id){
                DB::table('district')->where('district.district_id','=',$district_id)->delete();
            }
        }
        return Redirect::to('/admin/district')->with('message', 'success|Record updated.');
    }


    public function delete_category($category_id)
	{
		$category_deleted = DB::table('category')->where('category.category_id','=',$category_id)->delete();
        $subject_deleted = DB::table('subject')->where('subject.category_id','=',$category_id)->delete();
        return back();

	}

    public function delete_categories(Request $request){
        if(!empty($request->input('checked_box'))){
            foreach($_POST['checked_box'] as $category_id){
                DB::table('category')->where('category.category_id','=',$category_id)->delete();
                DB::table('subject')->where('subject.category_id','=',$category_id)->delete();
            }
        }
        return Redirect::to('/admin/category')->with('message', 'success|Record updated.');
    }

    public function delete_subject($subject_id)
	{
        $subject_deleted = DB::table('subject')->where('subject.subject_id','=',$subject_id)->delete();
        return back();

	}

     public function delete_subjects(Request $request){
        if(!empty($request->input('checked_box'))){
            foreach($_POST['checked_box'] as $subject_id){
                DB::table('subject')->where('subject.subject_id','=',$subject_id)->delete();
            }
        }
        return back()->with('message', 'success|Record updated.');
    }

    public function edit_category(Request $request ,$category_id){
//        echo $request;
        $update_category = DB::table('category')->where('category.category_id','=',$category_id)->update(
            array(
                'name'=>$request->input('category_name'),
                'name_chin'=>$request->input('category_name_chin'),
            )
        );

        return response()->json(['success' => true]);
    }

    public function edit_district(Request $request ,$district_id){
        $update_district = DB::table('district')->where('district.district_id','=',$district_id)->update(
            array(
                'name'=>$request->input('district_name'),
                'name_chin'=>$request->input('district_name_chin'),
                'region'=>$request->input('district_region'),
            )
        );

        return response()->json(['success' => true]);
    }


     public function edit_subject(Request $request ,$subject_id){
//        echo $request;
        $update_category = DB::table('subject')->where('subject.subject_id','=',$subject_id)->update(
            array(
                'name'=>$request->input('subject_name'),
                'name_chin'=>$request->input('subject_name_chin'),
            )
        );


        return response()->json(['success' => true]);
    }


    public function add_district(){
            return view('add_district');
    }

    public function add_category(){
            return view('add_category');
    }



      public function add_subject($category_id){
            return view('add_subject',['category_id'=>$category_id]);
    }


     public function create_district(Request $request){
        if(count($request->input('new_district_name'))==count($request->input('new_district_name_chin'))){
            for($cnt =0; $cnt<count($request->input('new_district_name'));$cnt++ ){
               DB::table('district')->insert(
                   array(
                        'name'=>$request->input('new_district_name')[$cnt],
                        'name_chin'=>$request->input('new_district_name_chin')[$cnt],
                        'region'=>$request->input('new_district_region')[$cnt],
                    )
                );
            }
            return  redirect()->route('list_district');
        }
    }


    public function create_category(Request $request){
        if(count($request->input('new_category_name'))==count($request->input('new_category_name_chin'))){
            for($cnt =0; $cnt<count($request->input('new_category_name'));$cnt++ ){
               DB::table('category')->insert(
                   array(
                        'name'=>$request->input('new_category_name')[$cnt],
                        'name_chin'=>$request->input('new_category_name_chin')[$cnt],
                    )
                );
            }
            return Redirect::to('/admin/category')->with('message', 'success|Record updated.');
        }
    }

    public function create_subject(Request $request,$category_id){
        if(count($request->input('new_subject_name'))==count($request->input('new_subject_name_chin'))){
            for($cnt =0; $cnt<count($request->input('new_subject_name'));$cnt++ ){
               DB::table('subject')->insert(
                   array(
                        'name'=>$request->input('new_subject_name')[$cnt],
                        'name_chin'=>$request->input('new_subject_name_chin')[$cnt],
                        'category_id'=>$category_id
                    )
                );
            }
            return Redirect::to('/admin/category/'.$category_id)->with('message', 'success|Record updated.');
        }
    }




    public function edit_case_status(Request $request)
    {
        $case_id = $request->input('case_id');

        $rules = array(
             'status'=>'regex:/[a-zA-Z0-9\p{L}_ -,\/]*$/',

        );
        $validator = Validator::make($request->all(), $rules);
         if ($validator->fails()) {
            return response()->json(['success'=>false, 'errors'=>$validator->errors()],422);

        }
        else {

            DB::beginTransaction();
            try {

                $id = DB::table('case')->where('case.case_id','=' , $request->input('case_id'))->update(
                    array(
                        'status' => $request->input('status'),

                    )
                );

                DB::commit();
                return response()->json(['success'=>true]);
            } catch (\Exception $e){
                DB::rollback();
                return  response()->json(['success'=>false, 'errors'=>$e->getMessage()],422);
            }
        }


    }


    public function edit_case(Request $request)
    {

        $case_id = $request->input('case_id');


//        $case = DB::table('case')->where('case.case_id','=',$case_id)->update(
//            array(
//                'case_id'=>$request->input('case_id'),
//
//            )
//        );

          $rules = array(
             'studentGender'=>'required|regex:/[a-zA-Z ]*$/',
             'studentAge'=>'required|regex:/[0-9]*$/',
             'classType'=>'required|regex:/[a-zA-Z ]*$/',
             'classMemberNo'=>'regex:/[0-9]*$/',
             'caseCategory'=>'regex:/[0-9]*$/',
             // 'extendCategory'=>'regex:/[a-zA-Z0-9\p{L}_ -,\/]*$/',
             'district'=>'required|regex:/[0-9]*$/',
             'start_time'=>'required',
             'start_date'=>'required|date',
             'frequency'=>'required|regex:/[0-9]*$/',
             'weeks'=>'required',
             'classDuration'=>'required|regex:/[0-9.]*$/',
             'fee'=>'required|regex:/[0-9]*$/',
             'coachSex'=>'required|regex:/[a-zA-Z]*$/',
             'venue'=>'required|regex:/[a-zA-Z ]*$/',
             // 'refAddress'=>'regex:/[a-zA-Z0-9\p{L}_ -,\/]*$/',
             // 'special_requirement'=>'regex:/[a-zA-Z0-9\n\p{L}_ -,\/]*$/'
        );
        $validator = Validator::make($request->all(), $rules);
         if ($validator->fails()) {
            return response()->json(['success'=>false, 'errors'=>$validator->errors()],422);

        }
        else {
            if(!empty($request->input('weeks'))){
            $available_day= implode (", ", $request->input('weeks'));
            }
            if(!empty($request->input('start_time'))){
                $available_time =implode(",",$request->input('start_time'));
            }
            DB::beginTransaction();
            try {
                $subjectID = $request->input('caseCategory');
                if(!empty($request->input('extendCategory'))){
                    $check = DB::table('subject')->where('name_chin', '=',$request->input('extendCategory'))->first();
                    if($check)
                    {
                        $subjectID = $check->subject_id;
                    }

                    else
                    {
                        $other = $name = DB::table('category')->where('name', 'Other')->pluck('category_id');
                        $subjectID = DB::table('subject')->insertGetId(
                        array(
                            'name'=> $request->input('extendCategory'),
                            'name_chin' => $request->input('extendCategory'),
                            'category_id' => $other[0]
                            )
                        );
                    }

                }

                $case = DB::table('case')->where('case.case_id','=' , $request->input('case_id'))->update(
                    array(
                        'student_Sex' => $request->input('studentGender'),
                        'student_Age' => $request->input('studentAge'),
                        'mode' => $request->input('classType'),
                        'classMemberNo' => !empty($request->input('classMemberNo')) ? $request->input('classMemberNo') : NULL,
                        'start_date'=>$request->input('start_date'),
                        'start_time' => $available_time,
                        'length' => $request->input('classDuration'),
                        'available_day' => $available_day,
                        'lesson_per_week' => $request->input('frequency'),
                        'fee' => $request->input('fee'),
                        'sex' => $request->input('coachSex'),
                        'special_requirement' => $request->input('special_requirement'),
                        'subject_id' => $subjectID,
                        'district_id' => $request->input('district'),
                        'venue'=>$request->input('venue'),
                        'refAddress'=>$request->input('refAddress'),
                    )
                );

                DB::commit();
                return response()->json(['success'=>true]);
            } catch (\Exception $e){
                DB::rollback();
                return  response()->json(['success'=>false, 'errors'=>$e->getMessage()],422);
            }
        }





        return response()->json(['success' => false]);


    }


    public function edit_interested(Request $request)
    {

        $case_id = $request->input('case_id');


        $case = DB::table('case')->where('case.case_id','=',$case_id)->update(
            array(
                'coach_id'=>$request->input('interested'),

            )
        );

        return response()->json(['success' => true]);


    }


    public function edit_student_profile(Request $request)
    {

        $account_id = $request->input('account_id');



         $rules = array(
                'engName' => 'required_without_all:chinName|regex:/[a-zA-Z ]*$/|max:24',
                'chinName' => 'required_without_all:engName|regex:/[p{L}]*$/|max:8',
                'HKID' => 'required|regex:/^([A-Z]{1})([0-9]{6})([A0-9])$/',
                'teleno' => 'required|regex:/^(?=.*?[0-9]).{8,}$/',
                'address' => 'required',
                'gender' => 'required|regex:/[a-zA-Z]*$/',
                'district' => 'required|regex:/[0-9]*$/',
                'howToKnowGympal'=>'required',
                'birthday' => 'required|date',
        );
        $validator = Validator::make($request->all(), $rules);
         if ($validator->fails()) {
            return response()->json(['success'=>false, 'errors'=>$validator->errors()],422);

        }

        else{


            DB::beginTransaction();
            try{

                $account = DB::table('student')->where('student.account_id','=',$account_id)->update(
                array(
                    'eng_name'=>$request->input('engName'),
                    'chin_name'=>$request->input('chinName'),
                    'idcard_no'=>$request->input('HKID'),
                    'address'=>$request->input('address'),
                    'district_id'=>$request->input('district'),
                    'teleno'=>$request->input('teleno'),
                    'birth_year'=>$request->input('birthday'),
                    'sex'=>$request->input('gender'),
                    'howToKnowGympal'=>$request->input('howToKnowGympal'),

                    )
                );



                DB::commit();
                 return response()->json(['success' => true]);

            }

             catch(\Exception $e){
                DB::rollback();
                return  response()->json(['success'=>false, 'errors'=>$e->getMessage()],422);
            }


        }








    }


        public function edit_coach_district(Request $request)
    {




        $account_id = $request->input('account_id');



        if(!empty($request->input('area'))){

            $old_district = DB::table('coachAvailableDistrict')->where('coachAvailableDistrict.coach_id','=',$account_id)->delete();
            foreach($_POST['area'] as $area){
                DB::table('coachAvailableDistrict')->insert(
                    array('coach_id'=> $account_id,'district_id'=>$area
                         )
                    );
                }
        }

        return response()->json(['success' => true]);

    }



    public function edit_coach_subject(Request $request)
    {

        $account_id = $request->input('account_id');

        $old = DB::table('coachAvailableSubject')->where('coach_id', '=',$account_id)->delete();


                  if(!empty($request->input('category'))){
                    foreach($_POST['category'] as $categoryValue){
                        if(!empty($categoryValue)){
                            DB::table('coachAvailableSubject')->insert(
                                array('coach_id'=> $account_id,'subject_id'=>$categoryValue
                                     )
                                );
                        }
                    }
                }

                if(!empty($request->input('extendCategory'))){


                    $check = DB::table('subject')->where('name_chin', '=',$request->input('extendCategory'))->first();
                    if($check)
                    {
                        $subjectID = $check->subject_id;
                    }

                    else
                    {
                        $other = $name = DB::table('category')->where('name', 'Other')->pluck('category_id');
                        $subjectID = DB::table('subject')->insertGetId(
                        array(
                            'name'=> $request->input('extendCategory'),
                            'name_chin' => $request->input('extendCategory'),
                            'category_id' => $other[0]
                            )
                        );
                    }


                     DB::table('coachAvailableSubject')->insert(
                            array(
                                'coach_id'=> $account_id,'subject_id'=>$subjectID
                                 )
                            );
                }


        return response()->json(['success' => true]);

    }



    public function edit_coach_time(Request $request)
    {

        $account_id = $request->input('account_id');

        $timeArray = array();
        $timeArray['coach_id']= $account_id;
        $old_time = DB::table('coachAvailableTime')->where('coachAvailableTime.coach_id','=',$account_id)->delete();
        if(!empty($request->input('teachingTime'))){
            foreach($_POST['teachingTime'] as $teachingTime){
                $timeArray[$teachingTime]=1;
                }
        }
         DB::table('coachAvailableTime')->insert(
            $timeArray
            );

        return response()->json(['success' => true]);

    }


    public function edit_coach_info(Request $request)
    {

        $account_id = $request->input('account_id');

        $this->validate($request,
            [
                'chinName' => 'regex:/[p{L}]*$/',
                'engName' => 'regex:/[a-zA-Z ]*$/',
                'HKID' => 'required',
                'teleno' => 'required|regex:/^(?=.*?[0-9]).{8,}$/',
                'address' => 'required',
                'gender' => 'required|regex:/[a-zA-Z]*$/',
                'birthday' => 'required',
                'groupClass' => 'required|regex:/[a-zA-Z ]*$/'
                // 'classroomAddress' => 'regex:/[a-zA-Z0-9\p{L}_ -,\/]*$/'
            ]
        );
        DB::table('coach')->where('account_id','=',$account_id)->update(
            array(
                  'chin_name'=>$request->input('chinName'),
                  'eng_name'=>$request->input('engName'),
                  'idcard_no'=>$request->input('HKID'),
                  'teleno'=>$request->input('teleno'),
                  'address'=> $request->input('address') ,
                  'sex'=>$request->input('gender'),
                  'birth_year'=>$request->input('birthday'),
                  'offer_venue'=>$request->input('classroomAddress'),
                  'offer_group'=>$request->input('groupClass'),

                 )
        );


        return response()->json(['success' => true]);

    }


        public function edit_coach_cv(Request $request)
    {

        $account_id = $request->input('account_id');

        $this->validate($request,
            [
                 'coachIntroduction' => 'required',
                'minHourlyWage' => 'required|regex:/[0-9]*$/',
                'idealHourlyWage' => 'required|regex:/[0-9]*$/',
                'coachPhotos'=>'image|mimes:jpeg,png,jpg,gif,svg'
            ]
        );




                $path ='';
                $profile_pic_path = '';
                $ImageUploaded = false;
                if($request->hasFile('coachPhotos')){


                    $dumb_coach = DB::table('coach')->where('account_id','=',$account_id)->first();

                    if ($dumb_coach->profile_pic != '')
                    {
                        $delete_path = str_replace('/front/storage/app/','',$dumb_coach->profile_pic);

                        \Storage::delete($delete_path);


                    }

                    $file = $request->file('coachPhotos');
                    $prefix = time() . '_';

                    $explodeFileName = explode('.',$file->getClientOriginalName());
                    $filetype = $explodeFileName[count($explodeFileName) - 1];
                    if (preg_match('/jpg|jpeg/i',$filetype))
                        $tempImg=imagecreatefromjpeg($file);
                    else if (preg_match('/png/i',$filetype))
                        $tempImg=imagecreatefrompng($file);
                    else if (preg_match('/gif/i',$filetype))
                        $tempImg=imagecreatefromgif($file);
                    else if (preg_match('/bmp/i',$filetype))
                        $tempImg=imagecreatefrombmp($file);
                    else
                        return response()->json(['success'=>false, 'errors'=>$validator->errors()],422);

                    $size = min(imagesx($tempImg), imagesy($tempImg)); // find the minimum value of images height(imagesy) and width(imagesx).
                    $cx = imagesx($tempImg)/ 2;
                    $cy = imagesy($tempImg) / 2;
                    $x = $cx - $size  / 2;
                    $y = $cy - $size  / 2;
                    if ($x < 0) $x = 0;
                    if ($y < 0) $y = 0;
                    $image = imagecrop($tempImg, ['x' => $x, 'y' => $y, 'width' => $size, 'height' => $size]);
                    $path = "/home/gympalco/public_html/front/storage/app/profileImg/".$prefix.$file->getClientOriginalName();
                    if ($image !== FALSE) {
                        imagejpeg($image, $path);
                    }
                    // $manipulator = new ImageManipulator($file);
                    // $image = $manipulator->resample(200, 200);
                    // $path = "/home/gympalco/public_html/front/storage/app/profileImg/".$prefix.$file->getClientOriginalName();
                    // $manipulator->save($path);
                    $ImageUploaded = true;
                    $profile_pic_path = "/front/storage/app/profileImg/".$prefix.$file->getClientOriginalName();
                }
            else{
                $coach = DB::table('coach')->where('account_id','=',$account_id)->first();
                $profile_pic_path = $coach->profile_pic;
            }

        DB::table('coach')->where('account_id','=',$account_id)->update(
            array(
                  'facebook'=>$request->input('coachFacebook'),
                  'instagram'=>$request->input('coachInstagram'),
                  'self_intro'=>$request->input('coachIntroduction'),
                  'year_of_teaching'=>$request->input('experienceSelection'),
                  'profession'=>$request->input('occupationSelection'),
                  'min_pay'=>$request->input('minHourlyWage'),
                  'well_pay'=>$request->input('idealHourlyWage'),
                    'profile_pic'=>$profile_pic_path,

                 )
        );

            if (null !==($request->input('admin_intro')))
            {

                DB::table('coach')->where('account_id','=',$account_id)->update(
                    array(
                            'admin_intro'=>$request->input('admin_intro'),

                         )
                );


            }


                $filecount=-1;
                if($request->hasFile('coachCV')){
                    $files = $request->file('coachCV');
                    $filecount =count($files);
                    foreach($files as $file) {
                        $prefix = time() . '_';
                        $path = "/home/gympalco/public_html/front/storage/app/CV/";

                        $filename = $prefix.$file->getClientOriginalName();

                        $upload_success = $file->move($path, $filename);

                        $file_path = "/front/storage/app/CV/".$prefix.$file->getClientOriginalName();

                        DB::table('uploadFile')->insert(
                            array(
                                  'coach_id'=> $account_id,
                                  'name'=>$filename,
//                                  'path'=>$path.$filename,
                                    'path'=>$file_path
                                 )
                        );
                    }
                }
                else{
                    $filecount=0;
                }




        return response()->json(['success' => true]);

    }


        public function list_student_interest()
    {

        $interests = DB::table('studentInterested')->leftJoin('account as a1','a1.account_id','=','studentInterested.coach_id')->leftJoin('account as a2','a2.account_id','=','studentInterested.student_id')->leftJoin('coach as a3','a1.account_id','=','a3.account_id')->select('studentInterested.*','a1.account_code as coach_code','a1.email as coach_email','a3.chin_name as coach_chin_name','a3.eng_name as coach_eng_name','a3.sex as coach_sex','a2.account_code as student_code','a2.email as student_email')->orderBy('time_created','desc')->get();

        return view('list_student_interest',['interests'=>$interests]);

    }



    public function change_password(Request $request)
    {

        $account_id = $request->input('account_id');

        $account = DB::table('account')->where('account.account_id','=',$account_id)->first();

        $this->validate($request,
            [
                'newPassword' => 'required|regex:/^(?=.*[A-Za-z])(?=.*?[0-9]).{8,}$/',
            ]
        );

        if (!($account))
        {
            $success = false;
            $error = 'cannot find this account id';
        }

        else
        {



            if ((\Hash::check($request->input('oldPassword'),$account->password)) || ($request->input('oldPassword') == $account->password))
            {


                $dumb = DB::table('account')->where('account.account_id','=',$account_id)->update(['password'=>bcrypt($request->input('newPassword'))]);

                $success = true;
                $error = 'same old !';
            }

            else
            {
                $success = false;
                $error = 'not same old !';

            }

        }


        return response()->json(['success' => $success,'error'=> $error]);

    }


    public function delete_interest(Request $request){
           session_start();
        if (isset($_SESSION['user'])) {

            if ($_SESSION['user']['account_type'] == 'admin')

            {

                $old = DB::table('interested')->where('coach_id','=',$request->input('coach_id'))->where('case_id','=',$request->input('case_id'))->delete();


        return response()->json(['success' => true]);


            }


            else
            {
                return redirect()->route('getLogin');
            }


        } else {

            return redirect()->route('getLogin');
        }
    }

     public function student_show_interest(Request $request){
           session_start();

                $new = DB::table('studentInterested')->insert(
                    array(
                    'student_id'=>$request->input('student_id'),
                    'coach_id'=>$request->input('coach_id'),
                    'status'=>'new'
                )
            );

        return response()->json(['success' => true]);

        }


       public function student_cancel_interest(Request $request){
           session_start();
        if (isset($_SESSION['user'])) {

            if ($_SESSION['user']['account_type'] == 'student')

            {

                $old = DB::table('studentInterested')->where('coach_id','=',$request->input('coach_id'))->where('student_id','=',$request->input('student_id'))->delete();


        return response()->json(['success' => true]);


            }


            else
            {
                return redirect()->route('getLogin');
            }


        } else {

            return redirect()->route('getLogin');
        }
    }


     public function student_interest_new(Request $request){

                $new = DB::table('studentInterested')->where('coach_id','=',$request->input('coach_id'))->where('student_id','=',$request->input('student_id'))->update(

                    array(
                    'status'=>'new'
                )
            );

        return response()->json(['success' => true]);

        }

         public function student_interest_delete(Request $request){

                $delete = DB::table('studentInterested')->where('coach_id','=',$request->input('coach_id'))->where('student_id','=',$request->input('student_id'))->delete();

        return response()->json(['success' => true]);

        }

        public function student_interest_seen(Request $request){

            $new = DB::table('studentInterested')->where('coach_id','=',$request->input('coach_id'))->where('student_id','=',$request->input('student_id'))->update(

                    array(
                    'status'=>'seen'
                )
            );

        return response()->json(['success' => true]);

        }


    public function new_static()
    {

             session_start();


            if (isset($_SESSION['user'])) {


                if ($_SESSION['user']['account_type'] == 'admin')

                {

                    $extend = 'masters.admin_master';
                    return view('new_static',['extend'=>$extend]);

                }

                else {



                    return redirect()->route('getLogin');

                }


            }


            else {



                    return redirect()->route('getLogin');

            }






    }

    public function create_static(Request $request)
    {
        $content = $request->input('content');
        $name = $request->input('name');

        DB::beginTransaction();
            try {

                $static = DB::table('static')->insert(array('name'=>$name,'content'=>$content));

                DB::commit();
                return response()->json(['success'=>true]);
            } catch (\Exception $e){
                DB::rollback();
                return  response()->json(['success'=>false, 'errors'=>$e->getMessage()],422);
            }

    }




    public function view_static($name)
    {

            session_start();


            if (isset($_SESSION['user'])) {


                if ($_SESSION['user']['account_type'] == 'admin')

                {
                    $extend = 'masters.admin_master';
                    $static = DB::table('static')->where('name','=',$name)->first();

                    return view('edit_static',['static'=>$static,'extend' =>$extend]);

                }

                elseif ($_SESSION['user']['account_type'] == 'student')
                {

                    $extend = 'masters.student_home_master';

                }

                elseif ($_SESSION['user']['account_type'] == 'coach')
                {
                    $extend = 'masters.coach_home_master';

                }

            }


            else {


                $extend = 'masters.guest_master';


                if ($name == 'online_payment')
                {
                    return redirect()->route('getLogin');
                }

            }


        $static = DB::table('static')->where('name','=',$name)->first();

        return view('view_static',['static'=>$static,'extend' =>$extend]);
    }


        public function list_static()
    {

            session_start();

            if (isset($_SESSION['user'])) {


                if ($_SESSION['user']['account_type'] == 'admin')

                {
                    $extend = 'masters.admin_master';
                    $statics = DB::table('static')->get();

                    return view('list_static',['statics'=>$statics,'extend' =>$extend]);

                }

                else {

                return redirect()->route('getLogin');

            }



            }

            else {

                return redirect()->route('getLogin');

            }



    }


    public function edit_static(Request $request, $name)
    {
        $content = $request->input('content');
        DB::beginTransaction();
            try {

                $static = DB::table('static')->where('static.name','=',$name)->update(array('content'=>$content));


                DB::commit();
                return response()->json(['success'=>true]);
            } catch (\Exception $e){
                DB::rollback();
                return  response()->json(['success'=>false, 'errors'=>$e->getMessage()],422);
            }

    }



    public function delete_static($name)
	{

        DB::beginTransaction();
            try {

                $static = DB::table('static')->where('name','=',$name)->delete();


                DB::commit();
                return response()->json(['success'=>true]);
            } catch (\Exception $e){
                DB::rollback();
                return  response()->json(['success'=>false, 'errors'=>$e->getMessage()],422);
            }


	}

    public function delete_file(Request $request)
    {
        $name = $request->input('name');


        DB::beginTransaction();
            try {


                $file = DB::table('uploadFile')->where('name','=',$name)->delete();


                $path = 'CV/'.$name;

                \Storage::delete($path);


                DB::commit();
                return response()->json(['success'=>true]);
            } catch (\Exception $e){
                DB::rollback();
                return  response()->json(['success'=>false, 'errors'=>$e->getMessage()],422);
            }


    }


    public function delete_profile_pic(Request $request)
    {


        $path = $request->input('path');
         DB::beginTransaction();
            try {


                $coach = DB::table('coach')->where('profile_pic','=',$path)->update(array('profile_pic'=>''));



                $path = str_replace('/front/storage/app/','',$path);

                \Storage::delete($path);

                DB::commit();

                return response()->json(['success'=>true]);
            } catch (\Exception $e){
                DB::rollback();
                return  response()->json(['success'=>false, 'errors'=>$e->getMessage()],422);
            }

    }

}
