 <form class="form-horizontal" method="GET" action="{{ route('properties.index') }}">
 <div class="row filter">
    <div class="col-md-4">
        {!! Form::text('reference', request()->get('reference'), [ 'class' => 'form-control', 'placeholder' => 'Enter reference', 'autocomplete' => 'off'] ) !!}
    </div>
    <div class="col-md-4">
        {!! Form::select(
            'area', 
            [ -1 => 'Choose area' ]+ $areas,
            request()->get('area') , 
            ['class' => 'selectpicker full-width', 'id' => 'area']
        ) !!}
    </div>
    <div class="col-md-4">
        <button type="submit" class="btn btn-secondary">
            Filter
        </button>
    </div>
</div>
</form>