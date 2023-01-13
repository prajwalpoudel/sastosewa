<div class="kt-portlet__body">
    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('page_title', 'Section Title :') !!}
            {!! Form::text('page_title', null, ['class' => 'form-control']) !!}
            @error('page_title')
            <div id="page_title" class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>

        <div class="col-lg-6">
            {!! Form::label('page_id', 'Page :') !!}
            {!!Form::select('page_id', $pages, null, ['class' => 'form-control', 'id' => 'parent_id'])!!}
            @error('page_id'))
            <div id="parent_id" class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-12">
            {!! Form::label('title', 'Title :') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
            @error('title')
            <div id="name" class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
    </div>


    <div class="form-group row">
        <div class="col-lg-12">
            {!! Form::label('description', 'Description :') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
            @error('description')
            <div id="name" class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('status', 'Status :') !!}
            <br>
            <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">
                <label>
                    {!! Form::checkbox('status', true, null, ['class' => 'form-control']) !!}
                    <span></span>
                </label>
            </span>
            @error('status')
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

