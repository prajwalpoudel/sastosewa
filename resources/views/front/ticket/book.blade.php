@extends('front.layouts.app')
@section('content')
    <section id="ticket-book-section">
        <div class="content-container text-neutral-700 tracking-wider text-lg my-8">
            <div class="card bg-white p-4 mx-12 my-4">
                <div class="grid grid-cols-3 gap-2 justify-between">
                    <div class="from ">
                        <h3 class="text-right text-rose-700 font-semibold">{{ $ticket->from }}</h3>
                    </div>
                    <div class="flex justify-center">
                        <img src="{{ getImageUrl($ticket->brand->logo) }} "
                             class="w-12 h-12 object-cover object-center" alt="">
                    </div>
                    <div class="to ">
                        <h3 class="text-left text-rose-700 font-semibold">{{ $ticket->to }}</h3>
                    </div>
                </div>
                <div class="flex justify-center py-2">
                    <h3 class="text-rose-700 font-semibold text-center">NRs {{ $ticket->price * (request('no_of_travellers') ?? 1)}}</h3>
                </div>
                {!! Form::open(['route' => 'front.ticket.book.store', 'method' => 'post']) !!}
                <div class="px-8 py-4">
                    <h3 class="text-rose-700 font-semibold">{{ $ticket->category->name }} Trip Details</h3>
                    {!! Form::hidden('ticket_id', $ticket->id) !!}
                    {!! Form::hidden('user_id', getAuthenticatedUser('front', 'id')) !!}
                    {!! Form::hidden('booking_price', $ticket->price * (request('no_of_travellers') ?? 1)) !!}
                    {!! Form::hidden('price', $ticket->price ) !!}
                    {!! Form::hidden('from', $ticket->from ) !!}
                    {!! Form::hidden('to', $ticket->to ) !!}
                    {!! Form::hidden('departure_address', null ) !!}
                    {!! Form::hidden('arrival_address', null ) !!}
                    {!! Form::hidden('departure_date', $ticket->date ) !!}
                    {!! Form::hidden('departure_time', $ticket->departure_time ) !!}
                    {!! Form::hidden('arrival_date', null ) !!}
                    {!! Form::hidden('arrival_time', $ticket->arrival_time ) !!}
                    <div class="grid grid-cols-2">
                        <div class="p-2">
                            <p class="text-base">Tribhuwan International Airport, Kathmandu, Nepal</p>
                            <p class="text-base">10:00 AM, Thu, Sep 15, 2022</p>
                        </div>
                        <div class="p-2">
                            <p class="text-base">Doha International Airport, Quatar</p>
                            <p class="text-base">10:00 AM, Thu, Sep 15, 2022</p>

                        </div>
                    </div>
                </div>
                <div class="px-8">
                    <h3 class="text-rose-700 font-semibold">Booking Details</h3>
                    <span class="text-sm py-2 text-rose-700">Passenger Details</span>
                    <div class="grid grid-cols-2">
                        <div class="p-2">
                            <label class="block">
                                <span class="block text-base">Name</span>
                            </label>
                            {!! Form::text('user[0][name]', old('user[0][name]') ?? getAuthenticatedUser('front', 'name'), ['class' => $errors->first('user.0.name')  ? 'error-input' : 'text-input', 'placeholder' => 'Name']) !!}
                            @error('user.0.name')
                            <p class="validation-message"><span class="font-medium"></span> {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="p-2">
                            <label class="block">
                                <span class="block text-base">Email</span>
                            </label>
                            {!! Form::text('user[0][email]', old('user[0][email]') ?? getAuthenticatedUser('front', 'email'), ['class' => $errors->first('user.0.email')  ? 'error-input' : 'text-input', 'placeholder' => 'Email']) !!}
                            @error('user.0.email')
                            <p class="validation-message"><span class="font-medium"></span> {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="p-2">
                            <label class="block">
                                <span class="block text-base">Address</span>
                            </label>
                            {!! Form::text('user[0][address]', old('user[0][address]') ?? getAuthenticatedUser('front', 'address'), ['class' => $errors->first('user.0.address')  ? 'error-input' : 'text-input', 'placeholder' => 'Address']) !!}
                            @error('user.0.address')
                            <p class="validation-message"><span class="font-medium"></span> {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="p-2">
                            <label class="block">
                                <span class="block text-base">Phone</span>
                            </label>
                            {!! Form::text('user[0][phone]', old('user[0][phone]') ?? getAuthenticatedUser('front', 'phone'), ['class' => $errors->first('user.0.phone')  ? 'error-input' : 'text-input', 'placeholder' => 'Phone']) !!}
                            @error('user.0.phone')
                            <p class="validation-message"><span class="font-medium"></span> {{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    @for($i=1; $i<request()->input('no_of_travellers'); $i++)
                        <span class="text-sm py-2 text-rose-700">Passenger {{ $i+1 }} Details</span>
                        <div class="grid grid-cols-2">
                        <div class="p-2">
                            <label class="block">
                                <span class="block text-base">Name</span>
                            </label>
                            {!! Form::text('user['.$i.'][name]', old('user['.$i.'][name]') ?? null, ['class' => $errors->first('user.'.$i.'.name')  ? 'error-input' : 'text-input', 'placeholder' => 'Name']) !!}
                            @error('user.'.$i.'.name')
                            <p class="validation-message"><span class="font-medium"></span> {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="p-2">
                            <label class="block">
                                <span class="block text-base">Email</span>
                            </label>
                            {!! Form::text('user['.$i.'][email]', old('user['.$i.'][email]') ?? null, ['class' => $errors->first('user.'.$i.'.email')  ? 'error-input' : 'text-input', 'placeholder' => 'Email']) !!}
                            @error('user.'.$i.'.email')
                            <p class="validation-message"><span class="font-medium"></span> {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="p-2">
                            <label class="block">
                                <span class="block text-base">Address</span>
                            </label>
                            {!! Form::text('user['.$i.'][address]', old('user['.$i.'][address]') ?? null, ['class' => $errors->first('user.'.$i.'.address')  ? 'error-input' : 'text-input', 'placeholder' => 'Address']) !!}
                            @error('user.'.$i.'.address')
                            <p class="validation-message"><span class="font-medium"></span> {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="p-2">
                            <label class="block">
                                <span class="block text-base">Phone</span>
                            </label>
                            {!! Form::text('user['.$i.'][phone]', old('user['.$i.'][phone]') ?? null, ['class' => $errors->first('user.'.$i.'.phone')  ? 'error-input' : 'text-input', 'placeholder' => 'Phone']) !!}
                            @error('user.'.$i.'.address')
                            <p class="validation-message"><span class="font-medium"></span> {{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    @endfor

                </div>
                <div class="button-div py-4">
                    <button type="submit" class="button bg-rose-700 px-8">
                        Submit
                    </button>
                </div>
                {!! Form::close() !!}
                </div>
        </div>
    </section>
@endsection
