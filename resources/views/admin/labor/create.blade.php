@extends('metronics.layouts.master')

@section('content')
    <section id="labor-create">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Crete Labor</h3>
                </div>
            </div>
            {!! Form::model(null, ['route' => ['admin.labor.store'], 'method' => 'post', 'class' => 'kt-form kt-form--label-right', 'id' => 'labor-form']) !!}
            @include('admin.labor.form', ['formAction' => 'Save'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection
@push('script')
    <script>
        $(document).ready(function () {
            $('#summernote').summernote({
                height: 150
            });
            $("#country_id").select2({
                placeholder: "Select Country",
                allowClear: true
            });
        });
    </script>
@endpush
