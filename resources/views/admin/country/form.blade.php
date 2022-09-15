<div class="kt-portlet__body">
    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('name', 'Name :') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            @error('name')
            <div id="name" class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-12">
            {!! Form::label('description', 'Description :') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control', 'id'=>'summernote']) !!}
            @error('description')
            <div class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
    </div>


    <div class="form-group row">
        <div class="col-lg-6">
                {!! Form::label('image', 'Image :') !!}
                {!!Form::file('image', null, ['class' => 'form-control'])!!}
                @error('image'))
                <div class="error invalid-feedback"> {{ $message }}</div>
                @enderror
        </div>
    </div>


</div>

<div class="kt-portlet__foot">
    <div class="kt-form__actions">
        <div class="row">
            <div class="col-lg-6">
                <button type="submit" class="btn btn-primary">{{ $formAction }}</button>
                <a href="{{ route('admin.country.index') }}" type="reset" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
</div>

    @push('script')
        <script>
            $(document).ready(function() {

            });
        </script>
    @endpush

