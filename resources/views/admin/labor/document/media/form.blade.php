<div class="kt-portlet__body">
    <div class="form-group row">
        {!! Form::hidden('labor_document_id', $laborDocumentId) !!}

        <div class="col-lg-12">
            <div class="col-lg-6">
                {!! Form::label('media', 'Media :') !!}
                <br>
                {!!Form::file('media', null, ['class' => 'form-control', 'id' => 'type'])!!}
                @error('media'))
                <div id="parent_id" class="error invalid-feedback"> {{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
</div>

<div class="kt-portlet__foot">
    <div class="kt-form__actions">
        <div class="row">
            <div class="col-lg-6">
                <button type="submit" class="btn btn-primary">{{ $formAction }}</button>
                <a href="{{ isset($isEdit) ? route('admin.labor.document.media.create', $laborDocumentId) : route('admin.labor.document.create',  $laborId) }}" type="reset" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
</div>

