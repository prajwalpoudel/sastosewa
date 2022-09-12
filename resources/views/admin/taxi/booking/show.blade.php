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
                    <h3 class="kt-portlet__head-title">Taxi Booking Detail <b>({{ $booking->taxiDetail->from }} - {{ $booking->taxiDetail->to }})  </b></h3>
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
                        <span class="">{{ $booking->taxiDetail->taxi->name ?? '' }}</span>
                    </div>
                    <div class="col-lg-6">
                        <label> Taxi Number: </label>
                        <span class="">{{ $booking->taxiDetail->taxi->taxi_number ?? '' }}</span>
                    </div>
                    <div class="col-lg-6">
                        <label> Model: </label>
                        <span class="">{{ $booking->taxiDetail->taxi->model ?? '' }}</span>
                    </div>
                    <div class="col-lg-6">
                        <label> Driver Name: </label>
                        <span class="">{{ $booking->taxiDetail->taxi->driver_name ?? '' }}</span>
                    </div>
                    <div class="col-lg-6">
                        <label> Driver Number: </label>
                        <span class="">{{ $booking->taxiDetail->taxi->driver_number ?? '' }}</span>
                    </div>
                    <div class="col-lg-6">
                        <label> Price: </label>
                        <span class="">NPr {{ $booking->taxiDetail->price?? '' }}</span>
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
                        <span class="">{{ $booking->name ?? '' }}</span>
                    </div>
                    <div class="col-lg-6">
                        <label>Email: </label>
                        <span class="">{{ $booking->email ?? '' }}</span>
                    </div>
                    <div class="col-lg-6">
                        <label>Phone: </label>
                        <span class="">{{ $booking->phone ?? '' }}</span>
                    </div>
                    <div class="col-lg-6">
                        <label>Address: </label>
                        <span class="">{{ $booking->address ?? '' }}</span>
                    </div>
                    <div class="col-lg-6">
                        <label>Status: </label>
                        <span class="">{{ $booking->status ?? '' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    @stack('form-script')
@endpush
