@extends('front.layouts.app')
@section('content')
    <section id="ticket-book-section">
        <div class="content-container text-neutral-700 tracking-wider text-lg my-8">
            <div class="card bg-white p-4 mx-48 my-4">
                <div class="flex justify-center py-2">
                    <h3 class="text-rose-700 font-semibold text-center">Login</h3>
                </div>
                <div class="px-8 pt-4">
                    {!! Form::open(['route' => 'auth.login.store', 'method' => 'post']) !!}

                    <div class="grid">
                        <div>
                            <label class="block">
                                <span class="block text-normal">Email</span>
                            </label>
                            {!! Form::text('email', null, ['class' => 'text-input', 'placeholder' => 'Email']) !!}
                        </div>
                        <div class="py-4">
                            <label class="block">
                                <span class="block text-normal">Password</span>
                            </label>
                            {!! Form::password('password', ['class' => 'text-input', 'placeholder' => 'Password']) !!}
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <a href="" class="text-rose-700 text-base">Forgot password?</a>
                    </div>
                    <div class="button-div py-2">
                        <button type="submit" class="button bg-rose-700 px-8">
                            Login
                        </button>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="flex justify-center pb-2">
                    <p class="text-base">Don't have an account? <a href="{{ route('auth.register') }}" class="text-rose-700"> Sign Up </a> </p>
                </div>
            </div>
        </div>
    </section>
@endsection
