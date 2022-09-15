@extends('metronics.layouts.master')

@section('content')
    <section id="grade-create">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Crete Country</h3>
                </div>
            </div>
            {!! Form::model(null, ['route' => ['admin.country.store'], 'method' => 'post', 'class' => 'kt-form kt-form--label-right', 'id' => 'country-form', 'files' => true]) !!}
            @include('admin.country.form', ['formAction' => 'Save'])
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

