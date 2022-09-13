@extends('front.layouts.app')

@section('social-share')
    <meta property="og:title" content="{{ $tour->name }}" />
    <meta property="og:type" content="{{ $tour->category }}" />
    <meta property="og:url" content="{{ route('front.tour.show', $tour->id) }}" />
    <meta property="og:image" content="https://ia.media-imdb.com/images/rock.jpg" />
@endsection
@section('content')
    <section id="tour-section">
        <div class="banner w-full h-60 md:h-72 bg-gray-100">
            <img class="w-full h-60 md:h-72 object-cover" src="{{ asset('images/bouddha.jpg') }}" alt="">
        </div>

        <div class="content-container">
            <div class="lg:grid lg:grid-cols-3 md:gap-16 my-2">
                <div class="lg:col-span-2">
                    <p class="text-title">{{ $tour->name }}</p>
                    <div class="tour-image w-full h-96 md:h-128 my-4 relative">
                        <img class="w-full h-full object-cover" src="{{ asset('images/bouddha.jpg') }}" alt="">
                        <div class="flex justify-between gap-2 absolute bottom-4 left-4  text-center text-white font-bold">
                            <div class="w-24 h-8 bg-rose-700 py-1">13D 12N</div>
                            <div class="w-24 h-8 bg-rose-700 py-1">Npr {{$tour->price}}</div>
                        </div>
                    </div>
                    <div class="card my-4">
                        <ul class="flex flex-wrap md:flex-nowrap text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                            <li class="mr-2">
                                <button class="inline-block p-4 rounded-t-lg border-b-2 text-rose-700" id="description-tab" data-tabs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="false">Description</button>
                            </li>
                            <li class="mr-2">
                                <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent text-rose-700 hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="itinerary-tab" data-tabs-target="#itinerary" type="button" role="tab" aria-controls="itinerary" aria-selected="false">Itinerary</button>
                            </li>
                            <li class="mr-2">
                                <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent text-rose-700 hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="equipment-tab" data-tabs-target="#equipment" type="button" role="tab" aria-controls="equipment" aria-selected="false">Equipments</button>
                            </li>
                            <li>
                                <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent text-rose-700 hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="price-info-tab" data-tabs-target="#price-info" type="button" role="tab" aria-controls="price-info" aria-selected="false">Price Info</button>
                            </li>
                        </ul>
                        <div id="myTabContent">
                            <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="description" role="tabpanel" aria-labelledby="description-tab">
                                <p class="text-sm text-gray-500 dark:text-gray-400"> {!! $tour->description !!}</p>
                            </div>
                            <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="itinerary" role="tabpanel" aria-labelledby="itinerary-tab">
                                <p class="text-sm text-gray-500 dark:text-gray-400">{!! $tour->itinerary !!}</p>
                            </div>
                            <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="equipment" role="tabpanel" aria-labelledby="equipment-tab">
                                <p class="text-sm text-gray-500 dark:text-gray-400">{!! $tour->equipment !!}</p>
                            </div>
                            <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="price-info" role="tabpanel" aria-labelledby="price-info-tab">
                                <div class="md:flex md:justify-between md:gap-8">
                                    <div class="my-4 md:my-0">
                                        <div class="bg-rose-700 w-full py-2 text-center text-white">Price Included</div>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">{!! $tour->price_inclusive !!}</p>
                                    </div>

                                    <div class="my-4 md:my-0">
                                        <div class="bg-rose-700 w-full py-2 text-center text-white">Price Excluded</div>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">{!! $tour->price_exclusive !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::open(['route' => ['front.tour.book', encrypt($tour->id)], 'method'=>'GET']) !!}
                    <div class=" flex justify-start">
                        <div>
                            {!! Form::number('no_of_travellers', null, ['class' => $errors->first('no_of_travellers')  ? 'error-input' : 'text-input', 'placeholder' => 'No. of Travellers']) !!}
                        </div>
                        <button type="submit" class="text-base text-white rounded-sm bg-rose-700 px-4 ml-4 mt-1 py-1">
                            Book Now
                        </button>
{{--                        <a href="{{ route('front.tour.book', encrypt($tour->id)) }}" class="">Book now</a>--}}
                    </div>
                    {!! Form::close() !!}

                </div>
                <div>
                    <p class="text-title">Similar Tours</p>
                    <div class="card my-2">
                        <div class="divide-y-2">
                            @forelse($similarTours as $similarTour)
                                <div class="px-4 py-4">
                                    <a href="{{ route('front.tour.show', $similarTour->id) }}">
                                        {{$similarTour->name}}
                                    </a>
                                </div>
                            @empty
                                <div class="px-4 py-4">
                                    <p>No Similar Tours Found</p>
                                </div>
                            @endforelse
                        </div>

                    </div>
                    <div class="card my-8">
                        <div class="divide-y-2">
                            <div class="py-4 bg-gray-100">
                                <p class="h-full w-full text-center ">Share on</p>
                            </div>
                            <div class="px-4 py-4">
                                <div class="flex space-x-4 justify-center">
                                    <a href="{{ Share::currentPage()->facebook()->getRawLinks() }}" class="social-button ">
                                        <i class="fa-brands fa-facebook"></i>
                                    </a>
                                    <a href="{{ Share::currentPage()->facebook()->getRawLinks() }}" class="social-button ">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                    <a href="{{ Share::currentPage()->facebook()->getRawLinks() }}" class="social-button ">
                                        <i class="fa-brands fa-twitter"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
