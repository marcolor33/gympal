<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Redirect;
use Validator;

class EmailController extends Controller
{
    
    
    public function verify_account(Request $request){
    
        
          $account = DB::table('account')->where('account_id', '=', $request->input('account_id'))->where('activation_key', '=', $request->input('activation_key'))->first();
        
        
        
        if ($account)
        {
        
            return view('verify_account',['account'=>$account]);
            
        }
        
        else
        {
            return redirect()->route('getLogin');
            
        }
        
    }
    
    public function verify_account_post($account_id)
    {
        
        $account = DB::table('account')->where('account.account_id', '=', $account_id)->first();
        
        if ($account)
        {
            
            $dumb = DB::table('account')->where('account.account_id','=',$account_id)->update(['activated'=>1]);
            return response()->json(['success'=>true]);
        }
        
        
        else
        {
            return response()->json(['success'=>false]);
        }
        
        
    }
    
        
//    public function verify_account(Request $request){
//        
//        $account = DB::table('account')->where('account.id', '=', $request->input('account_id'))->where('account.activation_key', '=', $request->input('activation_key'))->first();
//        
//        if ($account)
//        {
//            $dumb = DB::table('account')->where('account.account_id','=',$account->account_id)->update(['activated'=>1]);
//            
//            return redirect()->route('getLogin')
//        }
//        
//        else{
//            
//            return redirect()->route('getLogin');
//            
//        }
//        
//        
//        
//    }
    
    
    public function forget_password_email(Request $request){
        
        $account = DB::table('account')->where('account.email', '=', $request->input('email'))->first();
    
        if ($account)
        {
            
            $url = route('reset_password')."?account_id=".$account->account_id."&old_password=".$account->password;
            
            Mail::send(['html'=>'emails.forget_password_email'],['account'=>$account,'url'=>$url], function($message) use ($account){
                
       
            $message->to($account->email,$account->username)->subject('Gympal會員密碼重設');
        
                
        });
            
            return response()->json(['success'=>true]);
            
        }
        
        else
        {
            
            return response()->json(['success'=>false]);
        }
        
        
        
    }
    
    public function forget_password(){

    
        return view('forget_password');
    }
        
       
    
    public function reset_password(Request $request){
        
        
        $account_id = $request->input('account_id');
        $old_password = $request->input('old_password');
    
        $account = DB::table('account')->where('account.account_id', '=', $account_id)->where('account.password', '=', $old_password)->first();
    
        if ($account)
        {
            
            
            return view('reset_password',['account'=>$account]);
            
        }
        
        else
        {
            
            return redirect()->route('getLogin');
        }
    }  
    
                                           
}