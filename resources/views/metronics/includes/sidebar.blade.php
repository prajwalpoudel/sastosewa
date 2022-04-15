<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

    <!-- begin:: Aside -->
    <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
        <div class="kt-aside__brand-logo">
            <a href="demo12/index.html">
                <img alt="Logo" src="./assets/media/logos/logo-12.png">
            </a>
        </div>
        <div class="kt-aside__brand-tools">
            <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler"><span></span></button>
        </div>
    </div>

    <!-- end:: Aside -->

    <!-- begin:: Aside Menu -->
    <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1">
            <ul class="kt-menu__nav ">
                @foreach($menus as $menu)
                    @if(!count($menu->children))
                        <li class="kt-menu__item {{ $menu->active_class }}" aria-haspopup="true">
                            <a href="{{ route($menu->route) }}" class="kt-menu__link ">
                                <i class="kt-menu__link-icon {{ $menu->icon }}"></i>
                                <span class="kt-menu__link-text">{{ $menu->title }}</span>
                            </a>
                        </li>
                    @else
                        <li class="kt-menu__item  kt-menu__item--submenu {{ $menu->active_class }}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                                <i class="kt-menu__link-icon flaticon-layers"></i>
                                <span class="kt-menu__link-text">{{ $menu->title }}</span>
                                <span class="kt-menu__link-badge">
                                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                                </span>
                            </a>
                            <div class="kt-menu__submenu ">
                                <span class="kt-menu__arrow"></span>
                                <ul class="kt-menu__subnav">
                                    <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
                                        <span class="kt-menu__link">
                                            <span class="kt-menu__link-text">{{$menu->title}}</span>
                                        </span>
                                    </li>
                                    @foreach($menu->children as $child)
                                        @if(!count($child->children))
                                            <li class="kt-menu__item {{ $child->active_class }}" aria-haspopup="true" data-ktmenu-link-redirect="1">
                                                <a href="{{ route($child->route) }}" class="kt-menu__link ">
                                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                    <span class="kt-menu__link-text">{{ $child->title }}</span>
                                                </a>
                                            </li>
                                        @else
                                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                                <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="kt-menu__link-text">{{ $child->title }}</span>
                                                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                                                </a>
                                                <div class="kt-menu__submenu ">
                                                    <span class="kt-menu__arrow"></span>
                                                    <ul class="kt-menu__subnav">
                                                        @foreach($child->children as $grandChild)
                                                            <li class="kt-menu__item " aria-haspopup="true">
                                                                <a href="{{ route($grandChild->route) }}" class="kt-menu__link ">
                                                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--line">
                                                                        <span></span>
                                                                    </i>
                                                                    <span class="kt-menu__link-text">{{ $grandChild->title }}</span>
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>

    <!-- end:: Aside Menu -->
</div>
