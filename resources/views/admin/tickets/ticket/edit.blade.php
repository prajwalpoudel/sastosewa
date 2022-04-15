@extends('metronics.layouts.master')

@section('content')
    <section id="ticket-edit">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Edit Ticket</h3>
                </div>
            </div>
            {!! Form::model($ticket, ['route' => ['admin.ticket.update',$ticket->id], 'method' => 'patch', 'class' => 'kt-form kt-form--label-right', 'id' => 'ticket-form']) !!}
            @include('admin.tickets.ticket.form', ['formAction' => 'Update'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection
