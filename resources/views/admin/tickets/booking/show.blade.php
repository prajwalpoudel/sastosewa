@extends('metronics.layouts.master')
@push('styles')
    <style>
        .booking-detail span {
            display: inline-block;
            padding-left: 18px;
            font-size: 14px;
            font-weight: bold;
        }

        .booking-detail label {
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
                    <h3 class="kt-portlet__head-title">Ticket Booking Detail <b>({{ $booking->details[0]->from }}
                            - {{ $booking->details[0]->to }}) </b></h3>
                </div>
            </div>

            <div class="kt-portlet__body">
                <div class="row">
                    <label class="booking-label font-weight-bold"> Flight Trip Details</label>
                </div>
                <br>
                <div class="row booking-detail">
                    <div class="col-lg-6">
                        <label> Name: </label>
                        <span>
                            <img src="{{ getImageUrl($booking->bookable->brand->logo) }}" alt="" height="40px;">
                        </span>
                        <span>{{ $booking->bookable->brand->name }}</span>
                    </div>
                    <div class="col-lg-6">
                        <label> Category: </label>
                        <span>{{ $booking->bookable->category->name }}</span>
                    </div>
                    <div class="col-lg-6">
                        <label> From: </label>
                        <span>{{ $booking->details[0]->departure_address.', '.$booking->details[0]->from}}</span>
                        <span> {{ \Carbon\Carbon::parse($booking->details[0]->departure_time)->isoFormat("HH:mm A") }}
                            , {{ \Carbon\Carbon::parse($booking->details[0]->date)->isoFormat('ddd, MMM DD, YYYY') }}</span>
                    </div>
                    <div class="col-lg-6">
                        <label> To: </label>
                        <span>{{ $booking->details[0]->arrival_address.', '.$booking->details[0]->to}}</span>
                        <span class="text-base">{{ \Carbon\Carbon::parse($booking->details[0]->arrival_time)->isoFormat("HH:mm A") }}
                            , {{ \Carbon\Carbon::parse($booking->details[0]->date)->isoFormat('ddd, MMM DD, YYYY') }}</span>
                    </div>
                    <div class="col-lg-6">
                        <label> Booking Status: </label>
                        <span class="">{{ $booking->status ? 'Accepted' : 'Pending' }}</span>
                    </div>
                    <div class="col-lg-6">
                        <label> Payment Status: </label>
                        <span class="">{{ $booking->payment_status ? 'Accepted' : 'Pending' }}</span>
                    </div>
                    <div class="col-lg-6">
                        <label> Price: </label>
                        <span class="">NPr {{ $booking->booking_price?? '' }}</span>
                    </div>
                </div>
                <br>
                <div class="row">
                    <label class="booking-label font-weight-bold">Booking Details</label>
                </div>
                <br>
                @foreach($booking->details as $key => $detail)
                    <div class="row booking-detail pb-4">
                        <div class="col-lg-12">
                            <p>Passenger {{ $key+1 }} details</p>
                        </div>
                        <div class="col-lg-6">
                            <label>Name: </label>
                            <span class="">{{ $detail->name ?? '' }}</span>
                        </div>
                        <div class="col-lg-6">
                            <label>Email: </label>
                            <span class="">{{ $detail->email ?? '' }}</span>
                        </div>
                        <div class="col-lg-6">
                            <label>Phone: </label>
                            <span class="">{{ $detail->phone ?? '' }}</span>
                        </div>
                        <div class="col-lg-6">
                            <label>Address: </label>
                            <span class="">{{ $detail->address ?? '' }}</span>
                        </div>
                    </div>
                @endforeach

                <br>
                <div class="row">
                    <label class="booking-label font-weight-bold">Booked By</label>
                </div>
                <br>
                    <div class="row booking-detail pb-4">
                        <div class="col-lg-6">
                            <label>Name: </label>
                            <span class="">{{ $booking->user->name ?? '' }}</span>
                        </div>
                        <div class="col-lg-6">
                            <label>Email: </label>
                            <span class="">{{ $booking->user->email ?? '' }}</span>
                        </div>
                        <div class="col-lg-6">
                            <label>Phone: </label>
                            <span class="">{{ $booking->user->phone ?? '' }}</span>
                        </div>
                        <div class="col-lg-6">
                            <label>Address: </label>
                            <span class="">{{ $booking->user->address ?? '' }}</span>
                        </div>
                    </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    @stack('form-script')
@endpush
