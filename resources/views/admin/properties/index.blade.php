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
                @if($properties->count())
                    <a class="btn btn-primary header-button" href="{!! route('properties.create') !!}">Add new property</a>
                @endif
            </h1>

            <div class="panel panel-default">
                <div class="panel-body">
                    @if(!$properties->count())
                        <center class='no-listing'>
                            <p>You did not add any property yet.<p>
                            <a class="btn btn-primary" href="{!! route('properties.create') !!}">Add new property</a>
                        </center>
                    @else
                        @include('flash::message')
                        @include('admin.properties.filter')

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Reference</th>
                                    <th>Title</th>
                                    <th>Square m<sup>2</sup></th>
                                    <th>Amount</th>
                                    <th>Type</th>
                                    <th>Area</th>
                                    <th>Listed On</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($properties as $property)
                                    <tr>
                                        <td>{!! $property->reference !!}</td>
                                        <td>{!! $property->title !!}</td>
                                        <td>{!! $property->sq_ft !!}</td>
                                        <td>{!! $property->amount_display !!}</td>
                                        <td>{!! $property->type->name !!}</td>
                                        <td>{!! $property->area->name !!}</td>
                                        <td>{!! $property->listed_at !!}</td>
                                        <td class="row-actions">
                                            @include('admin.properties._actions')
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>  
                        </table>

                        {{ $properties->appends(request()->except(['page','_token']))->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection