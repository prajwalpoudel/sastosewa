@extends('metronics.layouts.master')

@section('content')
    <section id="grade-create">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Crete Ticket Category</h3>
                </div>
            </div>
            {!! Form::model(null, ['route' => ['admin.ticket.category.store'], 'method' => 'post', 'class' => 'kt-form kt-form--label-right', 'id' => 'ticket-category-form']) !!}
            @include('admin.tickets.category.form', ['formAction' => 'Save'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection
