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
            /*height: 100vh;*/
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
        <div class="banner w-full h-72 bg-gray-100 relative z-0">
            <div id="default-carousel" class="relative" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="overflow-hidden relative h-72">
                    @foreach($sections['home_banner']['medias'] as  $key => $media)
                        <div class="hidden duration-1200 ease-linear"
                             data-carousel-item="{{ ($key == 0) ? 'active' : '' }}">
                            @if($media['type'] == 'Image')
                                <div
                                    style="{{ 'background-image : url("'.   \Illuminate\Support\Facades\Storage::url($media['media']. '")')}}"
                                    class="w-full h-72 object-cover banner-image">
                                </div>
                            @else
                                <video class="w-full h-72 object-cover banner-image"
                                       src="{{ \Illuminate\Support\Facades\Storage::url($media['media']) }}"></video>
                            @endif
                            <div class="hidden md:block search absolute inset-y-4 left-8">
                                <div class="text-white tracking-wider">
                                    <p class="text-4xl font-bold uppercase">{{ $sections['home_banner']['title'] ?? null }}</p>
                                    <p class="text-2xl font-medium capitalize my-4">{{ $sections['home_banner']['description'] ?? null }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Slider indicators -->
                <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
                    @foreach($sections['home_banner']['medias'] as $key => $media)
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false"
                                aria-label="Slide {{ $key + 1 }}"
                                data-carousel-slide-to="{{ $key }}"></button>
                    @endforeach
                </div>

                <div class="hidden md:block md:flex md:gap-2 font-semibold absolute z-30 top-28 left-8">
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


        <div class="content-container my-2">
            <div class="first_section">
                <div class="grid md:grid-cols-3 md:gap-8">
                    <div class="md:col-span-2">
                        <div class="text-title text-capitalize font-medium">
                            <p>{{ $sections['home_about']['title'] ?? null }}</p>
                        </div>
                        <div class="about-content my-2">
                            <p>{{ \Illuminate\Support\Str::limit($sections['home_about']['description'], 600) ?? null }}
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
                        <div class="card my-2 text-center md:text-left">
                            <div class="divide-y-2">
                                <div class="px-4 py-4 text-lg">
                                    <a class="text-rose-700 hover:text-primary"
                                       href="{{ route('front.ticket.index') }}">
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
            @if($tours->count())
                <div class="tour_section my-4">
                    <div class="text-title text-capitalize text-center my-2 font-bold">
                        <p>Popular Tours</p>
                    </div>
                    <div class="grid md:grid-cols-3 gap-1">
                        @foreach($tours as $tour)
                            <div class="card group m-4 p-4 text-black">
                                <img class="object-cover h-60 w-full" src="{{ asset('images/mt-everest.jpg') }}" alt="">
                                <div class="text-service-title">
                                    <a href="{{ route('front.tour.show', $tour->id) }}">{{ $tour->name }}</a>
                                </div>
                                <p>
                                    {!! Str::limit($tour->description, 200) !!}
                                </p>
                                <div class="button-div">
                                    <a href="{{ route('front.tour.show', $tour->id) }}"
                                       class="button bg-rose-700 w-full p-2">Read More</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
        @if($testimonials->count())
            <div class="testimonials_section mt-2 tracking-wider">
                <div class="text-title text-capitalize text-center my-2 font-bold">
                    <p>Testimonials</p>
                </div>
                <div class="bg-everest bg-center bg-fixed testimonial-image h-[36rem]">
                    @if($testimonials->count() > 1)
                        <div id="default-carousel" class="relative" data-carousel="slide">
                            <!-- Carousel wrapper -->
                            <div class="overflow-hidden relative h-[36rem]">
                                @foreach($testimonials as  $key => $testimonial)
                                    <div class="hidden duration-2000 ease-linear"
                                         data-carousel-item="{{ $key == 0 ? 'active' : '' }}">
                                        <div class="testimonial-content flex flex-col items-center">
                                            <div class="client-image my-8">
                                                <img
                                                    src="{{ \Illuminate\Support\Facades\Storage::url($testimonial->image) }}"
                                                    class="rounded-full h-32 w-32"
                                                    alt="">
                                            </div>
                                            <div class="client-content px-12 md:px-60 font-medium">
                                                <p>{!! $testimonial->description !!}</p>
                                            </div>
                                            <div class="client-intro px-12 md:px-60 my-12 ">
                                                <p class="font-bold text-2xl text-center">{{ $testimonial->name }}</p>
                                                <p>{{ $testimonial->position .', '. $testimonial->company }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- Slider indicators -->
                            <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
                                @foreach($testimonials as $key => $testimonial)
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false"
                                        aria-label="Slide {{ $key +1 }}"
                                        data-carousel-slide-to="{{ $key }}"></button>
                                @endforeach
                            </div>
                            <!-- Slider Controls -->
                            <button type="button" class="flex absolute top-0 left-0 z-30 justify-center
                                items-center px-4 h-full cursor-pointer group focus:outline-none"
                                    data-carousel-prev>
                            <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10
                                        sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50
                                        dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white
                                        dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                                     stroke="currentColor" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 19l-7-7 7-7">

                                    </path>
                                </svg>
                                <span class="hidden">Previous</span>
                            </span>
                            </button>
                            <button type="button" class="flex absolute top-0 right-0 z-30 justify-center items-center
                                                        px-4 h-full cursor-pointer group focus:outline-none"
                                    data-carousel-next>
                            <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10
                                            bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50
                                            dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white
                                            dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                                     stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 5l7 7-7 7">
                                    </path>
                                </svg>
                                <span class="hidden">Next</span>
                            </span>
                            </button>
                        </div>
                    @else
                        <div class="testimonial-content flex flex-col items-center">
                            <div class="client-image my-8">
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($testimonials[0]->image) }}"
                                     class="rounded-full h-32 w-32"
                                     alt="">
                            </div>
                            <div class="client-content px-60 font-medium">
                                <p>{!! $testimonials[0]->description !!}</p>
                            </div>
                            <div class="client-intro px-60 my-12 ">
                                <p class="font-bold text-2xl text-center">{{ $testimonials[0]->name }}</p>
                                <p>{{ $testimonials[0]->position .', '. $testimonials[0]->company }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endif
    </section>
@endsection

@push('script')
{{--    <script>--}}
{{--        $('.banner').hover(function () {--}}
{{--            $('#default-carousel').attr('data-carousel', 'static');--}}
{{--        });--}}
{{--    </script>--}}
@endpush
