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
            {!! Form::label('model', 'Model :') !!}
            {!!Form::text('model', null, ['class' =>  'form-control', 'id' => 'model'])!!}
            @error('model'))
            <div id="model_id" class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('taxi_number', 'Taxi Number :') !!}
            {!! Form::text('taxi_number', null, ['class' => 'form-control']) !!}
            @error('taxi_number')
            <div id="name" class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>

        <div class="col-lg-6">
            {!! Form::label('driver_name', 'Driver Name :') !!}
            {!!Form::text('driver_name', null, ['class' =>  'form-control'])!!}
            @error('driver_name'))
            <div id="driver_name" class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('driver_number', 'Driver Number :') !!}
            {!! Form::text('driver_number', null, ['class' => 'form-control']) !!}
            @error('driver_number')
            <div id="driver_number" class="error invalid-feedback"> {{ $message }}</div>
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
            <div id="status" class="error invalid-feedback"> {{ $message }}</div>
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

