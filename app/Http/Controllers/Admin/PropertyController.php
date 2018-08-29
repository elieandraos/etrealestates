<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Area;
use App\Models\Type;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use Illuminate\Support\Facades\Storage;

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
        $featuredOptions = [ 0 => 'Not Featured', 1 => 'Is Featured' ];
        $publishedOptions = [ 0 => 'Not Published', 1 => 'Is Published' ];
        
        return view('admin.properties.create', [
                    'types' => $types, 
                    'areas' => $areas, 
                    'featuredOptions' => $featuredOptions,
                    'publishedOptions' => $publishedOptions,
        ]);
    }

    public function store(PropertyRequest $request) 
    {
        $input = $request->all();
        $input['listed_by'] = Auth::user()->id;
    	$property = Property::create($input);
        
        if($request->has('featured_image'))
            $property->addMediaFromRequest('featured_image')->toMediaCollection('featured');
    	
        flash('Property was added successfully.')->success();
        return redirect(route('properties.index'));
	}

	public function edit($propertyId)
	{
		$property = Property::findOrFail($propertyId);
        $types = Type::orderBy('name', 'ASC')->pluck('name', 'id');
        $areas = Area::orderBy('name', 'ASC')->pluck('name', 'id');
        $featuredOptions = [ 0 => 'Not Featured', 1 => 'Is Featured' ];
        $publishedOptions = [ 0 => 'Not Published', 1 => 'Is Published' ];

        return view('admin.properties.edit', [
                    'types' => $types, 
                    'areas' => $areas, 
                    'property' => $property, 
                    'featuredOptions' => $featuredOptions,
                    'publishedOptions' => $publishedOptions,
        ]);
	}

	public function update(PropertyRequest $request, $propertyId)
	{
		$property = Property::findOrFail($propertyId);
		$property->update($request->all());

        if($request->has('remove_exitsing_db_image'))
            $property->clearMediaCollection('featured');

        if($request->has('featured_image'))
            $property->addMediaFromRequest('featured_image')->toMediaCollection('featured');

		flash('Property was updated successfully.')->success();
        return redirect(route('properties.index'));
	}

	public function destroy($propertyId)
	{
        $property = Property::findOrFail($propertyId);
        $property->delete();
	}
}
