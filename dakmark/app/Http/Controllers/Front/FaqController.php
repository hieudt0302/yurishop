<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FaqTranslation;
use App\Models\Language;

class FaqController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$language_id = 2; //make english as default alternative
    	$locale = \App::getLocale(); 
    	$language = Language::where('name',$locale)->first();
    	if ($language != null){
    		$language_id = $language->id; //make english as default alternative
    	}
        $faqs = FaqTranslation::where('language_id',$language_id)->orderBy('faq_id', 'desc')->get();
        return view('front.faqs.index',compact('faqs'));
    }    
}
