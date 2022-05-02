@extends('front.layouts.app')
@section('content')
    <section id="ticket-book-section">
        <div class="content-container text-neutral-700 tracking-wider text-lg my-8">
            {!! Form::model(request()->all(), ['route' => 'front.ticket.search', 'method' => 'get', 'id' => 'search-form']) !!}
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block">
                        <span class="block text-normal">First Name</span>
                    </label>
                    {!! Form::text('origin', null, ['class' => 'text-input', 'placeholder' => 'Origin']) !!}
                </div>
                <div>
                    <label class="block">
                        <span class="block text-normal">Middle Name</span>
                    </label>
                    {!! Form::text('destination', null, ['class' => 'text-input', 'placeholder' => 'Destination']) !!}
                </div>
                <div>
                    <label class="block">
                        <span class="block text-normal">Last Name</span>
                    </label>
                    {!! Form::date('date', null, ['class' => 'text-input', 'placeholder' => 'Departure Date']) !!}
                </div>
                <div>
                    <label class="block">
                        <span class="block text-normal">Email</span>
                    </label>
                    {!! Form::number('no_of_travellers', null, ['class' => 'text-input', 'placeholder' => 'No of Travellers']) !!}
                </div>
                <div>
                    <label class="block">
                        <span class="block text-normal">Mobile Number</span>
                    </label>
                    {!! Form::text('nationality', null, ['class' => 'text-input', 'placeholder' => 'Nationality']) !!}
                </div>
                <div>
                    <label class="block">
                        <span class="block text-normal">Nationality</span>
                    </label>
                    {!! Form::text('nationality', null, ['class' => 'text-input', 'placeholder' => 'Nationality']) !!}
                </div>
            </div>
            <div class="ticket-search-div">
                <button type="submit" class="ticket-search-button bg-rose-700">
                    <i class="fa fa-search px-2"> </i>
                    Search
                </button>
            </div>
            {!! Form::close() !!}

        </div>
    </section>
@endsection
