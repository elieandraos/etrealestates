@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($properties as $property)
	        <div class="col-md-4">
	            <property-card :content="'{{ json_encode($property) }}'"></property-card>
	        </div>
        @endforeach
    </div>
</div>
@endsection