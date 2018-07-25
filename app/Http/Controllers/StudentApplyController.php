<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Redirect;
use Validator;

class StudentApplyController extends Controller
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

            return view('studentApply' ,
                [
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
        else {
            DB::beginTransaction();
            try{
                
                $activation_key = bcrypt($request->input('loginEmail'));
               $account_id = DB::table('account')->insertGetId(
                    array(
                        'account_type'=>'student',
                        'username'=>$request->input('username'),
                        'password'=>bcrypt($request->input('loginPassword')),
                        'email'=>$request->input('loginEmail'),
                        'activated'=>0,
                        'activation_key'=> $activation_key,
                        )
                );
                DB::table('account')->where('account.account_id','=',$account_id)->update(
                    array(
                        'account_code'=>'S'.str_pad($account_id,7,"0",STR_PAD_LEFT),
                        )
                );
                DB::table('student')->insert(
                    array(
                          'chin_name'=>$request->input('chinName'),
                          'eng_name'=>$request->input('engName'),
                          'idcard_no'=>$request->input('HKID'),
                          'address'=> $request->input('address') , 
                          'sex'=>$request->input('gender'),
                          'birth_year'=>$request->input('birthday'),
                          'district_id'=>$request->input('district'),
                          'teleno'=>$request->input('teleno'),
                          'account_id'=>$account_id,
                          'howToKnowGympal'=>$request->input('howToKnowGympal')
                         )
                );
                DB::commit();
                
                
                $account = DB::table('account')->where('account.account_id','=',$account_id)->first();
            
                
                $url = route('verify_account')."?account_id=".$account_id."&activation_key=".$activation_key;
            
                Mail::send('emails.verify_account_email',['account'=>$account,'url'=>$url], function($message) use ($account){
                
       
                    $message->to($account->email,$account->username)->subject('Gympal會員電郵確認');
        
                
                });
                
                
                return response()->json(['success=>true']);
            }
            catch(\Exception $e){
                DB::rollback();
                return  response()->json(['success'=>false, 'errors'=>$e->getMessage()],422);
            }
        }
    }
}