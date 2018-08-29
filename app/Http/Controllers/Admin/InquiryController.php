<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InquiryController extends Controller
{
    public function index() 
    {
    	// $areas = Area::orderBy('name', 'ASC')->get();
    	// return view('admin.areas.index', ['areas' => $areas]);
    }

    public function show($id)
    {

    }
}
