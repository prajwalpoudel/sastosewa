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
                        <h3 class="text-rose-700 font-semibold text-center">NRs {{ $taxi->price }}</h3>
                    </div>
                    <div class="to ">
                        <h3 class="text-left text-rose-700 font-semibold">{{ $taxi->to }}</h3>
                    </div>
                </div>
                <div class="px-8 py-4">
                    <h3 class="text-rose-700 font-semibold">Booking Details</h3>
                    {!! Form::open(['route' => 'front.taxi.book.store', 'method' => 'post']) !!}
                    {!! Form::hidden('taxi_id', $taxi->id) !!}
                    {!! Form::hidden('user_id', getAuthenticatedUser('front', 'id')) !!}
                    {!! Form::hidden('booking_price', $taxi->price) !!}
                    {!! Form::hidden('price', $taxi->price ) !!}
                    {!! Form::hidden('bookable_name', $taxi->taxi->name ) !!}
                    {!! Form::hidden('from', $taxi->from ) !!}
                    {!! Form::hidden('to', $taxi->to ) !!}
                    {!! Form::hidden('name', getAuthenticatedUser('front', 'name')) !!}
                    {!! Form::hidden('email', getAuthenticatedUser('front', 'email')) !!}
                    {!! Form::hidden('address', getAuthenticatedUser('front', 'address')) !!}
                    {!! Form::hidden('phone', getAuthenticatedUser('front', 'phone')) !!}

                    <div class="grid grid-cols-2">
                        <div class="p-2">
                            <label class="block">
                                <span class="block text-base">Name</span>
                            </label>
                            {!! Form::text('name', old('name') ?? getAuthenticatedUser('front', 'name'), ['class' => $errors->first('name')  ? 'error-input' : 'text-input', 'placeholder' => 'Name']) !!}
                            @error('name')
                            <p class="validation-message"><span class="font-medium"></span> {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="p-2">
                            <label class="block">
                                <span class="block text-base">Email</span>
                            </label>
                            {!! Form::text('email', old('email') ?? getAuthenticatedUser('front', 'email'), ['class' => $errors->first('email')  ? 'error-input' : 'text-input', 'placeholder' => 'Email']) !!}
                            @error('email')
                            <p class="validation-message"><span class="font-medium"></span> {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="p-2">
                            <label class="block">
                                <span class="block text-base">Address</span>
                            </label>
                            {!! Form::text('address', old('user[0][address]') ?? getAuthenticatedUser('front', 'address'), ['class' => $errors->first('address')  ? 'error-input' : 'text-input', 'placeholder' => 'Address']) !!}
                            @error('address')
                            <p class="validation-message"><span class="font-medium"></span> {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="p-2">
                            <label class="block">
                                <span class="block text-base">Phone</span>
                            </label>
                            {!! Form::text('phone', old('phone') ?? getAuthenticatedUser('front', 'phone'), ['class' => $errors->first('phone')  ? 'error-input' : 'text-input', 'placeholder' => 'Phone']) !!}
                            @error('phone')
                            <p class="validation-message"><span class="font-medium"></span> {{ $message }}</p>
                            @enderror
                        </div>
                    </div>
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
