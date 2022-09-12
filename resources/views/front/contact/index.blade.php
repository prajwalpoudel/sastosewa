@extends('front.layouts.app')

@section('content')
    <section id="contact-section">
        <div class="banner w-full h-72 bg-gray-100">
            <img class="w-full h-72 object-cover" src="{{ asset('images/boat.jpg') }}" alt="">
        </div>
        <div class="content-container">
            <div class="md:grid md:grid-cols-2 md:gap-16 my-4">
                <div class="contact-form">
                    <p class="text-xl text-zinc-800 font-medium">Contact Form</p>
                    <div class="grid my-4">
                        <form action="{{ route('front.contact.store') }}" method="post" id="contact-form">
                            @csrf
                            <div class="mb-2">
                                <label class="block">
                                    <span class="{{ $errors->first('name') ? 'error-label block text-normal' : 'block text-normal'}}">Full Name</span>
                                </label>
                                <input type="text" value="{{ old('name') ?? null }}" placeholder="Full Name" name="name" class="{{ $errors->first('name') ? 'error-input' : 'text-input'}}"/>
                                @error('name')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label class="block">
                                    <span class="{{ $errors->first('email') ? 'error-label block text-normal' : 'block text-normal'}}">Email</span>
                                </label>
                                <input type="text" value="{{ old('email') ?? null }}" placeholder="Email" name="email" class="{{ $errors->first('email') ? 'error-input' : 'text-input'}}"/>
                                @error('email')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label class="block">
                                    <span class="{{ $errors->first('phone') ? 'error-label block text-normal' : 'block text-normal'}}">Phone</span>
                                </label>
                                <input type="text" value="{{ old('phone') ?? null }}" placeholder="Phone" name="phone" class="{{ $errors->first('phone') ? 'error-input' : 'text-input'}}"/>
                                @error('phone')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label class="block">
                                    <span class="{{ $errors->first('message') ? 'error-label block text-normal' : 'block text-normal'}}">Message</span>
                                </label>
                                <textarea placeholder="Your message" name="message" class="{{ $errors->first('message') ? 'error-input resize-none' : 'text-input resize-none'}}"> {{ old('message') ?? null }} </textarea>
                                @error('message')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                                @enderror
                            </div>

                            <div class="cursor-pointer my-2 read-more-button" id="contact-div">
                                <button id="contact-submit-button" type="submit">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>

                <div class="contact">
                    <p class="text-xl text-zinc-800 font-medium">Contact Details</p>
                    <div class="flex flex-col w-full my-4">
                        <div class="grid grid-cols-2 gaps-8">
                            <div>
                                <div class="flex items-center">
                                    <i class="fa-solid fa-location-dot p-2"></i>
                                    <p>Kanchanbari, Biratnagar</p>
                                </div>
                                <div class="flex items-center">
                                    <i class="fa-solid fa-envelope p-2"></i>
                                    <p>prajwalpoudel2002@gmail.com</p>
                                </div>
                                <div class="flex items-center">
                                    <i class="fa-solid fa-phone p-2"></i>
                                    <p>9862078434</p>
                                </div>
                                <div class="flex items-center">
                                    <i class="fa-brands fa-whatsapp p-2"></i>
                                    <p>9862078434</p>
                                </div>
                            </div>
                            <div>
                                <p>Follow us on</p>
                                <div class="py-5">
                                    <i class="fa-brands fa-facebook text-4xl px-2"></i>
                                    <i class="fa-brands fa-instagram text-4xl px-2"></i>
                                    <i class="fa-brands fa-twitter text-4xl px-2"></i>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3571.821433829939!2d87.27615371498817!3d26.461484283323962!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ef7441a7505419%3A0x844447804f9bbd5c!2sStar%20Dental%20Hospital!5e0!3m2!1sen!2snp!4v1648528057822!5m2!1sen!2snp"
                            width="600" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
            $("#contact-div").click(function () {
                $("#contact-form").submit();
            });
    </script>
@endpush
