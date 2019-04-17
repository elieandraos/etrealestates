@extends('layouts.app')

@section('content')
<div class="container-fluid" id="homepage-filter-container">
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="banner-title">What are you looking for?</h1>
					<properties-filter
						:areas="'{{ json_encode($areas) }}'"
						:types="'{{ json_encode($types) }}'"
						:price-ranges="'{{ json_encode($price_ranges) }}'"
						:listings="'{{ json_encode($listings) }}'"
						:csrf="'{{ csrf_token() }}'"
					>
					</properties-filter>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<properties></properties>
</div>
@endsection