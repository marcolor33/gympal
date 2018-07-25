<?php

namespace App\Http\Controllers;

use Session;
use redirect;
use App\Account;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class LoginController extends Controller{
    
    
//     private $request;

//    public function __construct(Request $request)
//    {
//        $this->request = $request;
//    }

    public function getLogin(){
        return view('login');
    }
    public function login(Request $request){
        session_start();
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        
        
        
//                return  response()->json(['success'=>false, 'errors'=>$e->getMessage()],422);
        
        
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password'], 'account_type'=>'student','activated'=>1])){
            //$request->session()->reflash();
            //echo 'Check Value: '.Auth::check()."<br>";
            //return redirect()->intended('error');
           
            if (Auth::user() != "") {
                //Auth::id();
//                echo Auth::id() . '<br>' . Auth::user() . '<br>';
//                echo Auth::check();
//                echo Auth::login(Auth::user());
                $_SESSION['user'] = Auth::user();
                
                return response()->json(['success'=>true]);
                
                return redirect()->route('home'); 
                
            }
        }
        else if (Auth::attempt(['email' => $request['email'], 'password' => $request['password'], 'account_type'=>'coach','activated'=>1])) {
            // echo 'success';
            if (Auth::user() != "") {
                //Auth::id();
//                echo Auth::id() . '<br>' . Auth::user() . '<br>';
//                echo Auth::check();
//                echo Auth::login(Auth::user());
                $_SESSION['user'] = Auth::user();
                return response()->json(['success'=>true]);
                //return redirect()->route('home');
            }
            
        }
            
        else if (Auth::attempt(['email' => $request['email'], 'password' => $request['password'], 'account_type'=>'admin','activated'=>1])) {
            if (Auth::user() != "") {
                //Auth::id();
//                echo Auth::id() . '<br>' . Auth::user() . '<br>';
//                echo Auth::check();
//                echo Auth::login(Auth::user());
                $_SESSION['user'] = Auth::user();
                return response()->json(['success'=>true]);
                //return redirect()->route('home');
            }
        }
            
        else
        {
            
            
            //return redirect()->route('getLogin');
            return response()->json(['success'=>false]);
        }
            

//        Auth::logout();
//        echo '<br> Logout!';
    }
    

    public function getCheckUser()
    {

    }
    
    
    public function logout()
    {
        
        session_start();
        $_SESSION['user'] = "";
        session_unset();
        session_destroy();
        
        return redirect()->route('getLogin');
        
    }
}