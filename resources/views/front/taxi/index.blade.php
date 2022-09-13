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
    </style>
@endpush
@section('content')
    <section id="banner-section">
        <div class="relative">
            @if(count($sections['taxi_service_banner']['medias'])>0)
            @if($sections['taxi_service_banner']['medias'][0]['type'] == 'Image')
                <div
                    style="{{ 'background-image : url("'.   \Illuminate\Support\Facades\Storage::url($sections['taxi_service_banner']['medias'][0]['media']. '")')}}"
                    class="w-full h-72 object-cover banner-image">
            @else
                <video class="w-full h-72 object-cover banner-image" src="{{ \Illuminate\Support\Facades\Storage::url($sections['taxi_service_banner']['medias'][0]['media']) }}"></video>
            @endif
        @else
            <div class="w-full h-72 object-cover banner-image">
                @endif
                <div class="search absolute inset-y-4 left-8">
                    <div class="text-white tracking-wider">
                        <p class="text-4xl font-bold uppercase">{{ $sections['taxi_service_banner']['title'] ?? null}}</p>
                        <p class="text-2xl font-medium capitalize my-4">{{ $sections['taxi_service_banner']['description'] ?? null }}</p>
                    </div>
                    {!! Form::model(request()->all(), ['route' => 'front.ticket.search', 'method' => 'get', 'id' => 'search-form']) !!}
                        <div class="flex gap-2 font-semibold">
                            @include('front.ticket.search-form')
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>


            <div class="content-container text-neutral-700 tracking-wider text-lg">
                <div class="grid grid-cols-3 gap-2">
                    @forelse($taxies as $taxi)
                        <div class="card bg-white p-4 m-4">
                            <div class="grid grid-cols-3 gap-2 justify-between">
                                <div class="from ">
                                    <h3 class="text-right text-rose-700 font-semibold">{{ $taxi->from }}</h3>
                                </div>
                                <div class="flex justify-center">
                                    <img src="{{ asset('images/yeti-logo.png') }}"
                                         class="w-12 h-12 object-cover object-center" alt="">
                                </div>
                                <div class="to ">
                                    <h3 class="text-left text-rose-700 font-semibold">{{ $taxi->to }}</h3>
                                </div>
                            </div>
                            <div class="flex justify-center py-2">
                                <h3 class="text-rose-700 font-semibold text-center">NRs {{ $taxi->price }}</h3>
                            </div>
                            <div class="flex justify-center py-2">
                                <div class="button-div py-4">
                                    <a href="{{ route('front.taxi.book', ['id' => $taxi->id]) }}"
                                       class="button bg-rose-700 px-8">Book Now</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="m-4 p-4 flex justify-between">
                            <p class="text-no-ticket-title">No Taxi Found</p>
                        </div>
                    @endforelse
                </div>
            </div>
    </section>
@endsection
