<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">Name</label>

    <div class="col-md-6">
        {!! Form::text('name', old('name'), [ 'class' => 'form-control', 'id' => 'name', 'autocomplete' => 'off'] ) !!}
        @if ($errors->has('name'))
            <span class="help-block">{{ $errors->first('name') }}</span>
        @endif
    </div>
</div>

<div class="form-group buttons">
    <div class="col-md-8 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            Save area
        </button>
         <a class="btn btn-secondary" href="{!! route('areas.index') !!}">
            Back
        </a>
    </div>
</div>