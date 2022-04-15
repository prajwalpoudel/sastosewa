@extends('metronics.layouts.master')

@section('content')
    <section id="tour-edit">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Edit Tour</h3>
                </div>
            </div>
            {!! Form::model($tour, ['route' => ['admin.tour.update',$tour->id], 'method' => 'patch', 'class' => 'kt-form kt-form--label-right', 'id' => 'tour-form']) !!}
            @include('admin.tours.tour.form', ['formAction' => 'Update'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection
