<h2 id="accordion-collapse-heading-1" class="mt-2">
    <button type="button" class="accordion-button" data-accordion-target="#accordion-collapse-body-1" aria-expanded="false" aria-controls="accordion-collapse-body-1">
        <span class="text-rose-700">Ticket Bookings</span>
        <svg data-accordion-icon="" class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd">
            </path>
        </svg>
    </button>
</h2>

<div id="accordion-collapse-body-1" class="border border-t-0 border-gray-200 hidden" aria-labelledby="accordion-collapse-heading-1">
    <div>
        <div class="card bg-white p-4 mx-4 mb-4">
            <div class="grid grid-cols-5 gap-2 justify-between">
                <div class="font-bold">
                    <h3>Date</h3>
                </div>
                <div class="font-bold">
                    <h3>From</h3>
                </div>
                <div class="font-bold">
                    <h3>To</h3>
                </div>
                <div class="font-bold">
                    <h3>Price</h3>
                </div>
                <div class="font-bold">
                    <h3>Action</h3>
                </div>
                @forelse($ticketBookings as $booking)
                    <div>
                        <p>{{ \Carbon\Carbon::parse($booking->created_at)->toFormattedDateString() }}</p>
                    </div>
                    <div>
                        <p>{{ $booking->taxiDetail->from ?? null }}</p>
                    </div>
                    <div>
                        <p>{{ $booking->taxiDetail->to ?? null }}</p>
                    </div>
                    <div>
                        <p>{{ $booking->taxiDetail->price ?? null }}</p>
                    </div>
                    <div>
                        <h3>Action</h3>
                    </div>
                @empty
                    <p>No Taxi Bookings Found</p>
                @endforelse
            </div>

        </div>
    </div>
</div>
