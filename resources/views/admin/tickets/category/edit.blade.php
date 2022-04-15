@extends('metronics.layouts.master')

@section('content')
    <section id="ticket-category-edit">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Edit Ticket Category</h3>
                </div>
            </div>
            {!! Form::model($category, ['route' => ['admin.ticket.category.update',$category->id], 'method' => 'patch', 'class' => 'kt-form kt-form--label-right', 'id' => 'ticket-category-form']) !!}
            @include('admin.tickets.category.form', ['formAction' => 'Update'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection
