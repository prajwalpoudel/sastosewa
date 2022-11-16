<div class="kt-portlet__body">
    <div class="form-group row">
        {!! Form::hidden('labor_id', $laborId) !!}

        <div class="col-lg-12">
            {!! Form::label('title', 'Title :') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
            @error('title')
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
                <a href="{{ isset($isEdit) ?  route('admin.labor.document.create',  $laborId): route('admin.labor.index')}}" type="reset" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
</div>

