@extends('front.layouts.app')
@section('content')
    <section id="ticket-book-section">
        <div class="content-container text-neutral-700 tracking-wider text-lg my-8">
            <div class="card bg-white p-4 mx-12 my-4">
                @if($booking->bookable instanceof \App\Models\Ticket\Ticket)
                    <div class="grid grid-cols-3 gap-2 justify-between">
                        <div class="from ">
                            <h3 class="text-right text-rose-700 font-semibold">{{ $booking->details[0]->from }}</h3>
                        </div>
                        <div class="flex justify-center">
                            <img src="{{ getImageUrl($booking->bookable->brand->logo) }} "
                                 class="w-12 h-12 object-cover object-center" alt="">
                        </div>
                        <div class="to ">
                            <h3 class="text-left text-rose-700 font-semibold">{{ $booking->details[0]->to }}</h3>
                        </div>
                    </div>
                    <div class="flex justify-center py-2">
                        <h3 class="text-rose-700 font-semibold text-center">NRs {{ $booking->booking_price }}</h3>
                    </div>
                    <div class="px-8 py-4">
                        <div class="pb-2 text-sm grid grid-cols-2">
                            <span class="block">Booking Status: {{ $booking->status ? 'Accepted' : 'Pending' }}</span>
                            <span class="block">Payment Status: {{ $booking->payment_status ? 'Accepted' : 'Pending' }}</span>
                        </div>
                        <h3 class="text-rose-700 font-semibold">{{ $booking->bookable->category->name }} Trip Details</h3>
                        <div class="grid grid-cols-2">
                            <div class="p-2">
                                <p class="text-base">{{ $booking->details[0]->departure_address.', '.$booking->details[0]->from}}</p>
                                <p class="text-base">{{ \Carbon\Carbon::parse($booking->details[0]->departure_time)->isoFormat("HH:mm A") }}, {{ \Carbon\Carbon::parse($booking->details[0]->date)->isoFormat('ddd, MMM DD, YYYY') }}</p>
                            </div>
                            <div class="p-2">
                                <p class="text-base">{{ $booking->details[0]->arrival_address.', '.$booking->details[0]->to}}</p>
                                <p class="text-base">{{ \Carbon\Carbon::parse($booking->details[0]->arrival_time)->isoFormat("HH:mm A") }}, {{ \Carbon\Carbon::parse($booking->details[0]->date)->isoFormat('ddd, MMM DD, YYYY') }}</p>
                            </div>
                        </div>
                    </div>
                @elseif($booking->bookable instanceof \App\Models\Tour\Tour)
                    <div class="flex justify-center py-2">
                        <h3 class="text-rose-700 font-semibold text-center">{{ $booking->details[0]->bookable_name}}</h3>
                    </div>
                    <div class="px-8 py-4">
                        <div class="pb-2 text-sm grid grid-cols-2">
                            <span class="flex justify-start">Booking Status: {{ $booking->status ? 'Accepted' : 'Pending' }}</span>
                            <span class="flex justify-end">Payment Status: {{ $booking->payment_status ? 'Accepted' : 'Pending' }}</span>
                        </div>
                        <h3 class="text-rose-700 font-semibold">Trip Details</h3>
                        <div class="grid grid-cols-2">
                            <div class="pt-2 px-2 flex justify-start">
                                <span class="text-base">Category: </span>
                                <span class="text-base">{{ $booking->details[0]->category_name ?? null }}</span>
                            </div>
                            <div class="pt-2 px-2  flex justify-end">
                                <span class="text-base">Code: </span>
                                <span class="text-base">{{ $booking->details[0]->code }}</span>
                            </div>
                            <div class="px-2 flex justify-start">
                                <span class="text-base">Grade: </span>
                                <span class="text-base">{{ $booking->details[0]->grade }}</span>
                            </div>
                            <div class="px-2 flex justify-end">
                                <span class="text-base">Season: </span>
                                <span class="text-base">{{ $booking->details[0]->seasons }}</span>
                            </div>
                            <div class="px-2 flex justify-start">
                                <span class="text-base">Route: </span>
                                <span class="text-base">{{ $booking->details[0]->route }}</span>
                            </div>
                            <div class="px-2 flex justify-end">
                                <span class="text-base">Price: </span>
                                <span class="text-base">NRs {{ $booking->booking_price }}</span>
                            </div>
                        </div>
                    </div>

                @endif
                <div class="px-8">
                    <h3 class="text-rose-700 font-semibold">Booking Details</h3>
                    @foreach($booking->details as $key=>$detail)
                        <span class="text-sm py-2 text-rose-700">Passenger {{ $key+1 }} Details</span>
                        <div class="grid grid-cols-2 px-2">
                            <div class="">
                                <label class="flex">
                                    <span class="text-base">Name: </span>
                                    <span class="text-base">{{ $detail->name }}</span>
                                </label>
                            </div>
                            <div class="">
                                <label class="flex">
                                    <span class="text-base">Email: </span>
                                    <span class="text-base">{{ $detail->email }}</span>
                                </label>
                            </div>
                            <div class="">
                                <label class="flex">
                                    <span class="text-base">Address: </span>
                                    <span class="text-base">{{ $detail->address }}</span>
                                </label>
                            </div>
                            <div class="">
                                <label class="flex">
                                    <span class="text-base">Phone: </span>
                                    <span class="text-base">{{ $detail->phone }}</span>
                                </label>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="py-4 flex justify-center">
                    <a href="{{ route('front.bookings.index') }}"  class="text-rose-700 px-8">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
