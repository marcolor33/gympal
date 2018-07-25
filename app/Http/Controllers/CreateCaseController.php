<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Validator;

class CreateCaseController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function prepareForm()
    {
        $categories = DB::select('SELECT * FROM category');
        $hkDistricts = DB::select('SELECT * FROM district WHERE region = "HK"');
        $knDistricts = DB::select('SELECT * FROM district WHERE region = "KN"');
        $ntDistricts = DB::select('SELECT * FROM district WHERE region = "NT"');
        $otherDistricts = DB::select('SELECT * FROM district WHERE region = "OTHER"');

        $categoriesTable = DB::select('SELECT C.category_id,S.subject_id,C.name_chin as category_chin ,S.name_chin as subject_chin FROM  `category` AS C INNER JOIN subject AS S ON C.category_id = S.category_id');
        
        return view('createCase' ,
            [
                'categoriesTable' => $categoriesTable,
                'categories' => $categories,
                'hkDistricts' => $hkDistricts,
                'knDistricts' => $knDistricts,
                'ntDistricts' => $ntDistricts,
                'otherDistricts' =>$otherDistricts
            ]);
    }
    
    public function store_case(Request $request){
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
                        
                $id = DB::table('case')->insertGetId(
                    array(
                        'student_Sex' => $request->input('studentGender'),
                        'student_Age' => $request->input('studentAge'),
                        'mode' => $request->input('classType'),
                        'classMemberNo' => $request->input('classMemberNo'),
                        'start_date'=>$request->input('start_date'),
                        'start_time' =>  $available_time,
                        'length' => $request->input('classDuration'),
                        'available_day' => $available_day,
                        'lesson_per_week' => $request->input('frequency'),
                        'fee' => $request->input('fee'),
                        'sex' => $request->input('coachSex'),
                        'special_requirement' => $request->input('special_requirement'),
                        'student_id' => $request->input('account_id'),
                        'subject_id' => $subjectID,
                        'district_id' => $request->input('district'),
                        'venue'=>$request->input('venue'),
                        'refAddress'=>$request->input('refAddress'),
                    )
                );
                
                DB::commit();
                return response()->json(['success=>true']);
            } catch (\Exception $e){
                DB::rollback();
                return  response()->json(['success'=>false, 'errors'=>$e->getMessage()],422);
            }
        }
    }
}