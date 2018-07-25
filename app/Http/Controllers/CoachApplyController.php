<?php

namespace App\Http\Controllers;
use App\Classes\ImageManipulator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Validator;
use Redirect;

class CoachApplyController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function prepareForm()
    {   
        try{
            $categories = DB::select('SELECT * FROM category');
            $hkDistricts = DB::select('SELECT * FROM district WHERE region = "HK"');
            $knDistricts = DB::select('SELECT * FROM district WHERE region = "KN"');
            $ntDistricts = DB::select('SELECT * FROM district WHERE region = "NT"');
            $otherDistricts = DB::select('SELECT * FROM district WHERE region = "OTHER"');
            $categoriesTable = DB::select('SELECT C.category_id,S.subject_id,C.name_chin as category_chin ,S.name_chin as subject_chin FROM  `category` AS C INNER JOIN subject AS S ON C.category_id = S.category_id');

            return view('coachApply' ,
                [
                    'categoriesTable' => $categoriesTable,
                    'categories' => $categories,
                    'hkDistricts' => $hkDistricts,
                    'knDistricts' => $knDistricts,
                    'ntDistricts' => $ntDistricts,
                    'otherDistricts' =>$otherDistricts
                ]);
        }
        catch (\Exception $e) { // something went wrong
            return Redirect::to("/error")->withErrors("Database Operation Error");
        }
    }
    
    public function store(Request $request){
        
        $rules = array(
            'username' => 'required|max:24',
            'loginPassword' => 'required|regex:/^(?=.*[A-Za-z])(?=.*?[0-9]).{8,16}$/',
            'loginEmail' => 'required|email|unique:account,email',
            'chinName' => 'required_without_all:engName|regex:/[p{L}]*$/|max:8',
            'engName' => 'required_without_all:chinName|regex:/[a-zA-Z ]*$/|max:24',
            'HKID' => 'required|regex:/^([A-Z]{1})([0-9]{6})([A0-9])$/',
            'teleno' => 'required|regex:/^(?=.*?[0-9]).{8,}$/',
            'address' => 'required',
            'district' => 'required|regex:/[0-9]*$/',
            'gender' => 'required|regex:/[a-zA-Z]*$/',
            'birthday' => 'required|date',
            'groupClass' => 'required|regex:/[a-zA-Z ]*$/',
            // 'classroomAddress' => 'regex:/[a-zA-Z0-9\p{L}_ -,\/]*$/',
            'coachIntroduction' => 'required',
            'minHourlyWage' => 'required|regex:/[0-9]*$/',
            'idealHourlyWage' => 'required|regex:/[0-9]*$/',
            // 'coachFacebook'=>'regex:/[a-zA-Z0-9\p{L}_ -,.:\/]*$/',
            // 'coachInstagram'=>'regex:/[a-zA-Z0-9]*$/',
            // 'extendCategory'=>'regex:/[a-zA-Z0-9\p{L}_ -,\/]*$/',
            'coachCV.*'=>'mimes:doc,pdf,docx',
            'coachPhotos'=>'mimes:jpeg,png,jpg,gif,jpe',

          );
//        //Can set image max by using 'max:1024'
//        
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
        // redirect our user back to the form with the errors from the validator
            return response()->json(['success'=>false, 'errors'=>$validator->errors()],423);

        } 
        else {
            DB::beginTransaction();
            try {
                
                
                $activation_key = bcrypt($request->input('loginEmail'));
                $account_id=DB::table('account')->insertGetId(
                    array(
                        'account_type'=>'coach',
                        'username'=>$request->input('username'),
                        'password'=>bcrypt($request->input('loginPassword')),
                        'email'=>$request->input('loginEmail'),
                        'activated'=>0,
                        'activation_key'=>$activation_key
                    )
                );
                DB::table('account')->where('account.account_id','=',$account_id)->update(
                    array(
                        'account_code'=>'C'.str_pad($account_id,7,"0",STR_PAD_LEFT),
                        )
                );
                
             //Image Upload
                $path ='';
                $profile_pic_path = '';
                $ImageUploaded = false;
                if($request->hasFile('coachPhotos')){
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

                    // $tempImg = imagecreatefromjpeg($file);
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
                
                
                //Files (CV) Upload
                
                
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
                DB::table('coach')->insert(
                    array(
                          'chin_name'=>$request->input('chinName'),
                          'eng_name'=>$request->input('engName'),
                          'idcard_no'=>$request->input('HKID'),
                          'teleno'=>$request->input('teleno'),
                          'address'=> $request->input('address') , 
                          'district_id' => $request->input('district') ,
                          'sex'=>$request->input('gender'),
                          'birth_year'=>$request->input('birthday'),
                          'offer_venue'=>$request->input('classroomAddress'),
                          'offer_group'=>$request->input('groupClass'),
                          'facebook'=>$request->input('coachFacebook'),
                          'instagram'=>$request->input('coachInstagram'),
                          'self_intro'=>$request->input('coachIntroduction'),
                          'year_of_teaching'=>$request->input('experienceSelection'),
                          'profession'=>$request->input('occupationSelection'),
                          'min_pay'=>$request->input('minHourlyWage'),
                          'well_pay'=>$request->input('idealHourlyWage'),
//                          'profile_pic'=>$path,
                        'profile_pic'=>$profile_pic_path,
                          'account_id'=>$account_id
                         )
                );

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

                if(!empty($request->input('area'))){
                    foreach($_POST['area'] as $area){
                        DB::table('coachAvailableDistrict')->insert(
                            array('coach_id'=> $account_id,'district_id'=>$area
                                 )
                            );
                        }
                }

                $timeArray = array();
                $timeArray['coach_id']= $account_id;
                if(!empty($request->input('teachingTime'))){
                    foreach($_POST['teachingTime'] as $teachingTime){
                        $timeArray[$teachingTime]=1;              
                        }
                }
                DB::table('coachAvailableTime')->insert(
                    $timeArray
                    );
                
                DB::commit();
                
                
                $account = DB::table('account')->where('account.account_id','=',$account_id)->first();
            
                
                $url = route('verify_account')."?account_id=".$account_id."&activation_key=".$activation_key;
            
                Mail::send('emails.verify_account_email',['account'=>$account,'url'=>$url], function($message) use ($account){
                
       
                    $message->to($account->email,$account->username)->subject('Gympal會員電郵確認');
        
                
                });
                                
                
            }catch (\Exception $e) { // something went wrong
                DB::rollback();
                return  response()->json(['success'=>false, 'errors'=>$e->getMessage()],422);
//                return  response()->json(['success'=>false, 'errors'=>"Database Operation Error"],422);
            }
        }
        
        return response()->json(['success=>true']);
    }
}