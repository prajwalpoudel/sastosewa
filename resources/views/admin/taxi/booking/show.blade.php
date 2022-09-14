@extends('metronics.layouts.master')
@push('styles')
    <style>
        .booking-detail span{
            display: inline-block;
            padding-left: 18px;
            font-size: 14px;
            font-weight: bold;
        }
        .booking-detail label{
            font-size: 14px;
            font-weight: normal;
        }
        .booking-label {
            font-size: 14px;
            font-weight: normal;
        }
    </style>
@endpush

@section('content')
    <section id="">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Taxi Booking Detail <b>({{ $booking->details[0]->from }} - {{ $booking->details[0]->to }})  </b></h3>
                </div>
            </div>

            <div class="kt-portlet__body">
                <div class="row">
                    <label class="booking-label"> Taxi Details</label>
                </div>
                <br>
                <div class="row booking-detail">
                    <div class="col-lg-6">
                        <label> Taxi Name: </label>
                        <span class="">{{ $booking->details[0]->bookable_name ?? '' }}</span>
                    </div>
                    <div class="col-lg-6">
                        <label> Taxi Number: </label>
                        <span class="">{{ $booking->bookable->taxi->taxi_number ?? '' }}</span>
                    </div>
                    <div class="col-lg-6">
                        <label> Model: </label>
                        <span class="">{{ $booking->bookable->taxi->model ?? '' }}</span>
                    </div>
                    <div class="col-lg-6">
                        <label> Driver Name: </label>
                        <span class="">{{ $booking->bookable->taxi->driver_name ?? '' }}</span>
                    </div>
                    <div class="col-lg-6">
                        <label> Driver Number: </label>
                        <span class="">{{ $booking->bookable->taxi->driver_number ?? '' }}</span>
                    </div>
                    <div class="col-lg-6">
                        <label> Price: </label>
                        <span class="">NPr {{ $booking->booking_price?? '' }}</span>
                    </div>
                </div>
                <br>
                <div class="row">
                    <label class="booking-label">Booking Details</label>
                </div>
                <br>
                <div class="row booking-detail">
                    <div class="col-lg-6">
                        <label>Name: </label>
                        <span class="">{{ $booking->details[0]->name ?? '' }}</span>
                    </div>
                    <div class="col-lg-6">
                        <label>Email: </label>
                        <span class="">{{ $booking->details[0]->email ?? '' }}</span>
                    </div>
                    <div class="col-lg-6">
                        <label>Phone: </label>
                        <span class="">{{ $booking->details[0]->phone ?? '' }}</span>
                    </div>
                    <div class="col-lg-6">
                        <label>Address: </label>
                        <span class="">{{ $booking->details[0]->address ?? '' }}</span>
                    </div>
                    <div class="col-lg-6">
                        <label>Status: </label>
                        <span class="">{{ $booking->status ?? '' }}</span>
                    </div>
                    <div class="col-lg-6">
                        <label>Status: </label>
                        <span class="">{{ $booking->payment_status ? 'Paid': 'Unpaid' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    @stack('form-script')
@endpush
