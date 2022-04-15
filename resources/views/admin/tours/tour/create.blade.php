@extends('metronics.layouts.master')

@section('content')
    <section id="tour-create">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Crete Tour</h3>
                </div>
            </div>
            {!! Form::model(null, ['route' => ['admin.tour.store'], 'method' => 'post', 'class' => 'kt-form kt-form--label-right', 'id' => 'tour-form']) !!}
            @include('admin.tours.tour.form', ['formAction' => 'Save'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection

@push('script')
    @stack('form-script')
@endpush
