@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="title">Edit Area</h1>
             <h2 class="subtitle">Update in your area details</h2>

            <div class="panel panel-default">
                <div class="panel-body">
                    {!! Form::model($area, ['route' => ['areas.update', $area->id], 'class' => 'form-horizontal', 'method' => 'PATCH']) !!}
                        @include('admin.areas.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
