<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Redirect;

class CoachController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function coach_home()
    {
        
        
        return view('coach_home');
    }
    
    
    public function coach_myprofile()
    {
        
        
        session_start();
        if (isset($_SESSION['user'])) {
            
            if ($_SESSION['user']['account_type'] == 'coach')
                
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

                    return view('coach_myprofile',['coach'=>$coach,'account'=>$account,'hkDistricts'=>$hkDistricts,'knDistricts'=>$knDistricts,'ntDistricts'=>$ntDistricts,'otherDistricts'=>$otherDistricts,'categoriesTable'=>$categoriesTable,'categories'=>$categories,'available_subjects'=>$available_subjects,'available_times'=>$available_times,'available_districts'=>$available_districts]);  
            }
            
            
            else 
            {
                return redirect()->route('getLogin');
            }
                
    
        } else {
            
            return redirect()->route('getLogin');
        }
        

    }
    
    
     public function coach_list_case()
    {
        
        
        session_start();
        if (isset($_SESSION['user'])) {
            
            if ($_SESSION['user']['account_type'] == 'coach')
                
            {
                $cases = DB::table('case')->leftJoin('subject','case.subject_id','=','subject.subject_id')->leftJoin('district','case.district_id','=','district.district_id')->select('case.*','subject.name_chin as subject_name','district.name_chin as district_name')->get();
                
                

                return view('coach_list_case',['cases'=>$cases]);         
                  
            }
            
            
            else 
            {
                return redirect()->route('getLogin');
            }
                
    
        } else {
            
            return redirect()->route('getLogin');
        }
        

    }
    
        
     public function coach_view_case($case_id)
    {
        
        
        session_start();
        if (isset($_SESSION['user'])) {
            
            if ($_SESSION['user']['account_type'] == 'coach')
                
            {
                
                
                
                $hkDistricts = DB::table('district')->where('district.region','=','HK')->get();
                $knDistricts = DB::table('district')->where('district.region','=','KN')->get();
                $ntDistricts = DB::table('district')->where('district.region','=','NT')->get();
                $otherDistricts = DB::select('SELECT * FROM district WHERE region = "OTHER"');
        
        $categories = DB::table('category')->get();
        
        
        $categoriesTable = DB::select('SELECT C.category_id,S.subject_id,C.name_chin as category_chin ,S.name_chin as subject_chin FROM  `category` AS C INNER JOIN subject AS S ON C.category_id = S.category_id');
        
        
       $case = DB::table('case')->where('case.case_id','=',$case_id)->leftJoin('subject','subject.subject_id','=','case.subject_id')->leftJoin('category','category.category_id','=','subject.category_id')->select('case.*','subject.name_chin as subject_name','category.name_chin as category_name')->first();
        
        $coachs = DB::select('SELECT * FROM `interested` I Left join `coach` C on I.coach_id = C.account_id');
                
        $interest = DB::table('interested')->where('interested.case_id','=',$case_id)->where('interested.coach_id','=',$_SESSION['user']['account_id'])->first();
        
        	return view('coach_view_case',['case'=>$case,'hkDistricts'=>$hkDistricts,'knDistricts'=>$knDistricts,'ntDistricts'=>$ntDistricts,'categoriesTable'=>$categoriesTable,'categories'=>$categories, 'coachs'=>$coachs,'interest'=>$interest,'otherDistricts'=>$otherDistricts]);
                
                  
            }
            
            
            else 
            {
                return redirect()->route('getLogin');
            }
                
    
        } else {
            
            return redirect()->route('getLogin');
        }
        

    }
    
        
     public function coach_list_mycase()
    {
        
        
        session_start();
        if (isset($_SESSION['user'])) {
            
            if ($_SESSION['user']['account_type'] == 'coach')
                
            {
                
                	$cases = DB::table('interested')->leftJoin('case','interested.case_id','=','case.case_id')->where('interested.coach_id','=',$_SESSION['user']['account_id'])->get();
                
                $cases = DB::table('interested')->leftJoin('case','interested.case_id','=','case.case_id')->where('interested.coach_id','=',$_SESSION['user']['account_id'])->leftJoin('subject','case.subject_id','=','subject.subject_id')->leftJoin('district','case.district_id','=','district.district_id')->select('case.*','subject.name_chin as subject_name','district.name_chin as district_name')->get();

                    return view('coach_list_mycase',['cases'=>$cases]);
                  
            }
            
            
            else 
            {
                return redirect()->route('getLogin');
            }
                
    
        } else {
            
            return redirect()->route('getLogin');
        }
        

    }
    
        
     public function coach_view_mycase($case_id)
    {
        
        
        session_start();
        if (isset($_SESSION['user'])) {
            
            if ($_SESSION['user']['account_type'] == 'coach')
                
            {
                             
        $hkDistricts = DB::table('district')->where('district.region','=','HK')->get();
        $knDistricts = DB::table('district')->where('district.region','=','KN')->get();
        $ntDistricts = DB::table('district')->where('district.region','=','NT')->get();
        $otherDistricts = DB::select('SELECT * FROM district WHERE region = "OTHER"');
        
        $categories = DB::table('category')->get();
        
        
        $categoriesTable = DB::select('SELECT C.category_id,S.subject_id,C.name_chin as category_chin ,S.name_chin as subject_chin FROM  `category` AS C INNER JOIN subject AS S ON C.category_id = S.category_id');
        
        
        $case = DB::table('case')->where('case.case_id','=',$case_id)->leftJoin('subject','subject.subject_id','=','case.subject_id')->leftJoin('category','category.category_id','=','subject.category_id')->select('case.*','subject.name_chin as subject_name','category.name_chin as category_name')->first();
                
                
        $interest = DB::table('interested')->where('interested.case_id','=',$case_id)->where('interested.coach_id','=',$_SESSION['user']['account_id'])->first();
           
        	return view('coach_view_case',['case'=>$case,'hkDistricts'=>$hkDistricts,'knDistricts'=>$knDistricts,'ntDistricts'=>$ntDistricts,'categoriesTable'=>$categoriesTable,'categories'=>$categories, 'interest'=>$interest,'otherDistricts'=>$otherDistricts]);
 
                
            }
            
            
            else 
            {
                return redirect()->route('getLogin');
            }
                
    
        } else {
            
            return redirect()->route('getLogin');
        }
        

    }
    
        public function show_interest(Request $request, $case_id)
    {
        
        
        session_start();
        if (isset($_SESSION['user'])) {
            
            if ($_SESSION['user']['account_type'] == 'coach')
                
            {
                
                
                $interest =  DB::table('interested')->where('interested.case_id','=',$case_id)->where('interested.coach_id','=',$_SESSION['user']['account_id'])->first();
                
                if ($interest)
                {
                     DB::table('interested')->where('interested.case_id','=',$case_id)->where('interested.coach_id','=',$_SESSION['user']['account_id'])->delete();
                }
                
                DB::table('interested')->insert(
                   array(
                        'case_id'=>$case_id,
                        'coach_id'=>$_SESSION['user']['account_id'], 
                        'information'=>$request->input('information'),
                    )
                ); 
                
                

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
    
    
        public function cancel_interest(Request $request, $case_id)
    {
        
        
        session_start();
        if (isset($_SESSION['user'])) {
            
            if ($_SESSION['user']['account_type'] == 'coach')
                
            {
                
                
                $interest =  DB::table('interested')->where('interested.case_id','=',$case_id)->where('interested.coach_id','=',$_SESSION['user']['account_id'])->first();
                
                if ($interest)
                {
                     DB::table('interested')->where('interested.case_id','=',$case_id)->where('interested.coach_id','=',$_SESSION['user']['account_id'])->delete();
                }
                   

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
    
    



}