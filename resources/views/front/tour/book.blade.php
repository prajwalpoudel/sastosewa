@extends('front.layouts.app')
@section('content')
    <section id="ticket-book-section">
        <div class="content-container text-neutral-700 tracking-wider text-lg my-8">
            <div class="card bg-white p-4 mx-12 my-4">
                <div class="flex justify-center py-2">
                    <h3 class="text-rose-700 font-semibold text-center">{{ $tour->name}}</h3>
                </div>
                {!! Form::open(['route' => 'front.tour.book.store', 'method' => 'post']) !!}
                <div class="px-8 py-4">
                    <h3 class="text-rose-700 font-semibold">Trip Details</h3>
                    {!! Form::hidden('tour_id', $tour->id) !!}
                    {!! Form::hidden('user_id', getAuthenticatedUser('front', 'id')) !!}
                    {!! Form::hidden('booking_price', $tour->price * (request('no_of_travellers') ?? 1)) !!}
                    {!! Form::hidden('price', $tour->price ) !!}
                    {!! Form::hidden('bookable_name', $tour->name ) !!}
                    {!! Form::hidden('category_name', $tour->category->name ?? null ) !!}
                    {!! Form::hidden('code', $tour->code ) !!}
                    {!! Form::hidden('grade', $tour->grade ) !!}
                    {!! Form::hidden('seasons', $tour->seasons ) !!}
                    {!! Form::hidden('route', $tour->route ) !!}
                    <div class="grid grid-cols-2">
                        <div class="pt-2 px-2 flex justify-start">
                            <span class="text-base">Category: </span>
                            <span class="text-base">{{ $tour->category->name }}</span>
                        </div>
                        <div class="pt-2 px-2  flex justify-end">
                            <span class="text-base">Code: </span>
                            <span class="text-base">{{ $tour->code }}</span>
                        </div>
                        <div class="px-2 flex justify-start">
                            <span class="text-base">Grade: </span>
                            <span class="text-base">{{ $tour->grade }}</span>
                        </div>
                        <div class="px-2 flex justify-end">
                            <span class="text-base">Season: </span>
                            <span class="text-base">{{ $tour->seasons }}</span>
                        </div>
                        <div class="px-2 flex justify-start">
                            <span class="text-base">Route: </span>
                            <span class="text-base">{{ $tour->route }}</span>
                        </div>
                        <div class="px-2 flex justify-end">
                            <span class="text-base">Price: </span>
                            <span class="text-base">{{ $tour->price }}</span>
                        </div>
                    </div>
                </div>
                <div class="px-8">
                    <h3 class="text-rose-700 font-semibold">Booking Details</h3>
                    <div class="grid grid-cols-2">
                        <div class="p-2">
                            <label class="block">
                                <span class="block text-base">Departure Date</span>
                            </label>
                            {!! Form::date('departure_date', old('departure_date') ?? null, ['class' => $errors->first('departure_date')  ? 'error-input' : 'text-input', 'placeholder' => 'Departure Date']) !!}
                            @error('departure_date')
                            <p class="validation-message"><span class="font-medium"></span> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="p-2">
                            <label class="block">
                                <span class="block text-base">Arrival Date</span>
                            </label>
                            {!! Form::date('arrival_date', old('user[0][name]') ?? null, ['class' => $errors->first('arrival_date')  ? 'error-input' : 'text-input', 'placeholder' => 'Arrival Date']) !!}
                            @error('arrival_date')
                            <p class="validation-message"><span class="font-medium"></span> {{ $message }}</p>
                            @enderror
                        </div>
                    </div>
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
