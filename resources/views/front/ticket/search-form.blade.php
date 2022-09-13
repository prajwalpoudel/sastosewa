
        <div>
            <label class="block ticket-input-label">
                <span class="block text-normal">Origin</span>
            </label>
            {!! Form::text('origin', null, ['class' => 'text-input', 'placeholder' => 'Origin']) !!}
        </div>
        <div>
            <label class="block ticket-input-label">
                <span class="block text-normal">Destination</span>
            </label>
            {!! Form::text('destination', null, ['class' => 'text-input', 'placeholder' => 'Destination']) !!}
        </div>
        <div>
            <label class="block ticket-input-label">
                <span class="block text-normal">Departure Date</span>
            </label>
            {!! Form::date('date', null, ['class' => 'text-input', 'placeholder' => 'Departure Date']) !!}
        </div>
        <div>
            <label class="block ticket-input-label">
                <span class="block text-normal">No. of Travellers</span>
            </label>
            {!! Form::number('no_of_travellers', null, ['class' => 'text-input', 'placeholder' => 'No of Travellers']) !!}
        </div>
        <div>
            <label class="block ticket-input-label">
                <span class="block text-normal">Nationality</span>
            </label>
            {!! Form::text('nationality', null, ['class' => 'text-input', 'placeholder' => 'Nationality']) !!}
        </div>
        <div class="ticket-search-div">
            <button type="submit" class="ticket-search-button bg-rose-700">
                <i class="fa fa-search px-2"> </i>
                Search
            </button>
        </div>

