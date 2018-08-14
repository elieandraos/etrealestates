<?php

namespace App\Http\Controllers\Admin;

use App\Models\Area;
use App\Models\Type;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertyController extends Controller
{
    public function index() 
    {
    	$properties = Property::orderBy('created_at', 'DESC')->paginate();
    	return view('admin.properties.index', ['properties' => $properties]);
    }

    public function create() 
    {
        $types = Type::orderBy('name', 'ASC')->pluck('name', 'id');
        $areas = Area::orderBy('name', 'ASC')->pluck('name', 'id');
    	return view('admin.properties.create', ['types' => $types, 'areas' => $areas]);
    }

    public function store(Request $request) 
    {
    	Property::create($request->all());
    	flash('Property was added successfully.')->success();
        return redirect(route('properties.index'));
	}

	public function edit($typeId)
	{
		$type = Type::findOrFail($typeId);
        return view('admin.types.edit', [ 'type' => $type ]);
	}

	public function update(TypeRequest $request, $typeId)
	{
		// $type = Type::findOrFail($typeId);
		// $type->update($request->all());
		// flash('Property type was updated successfully.')->success();
  //       return redirect(route('types.index'));
	}

	public function destroy($typeId)
	{
        // $type = Type::findOrFail($typeId);
        // $type->delete();
	}
}
