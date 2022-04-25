@extends('metronics.layouts.master')

@section('content')
    <section id="ticket-brand-create">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Crete Ticket Brand</h3>
                </div>
            </div>
            {!! Form::model(null, ['route' => ['admin.ticket.brand.store'], 'method' => 'post', 'class' => 'kt-form kt-form--label-right', 'id' => 'ticket-brand-form', 'files' => true]) !!}
            @include('admin.tickets.brand.form', ['formAction' => 'Save'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $("#category_id").select2({
                placeholder: "Select Category",
                allowClear: true
            });
        });
    </script>

@endpush
