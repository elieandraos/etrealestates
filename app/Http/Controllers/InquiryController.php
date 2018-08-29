<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;

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
    	return response()->json(['success' => true]);
    }
}
