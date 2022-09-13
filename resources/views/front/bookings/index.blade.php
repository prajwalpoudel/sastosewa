@extends('front.layouts.app')

@section('content')
    <section id="contact-section">
        <div class="banner w-full h-72 bg-gray-100">
            <img class="w-full h-72 object-cover" src="{{ asset('images/boat.jpg') }}" alt="">
        </div>
        <div class="content-container">
            <div class="my-4">
                <div id="accordion-collapse" data-accordion="collapse">
                    @include('front.bookings.ticket')
                    @include('front.bookings.tour')
                    @include('front.bookings.taxi')
                </div>
            </div>

        </div>
    </section>
@endsection
