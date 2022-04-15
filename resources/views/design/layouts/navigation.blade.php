<nav class="w-full h-14 flex justify-between bg-primary items-center text-white px-8">
    <div class="nav-logo">
        <p>Logo Here</p>
    </div>
    <div class="">
        <ul class="flex">
            <li class="nav-link">
                <a class="py-4" href="{{ url('design/home ') }}">
                    Home
                </a></li>
            <li class="nav-link">
                <a class="py-4" href="{{ url('design/about') }}">
                    About
                </a>
            </li>
            <li class="group nav-link dropdown-menu">
                <a href="javascript:void(0)" class="py-4" >
                    Services
                    <i class="fa-solid fa-angle-down text-xs"></i>
                </a>
                <div class="dropdown-content">
                    <div>
                        <a href="{{url('design/tickets')}}">Tickets</a>
                    </div>
                    <div>
                        <a href="{{url('design/tours')}}">Tours</a>
                    </div>
                    <div>
                        <a href="{{url('design/tours')}}">Driving School</a>
                    </div>
                    <div>
                        <a href="{{url('design/tours')}}">Labour (श्रम)</a>
                    </div>
                </div>
            </li>
            <li class="nav-link">
                <a class="py-4" href="{{ url('design/contact') }}">
                    Contact Us
                </a>
            </li>
        </ul>
    </div>
</nav>
