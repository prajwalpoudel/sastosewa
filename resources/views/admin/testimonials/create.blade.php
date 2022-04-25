@extends('metronics.layouts.master')

@section('content')
    <section id="testimonial-create">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Crete Testimonial</h3>
                </div>
            </div>
            {!! Form::model(null, ['route' => ['admin.testimonial.store'], 'method' => 'post', 'class' => 'kt-form kt-form--label-right', 'id' => 'testimonial-form', 'files' => true]) !!}
            @include('admin.testimonials.form', ['formAction' => 'Save'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection

@push('script')
    @stack('form-script')
@endpush
