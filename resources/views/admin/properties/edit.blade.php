@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="title">Edit Property Type</h1>
             
            <div class="panel panel-default">
                <div class="panel-body">
                    {!! Form::model($type, ['route' => ['types.update', $type->id], 'class' => 'form-horizontal', 'method' => 'PATCH']) !!}
                        @include('admin.types.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
