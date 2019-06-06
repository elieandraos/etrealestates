@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="title">Property Gallery</h1>
            <p>Upload one or multiple images for the property <b>{!! $property->title !!}</b></p>

            <div class="panel panel-default">
                <div class="panel-body">
                    <uploader 
                        url="{!! route('properties.upload', $property->id) !!}"
                        :media="{{ $loadedFiles }}"
                    ></uploader>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection