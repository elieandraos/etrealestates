<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Type;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Resources\PropertyResource;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::orderBy('name', 'ASC')->pluck('name', 'id');
        $areas = Area::orderBy('name', 'ASC')->pluck('name', 'id');

        $data = Property::with('area', 'type')->orderBy('created_at', 'DESC')->paginate(6);
        $properties = PropertyResource::collection($data);
        
        return view('front.home.index', ['properties' => $properties, 'types' => $types, 'areas' => $areas ]);
    }
}
