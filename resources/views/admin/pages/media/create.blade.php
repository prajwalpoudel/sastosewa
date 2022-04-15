@extends('metronics.layouts.master')

@section('content')
    <section id="media-create">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Add Banner(Home) Media</h3>
                </div>
            </div>
            {!! Form::model(null, ['route' => ['admin.page.section.store'], 'method' => 'post', 'class' => 'kt-form kt-form--label-right', 'id' => 'section-form']) !!}
            @include('admin.pages.media.form', ['formAction' => 'Save'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection

@push('script')
    @stack('form-script')
@endpush
