@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class='col-md-2'>
            @include('admin.sidebar')
        </div>
        <div class="col-md-10">
            <h1 class="title">
                List of properties
                <a class="btn btn-primary header-button" href="{!! route('properties.create') !!}">Add new property</a>
            </h1>

            <div class="panel panel-default">
                <div class="panel-body">
                    @if(!$properties->count())
                        You did not add any property yet.
                    @else
                        @include('flash::message')
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($properties as $property)
                                    <tr>
                                        <td>{!! $property->name !!}</td>
                                        <td class="row-actions">
                                            @include('admin.properties._actions')
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>  
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection