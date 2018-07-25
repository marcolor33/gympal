<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Redirect;

class StudentController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function student_home()
    {
         session_start();
        if (isset($_SESSION['user'])) {
            
            if ($_SESSION['user']['account_type'] == 'student')
                
            {
                return view('student_home');  
            }
            
            
            else 
            {
                return redirect()->route('getLogin');
            }
                
    
        } else {
            
            return redirect()->route('getLogin');
        }
        
        
    }

    
    
    public function student_myprofile()
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
                
                
                return view('student_myprofile',['student'=>$student, 'district'=>$district, 'account'=>$account,'hkDistricts'=>$hkDistricts,'knDistricts'=>$knDistricts,'ntDistricts'=>$ntDistricts,'otherDistricts'=>$otherDistricts]);   
            }
            
            
            else 
            {
                return redirect()->route('getLogin');
            }
                
    
        } else {
            
            return redirect()->route('getLogin');
        }
        
    }
    
    
       public function student_list_mycase()
    {
        
        
        session_start();
        if (isset($_SESSION['user'])) {
            
            if ($_SESSION['user']['account_type'] == 'student')
            {
                
                $cases = DB::table('case')->where('case.student_id','=',$_SESSION['user']['account_id'])->leftJoin('subject','case.subject_id','=','subject.subject_id')->leftJoin('district','case.district_id','=','district.district_id')->select('case.*','subject.name_chin as subject_name','district.name_chin as district_name')->get();

                    return view('student_list_mycase',['cases'=>$cases]);
                  
            }
            
            
            else 
            {
                return redirect()->route('getLogin');
            }
                
    
        } else {
            
            return redirect()->route('getLogin');
        }
        

    }
    
        
     public function student_view_mycase($case_id)
    {
        
        
        session_start();
        if (isset($_SESSION['user'])) {
            
            if ($_SESSION['user']['account_type'] == 'student')
                
            {
                             
                     $hkDistricts = DB::table('district')->where('district.region','=','HK')->get();
        $knDistricts = DB::table('district')->where('district.region','=','KN')->get();
        $ntDistricts = DB::table('district')->where('district.region','=','NT')->get();
        $otherDistricts = DB::select('SELECT * FROM district WHERE region = "OTHER"');
        
        $categories = DB::table('category')->get();
        
        
        $categoriesTable = DB::select('SELECT C.category_id,S.subject_id,C.name_chin as category_chin ,S.name_chin as subject_chin FROM  `category` AS C INNER JOIN subject AS S ON C.category_id = S.category_id');
        
        
         $case = DB::table('case')->where('case.case_id','=',$case_id)->leftJoin('subject','subject.subject_id','=','case.subject_id')->leftJoin('category','category.category_id','=','subject.category_id')->select('case.*','subject.name_chin as subject_name','category.name_chin as category_name')->first();
        
        $coachs = DB::select('SELECT * FROM `interested` I Left join `coach` C on I.coach_id = C.account_id');
        
        	return view('student_view_mycase',['case'=>$case,'hkDistricts'=>$hkDistricts,'knDistricts'=>$knDistricts,'ntDistricts'=>$ntDistricts,'categoriesTable'=>$categoriesTable,'categories'=>$categories, 'coachs'=>$coachs,'otherDistricts'=>$otherDistricts]);
        
        return view('student_view_mycase',['case'=>$case]); 
                
                
            }
            
            
            else 
            {
                return redirect()->route('getLogin');
            }
                
    
        } else {
            
            return redirect()->route('getLogin');
        }
        

    }
    
    
    public function student_list_coach()
    {
     
        
        
        session_start();
        if (isset($_SESSION['user'])) {
            
            if ($_SESSION['user']['account_type'] == 'student')
                
            {
                
                
                $categories = DB::select('SELECT * FROM category');
                $hkDistricts = DB::select('SELECT * FROM district WHERE region = "HK"');
                $knDistricts = DB::select('SELECT * FROM district WHERE region = "KN"');
                $ntDistricts = DB::select('SELECT * FROM district WHERE region = "NT"');

                $categoriesTable = DB::select('SELECT C.category_id,S.subject_id,C.name_chin as category_chin ,S.name_chin as subject_chin FROM  `category` AS C INNER JOIN subject AS S ON C.category_id = S.category_id');
                                  
	           $coachs = DB::SELECT("SELECT * FROM `coach` C

left JOIN
(
SELECT coach_id,GROUP_CONCAT(subject_name SEPARATOR ',') as subjects, GROUP_CONCAT(distinct category_name SEPARATOR ',') as categories ,GROUP_CONCAT(distinct category_id SEPARATOR ',') as category_id,GROUP_CONCAT(K.subject_id SEPARATOR ',') as subject_id FROM (SELECT C.*,T.subject_name,T.category_name, T.category_id FROM `coachAvailableSubject` C left Join (SELECT S.name_chin as subject_name,S.subject_id,S.category_id, Z.name_chin as category_name FROM `subject` S left join `category` Z on Z.category_id = S.category_id) T on T.subject_id = C.subject_id) K GROUP BY coach_id
    
  ) K2 on K2.coach_id = C.account_id");
                
                
                $subjects = DB::table('coachAvailableSubject')->leftJoin('subject','coachAvailableSubject.subject_id','=','subject.subject_id');

                $filter = '';
                
                return view('student_list_coach',['coachs'=>$coachs, 'subjects'=>$subjects , 'filter'=>$filter, 'categoriesTable' => $categoriesTable,
                'categories' => $categories,]);
             
                

                
                
            }
            
            
            else 
            {
                return redirect()->route('getLogin');
            }
                
    
        } else {
            
            return redirect()->route('getLogin');
        }
        
    }
    
    
      public function student_view_coach($account_id)
    {
	$account = DB::table('account')->where('account.account_id','=',$account_id)->first();
        
    $coach = DB::table('coach')->where('coach.account_id','=',$account_id)->first();
        
        
    $hkDistricts = DB::table('district')->where('district.region','=','HK')->get();
    $knDistricts = DB::table('district')->where('district.region','=','KN')->get();
    $ntDistricts = DB::table('district')->where('district.region','=','NT')->get();
    $otherDistricts = DB::select('SELECT * FROM district WHERE region = "OTHER"');
	
	$categories = DB::table('category')->get();
        
        
    $categoriesTable = DB::select('SELECT C.category_id,S.subject_id,C.name_chin as category_chin ,S.name_chin as subject_chin FROM  `category` AS C INNER JOIN subject AS S ON C.category_id = S.category_id');
        
    $subjects = DB::table('subject')->get();
	
	$available_times = DB::table('coachAvailableTime')->where('coach_id','=',$account_id)->first();

	$available_subjects = DB::table('coachAvailableSubject')->where('coach_id','=',$account_id)->leftJoin('subject','subject.subject_id','=','coachAvailableSubject.subject_id')->leftJoin('category','category.category_id','=','subject.category_id')->select('coachAvailableSubject.*','subject.name_chin as subject_name','category.name_chin as category_name')->get();

	$available_districts = DB::table('coachAvailableDistrict')->where('coach_id','=',$account_id)->get();
		
	return view('student_view_coach',['coach'=>$coach,'account'=>$account,'hkDistricts'=>$hkDistricts,'knDistricts'=>$knDistricts,'ntDistricts'=>$ntDistricts,'otherDistricts'=>$otherDistricts,'categoriesTable'=>$categoriesTable,'categories'=>$categories,'available_subjects'=>$available_subjects,'available_times'=>$available_times,'available_districts'=>$available_districts]);
    
}
    
   
    


}