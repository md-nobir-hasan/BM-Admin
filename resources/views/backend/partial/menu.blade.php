@if (check('Home'))
    <li class="nav-item">
        <a href="{{ route('admin') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
            <i class="nav-icon fas fa-home"></i>
            <p>Home</p>
        </a>
    </li>
@endif




{{-- Shipping Management  --}}
@if ($n =check('Wallet'))
    <li class="nav-item {{ Request::is('wallet/*') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
            <i class="fa-solid fa-truck-fast"></i>
            <p>
                Customer Wallets
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if ($n->show)
                <li class="nav-item">
                    <a href="{{ route('wallet.index') }}"
                        class="nav-link {{ Request::is('wallet/index') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>All Wallets</p>
                    </a>
                </li>
            @endif
            {{-- @if ($n->add)
                <li class="nav-item">
                    <a href="{{ route('shipping.create') }}"
                        class="nav-link {{ Request::is('shipping/create') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Add Shipping</p>
                    </a>
                </li>
            @endif --}}

        </ul>
    </li>
@endif

{{-- Blog Management  --}}
@if ($n =check('Blog'))
    <li class="nav-item {{ Request::is('blog/*') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
            <i class="fa-solid fa-blog"></i>
            <p>
                Blog
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if ($n->show)
                <li class="nav-item">
                    <a href="{{ route('blog.index') }}"
                        class="nav-link {{ Request::is('blog/index') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Show Blog</p>
                    </a>
                </li>
            @endif
            @if ($n->add)
                <li class="nav-item">
                    <a href="{{ route('blog.create') }}"
                        class="nav-link {{ Request::is('blog/create') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Add Blog</p>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif


{{-- Reviews Management --}}
{{-- <li class="nav-item {{ Request::is('reviews/*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link">
        <i class="fas fa-star"></i>
        <p>
            Reviews
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.reviews.index') }}" class="nav-link {{ Request::is('reviews/index') ? 'active' : '' }}">
                <i class="nav-icon far fa-circle"></i>
                <p>All Reviews</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.reviews.create') }}" class="nav-link {{ Request::is('reviews/create') ? 'active' : '' }}">
                <i class="nav-icon far fa-circle"></i>
                <p>Add Review</p>
            </a>
        </li>
    </ul>
</li> --}}

{{-- Setting  --}}
@if (check('Setting'))
    <li class="nav-item {{ Request::is('setting/*') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
            <i class="fa-solid fa-gear"></i>
            <p>
                Setting
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if ($n = check('Site Info'))
                <li class="nav-item">
                    <a href="{{ route('company-details.create') }}"
                        class="nav-link {{ Request::is('company-details/create') ? 'active' : '' }}">
                        <i class="fa-solid fa-circle-info"></i>
                        <p>Site Information</p>
                    </a>
                </li>
            @endif
            @if ($n = check('Features'))
                <li class="nav-item {{ Request::is('setting/features*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link">
                        <i class="fa-solid fa-pause"></i>
                        <p>Features <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if ($n->show)
                            <li class="nav-item">
                                <a href="{{ route('setting.feature.index') }}"
                                    class="nav-link {{ Request::is('setting/features') ? 'active' : '' }}">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>Show Features</p>
                                </a>
                            </li>
                        @endif
                        @if ($n->add)
                            <li class="nav-item">
                                <a href="{{ route('setting.feature.create') }}"
                                    class="nav-link {{ Request::is('setting/features/create') ? 'active' : '' }}">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>Add Features</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            @if ($n = check('Role'))
                <li class="nav-item {{ Request::is('setting/role/*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link">
                        <i class="fa-solid fa-dice-d6"></i>
                        <p>Role <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if ($n->show)
                            <li class="nav-item">
                                <a href="{{ route('setting.role.index') }}"
                                    class="nav-link {{ Request::is('setting/role/index') ? 'active' : '' }}">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>Show Role</p>
                                </a>
                            </li>
                        @endif
                        @if ($n->add)
                            <li class="nav-item">
                                <a href="{{ route('setting.role.create') }}"
                                    class="nav-link {{ Request::is('setting/role/create') ? 'active' : '' }}">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>Add Role</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            @if ($n = check('User Creation'))
                <li class="nav-item {{ Request::is('setting/user/*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link">
                        <i class="fa-solid fa-user"></i>
                        <p>User Creation <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if ($n->show)
                            <li class="nav-item">
                                <a href="{{ route('setting.user.index') }}"
                                    class="nav-link {{ Request::is('setting/user/index') ? 'active' : '' }}">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>Show User</p>
                                </a>
                            </li>
                        @endif
                        @if ($n->add)
                            <li class="nav-item">
                                <a href="{{ route('setting.user.create') }}"
                                    class="nav-link {{ Request::is('setting/user/create') ? 'active' : '' }}">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>Create User</p>
                                </a>
                            </li>
                        @endif

                    </ul>
                </li>
            @endif
            @if ($n = check('Site Setting'))
                <li class="nav-item">
                    <a href="{{ route('setting.site.create') }}"
                        class="nav-link {{ Request::is('setting/site-setting*') ? 'active' : '' }}">
                        <i class="fa-solid fa-gears"></i>
                        <p>Site-setting</p>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif


