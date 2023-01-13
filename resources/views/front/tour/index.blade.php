@extends('front.layouts.app')

@section('content')
    <section id="tours-section">
        <div class="banner w-full h-72 bg-gray-100">
            <img class="w-full h-72 object-cover" src="{{ asset('images/everest.jpg') }}" alt="">
        </div>

        <div class="content-container text-neutral-700 tracking-wider text-lg">
            <div class="my-2 flex justify-center">
                <p class="text-title font-bold text-center">Our Popular Tours</p>
            </div>

            <div class="grid md:grid-cols-3 my-2">
                @foreach($tours as $tour)
                    <div class="card group m-4 p-4 bg-white text-black hover:bg-rose-700 hover:text-white">
                        <img class="object-cover h-60 w-full" src="{{ asset('images/mt-everest.jpg') }}" alt="">
                        <a href="{{ route('front.tour.show', $tour->id) }}"
                           class="text-secondary-title group-hover:text-white">{{ $tour->name }}</a>
                        <p>
                            {!! Str::limit($tour->description, 240) !!}
                        </p>
                        <div class="read-more">
                            <a href="{{ route('front.tour.show', $tour->id) }}"
                               class="read-more-button group-hover:bg-primary">Read More</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>
@endsection
