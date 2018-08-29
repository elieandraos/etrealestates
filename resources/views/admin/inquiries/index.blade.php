@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class='col-md-2'>
            @include('admin.sidebar')
        </div>
        <div class="col-md-10">
            <h1 class="title">
                List of inquiries
            </h1>

            <div class="panel panel-default">
                <div class="panel-body">
                    @include('flash::message')

                    <table class="table table-hover">
                        <thead>
                            <tr>
                            	<th></th>
                                <th>Name</th>
                                <th>Reference</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inquiries as $inquiry)
                                <tr @if($inquiry->status == 'new') style="background-color: #faf2cc" @endif>
                                	<td>
                                		<a 
                                            href="{!! route('inquiries.show', $inquiry->id) !!}" 
                                            data-toggle="tooltip" 
                                            data-placement="top" title="View Inquiry Details"
                                        >
	                                		@if($inquiry->status == 'new')
	                                			<i class="fa fa-envelope" style="color: #4b6372"></i>
	                                		@else
	                                			<i class="fa fa-envelope-open-o" style="color: #4b6372"></i>
	                                		@endif
	                                	</a>
                                	</td>
                                    <td>{!! $inquiry->name !!}</td>
                                    <td>
                                        <a 
                                            href="{!! route('home.show', $inquiry->reference) !!}" 
                                            target="_blank"
                                            data-toggle="tooltip" 
                                            data-placement="top" title="View Property"
                                        >
                                            {!! $inquiry->reference !!}
                                        </a>
                                    </td>
                                    <td>{!! $inquiry->inquired_at !!}</td>
                                </tr>
                            @endforeach
                        </tbody>  
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection