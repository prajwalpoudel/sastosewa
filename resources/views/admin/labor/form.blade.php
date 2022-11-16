<div class="kt-portlet__body">
    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('country_id', 'Country :') !!}
            {!!Form::select('country_id', $countries, null, ['class' => 'form-control', 'id' => 'country_id'])!!}
            @error('country_id'))
            <div id="country_id" class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
        <div class="col-lg-6">
            {!! Form::label('status', 'Is Popular ? :') !!}
            <br>
            <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">
                <label>
                    {!! Form::checkbox('is_popular', true, null, ['class' => 'form-control']) !!}
                    <span></span>
                </label>
            </span>
            @error('is_popular')
            <div id="name" class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="kt-portlet__foot">
    <div class="kt-form__actions">
        <div class="row">
            <div class="col-lg-6">
                <button type="submit" class="btn btn-primary">{{ $formAction }}</button>
                <a href="{{ route('admin.labor.index') }}" type="reset" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
</div>

