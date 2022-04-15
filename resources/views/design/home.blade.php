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
        <div class="content-container my-2">
            <div class="first_section">
                <div class="grid grid-cols-3 gap-8">
                    <div class="col-span-2">
                        <div class="text-title text-capitalize font-medium">
                            <p >Welcome to Sasto travels and tours</p>
                        </div>
                        <div class="about-content my-2">
                            <p>Plan Nepal Travels & Tours (p.) Ltd. a leading online travel agency in Nepal.
                                A Destination Management Company in Nepal, We are one of key travel agents in Nepal that brings tours of "Incredible Nepal",
                                the country that has mystified the world for centuries. Your tour to Nepal, a colorfully diverse country,
                                will enchant you with the beauty of its Culture, Mountain and Nature. These tours to Nepal will enrich you with its culture,
                                heritage, wildlife, flora & fauna, folklore, festivals, spirituality, philosophy and at the same time surprise you with
                                its modernity. Nepal tour & travel packages also offers the welcoming smile of hospitable people who make it a must experience
                                destination.
                            </p>
                            <p>
                                Plan Nepal Travels & Tours (p.) Ltd. a leading online travel agency in Nepal.
                                A Destination Management Company in Nepal, We are one of key travel agents in Nepal that brings tours of "Incredible Nepal",
                                the country that has mystified the world for centuries.
                            </p>
                        </div>
                        <div class="button-div">
                            <button class="button bg-rose-700 px-8">Read More</button>
                        </div>
                    </div>
                    <div>
                        <div class="text-title font-medium text-center">
                            <p>Our Services</p>
                        </div>
                        <div class="card my-2">
                            <div class="divide-y-2">
                                <div class="px-4 py-4 text-lg">
                                    <a class="text-rose-700 hover:text-primary" href="{{ url('design/tours') }}">
                                        Tickets
                                    </a>
                                </div>
                                <div class="px-4 py-4 text-lg">
                                    <a class="text-rose-700 hover:text-primary" href="{{ url('design/tours') }}">
                                        Tours
                                    </a>
                                </div>
                                <div class="px-4 py-4 text-lg">
                                    <a class="text-rose-700 hover:text-primary" href="{{ url('design/tours') }}">
                                        Driving School
                                    </a>
                                </div>
                                <div class="px-4 py-4 text-lg">
                                    <a class="text-rose-700 hover:text-primary" href="{{ url('design/tours') }}">
                                        Labour
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="second_section my-4">
                <div class="text-title text-capitalize text-center my-2 font-bold">
                    <p>Popular Tours</p>
                </div>
                <div class="grid grid-cols-3 gap-1">
                    <div class="card group m-4 p-4 text-black">
                        <img class="object-cover h-60 w-full" src="{{ asset('images/mt-everest.jpg') }}" alt="">
                        <div class="text-service-title">
                            <a href="{{ url('design/tour') }}">Nepal Tours</a>
                        </div>
                        <p>
                            Tours in Nepal with Namaste Nepal Travels provides Tours in Nepal, ancient culture, Himalayan Tours/Trekking,
                            Natural Tours and Sports Activities. Tours in Nepal is most popular destination for holidays,
                            Adventure and Couple/Honeymoon tours in the world.
                        </p>
                        <div class="button-div">
                            <button class="button bg-rose-700 w-full p-2">Read More</button>
                        </div>
                    </div>
                    <div class="card group m-4 p-4 text-black">
                        <img class="object-cover h-60 w-full" src="{{ asset('images/mt-everest.jpg') }}" alt="">
                        <div class="text-service-title">
                            <a href="{{ url('design/tour') }}">Nepal Tours</a>
                        </div>
                        <p>
                            Tours in Nepal with Namaste Nepal Travels provides Tours in Nepal, ancient culture, Himalayan Tours/Trekking,
                            Natural Tours and Sports Activities. Tours in Nepal is most popular destination for holidays,
                            Adventure and Couple/Honeymoon tours in the world.
                        </p>
                        <div class="button-div">
                            <button class="button bg-rose-700 w-full p-2">Read More</button>
                        </div>
                    </div>
                    <div class="card group m-4 p-4 text-black">
                        <img class="object-cover h-60 w-full" src="{{ asset('images/mt-everest.jpg') }}" alt="">
                        <div class="text-service-title">
                            <a href="{{ url('design/tour') }}">Nepal Tours</a>
                        </div>
                        <p>
                            Tours in Nepal with Namaste Nepal Travels provides Tours in Nepal, ancient culture, Himalayan Tours/Trekking,
                            Natural Tours and Sports Activities. Tours in Nepal is most popular destination for holidays,
                            Adventure and Couple/Honeymoon tours in the world.
                        </p>
                        <div class="button-div">
                            <button class="button bg-rose-700 w-full p-2">Read More</button>
                        </div>
                    </div>
                    <div class="card group m-4 p-4 text-black">
                        <img class="object-cover h-60 w-full" src="{{ asset('images/mt-everest.jpg') }}" alt="">
                        <div class="text-service-title">
                            <a href="{{ url('design/tour') }}">Nepal Tours</a>
                        </div>
                        <p>
                            Tours in Nepal with Namaste Nepal Travels provides Tours in Nepal, ancient culture, Himalayan Tours/Trekking,
                            Natural Tours and Sports Activities. Tours in Nepal is most popular destination for holidays,
                            Adventure and Couple/Honeymoon tours in the world.
                        </p>
                        <div class="button-div">
                            <button class="button bg-rose-700 w-full p-2">Read More</button>
                        </div>
                    </div>
                    <div class="card group m-4 p-4 text-black">
                        <img class="object-cover h-60 w-full" src="{{ asset('images/mt-everest.jpg') }}" alt="">
                        <div class="text-service-title">
                            <a href="{{ url('design/tour') }}">Nepal Tours</a>
                        </div>
                        <p>
                            Tours in Nepal with Namaste Nepal Travels provides Tours in Nepal, ancient culture, Himalayan Tours/Trekking,
                            Natural Tours and Sports Activities. Tours in Nepal is most popular destination for holidays,
                            Adventure and Couple/Honeymoon tours in the world.
                        </p>
                        <div class="button-div">
                            <button class="button bg-rose-700 w-full p-2">Read More</button>
                        </div>
                    </div>
                    <div class="card group m-4 p-4 text-black">
                        <img class="object-cover h-60 w-full" src="{{ asset('images/mt-everest.jpg') }}" alt="">
                        <div class="text-service-title">
                            <a href="{{ url('design/tour') }}">Nepal Tours</a>
                        </div>
                        <p>
                            Tours in Nepal with Namaste Nepal Travels provides Tours in Nepal, ancient culture, Himalayan Tours/Trekking,
                            Natural Tours and Sports Activities. Tours in Nepal is most popular destination for holidays,
                            Adventure and Couple/Honeymoon tours in the world.
                        </p>
                        <div class="button-div">
                            <button class="button bg-rose-700 w-full p-2">Read More</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="testimonials_section my-2">
            <div class="text-title text-capitalize text-center my-2 font-bold">
                <p>Testimonials</p>
            </div>
            <div class="after:bg-everest bg-center bg-fixed after:opacity-80 -z-10">
                <p class="text-white text-xl font-medium">Plan Nepal Travels & Tours (p.) Ltd. a leading online travel agency in Nepal.
                    A Destination Management Company in Nepal, We are one of key travel agents in Nepal that brings tours of "Incredible Nepal",
                    the country that has mystified the world for centuries. Your tour to Nepal, a colorfully diverse country,
                    will enchant you with the beauty of its Culture, Mountain and Nature. These tours to Nepal will enrich you with its culture,
                    heritage, wildlife, flora & fauna, folklore, festivals, spirituality, philosophy and at the same time surprise you with
                    its modernity. Nepal tour & travel packages also offers the welcoming smile of hospitable people who make it a must experience
                    destination.</p>
                <p>Plan Nepal Travels & Tours (p.) Ltd. a leading online travel agency in Nepal.
                    A Destination Management Company in Nepal, We are one of key travel agents in Nepal that brings tours of "Incredible Nepal",
                    the country that has mystified the world for centuries. Your tour to Nepal, a colorfully diverse country,
                    will enchant you with the beauty of its Culture, Mountain and Nature. These tours to Nepal will enrich you with its culture,
                    heritage, wildlife, flora & fauna, folklore, festivals, spirituality, philosophy and at the same time surprise you with
                    its modernity. Nepal tour & travel packages also offers the welcoming smile of hospitable people who make it a must experience
                    destination.</p>
                <p>Plan Nepal Travels & Tours (p.) Ltd. a leading online travel agency in Nepal.
                    A Destination Management Company in Nepal, We are one of key travel agents in Nepal that brings tours of "Incredible Nepal",
                    the country that has mystified the world for centuries. Your tour to Nepal, a colorfully diverse country,
                    will enchant you with the beauty of its Culture, Mountain and Nature. These tours to Nepal will enrich you with its culture,
                    heritage, wildlife, flora & fauna, folklore, festivals, spirituality, philosophy and at the same time surprise you with
                    its modernity. Nepal tour & travel packages also offers the welcoming smile of hospitable people who make it a must experience
                    destination.</p>
                <p>Plan Nepal Travels & Tours (p.) Ltd. a leading online travel agency in Nepal.
                    A Destination Management Company in Nepal, We are one of key travel agents in Nepal that brings tours of "Incredible Nepal",
                    the country that has mystified the world for centuries. Your tour to Nepal, a colorfully diverse country,
                    will enchant you with the beauty of its Culture, Mountain and Nature. These tours to Nepal will enrich you with its culture,
                    heritage, wildlife, flora & fauna, folklore, festivals, spirituality, philosophy and at the same time surprise you with
                    its modernity. Nepal tour & travel packages also offers the welcoming smile of hospitable people who make it a must experience
                    destination.</p>
            </div>
        </div>
    </section>
@endsection
