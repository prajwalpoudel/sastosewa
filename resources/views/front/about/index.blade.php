@extends('front.layouts.app')
@section('content')
    <section id="about-section">
        <div class="content-container my-2">
            <div class="first_section">
                <div class="grid md:grid-cols-4 md:gap-4">
                    <div class="md:col-span-3">
                        <div class="text-title text-capitalize font-medium">
                            <p>{{ $sections['about_about']['title'] ?? null }}</p>
                        </div>
                        <div class="about-content my-2">
                            <p>{!!  $sections['about_about']['description'] ?? null !!}
                            </p>
                        </div>
                    </div>
                    <div class="hidden md:block md:col-span-1">
                        <div>
                            <div class="text-title font-small text-center">
                                <p>Our Services</p>
                            </div>
                            <div class="card my-2 text-center md:text-left">
                                <div class="divide-y-2">
                                    <div class="px-4 py-4 text-lg">
                                        <a class="text-rose-700 hover:text-primary"
                                           href="{{ route('front.ticket.index') }}">
                                            Tickets
                                        </a>
                                    </div>
                                    <div class="px-4 py-4 text-lg">
                                        <a class="text-rose-700 hover:text-primary" href="{{ route('front.tour.index') }}">
                                            Tours
                                        </a>
                                    </div>
                                    <div class="px-4 py-4 text-lg">
                                        <a class="text-rose-700 hover:text-primary" href="{{ url('design/tours') }}">
                                            Driving School
                                        </a>
                                    </div>
                                    <div class="px-4 py-4 text-lg">
                                        <a class="text-rose-700 hover:text-primary" href="{{ url('design/tours') }}">
                                            Labour
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div>
                            <div class="text-title font-small text-center">
                                <p>Quick Links</p>
                            </div>
                            <div class="card my-2 text-center md:text-left">
                                <div class="divide-y-2">
                                    <div class="px-4 py-4 text-lg">
                                        <a class="text-rose-700 hover:text-primary"
                                           href="{{ route('front.index') }}">
                                            Home
                                        </a>
                                    </div>
                                    <div class="px-4 py-4 text-lg">
                                        <a class="text-rose-700 hover:text-primary"
                                           href="{{ route('front.ticket.index') }}">
                                            Tickets
                                        </a>
                                    </div>
                                    <div class="px-4 py-4 text-lg">
                                        <a class="text-rose-700 hover:text-primary" href="{{ route('front.tour.index') }}">
                                            Tours
                                        </a>
                                    </div>
                                    <div class="px-4 py-4 text-lg">
                                        <a class="text-rose-700 hover:text-primary" href="{{ url('front.tour.index') }}">
                                            Driving School
                                        </a>
                                    </div>
                                    <div class="px-4 py-4 text-lg">
                                        <a class="text-rose-700 hover:text-primary" href="{{ url('front.labour.index') }}">
                                            Labour
                                        </a>
                                    </div>
                                    <div class="px-4 py-4 text-lg">
                                        <a class="text-rose-700 hover:text-primary" href="{{ url('front.contact.index') }}">
                                            Contact
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
@endpush
