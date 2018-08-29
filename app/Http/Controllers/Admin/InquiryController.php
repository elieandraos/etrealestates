<?php

namespace App\Http\Controllers\Admin;

use App\Models\Inquiry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InquiryController extends Controller
{
    public function index() 
    {
    	$inquiries = Inquiry::orderBy('created_at', 'DESC')->get();
    	return view('admin.inquiries.index', ['inquiries' => $inquiries]);
    }

    public function show($id)
    {
    	$inquiry = Inquiry::findOrFail($id);
    	
    	if($inquiry->status == 'new')
    		$inquiry->update(['status' => 'read']);

    	return view('admin.inquiries.show', ['inquiry' => $inquiry]);
    }
}
