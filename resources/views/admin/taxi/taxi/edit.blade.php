@extends('metronics.layouts.master')

@section('content')
    <section id="ticket-edit">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Edit Taxi</h3>
                </div>
            </div>
            {!! Form::model($taxi, ['route' => ['admin.taxi.update',$taxi->id], 'method' => 'patch', 'class' => 'kt-form kt-form--label-right', 'id' => 'taxi-form']) !!}
            @include('admin.taxi.taxi.form', ['formAction' => 'Update'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection
