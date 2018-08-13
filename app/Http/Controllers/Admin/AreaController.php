<?php

namespace App\Http\Controllers\Admin;

use App\Models\Area;
use Illuminate\Http\Request;
use App\Http\Requests\AreaRequest;
use App\Http\Controllers\Controller;

class AreaController extends Controller
{
    public function index() 
    {
    	$areas = Area::orderBy('name', 'ASC')->get();
    	return view('admin.areas.index', ['areas' => $areas]);
    }

    public function create() 
    {
    	return view('admin.areas.create');
    }

    public function store(AreaRequest $request) 
    {
    	Area::create($request->all());
    	flash('Area was added successfully.')->success();
        return redirect(route('areas.index'));
	}

	public function edit($areaId)
	{
		$area = Area::findOrFail($areaId);
        return view('admin.areas.edit', [ 'area' => $area ]);
	}

	public function update(AreaRequest $request, $areaId)
	{
		$area = Area::findOrFail($areaId);
		$area->update($request->all());
		flash('Area was updated successfully.')->success();
        return redirect(route('areas.index'));
	}

	public function destroy($areaId)
	{
        $area = Area::findOrFail($areaId);
        $area->delete();
	}
}
