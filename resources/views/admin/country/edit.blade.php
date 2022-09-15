@extends('metronics.layouts.master')

@section('content')
    <section id="country-edit">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Edit Country</h3>
                </div>
            </div>
            {!! Form::model($country, ['route' => ['admin.country.update',$country->id], 'method' => 'patch', 'class' => 'kt-form kt-form--label-right', 'id' => 'country-form', 'files' => true]) !!}
            @include('admin.country.form', ['formAction' => 'Update'])
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
        });
    </script>
@endpush
