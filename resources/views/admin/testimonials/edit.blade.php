@extends('metronics.layouts.master')

@section('content')
    <section id="testimonial-edit">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Edit Testimonial</h3>
                </div>
            </div>
            {!! Form::model($testimonial, ['route' => ['admin.testimonial.update',$testimonial->id], 'method' => 'patch', 'class' => 'kt-form kt-form--label-right', 'id' => 'testimonial-form', 'files' => true]) !!}
            @include('admin.testimonials.form', ['formAction' => 'Update'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection
