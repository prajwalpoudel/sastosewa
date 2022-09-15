<nav class="w-full h-14 flex justify-between bg-primary items-center text-white px-8">
    <div class="nav-logo">
        <p>Logo Here</p>
    </div>
    <div class="hidden md:block">
        <ul class="flex">
            <li class="nav-link {{ getActiveNavClass('front.index') }}">
                <a class="py-4" href="{{ route('front.index') }}">
                    Home
                </a></li>
            <li class="nav-link {{ getActiveNavClass('front.about.index') }}">
                <a class="py-4" href="{{ route('front.about.index') }}">
                    About
                </a>
            </li>
            <li class="group nav-link {{ getActiveNavClass(['front.ticket.index', 'front.tour.index']) }} dropdown-menu">
                <a href="javascript:void(0)" class="py-4" >
                    Services
                    <i class="fa-solid fa-angle-down text-xs"></i>
                </a>
                <div class="dropdown-content">
                    <div class="{{ getActiveNavClass('front.ticket.index') }}">
                        <a href="{{ route('front.ticket.index') }}">Tickets</a>
                    </div>
                    <div class="{{ getActiveNavClass('front.tour.index') }}">
                        <a href="{{ route('front.tour.index') }}">Tours</a>
                    </div>
                    <div class="{{ getActiveNavClass('front.taxi.index') }}">
                        <a href="{{ route('front.taxi.index') }}">Taxi Service</a>
                    </div>
                    <div>
                        <a href="{{url('design/tours')}}">Driving School</a>
                    </div>
                    <div>
                        <a href="{{route('front.labor.index')}}">Labour (श्रम)</a>
                    </div>
                </div>
            </li>
            <li class="nav-link {{ getActiveNavClass('front.contact.index') }}">
                <a class="py-4" href="{{ route('front.contact.index') }}">
                    Contact Us
                </a>
            </li>
            @if($user = Auth::guard('front')->user())
                <li class="group nav-link {{ getActiveNavClass(['front.profile.index', 'front.bookings.index']) }} dropdown-menu">
                    <a class="py-4" href="javascript:void(0)">
                        {{ explode(" ", $user->name)[0] }}
                        <i class="fa-solid fa-angle-down text-xs"></i>
                    </a>
                    <div class="dropdown-content">
                        <div class="{{ getActiveNavClass('front.profile.index') }}">
                            <a href="{{ route('front.profile.index') }}">Profile</a>
                        </div>
                        <div class="{{ getActiveNavClass('front.bookings.index') }}">
                            <a href="{{ route('front.bookings.index') }}">Bookings</a>
                        </div>
                        <div>
                            <a href="{{ route('auth.logout') }}"
                               onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>

                            <form id="logout-form" action="{{ route('auth.logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>

                </li>


            @endif
        </ul>
    </div>
</nav>
