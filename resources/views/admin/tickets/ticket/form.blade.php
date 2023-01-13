<div class="kt-portlet__body">
    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('category_id', 'Category :') !!}
            {!!Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Select Category', 'id' => 'category_id'])!!}
            @error('category_id'))
            <div id="category_id" class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>

        <div class="col-lg-6">
            {!! Form::label('brand_id', 'Brand :') !!}
            {!!Form::select('brand_id', [], null, ['class' => 'form-control', 'id' => 'brand_id'])!!}
            @error('brand_id')
                <div id="brand_id" class="error invalid-feedback"> {{ $message }}</div>
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
            @error('to')
            <div id="category_id" class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('no_of_tickets', 'No of Tickets :') !!}
            {!! Form::number('no_of_tickets', null, ['class' => 'form-control']) !!}
            @error('no_of_tickets')
            <div id="name" class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>

        <div class="col-lg-6">
            {!! Form::label('date', 'Date :') !!}
            {!! Form::date('date', null, ['class' => 'form-control']) !!}
            @error('date')
            <div id="name" class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('departure_time', 'Departure Time :') !!}
            {!! Form::time('departure_time', null, ['class' => 'form-control']) !!}
            @error('departure_time')
            <div id="name" class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>

        <div class="col-lg-6">
            {!! Form::label('arrival_time', 'Arrival Time :') !!}
            {!! Form::time('arrival_time', null, ['class' => 'form-control']) !!}
            @error('arrival_time')
            <div id="name" class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('price', 'Price :') !!}
            {!!Form::number('price', null, ['class' =>  'form-control', 'id' => 'price'])!!}
            @error('price')
            <div id="category_id" class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>

        <div class="col-lg-6">
            {!! Form::label('commission', 'Commision :') !!}
            {!! Form::number('commission', null, ['class' => 'form-control']) !!}
            @error('commission')
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

                $('#brand_id').select2({
                    placeholder: 'Select Category First',
                    allowClear: true,
                });

                $('#category_id').change(function () {
                    var categoryId = $(this).val();
                    getBrandByCategory(categoryId);
                });
            });

            function getBrandByCategory(categoryId, defaultSelected = null) {
                var brands = $('#brand_id').select2({
                    placeholder: 'Select Brand',
                    allowClear: true,
                    ajax: {
                        url: "/api/category/" + categoryId + '/brands',
                        'dataType': 'json',
                        processResults: function (data) {
                            return {
                                results: $.map(data, function (obj) {
                                    return {
                                        id: obj.id,
                                        text: obj.text
                                    };
                                })
                            }
                        }
                    },
                }).val(defaultSelected).trigger('change');

                if (defaultSelected) {
                    _.each(defaultSelected, function (data) {
                        var option = new Option(data.text, data.id, true, true);
                        brands.append(option);
                    })
                    brands.trigger('change');
                }
            }
        </script>

    @endpush

