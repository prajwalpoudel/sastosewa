@extends('front.layouts.app')

@section('social-share')
    <meta property="og:title" content="{{ $tour->name }}" />
    <meta property="og:type" content="{{ $tour->category }}" />
    <meta property="og:url" content="{{ route('front.tour.show', $tour->id) }}" />
    <meta property="og:image" content="https://ia.media-imdb.com/images/rock.jpg" />
@endsection
@section('content')
    <section id="tour-section">
        <div class="banner w-full h-72 bg-gray-100">
            <img class="w-full h-72 object-cover" src="{{ asset('images/bouddha.jpg') }}" alt="">
        </div>

        <div class="content-container">
            <div class="grid grid-cols-3 gap-16 my-2">
                <div class="col-span-2">
                    <p class="text-title">{{ $tour->name }}</p>
                    <div class="tour-image w-full h-128 my-4">
                        <img class="w-full h-full object-cover" src="{{ asset('images/bouddha.jpg') }}" alt="">
                    </div>

                    <div class="card my-4">
                        <ul class="flex text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                            <li class="mr-2">
                                <button class="inline-block p-4 rounded-t-lg border-b-2" id="description-tab" data-tabs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="false">Description</button>
                            </li>
                            <li class="mr-2">
                                <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="itinerary-tab" data-tabs-target="#itinerary" type="button" role="tab" aria-controls="itinerary" aria-selected="false">Itinerary</button>
                            </li>
                            <li class="mr-2">
                                <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Settings</button>
                            </li>
                            <li>
                                <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab" aria-controls="contacts" aria-selected="false">Contacts</button>
                            </li>
                        </ul>
                        <div id="myTabContent">
                            <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="description" role="tabpanel" aria-labelledby="description-tab">
                                <p class="text-sm text-gray-500 dark:text-gray-400"> {!! $tour->description !!}</p>
                            </div>
                            <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="itinerary" role="tabpanel" aria-labelledby="itinerary-tab">
                                <p class="text-sm text-gray-500 dark:text-gray-400">{!! $tour->itinerary !!}</p>
                            </div>
                            <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Settings tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                            </div>
                            <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
                                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Contacts tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div>
                    <p class="text-title">Similar Tours</p>
                    <div class="card my-2">
                        <div class="divide-y-2">
                            <div class="px-4 py-4">
                                <a href="{{ url('design/tours') }}">
                                    Nepal Family Tours
                                </a>
                            </div>
                            <div class="px-4 py-4">
                                <a href="{{ url('design/tours') }}">
                                    Nepal Family Tours
                                </a>
                            </div>
                            <div class="px-4 py-4">
                                <a href="{{ url('design/tours') }}">
                                    Nepal Family Tours
                                </a>
                            </div>
                            <div class="px-4 py-4">
                                <a href="{{ url('design/tours') }}">
                                    Nepal Family Tours
                                </a>
                            </div>
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
                                    <i class="fa-brands fa-instagram"></i>
                                    <i class="fa-brands fa-twitter"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
