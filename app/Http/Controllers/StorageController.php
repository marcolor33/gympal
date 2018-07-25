<?php

namespace App\Http\Controllers;
use App\Classes\ImageManipulator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Validator;
use Redirect;
use File;

class StorageController extends Controller
{
    
    
    
    public function view_image(Request $request){
        
        $path = $_GET['path'];
        
        return \Response::download($path);
        
        
        
    }
    
    
    
    
}


