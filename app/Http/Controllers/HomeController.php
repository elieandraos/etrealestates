<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Type;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Andraos\Filters\PropertyFilter;
use App\Http\Resources\PropertyResource;

class HomeController extends Controller
{
    /**
     * Show the homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::orderBy('name', 'ASC')->pluck('name', 'id');
        $areas = Area::orderBy('name', 'ASC')->pluck('name', 'id');
 
        return view('front.home.index', [
                'types' => $types, 
                'areas' => $areas 
        ]);
    }

    /**
     * Filter properties
     * 
     * @param Request $request 
     * @return type
     */
    public function fetch(Request $request)
    {
        $data = Property::with('area', 'type')
                            ->filter(new PropertyFilter( [
                                'area' => $request->get('area'),
                                'type' => $request->get('type'),
                                'minAmount' => $request->get('minAmount'),
                                'maxAmount'  => $request->get('maxAmount'),
                            ]))
                            ->orderBy('created_at', 'DESC')->paginate(6);

        return PropertyResource::collection($data);
    }
}
