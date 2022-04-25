<div class="kt-portlet__body">
    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('name', 'Name :') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}

            @error('name')
                <div id="name" class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>

        <div class="col-lg-6">
            {!! Form::label('category_id', 'Category :') !!}
            {!!Form::select('category_id', $categories, null, ['class' => 'form-control', 'id' => 'category_id'])!!}
            @error('category_id'))
            <div id="category_id" class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('logo', 'Logo :') !!}
            {!!Form::file('logo', null, ['class' => 'form-control'])!!}
            @error('logo'))
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
                <a href="{{ route('admin.ticket.brand.index') }}" type="reset" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
</div>

