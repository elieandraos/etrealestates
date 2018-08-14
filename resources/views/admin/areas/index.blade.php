@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class='col-md-2'>
            @include('admin.sidebar')
        </div>
        <div class="col-md-10">
            <h1 class="title">
                List of areas
                <a class="btn btn-primary header-button" href="{!! route('areas.create') !!}">Add new area</a>
            </h1>

            <div class="panel panel-default">
                <div class="panel-body">
                    @include('flash::message')

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Nb. Properties</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($areas as $area)
                                <tr>
                                    <td>{!! $area->name !!}</td>
                                    <td>{!! $area->properties->count() !!}</td>
                                    <td class="row-actions">
                                        @include('admin.areas._actions')
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>  
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection