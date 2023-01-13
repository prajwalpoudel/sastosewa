@extends('metronics.layouts.master')

@section('content')
    <section id="tour-create">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Crete Page Section</h3>
                </div>
            </div>
            {!! Form::model(null, ['route' => ['admin.page.section.store'], 'method' => 'post', 'class' => 'kt-form kt-form--label-right', 'id' => 'section-form']) !!}
            @include('admin.pages.sections.form', ['formAction' => 'Save'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection

@push('script')
    @stack('form-script')
    <script>
        $(document).ready(function () {
            $('#summernote').summernote({
                height: 150
            });
        });
    </script>
@endpush
