@extends('metronics.layouts.master')

@section('content')
    <section id="grade-create">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Create Taxi Detail</h3>
                </div>
            </div>
            {!! Form::model(null, ['route' => ['admin.taxi-detail.store'], 'method' => 'post', 'class' => 'kt-form kt-form--label-right', 'id' => 'taxi-detail-form']) !!}
            @include('admin.taxi.detail.form', ['formAction' => 'Save'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection

@push('script')
    @stack('form-script')
@endpush
