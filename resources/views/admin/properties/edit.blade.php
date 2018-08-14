@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="title">Edit Property</h1>
             
            <div class="panel panel-default">
                <div class="panel-body">
                    {!! Form::model($property, ['route' => ['properties.update', $property->id], 'class' => 'form-horizontal', 'method' => 'PATCH', 'enctype' => "multipart/form-data"]) !!}
                        @include('admin.properties.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
