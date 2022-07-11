<div class="kt-portlet__body">
    <section id="trip-details">
        <div class="form-group row">
            <div class="col-md-12">
                <strong>
                    <h6>Trip Details :</h6>
                </strong>
            </div>
        </div>

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
                {!! Form::label('code', 'Code :') !!}
                {!! Form::text('code', null, ['class' => 'form-control']) !!}
                @error('code')
                <div id="name" class="error invalid-feedback"> {{ $message }}</div>
                @enderror
            </div>

            <div class="col-lg-6">
                {!! Form::label('grade', 'Grade :') !!}
                {!! Form::text('grade', null, ['class' => 'form-control']) !!}
                @error('grade')
                <div id="name" class="error invalid-feedback"> {{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-6">
                {!! Form::label('seasons', 'Seasons :') !!}
                {!! Form::text('seasons', null, ['class' => 'form-control']) !!}
                @error('seasons')
                <div id="name" class="error invalid-feedback"> {{ $message }}</div>
                @enderror
            </div>

            <div class="col-lg-6">
                {!! Form::label('route', 'Route :') !!}
                {!! Form::text('route', null, ['class' => 'form-control']) !!}
                @error('route')
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
            <div class="col-lg-12">
                {!! Form::label('itinerary', 'Itinerary :') !!}
                {!! Form::textarea('itinerary', null, ['class' => 'form-control']) !!}
                @error('itinerary')
                <div id="name" class="error invalid-feedback"> {{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-12">
                {!! Form::label('equipment', 'Equipments :') !!}
                {!! Form::textarea('equipment', null, ['class' => 'form-control']) !!}
                @error('equipment')
                <div id="name" class="error invalid-feedback"> {{ $message }}</div>
                @enderror
            </div>
        </div>
    </section>

    <section id="price-details">
        <div class="form-group row">
            <div class="col-md-12">
                <strong>
                    <h6>Price Details :</h6>
                </strong>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6">
                {!! Form::label('price', 'Price :') !!}
                {!!Form::number('price', null, ['class' =>  'form-control', 'id' => 'price'])!!}
                @error('price'))
                <div id="category_id" class="error invalid-feedback"> {{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12">
                {!! Form::label('price_inclusive', 'Price Includes :') !!}
                {!! Form::textarea('price_inclusive', null, ['class' => 'form-control']) !!}
                @error('price_inclusive')
                <div id="name" class="error invalid-feedback"> {{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12">
                {!! Form::label('price_exclusive', 'Price does not include :') !!}
                {!! Form::textarea('price_exclusive', null, ['class' => 'form-control']) !!}
                @error('price_exclusive')
                <div id="name" class="error invalid-feedback"> {{ $message }}</div>
                @enderror
            </div>
        </div>
    </section>

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

