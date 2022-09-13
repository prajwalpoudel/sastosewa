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
                        <span class="text-base font-bold text-rose-700 pl-8">Edit Profile</span>
                    </div>
                </div>

                <div class="py-4">
                    <div class="grid grid-cols-1">
                        {!! Form::model($user, ['route' => ['front.profile.update', encrypt($user->id)], 'method' => 'patch']) !!}
                        <div class="px-8">
                            <span class="text-sm ">Name : </span>
                            {!! Form::text('name', null, ['class' => $errors->first('name')  ? 'error-input' : 'text-input', 'placeholder' => 'Name']) !!}
                            @error('name')
                            <p class="validation-message"><span class="font-medium"></span> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-8">
                            <span class="text-sm">Email : </span>
                            {!! Form::text('email', null, ['class' => $errors->first('email')  ? 'error-input' : 'text-input', 'placeholder' => 'Email']) !!}
                            @error('email')
                            <p class="validation-message"><span class="font-medium"></span> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-8">
                            <span class="text-sm">Address : </span>
                            {!! Form::text('address', null, ['class' => $errors->first('address')  ? 'error-input' : 'text-input', 'placeholder' => 'Address']) !!}
                            @error('address')
                            <p class="validation-message"><span class="font-medium"></span> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-8">
                            <span class="text-sm">Phone : </span>
                            {!! Form::text('phone', null, ['class' => $errors->first('phone')  ? 'error-input' : 'text-input', 'placeholder' => 'Phone']) !!}
                            @error('phone')
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

