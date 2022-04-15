@extends('metronics.layouts.master')

@section('content')
    <section id="grade-create">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Crete Ticket</h3>
                </div>
            </div>
            {!! Form::model(null, ['route' => ['admin.ticket.store'], 'method' => 'post', 'class' => 'kt-form kt-form--label-right', 'id' => 'ticket-form']) !!}
            @include('admin.tickets.ticket.form', ['formAction' => 'Save'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection

@push('script')
    @stack('form-script')
@endpush
