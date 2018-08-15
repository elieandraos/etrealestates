<div class="row">
    <div class="col-md-12">
        <div class="form-heading mt0">General Info</div>  
    </div>
</div>

<div class="row">
    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }} col-md-3">
        <label for="title" class="control-label">Title *</label>
        <div>
            {!! Form::text('title', old('title'), [ 'class' => 'form-control', 'id' => 'title', 'autocomplete' => 'off'] ) !!}
            @if ($errors->has('title'))
                <span class="help-block">{{ $errors->first('title') }}</span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('sq_ft') ? ' has-error' : '' }} col-md-3">
        <label for="amount" class="control-label">Square Meters *</label>
        <div class="input-group">
             <span class="input-group-addon">m<sup>2</sup></span>
            {!! Form::text('sq_ft', old('sq_ft'), [ 'class' => 'form-control', 'id' => 'sq_ft', 'autocomplete' => 'off'] ) !!}
        </div>
        @if ($errors->has('sq_ft'))
            <span class="help-block">{{ $errors->first('sq_ft') }}</span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }} col-md-3">
        <label for="amount" class="control-label">Amount *</label>
        <div class="input-group">
             <span class="input-group-addon">USD</span>
            {!! Form::text('amount', old('amount'), [ 'class' => 'form-control', 'id' => 'amount', 'autocomplete' => 'off'] ) !!}
        </div>
        @if ($errors->has('amount'))
            <span class="help-block">{{ $errors->first('amount') }}</span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('listed_for') ? ' has-error' : '' }} col-md-3">
        <label for="listed_for" class="control-label">Listed for *</label>
        <div>
            {!! Form::select(
                'listed_for', 
                ['sale' => 'Sale', 'rent' => 'Rent'], 
                null , 
                ['class' => 'selectpicker full-width', 'id' => 'listed_for']
            ) !!}
            @if ($errors->has('listed_for'))
                <span class="help-block">{{ $errors->first('listed_for') }}</span>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-heading">Location Details</div>  
    </div>
</div>

<div class="row">
    <div class="form-group{{ $errors->has('area_id') ? ' has-error' : '' }} col-md-4">
        <label for="area_id" class="control-label">Area *</label>
        <div>
            {!! Form::select(
                'area_id', 
                $areas, 
                null , 
                ['class' => 'selectpicker full-width', 'id' => 'area_id']
            ) !!}
            @if ($errors->has('area_id'))
                <span class="help-block">{{ $errors->first('area_id') }}</span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }} col-md-4">
        <label for="city" class="control-label">City *</label>
        <div>
            {!! Form::text('city', old('city'), [ 'class' => 'form-control', 'id' => 'city', 'autocomplete' => 'off'] ) !!}
            @if ($errors->has('city'))
                <span class="help-block">{{ $errors->first('city') }}</span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('type_id') ? ' has-error' : '' }} col-md-4">
        <label for="type_id" class="control-label">Type *</label>
        <div>
            {!! Form::select(
                'type_id', 
                $types, 
                null , 
                ['class' => 'selectpicker full-width', 'id' => 'type_id']
            ) !!}
            @if ($errors->has('type_id'))
                <span class="help-block">{{ $errors->first('type_id') }}</span>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-heading">Property Details</div>  
    </div>
</div>


<div class="row">
    <div class="form-group{{ $errors->has('nb_bathrooms') ? ' has-error' : '' }} col-md-4">
        <label for="nb_bathrooms" class="control-label">Nb. Bathrooms</label>
        <div>
            {!! Form::text('nb_bathrooms', old('nb_bathrooms'), [ 'class' => 'form-control', 'id' => 'nb_bathrooms', 'autocomplete' => 'off'] ) !!}
            @if ($errors->has('nb_bathrooms'))
                <span class="help-block">{{ $errors->first('nb_bathrooms') }}</span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('nb_bedrooms') ? ' has-error' : '' }} col-md-4">
        <label for="nb_bedrooms" class="control-label">Nb. Bedrooms</label>
        <div>
            {!! Form::text('nb_bedrooms', old('nb_bedrooms'), [ 'class' => 'form-control', 'id' => 'nb_bedrooms', 'autocomplete' => 'off'] ) !!}
            @if ($errors->has('nb_bedrooms'))
                <span class="help-block">{{ $errors->first('nb_bedrooms') }}</span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('nb_parkings') ? ' has-error' : '' }} col-md-4">
        <label for="nb_parkings" class="control-label">Nb. Parkings</label>
        <div>
            {!! Form::text('nb_parkings', old('nb_parkings'), [ 'class' => 'form-control', 'id' => 'nb_parkings', 'autocomplete' => 'off'] ) !!}
            @if ($errors->has('nb_parkings'))
                <span class="help-block">{{ $errors->first('nb_parkings') }}</span>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-heading">
            Featured Image <i class="fa fa-question-circle-o" data-toggle="tooltip" data-placement="top" title="should respect 768x576 ratio"></i>
        </div>  
    </div>
</div>

<div class="row">
    <div class="form-group col-md-4">
        <div>
            <preview-upload 
                :name="'featured_image'" 
                @if(isset($property)) :loaded-image="'{!! $property->encoded_featured_image !!}'" @endif
            ></preview-upload>
        </div>
    </div>
</div>

<div class="form-group buttons">
    <div class="col-md-8 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            Save property
        </button>
         <a class="btn btn-secondary" href="{!! route('properties.index') !!}">
            Back
        </a>
    </div>
</div>