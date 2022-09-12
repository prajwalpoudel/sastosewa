<div class="kt-portlet__body">
    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('taxi_id', 'Taxi :') !!}
            {!!Form::select('taxi_id', $taxies, null, ['class' => 'form-control', 'placeholder' => 'Select Taxi', 'id' => 'taxi_id'])!!}
            @error('taxi_id'))
            <div id="taxi_id" class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>

        <div class="col-lg-6">
            {!! Form::label('from', 'From :') !!}
            {!!Form::text('from', null, ['class' =>  'form-control', 'id' => 'from'])!!}
            @error('from'))
            <div id="from" class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('to', 'To :') !!}
            {!! Form::text('to', null, ['class' => 'form-control']) !!}
            @error('to')
            <div id="to" class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>

        <div class="col-lg-6">
            {!! Form::label('price', 'Price :') !!}
            {!!Form::text('price', null, ['class' =>  'form-control'])!!}
            @error('price'))
            <div id="price" class="error invalid-feedback"> {{ $message }}</div>
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

