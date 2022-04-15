<div class="kt-portlet__body">
    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('type', 'Type :') !!}
            {!!Form::select('type', $types, null, ['class' => 'form-control', 'id' => 'type'])!!}
            @error('type'))
            <div id="parent_id" class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('media', 'Media :') !!}
            {!!Form::select('media', $types, null, ['class' => 'form-control', 'id' => 'type'])!!}
            @error('type'))
            <div id="parent_id" class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="kt-portlet__foot">
    <div class="kt-form__actions">
        <div class="row">
            <div class="col-lg-6">
                <button type="submit" class="btn btn-primary">{{ $formAction }}</button>
                <a href="{{ route('admin.page.section.index') }}" type="reset" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function () {
            $("#category_id").select2({
                placeholder: "Select Category",
                allowClear: true
            });
        });
    </script>

@endpush

