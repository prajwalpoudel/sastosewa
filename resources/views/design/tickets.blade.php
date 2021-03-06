@extends('design.layouts.app')
@section('content')
    <section id="tickets-section">
        <div class="banner w-full h-72 bg-gray-100 relative">
            <img class="w-full h-72 object-cover opacity-60" src="{{ asset('images/everest.jpg') }}" alt="">
            <div class="search absolute inset-y-4 left-8">
                <div class="text-white tracking-wider">
                    <p class="text-4xl font-bold uppercase">Sasto Sewa presents you sasto tickets.</p>
                    <p class="text-2xl font-medium capitalize my-4">Find your tickets Here.</p>
                </div>
                <div class="flex gap-2 font-semibold">
                    <div>
                        <label class="block ticket-input-label">
                            <span class="block text-normal">Origin</span>
                        </label>
                        <input type="text" placeholder="Email" class="text-input"/>
                    </div>
                    <div>
                        <label class="block ticket-input-label">
                            <span class="block text-normal">Destination</span>
                        </label>
                        <input type="text" placeholder="Email" class="text-input"/>
                    </div>
                    <div>
                        <label class="block ticket-input-label">
                            <span class="block text-normal">Departure Date</span>
                        </label>
                        <input type="text" placeholder="Email" class="text-input"/>
                    </div>
                    <div>
                        <label class="block ticket-input-label">
                            <span class="block text-normal">No. of Travellers</span>
                        </label>
                        <input type="text" placeholder="Email" class="text-input"/>
                    </div>
                    <div>
                        <label class="block ticket-input-label">
                            <span class="block text-normal">Nationality</span>
                        </label>
                        <input type="text" placeholder="Email" class="text-input"/>
                    </div>
                    <div class="ticket-search-div">
                        <button class="ticket-search-button bg-rose-700">
                            <i class="fa fa-search px-2"> </i>
                             Search </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-container text-neutral-700 tracking-wider text-lg">
            <div class="grid my-2">
                <div class="card group m-4 p-4 bg-white flex justify-between">
                    <div>
                        <img src="{{ asset('images/yeti-logo.png') }}" class="w-24 h-24 object-cover" alt="">
                        <p class="pt-1">Yeti Airlines</p>
                    </div>
                    <div class="departure-section text-right flex flex-col justify-between pl-40 py-4">
                        <h3 class="text-rose-700 font-semibold">Biratnagar(BIR)</h3>
                        <h6 class="ticket-time">20:30</h6>
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
                        <h3 class="text-rose-700 font-semibold">Kathmandu(KTM)</h3>
                        <h6 class="ticket-time">20:30</h6>
                        <h6 class="ticket-date">Tue, Apr 24, 2022</h6>
                    </div>
                    <div class="flex flex-col justify-between text-center py-4">
                        <h6 class="ticket-price">NPR 3300</h6>
                        <div class="button-div">
                            <button class="button bg-rose-700">Book Now</button>
                        </div>
                        <p class="ticket-type">Non refundable</p>
                    </div>
                </div>
                <div class="card group m-4 p-4 bg-white flex justify-between">
                    <div>
                        <img src="{{ asset('images/yeti-logo.png') }}" class="w-24 h-24 object-cover" alt="">
                        <p class="pt-1">Yeti Airlines</p>
                    </div>
                    <div class="departure-section text-right flex flex-col justify-between pl-40 py-4">
                        <h3 class="text-rose-700 font-semibold">Biratnagar(BIR)</h3>
                        <h6 class="ticket-time">20:30</h6>
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
                        <h3 class="text-rose-700 font-semibold">Kathmandu(KTM)</h3>
                        <h6 class="ticket-time">20:30</h6>
                        <h6 class="ticket-date">Tue, Apr 24, 2022</h6>
                    </div>
                    <div class="flex flex-col justify-between text-center py-4">
                        <h6 class="ticket-price">NPR 3300</h6>
                        <div class="button-div">
                            <button class="button bg-rose-700">Book Now</button>
                        </div>
                        <p class="ticket-type">Non refundable</p>
                    </div>
                </div>
                <div class="card group m-4 p-4 bg-white flex justify-between">
                    <div>
                        <img src="{{ asset('images/yeti-logo.png') }}" class="w-24 h-24 object-cover" alt="">
                        <p class="pt-1">Yeti Airlines</p>
                    </div>
                    <div class="departure-section text-right flex flex-col justify-between pl-40 py-4">
                        <h3 class="text-rose-700 font-semibold">Biratnagar(BIR)</h3>
                        <h6 class="ticket-time">20:30</h6>
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
                        <h3 class="text-rose-700 font-semibold">Kathmandu(KTM)</h3>
                        <h6 class="ticket-time">20:30</h6>
                        <h6 class="ticket-date">Tue, Apr 24, 2022</h6>
                    </div>
                    <div class="flex flex-col justify-between text-center py-4">
                        <h6 class="ticket-price">NPR 3300</h6>
                        <div class="button-div">
                            <button class="button bg-rose-700">Book Now</button>
                        </div>
                        <p class="ticket-type">Non refundable</p>
                    </div>
                </div>
                <div class="card group m-4 p-4 bg-white flex justify-between">
                    <div>
                        <img src="{{ asset('images/yeti-logo.png') }}" class="w-24 h-24 object-cover" alt="">
                        <p class="pt-1">Yeti Airlines</p>
                    </div>
                    <div class="departure-section text-right flex flex-col justify-between pl-40 py-4">
                        <h3 class="text-rose-700 font-semibold">Biratnagar(BIR)</h3>
                        <h6 class="ticket-time">20:30</h6>
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
                        <h3 class="text-rose-700 font-semibold">Kathmandu(KTM)</h3>
                        <h6 class="ticket-time">20:30</h6>
                        <h6 class="ticket-date">Tue, Apr 24, 2022</h6>
                    </div>
                    <div class="flex flex-col justify-between text-center py-4">
                        <h6 class="ticket-price">NPR 3300</h6>
                        <div class="button-div">
                            <button class="button bg-rose-700">Book Now</button>
                        </div>
                        <p class="ticket-type">Non refundable</p>
                    </div>
                </div>
                <div class="card group m-4 p-4 bg-white flex justify-between">
                    <div>
                        <img src="{{ asset('images/yeti-logo.png') }}" class="w-24 h-24 object-cover" alt="">
                        <p class="pt-1">Yeti Airlines</p>
                    </div>
                    <div class="departure-section text-right flex flex-col justify-between pl-40 py-4">
                        <h3 class="text-rose-700 font-semibold">Biratnagar(BIR)</h3>
                        <h6 class="ticket-time">20:30</h6>
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
                        <h3 class="text-rose-700 font-semibold">Kathmandu(KTM)</h3>
                        <h6 class="ticket-time">20:30</h6>
                        <h6 class="ticket-date">Tue, Apr 24, 2022</h6>
                    </div>
                    <div class="flex flex-col justify-between text-center py-4">
                        <h6 class="ticket-price">NPR 3300</h6>
                        <div class="button-div">
                            <button class="button bg-rose-700">Book Now</button>
                        </div>
                        <p class="ticket-type">Non refundable</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
