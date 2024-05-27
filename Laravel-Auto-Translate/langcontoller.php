<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class langcontoller extends Controller
{
 
  


    public function setLanguage(Request $request)
    {
        // استخراج اللغة المحددة من الطلب
        $lang = $request->input('lang');
        
        // تعيين اللغة المحددة في السيشن
        Session::put('lang', $lang);

        return response()->json(['success' => true]);
    }

}



