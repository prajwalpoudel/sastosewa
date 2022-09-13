@extends('front.layouts.app')

@section('content')
    <section id="contact-section">
        <div class="banner w-full h-72 bg-gray-100">
            <img class="w-full h-72 object-cover" src="{{ asset('images/boat.jpg') }}" alt="">
        </div>
        <div class="content-container">
            <div class="border-0 rounded-lg shadow-xl bg-white my-4">
                <div class="flex justify-between rounded-t-lg bg-gray-200 py-4">
                    <div class="">
                        <span class="text-base font-bold text-rose-700 pl-8">Change Password</span>
                    </div>
                </div>

                <div class="py-4">
                    <div class="grid grid-cols-1">
                        {!! Form::open( ['route' => 'auth.password.update', 'method' => 'post']) !!}
                        <div class="px-8">
                            <span class="text-sm ">Current Password : </span>
                            {!! Form::password('old_password', ['class' => ($errors->first('old_password') || session('incorrectOldPass')) ? 'error-input' : 'text-input']) !!}
                            @error('old_password')
                            <p class="validation-message"><span class="font-medium"></span> {{ $message }}</p>
                            @enderror
                            @if(session('incorrectOldPass'))
                                <p class="validation-message"><span class="font-medium"></span> {{ session('incorrectOldPass') }}</p>
                            @endif
                        </div>
                        <div class="px-8">
                            <span class="text-sm">New Password : </span>
                            {!! Form::password('password', ['class' => $errors->first('password')  ? 'error-input' : 'text-input']) !!}
                            @error('password')
                            <p class="validation-message"><span class="font-medium"></span> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-8">
                            <span class="text-sm">Confirm Password : </span>
                            {!! Form::password('password_confirmation', ['class' => $errors->first('password_confirmation')  ? 'error-input' : 'text-input']) !!}
                            @error('password_confirmation')
                            <p class="validation-message"><span class="font-medium"></span> {{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="button-div py-2">
                    <button type="submit" class="button bg-rose-700 px-8 pb-1">
                        Update
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection

