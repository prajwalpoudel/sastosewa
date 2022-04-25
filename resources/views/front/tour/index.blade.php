@extends('front.layouts.app')

@section('content')
    <section id="tours-section">
        <div class="banner w-full h-72 bg-gray-100">
            <img class="w-full h-72 object-cover" src="{{ asset('images/everest.jpg') }}" alt="">
        </div>

        <div class="content-container text-neutral-700 tracking-wider text-lg">
            <div class="my-2 px-8 py-4">
                <p class="">
                    Namaste Nepal Travels Welcomes to you the Himalayan Country of Nepal and Unique Country in the
                    world.
                    Himalayan Country of Nepal is 60 meters to 8,848 meters above from sea level which is highest peak
                    in the world
                    Mt. Everest. Unique Country in the world, Nepal has Deepest George in the world(Kaligandagi George)
                    & Highest Lake
                    in the world(Tilicho Lake) are located in Nepal.
                    Namaste Nepal Travels is Travels and Adventure Company with Government Authorized legal Documents.
                    Our team provides Travel,
                    Tours in Nepal, Trekking in Nepal, Holiday Packages and Adventure expeditions in the Himalayan
                    Country of Nepal.
                    Namaste Nepal Travels Provide Tibet Tour, Bhutan Tour, & many more holiday package for different
                    countries and destinations.
                    We established Namaste Nepal Travels & Tours, with the aim of allowing Excellence Services for Tours
                    in Nepal, Trekking in Nepal,
                    Himalayan Region, Culture of Nepal, Sight Seeing Tour, Jungle Safari Tour, Hiking, Rafting,
                    Paragliding, Mountain Expedition
                    and Untouched beauty of Nature in Nepal.
                    For the Tours in Nepal, Trekkking in Nepal, Holidays and Air Ticketing, We offer and we are
                    committed to making your time in Nepal
                    special and unique experience with Namaste Nepal Travels. We will work with you to design a Tours,
                    Trekking, Hiking, Expedition & Holiday
                    Packages that includes everything you want to see and do. Please sent us an E-mail, we will creat
                    your Tour in Nepal, Trekking in Nepal,
                    Sight Seeing in Heritage Site and many more Trip will be your unforgatable trip in your Life.
                    For the Tours in Nepal, Trekkking in Nepal, Holidays and Air Ticketing, We offer and we are
                    committed to making your time in Nepal
                    special and unique experience with Namaste Nepal Travels. We will work with you to design a Tours,
                    Trekking, Hiking, Expedition & Holiday
                    Packages that includes everything you want to see and do. Please sent us an E-mail, we will creat
                    your Tour in Nepal, Trekking in Nepal,
                    Sight Seeing in Heritage Site and many more Trip will be your unforgatable trip in your Life.
                </p>

            </div>
            <div class="my-2 flex justify-center">
                <p class="text-title font-bold">Our Popular Tours</p>
            </div>

            <div class="grid grid-cols-3 my-2">
                @foreach($tours as $tour)
                    <div class="card group m-4 p-4 bg-white text-black hover:bg-primary hover:text-white">
                        <img class="object-cover h-60 w-full" src="{{ asset('images/mt-everest.jpg') }}" alt="">
                        <a href="{{ route('front.tour.show', $tour->id) }}"
                           class="text-secondary-title group-hover:text-white">{{ $tour->name }}</a>
                        <p>
                            {!! Str::limit($tour->description, 240) !!}
                        </p>
                        <div class="read-more">
                            <a href="{{ route('front.tour.show', $tour->id) }}"
                               class="read-more-button group-hover:bg-rose-700">Read More</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>
@endsection
