@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="title">Edit Area</h3>

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
