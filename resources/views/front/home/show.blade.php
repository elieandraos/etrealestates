@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="title">{!! $property->title !!}</h1>
			<h2 class="subtitle">
				{!! $property->city !!}, {!! $property->area->name !!}
				@if($property->has_map_credentials)
					<a href="https://www.google.com/maps/?q={!! $property->lat!!},{!! $property->lng!!}" target="_blank">
						<i class="fa fa-map-marker" style="color: #e8453c" data-toggle="tooltip" data-placement="top" title="View location on map"></i>
					</a>
				@endif
			</h2>
		</div>
	</div>

	<div class="row property-show-container">
		<div class="col-md-8 property-full-image">
			<img class="feature-image-full" src="{!! $property->featured_image_url !!}" />
			<span class="listed-for">For {!! $property->listed_for !!}</span>
			<span class="price">{!! $property->amount !!} $</span>
			@if($property->is_featured) <span class="featured">Featured</span> @endif
		</div>
		<div class="col-md-4 property-details">
			<p class="description">{!! $property->description !!} </p>
			<div class="inquiry">
				<button 
					@click="$modal.show('inquire-property', { reference: '{!! $property->reference!!}' })" 
					class="btn btn-primary"
				>
					Inquire about this property
				</button>
			</div>
			<property-feature :text="'Square meter <sup>2</sup>'" :fa-icon="'fa-object-group'" :value="'{!! $property->sq_ft !!}'"></property-feature>
			<property-feature :text="'Number of bedrooms'" :fa-icon="'fa-bed'" :value="'{!! $property->nb_bedrooms !!}'"></property-feature>
			<property-feature :text="'Number of bathrooms'" :fa-icon="'fa-bathtub'" :value="'{!! $property->nb_bathrooms !!}'"></property-feature>
			<property-feature :text="'Number of parkings'" :fa-icon="'fa-car'" :value="'{!! $property->nb_parkings !!}'"></property-feature>
		</div>
	</div>

	<gallery :images="{{ $mediaUrls }}"></gallery>
	
	@if($relatedProperties->count())
		<div class="row" style="clear:both">
			<div class="col-md-12 section-header">
				<h3 class="section-title">Related properties</h3>
			</div>
			@foreach($relatedProperties as $relatedProperty)
				<div class="col-md-4">
					<property-card :content="'{{ json_encode($relatedProperty) }}'" :parse=true></property-card>
				</div>
			@endforeach
		</div>
	@endif
</div>	

@endsection