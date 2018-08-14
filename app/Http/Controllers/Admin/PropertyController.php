<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Area;
use App\Models\Type;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;

class PropertyController extends Controller
{
    public function index() 
    {
    	$properties = Property::with('area', 'type')->orderBy('created_at', 'DESC')->paginate(20);
    	return view('admin.properties.index', ['properties' => $properties]);
    }

    public function create() 
    {
        $types = Type::orderBy('name', 'ASC')->pluck('name', 'id');
        $areas = Area::orderBy('name', 'ASC')->pluck('name', 'id');
    	return view('admin.properties.create', ['types' => $types, 'areas' => $areas]);
    }

    public function store(PropertyRequest $request) 
    {
        $input = $request->all();
        $input['listed_by'] = Auth::user()->id;
    	Property::create($input);
    	flash('Property was added successfully.')->success();
        return redirect(route('properties.index'));
	}

	public function edit($propertyId)
	{
		$property = Property::findOrFail($propertyId);
        $types = Type::orderBy('name', 'ASC')->pluck('name', 'id');
        $areas = Area::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('admin.properties.edit', ['types' => $types, 'areas' => $areas, 'property' => $property]);
	}

	public function update(PropertyRequest $request, $propertyId)
	{
		$property = Property::findOrFail($propertyId);
		$property->update($request->all());
		flash('Property was updated successfully.')->success();
        return redirect(route('properties.index'));
	}

	public function destroy($propertyId)
	{
        $property = Property::findOrFail($propertyId);
        $property->delete();
	}
}
