<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Requests\TypeRequest;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    public function index() 
    {
    	$types = Type::orderBy('name', 'ASC')->get();
    	return view('admin.types.index', ['types' => $types]);
    }

    public function create() 
    {
    	return view('admin.types.create');
    }

    public function store(TypeRequest $request) 
    {
    	Type::create($request->all());
    	flash('Property type was added successfully.')->success();
        return redirect(route('types.index'));
	}

	public function edit($typeId)
	{
		$type = Type::findOrFail($typeId);
        return view('admin.types.edit', [ 'type' => $type ]);
	}

	public function update(TypeRequest $request, $typeId)
	{
		$type = Type::findOrFail($typeId);
		$type->update($request->all());
		flash('Property type was updated successfully.')->success();
        return redirect(route('types.index'));
	}

	public function destroy($typeId)
	{
        $type = Type::findOrFail($typeId);
        $type->delete();
	}
}
