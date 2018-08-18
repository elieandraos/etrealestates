@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="title">{!! $property->title !!}</h1>
			<h2 class="subtitle">
				{!! $property->area->name !!}, {!! $property->city !!}
				@if($property->has_map_credentials)
					<a href="https://www.google.com/maps/?q={!! $property->lat!!},{!! $property->lng!!}" target="_blank">
						<i class="fa fa-map-marker" style="color: #e8453c" data-toggle="tooltip" data-placement="top" title="View location on map"></i>
					</a>
				@endif
			</h2>
		</div>
	</div>

	<div class="row property-show-container">
		<div class="col-md-8">
			<img class="feature-image-full" src="{!! $property->featured_image_url !!}" />
		</div>
		<div class="col-md-4 property-details">
			<p class="description">{!! $property->description !!} </p>
			<div class="inquiry">
				<input type="button" class="btn btn-primary" value="Inquire about this property" />
			</div>
			<property-feature :text="'Square meter <sup>2</sup>'" :fa-icon="'fa-object-group'" :value="'{!! $property->sq_ft !!}'"></property-feature>
			<property-feature :text="'Number of bedrooms'" :fa-icon="'fa-bed'" :value="'{!! $property->nb_bedrooms !!}'"></property-feature>
			<property-feature :text="'Number of bathrooms'" :fa-icon="'fa-bathtub'" :value="'{!! $property->nb_bathrooms !!}'"></property-feature>
			<property-feature :text="'Number of parkings'" :fa-icon="'fa-car'" :value="'{!! $property->nb_parkings !!}'"></property-feature>
		</div>
	</div>
</div>	

@endsection