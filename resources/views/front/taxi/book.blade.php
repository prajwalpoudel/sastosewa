@extends('front.layouts.app')
@section('content')
    <section id="ticket-book-section">
        <div class="content-container text-neutral-700 tracking-wider text-lg my-8">
            <div class="card bg-white p-4 mx-12 my-4">
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
                <div class="px-8 py-4">
                    <h3 class="text-rose-700 font-semibold">Booking Details</h3>
                    {!! Form::open(['route' => 'front.taxi.book.store', 'method' => 'post']) !!}
                    {!! Form::hidden('taxi_detail_id', $taxi->id) !!}
                    {!! Form::hidden('user_id', getAuthenticatedUser('front', 'id')) !!}
                    {!! Form::hidden('name', getAuthenticatedUser('front', 'name')) !!}
                    {!! Form::hidden('email', getAuthenticatedUser('front', 'email')) !!}
                    {!! Form::hidden('address', getAuthenticatedUser('front', 'address')) !!}
                    {!! Form::hidden('phone', getAuthenticatedUser('front', 'phone')) !!}

                    <div class="grid grid-cols-2">
                        <div class="flex ">
                            <p class="px-2">Name: </p>
                            <p class="px-2">{{ getAuthenticatedUser('front', 'name') }} </p>
                        </div>
                        <div class="flex">
                            <p class="px-2">Email: </p>
                            <p class="px-2">{{ getAuthenticatedUser('front', 'email') }} </p>
                        </div>
                        <div class="flex">
                            <p class="px-2">Address: </p>
                            <p class="px-2">{{ getAuthenticatedUser('front', 'address') }} </p>
                        </div>
                        <div class="flex">
                            <p class="px-2">Phone: </p>
                            <p class="px-2">{{ getAuthenticatedUser('front', 'phone') }} </p>
                        </div>
                    </div>


{{--                    <div class="grid grid-cols-2 gap-4">--}}
{{--                        <div>--}}
{{--                            <label class="block">--}}
{{--                                <span class="block text-normal">Name</span>--}}
{{--                            </label>--}}
{{--                            {!! Form::text('name', null, ['class' => 'text-input', 'placeholder' => 'Name']) !!}--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <label class="block">--}}
{{--                                <span class="block text-normal">Address</span>--}}
{{--                            </label>--}}
{{--                            {!! Form::text('address', null, ['class' => 'text-input', 'placeholder' => 'Address']) !!}--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <label class="block">--}}
{{--                                <span class="block text-normal">Phone</span>--}}
{{--                            </label>--}}
{{--                            {!! Form::text('phone', null, ['class' => 'text-input', 'placeholder' => 'Phone']) !!}--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <label class="block">--}}
{{--                                <span class="block text-normal">Email</span>--}}
{{--                            </label>--}}
{{--                            {!! Form::text('email', null, ['class' => 'text-input', 'placeholder' => 'Email']) !!}--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="button-div py-4">
                        <button type="submit" class="button bg-rose-700 px-8">
                            Submit
                        </button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>




        </div>
    </section>
@endsection
