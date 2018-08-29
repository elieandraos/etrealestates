@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="title">Inquiry Details</h1>
             
            <div class="panel panel-default">
                <div class="panel-body">
                    <strong>Property Reference: {!! $inquiry->reference!!}</strong>
                    <p>{!! $inquiry->message !!}</p>
                    <hr/>
                    <p>
                        <i class="fa fa-user-o" style="width:20px;"></i> {!! $inquiry->name !!}<br/>
                        <i class="fa fa-envelope-o" style="width:20px;"></i> {!! $inquiry->email !!}<br/>
                        <i class="fa fa-phone" style="width:20px;"></i> {!! $inquiry->phone !!}
                    </p>
                    <a class="btn btn-secondary" href="{!! route('inquiries.index') !!}">
                        Back To Inquiries
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
