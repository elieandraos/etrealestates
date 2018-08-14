@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="title">Add Property Type</h1>
            <h2 class="subtitle">Fill in your type details</h2>

            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('types.store') }}">
                        {{ csrf_field() }}
                        @include('admin.types.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection