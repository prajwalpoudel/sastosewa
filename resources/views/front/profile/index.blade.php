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
                        <span class="text-base font-bold text-rose-700 pl-8">My Profile</span>
                    </div>
                    <div class="text-white pr-8">
                        <a href="{{ route('auth.password.index') }}" class=" bg-rose-700 py-2 rounded-xl px-8">Change password</a>
                        <a href="{{ route('front.profile.edit') }}" class=" bg-rose-700 py-2 rounded-xl px-8">Edit</a>
                    </div>
                </div>

                <div class="py-4">
                    <div class="grid grid-cols-1">
                        <div class="flex">
                            <span class="text-sm px-8">Name : </span>
                            <span class="text-sm px-8">{{ getAuthenticatedUser('front', 'name') }} </span>
                        </div>
                        <div class="flex">
                            <span class="text-sm px-8">Email : </span>
                            <span class="text-sm px-8">{{ getAuthenticatedUser('front', 'email') }} </span>
                        </div>
                        <div class="flex">
                            <span class="text-sm px-8">Address : </span>
                            <span class="text-sm px-8">{{ getAuthenticatedUser('front', 'address') }} </span>
                        </div>
                        <div class="flex">
                            <span class="text-sm px-8">Phone : </span>
                            <span class="text-sm px-8">{{ getAuthenticatedUser('front', 'phone') }} </span>
                        </div>
                    </div>
                </div>
                <div class="py-4 flex justify-center">
                    <a href="{{ route('front.bookings.index') }}" class="text-sm text-rose-700">View Bookings</a>
                </div>
            </div>
            </div>
    </section>
@endsection

