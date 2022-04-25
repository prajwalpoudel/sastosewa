@extends('front.layouts.app')
@push('style')
    <style>
        .banner-image {
            position: relative;
            background-size: cover;
        }

        .banner-image:before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
        }

        .search {
            color: #FFF;
            /*position: relative;*/
        }

        .testimonial-image {
            position: relative;
            height: 100vh;
        }

        .testimonial-image:before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
        }

        .testimonial-content {
            color: #FFF;
            position: relative;
        }
    </style>
@endpush
@section('content')
    <section id="tickets-section">
        <div class="banner w-full h-72 bg-gray-100 relative">
            <div id="default-carousel" class="relative" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="overflow-hidden relative h-72">
                    @foreach($sections['home_banner']['medias'] as  $key => $media)
                        <div class="hidden duration-1200 ease-linear" data-carousel-item="{{ ($key == 0) ? 'active' : '' }}">
                            @if($media['type'] == 'Image')
                                <div style="{{ 'background-image : url("'.   \Illuminate\Support\Facades\Storage::url($media['media']. '")')}}"  class="w-full h-72 object-cover banner-image">
                                </div>
                            @else
                                <video class="w-full h-72 object-cover banner-image" src="{{ \Illuminate\Support\Facades\Storage::url($media['media']) }}"></video>
                            @endif
                            <div class="search absolute inset-y-4 left-8">
                                <div class="text-white tracking-wider">
                                    <p class="text-4xl font-bold uppercase">{{ $sections['home_banner']['title'] ?? null }}</p>
                                    <p class="text-2xl font-medium capitalize my-4">{{ $sections['home_banner']['description'] ?? null }}</p>
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
                                            Search
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Slider indicators -->
                <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
                    @foreach($sections['home_banner']['medias'] as $key => $media)
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide {{ $key + 1 }}"
                                data-carousel-slide-to="{{ $key }}"></button>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="content-container my-2">
            <div class="first_section">
                <div class="grid grid-cols-3 gap-8">
                    <div class="col-span-2">
                        <div class="text-title text-capitalize font-medium">
                            <p>{{ $sections['home_about']['title'] ?? null }}</p>
                        </div>
                        <div class="about-content my-2">
                            <p>{{ $sections['home_about']['description'] ?? null }}
                            </p>
                        </div>
                        <div class="button-div py-4">
                            <a href="{{ route('front.about.index') }}" class="button bg-rose-700 px-8">Read More</a>
                        </div>
                    </div>
                    <div>
                        <div class="text-title font-medium text-center">
                            <p>Our Services</p>
                        </div>
                        <div class="card my-2">
                            <div class="divide-y-2">
                                <div class="px-4 py-4 text-lg">
                                    <a class="text-rose-700 hover:text-primary" href="{{ route('front.ticket.index') }}">
                                        Tickets
                                    </a>
                                </div>
                                <div class="px-4 py-4 text-lg">
                                    <a class="text-rose-700 hover:text-primary" href="{{ route('front.tour.index') }}">
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
                    @foreach($tours as $tour)
                        <div class="card group m-4 p-4 text-black">
                        <img class="object-cover h-60 w-full" src="{{ asset('images/mt-everest.jpg') }}" alt="">
                        <div class="text-service-title">
                            <a href="{{ route('front.tour.show', $tour->id) }}">{{ $tour->name }}</a>
                        </div>
                        <p>
                            {!! Str::limit($tour->description, 400) !!}
                        </p>
                        <div class="button-div">
                            <a href="{{ route('front.tour.show', $tour->id) }}" class="button bg-rose-700 w-full p-2">Read More</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="testimonials_section my-2">
            <div class="text-title text-capitalize text-center my-2 font-bold">
                <p>Testimonials</p>
            </div>
            <div class="bg-everest bg-center bg-fixed testimonial-image">
                <div class="testimonial-content">
                    <p class="text-white text-xl font-medium">Plan Nepal Travels & Tours (p.) Ltd. a leading online
                        travel agency in Nepal.
                        A Destination Management Company in Nepal, We are one of key travel agents in Nepal that brings
                        tours of "Incredible Nepal",
                        the country that has mystified the world for centuries. Your tour to Nepal, a colorfully diverse
                        country,
                        will enchant you with the beauty of its Culture, Mountain and Nature. These tours to Nepal will
                        enrich you with its culture,
                        heritage, wildlife, flora & fauna, folklore, festivals, spirituality, philosophy and at the same
                        time surprise you with
                        its modernity. Nepal tour & travel packages also offers the welcoming smile of hospitable people
                        who make it a must experience
                        destination.</p>
                    <p>Plan Nepal Travels & Tours (p.) Ltd. a leading online travel agency in Nepal.
                        A Destination Management Company in Nepal, We are one of key travel agents in Nepal that brings
                        tours of "Incredible Nepal",
                        the country that has mystified the world for centuries. Your tour to Nepal, a colorfully diverse
                        country,
                        will enchant you with the beauty of its Culture, Mountain and Nature. These tours to Nepal will
                        enrich you with its culture,
                        heritage, wildlife, flora & fauna, folklore, festivals, spirituality, philosophy and at the same
                        time surprise you with
                        its modernity. Nepal tour & travel packages also offers the welcoming smile of hospitable people
                        who make it a must experience
                        destination.</p>
                    <p>Plan Nepal Travels & Tours (p.) Ltd. a leading online travel agency in Nepal.
                        A Destination Management Company in Nepal, We are one of key travel agents in Nepal that brings
                        tours of "Incredible Nepal",
                        the country that has mystified the world for centuries. Your tour to Nepal, a colorfully diverse
                        country,
                        will enchant you with the beauty of its Culture, Mountain and Nature. These tours to Nepal will
                        enrich you with its culture,
                        heritage, wildlife, flora & fauna, folklore, festivals, spirituality, philosophy and at the same
                        time surprise you with
                        its modernity. Nepal tour & travel packages also offers the welcoming smile of hospitable people
                        who make it a must experience
                        destination.</p>
                    <p>Plan Nepal Travels & Tours (p.) Ltd. a leading online travel agency in Nepal.
                        A Destination Management Company in Nepal, We are one of key travel agents in Nepal that brings
                        tours of "Incredible Nepal",
                        the country that has mystified the world for centuries. Your tour to Nepal, a colorfully diverse
                        country,
                        will enchant you with the beauty of its Culture, Mountain and Nature. These tours to Nepal will
                        enrich you with its culture,
                        heritage, wildlife, flora & fauna, folklore, festivals, spirituality, philosophy and at the same
                        time surprise you with
                        its modernity. Nepal tour & travel packages also offers the welcoming smile of hospitable people
                        who make it a must experience
                        destination.</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        $('.banner').hover(function() {
            $('#default-carousel').attr('data-carousel', 'static');
        });
    </script>
@endpush
