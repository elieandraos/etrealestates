<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;
use App\Mail\PropertyInquired;
use Illuminate\Support\Facades\Mail;

class InquiryController extends Controller
{
	/**
	 * Store an inquiry
	 * 
	 * @param Request $request 
	 * @return type
	 */
    public function store(Request $request)
    {
    	Inquiry::create($request->all());
    	Mail::to('rgreconsultancy@gmail.com')->send(new PropertyInquired($request));
    	return response()->json(['success' => true]);
    }
}
