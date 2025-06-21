<aside class="main-sidebar sidebar-dark-primary elevation-4">
    @php
        $company_info = App\Models\CompanyInfo::first();
    @endphp
    <a href="{{ route('admin') }}" target="blank" class="brand-link text-center">
        <img src="{{ asset($company_info->logo) }}"
            alt="" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">
            @if (isset($company_info->name))
                {{ $company_info->name }} @else{{ 'Ecommerce Website' }}
            @endif

        </span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @include('backend.partial.menu')
            </ul>
        </nav>
    </div>

</aside>
