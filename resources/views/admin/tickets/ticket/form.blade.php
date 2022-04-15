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
            {!! Form::label('from', 'From :') !!}
            {!! Form::text('from', null, ['class' => 'form-control']) !!}
            @error('from')
            <div id="name" class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>

        <div class="col-lg-6">
            {!! Form::label('to', 'To :') !!}
            {!!Form::text('to', null, ['class' =>  'form-control', 'id' => 'price'])!!}
            @error('to'))
            <div id="category_id" class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('date', 'Date :') !!}
            {!! Form::date('date', null, ['class' => 'form-control']) !!}
            @error('date')
            <div id="name" class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>

        <div class="col-lg-6">
            {!! Form::label('departure_time', 'Departure Time :') !!}
            {!! Form::time('departure_time', null, ['class' => 'form-control']) !!}
            @error('departure_time')
            <div id="name" class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('arrival_time', 'Arrival Time :') !!}
            {!! Form::time('arrival_time', null, ['class' => 'form-control']) !!}
            @error('arrival_time')
            <div id="name" class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>

        <div class="col-lg-6">
            {!! Form::label('price', 'Price :') !!}
            {!!Form::number('price', null, ['class' =>  'form-control', 'id' => 'price'])!!}
            @error('price'))
            <div id="category_id" class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('commission', 'Commision :') !!}
            {!! Form::number('commission', null, ['class' => 'form-control']) !!}
            @error('commission')
            <div id="name" class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>

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
                <a href="{{ route('admin.ticket.index') }}" type="reset" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
</div>

    @push('script')
        <script>
            $(document).ready(function() {
                $("#category_id").select2({
                    placeholder: "Select Category",
                    allowClear: true
                });
            });
        </script>

    @endpush

