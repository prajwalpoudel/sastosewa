<div class="kt-portlet__body">
    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('name', 'Name :') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            @error('name'))
            <div id="name" class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
        <div class="col-lg-6">
            {!! Form::label('position', 'Position :') !!}
            {!! Form::text('position', null, ['class' => 'form-control']) !!}
            @error('position'))
                <div id="position" class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('company', 'Company :') !!}
            {!! Form::text('company', null, ['class' => 'form-control']) !!}
            @error('company'))
            <div id="company" class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-12">
            {!! Form::label('description', 'Description :') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
            @error('description'))
            <div id="company" class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('image', 'Image :') !!}
            {!!Form::file('image', null, ['class' => 'form-control', 'id' => 'client-image'])!!}
            @error('image')
            <div id="image" class="error invalid-feedback"> {{ $message }}</div>
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

