@extends('front.layouts.app')
@section('content')
    <section id="tickets-section">
        <div class="banner w-full h-72 bg-gray-100 relative">
            <img class="w-full h-72 object-cover opacity-60" src="{{ asset('images/everest.jpg') }}" alt="">
            <div class="search absolute inset-y-4 left-8">
                <div class="text-white tracking-wider">
                    <p class="text-4xl font-bold uppercase">Sasto Sewa presents you sasto tickets.</p>
                    <p class="text-2xl font-medium capitalize my-4">Find your tickets Here.</p>
                </div>
                @include('front.ticket.search-form')
            </div>
        </div>

        <div class="content-container text-neutral-700 tracking-wider text-lg">
            <div class="grid my-2">
                @forelse($tickets as $ticket)
                    <div class="card group m-4 p-4 bg-white flex justify-between">
                    <div>
                        <img src="{{ asset('images/yeti-logo.png') }}" class="w-24 h-24 object-cover" alt="">
                        <p class="pt-1">Yeti Airlines</p>
                    </div>
                    <div class="departure-section text-right flex flex-col justify-between pl-40 py-4">
                        <h3 class="text-rose-700 font-semibold">{{ $ticket->from }}</h3>
                        <h6 class="ticket-time">{{ $ticket->departure_time }}</h6>
                        <h6 class="ticket-date">Tue, Apr 24, 2022</h6>
                    </div>
                    <div class="flex flex-col justify-between py-4">
                        <div class="time">
                            <p>25 mins</p>
                        </div>
                        <div class="flex">
                            <p> 15 kg</p>
                            <p class="pl-4"> 15 kg</p>
                        </div>
                    </div>
                    <div class="arrival-section text-left flex flex-col justify-between pr-40 py-4">
                        <h3 class="text-rose-700 font-semibold">{{ $ticket->to }}</h3>
                        <h6 class="ticket-time">{{ $ticket->arrival_time }}</h6>
                        <h6 class="ticket-date">{{ \Carbon\Carbon::parse($ticket->date)->format('d') }}</h6>
                    </div>
                    <div class="flex flex-col justify-between text-center py-4">
                        <h6 class="ticket-price">NPR 3300</h6>
                        <div class="button-div">
                            <a href="{{ route('front.ticket.book', ['id' => $ticket->id, 'no_of_travellers' => request()->input('no_of_travellers'), 'nationality' => request()->input('nationality')]) }}" class="button bg-rose-700 w-full">Book Now</a>
                        </div>
                        <p class="ticket-type">Non refundable</p>
                    </div>
                </div>
                @empty
                    <div class="m-4 p-4 flex justify-between">
                        <p class="text-no-ticket-title">No Tickets Found</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
