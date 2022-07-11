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
                    <div>
                        <a href="{{url('design/tours')}}">Driving School</a>
                    </div>
                    <div>
                        <a href="{{url('design/tours')}}">Labour (श्रम)</a>
                    </div>
                </div>
            </li>
            <li class="nav-link {{ getActiveNavClass('front.contact.index') }}">
                <a class="py-4" href="{{ route('front.contact.index') }}">
                    Contact Us
                </a>
            </li>
        </ul>
    </div>
</nav>
