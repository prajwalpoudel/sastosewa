@extends('front.layouts.app')
@section('content')
    <section id="tickets-section">
        <div class="banner w-full h-72 bg-gray-100">
            <img class="w-full h-72 object-cover opacity-60" src="{{ asset('images/everest.jpg') }}" alt="">
        </div>

        <div class="content-container text-neutral-700 tracking-wider text-lg">
            {!! Form::open(['route' => 'front.labor.index', 'method' => 'get', 'id' => 'labor-form']) !!}
            <div class="flex justify-center w-full pt-4 px-8">
                <div class="w-full">
                    <label class="block">
                        <span class="block text-normal">Select Country</span>
                    </label>
                    {!! Form::select('country_id', $countries, null, ['class' => $errors->first('country_id')  ? 'error-input' : 'text-input', 'placeholder' => 'Select Country', 'id'=>'country-select']) !!}
                </div>
            </div>
            {!! Form::close() !!}
            <div class="tour_section my-4 px-8">
                <div class="text-title text-capitalize text-center my-2 font-bold">
                    <p>Popular Countries</p>
                </div>
                <div class="grid md:grid-cols-3 gap-1">
                    @foreach($popularLabor as $labor)
                        <div class="card group m-4 p-4 text-black">
                        <img class="object-cover h-60 w-full" src="{{ getImageUrl($labor->country->image) }}" alt="">
                        <div class="text-service-title">
                            <a href="{{ route('front.labor.show', $labor->id) }}">{{ $labor->country->name ?? null }}</a>
                        </div>
                        {!! \Illuminate\Support\Str::limit($labor->country->description ?? '', 180, '...') !!}
                        <div class="button-div">
                            <a href="{{ route('front.labor.show', $labor->id) }}"
                               class="button bg-rose-700 w-full p-2">Read More</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $("#country-select").change(function () {
                $("#labor-form").submit();
            })
        });
    </script>
@endpush
