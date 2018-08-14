@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="title">Add Property</h1>
            
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('properties.store') }}">
                        {{ csrf_field() }}
                        @include('admin.properties.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection