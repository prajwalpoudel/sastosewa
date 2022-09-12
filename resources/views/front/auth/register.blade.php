@extends('front.layouts.app')
@section('content')
    <section id="ticket-book-section">
        <div class="content-container text-neutral-700 tracking-wider text-lg my-8">
            <div class="card bg-white p-4 mx-48 my-4">
                <div class="flex justify-center py-2">
                    <h3 class="text-rose-700 font-semibold text-center">Register</h3>
                </div>
                <div class="px-8 pt-4">
                    {!! Form::open(['route' => 'auth.register.store', 'method' => 'post']) !!}

                    <div>
                        <div>
                            <label class="block">
                                <span class="block text-normal">Name</span>
                            </label>
                            {!! Form::text('name', old('name'), ['class' => $errors->first('name')  ? 'error-input' : 'text-input', 'placeholder' => 'Name']) !!}
                            @error('name')
                            <p class="validation-message"><span class="font-medium"></span> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="pt-2">
                            <label class="block">
                                <span class="block text-normal">Email</span>
                            </label>
                            {!! Form::text('email', old('email'), ['class' => $errors->first('email')  ? 'error-input' : 'text-input', 'placeholder' => 'Email']) !!}
                            @error('email')
                            <p class="validation-message"><span class="font-medium"></span> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="pt-2">
                            <label class="block">
                                <span class="block text-normal">Address</span>
                            </label>
                            {!! Form::text('address', old('address'), ['class' => $errors->first('address')  ? 'error-input' : 'text-input', 'placeholder' => 'Address']) !!}
                            @error('address')
                            <p class="validation-message"><span class="font-medium"></span> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="pt-2">
                            <label class="block">
                                <span class="block text-normal">Phone</span>
                            </label>
                            {!! Form::text('phone', old('phone'), ['class' => $errors->first('phone')  ? 'error-input' : 'text-input', 'placeholder' => 'Phone']) !!}
                            @error('phone')
                            <p class="validation-message"><span class="font-medium"></span> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="pt-2">
                            <label class="block">
                                <span class="block text-normal">Password</span>
                            </label>
                            {!! Form::password('password', ['class' => $errors->first('password')  ? 'error-input' : 'text-input']) !!}
                            @error('password')
                            <p class="validation-message"><span class="font-medium"></span> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="pt-2">
                            <label class="block">
                                <span class="block text-normal">Confirm Password</span>
                            </label>
                            {!! Form::password('password_confirmation', ['class' => $errors->first('password_confirmation')  ? 'error-input' : 'text-input']) !!}
                            @error('password_confirmation')
                            <p class="validation-message"><span class="font-medium"></span> {{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="button-div py-2">
                        <button type="submit" class="button bg-rose-700 px-8">
                            Register
                        </button>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="flex justify-center pb-2">
                    <p class="text-base">Already have an account? <a href="{{ route('auth.login') }}" class="text-rose-700"> Sign In </a> </p>
                </div>
            </div>
        </div>
    </section>
@endsection
