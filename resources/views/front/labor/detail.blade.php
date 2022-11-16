@extends('front.layouts.app')
@section('content')
    <section id="tickets-section">
        <div class="banner w-full h-72 bg-gray-100">
            <img class="w-full h-72 object-cover opacity-60" src="{{ asset('images/everest.jpg') }}" alt="">
        </div>

        <div class="content-container text-neutral-700 tracking-wider text-lg">
            <div class="labor_section my-4 px-8">
                <div class="text-title text-capitalize my-2 font-bold">
                    <p>{{ $labor->country->name ?? null }}</p>
                </div>
                <div class="text-base">
                    <p class="text-rose-700 font-bold">Description</p>
                    {!! $labor->country->description ?? null !!}
                </div>
                <div class="text-base my-2">
                    <p class="text-rose-700 font-bold">Documents</p>
                    @forelse($labor->documents as $document)
                        <div class="py-2">
                            <p class="font-medium">{{ $document->title }}</p>
                            <div class="px-2 grid md:grid-cols-3 md:gap-2">
                                @forelse($document->medias as $media)
                                    <div class="py-2">
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($media->media) }}" alt="" class="h-60">
                                    </div>
                                @empty
                                    <div class="py-2">
                                        <p>No media found</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    @empty
                        <div class="py-2">
                            <p class="font-medium">No Documents Found</p>
                        </div>
                    @endforelse

                </div>
            </div>
            <div class="px-8 pb-2">
                <div class="text-base">
                    <p class="text-rose-700 font-bold">For More Details:</p>
                    <div class="flex py-1">
                        <i class="pr-2 py-1 fa-brands fa-whatsapp"></i>
                        <p>9862078434</p>
                    </div>
                    <div class="flex py-1">
                        <i class="pr-2 py-1 fa fa-phone"></i>
                        <p>9862078434</p>
                    </div>
                    <div class="flex py-1">
                        <i class="pr-2 py-1 fa-brands fa-viber"></i>
                        <p>9862078434</p>
                    </div>
                </div>
            </div>
            <div class="py-2 px-8">
                <a href="{{ route('front.labor.index') }}" class="text-rose-700 text-base underline underline-offset-4">Go
                    Back</a>
            </div>
        </div>
    </section>
@endsection
