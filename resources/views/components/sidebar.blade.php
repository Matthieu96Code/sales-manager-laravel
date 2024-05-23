
<nav class="sidebar">
    <a class="profile-link" href="{{ route('profile') }}">
        <span class="main-icon user-icon">
            <x-iconsax-out-profile-circle />
        </span>
        <h1>{{Auth::user()->name}}</h1>
    </a>
    <h3 class="main-text menu-title">Menu</h3>
    
    <ul class="menu-list">
        <li class="menu-list-item">
            <a wire:navigate class="menu-list-link" href="{{ route('dashboard') }}">
                <span class="main-icon menu-icon">
                    {{-- <x-iconsax-lin-house /> --}}
                    <x-iconsax-out-graph />
                </span>
                <p>Dashboard</p>
            </a>
        </li>
        
        @if (Auth::user()->role > 0)
        <li class="menu-list-item">
            <a wire:navigate class="menu-list-link" href="{{ route('sales') }}">
                <span class="main-icon menu-icon">
                    <x-iconsax-out-status-up />
                </span>
                <p>Sales</p>
            </a>
        </li>
        @if (Auth::user()->role > 1)
        <li class="menu-list-item">
            <a wire:navigate class="menu-list-link" href="{{ route('products') }}">
                <span class="main-icon menu-icon">
                    <x-iconsax-bro-box-1 />
                </span>
                <p>Products</p>
            </a>
        </li>
        @endif
        <li class="menu-list-item">
            <a wire:navigate class="menu-list-link" href="{{ route('stores') }}">
                <span class="main-icon menu-icon">
                    <x-iconsax-bro-shop />
                </span>
                <p>Stores</p>
            </a>
        </li>
        
        <li class="menu-list-item">
            <a wire:navigate class="menu-list-link" href="{{ route('supplies') }}">
                <span class="main-icon menu-icon">
                    <x-iconsax-out-truck />
                </span>
                <p>Supplies</p>
            </a>
        </li>

        <li class="menu-list-item">
            <a wire:navigate class="menu-list-link" href="{{ route('customers') }}">
                <span class="main-icon menu-icon">
                    <x-iconsax-bro-people />
                </span>
                <p>customers</p>
            </a>
        </li>

        @if (Auth::user()->role > 1)
        <li class="menu-list-item">
            <a wire:navigate class="menu-list-link" href="{{ route('sellers') }}">
                <span class="main-icon menu-icon">
                    <x-iconsax-bro-personalcard />
                </span>
                <p>Sellers</p>
            </a>
        </li>
        @endif
        
        <li class="menu-list-item">
            <a wire:navigate class="menu-list-link" href="{{ route('sellers') }}">
                <span class="main-icon menu-icon">
                    <x-iconsax-bro-timer-1 />
                </span>
                <p>History</p>
            </a>
        </li>
        @endif
        <li class="menu-list-item">
            <a wire:navigate class="menu-list-link" href="{{ route('profile') }}">
                <span class="main-icon menu-icon">
                    <x-iconsax-lin-profile />
                </span>
                <p>Profile</p>
            </a>
        </li>
    </ul>

    {{-- <form class="logout-form" action="{{ url('logout') }}" method="post">
        @csrf --}}
        <div class="logout-form">
            <button wire:click="logout" class="logout-btn" type="button">
                <span class="main-icon menu-icon">
                    <x-iconsax-two-logout />
                </span>
                <p>Logout</p>
            </button>
        </div>
    {{-- </form> --}}

</nav>

{{-- <x-sidebar-modal name="sidebar" title="menu">
    <x-slot:body>
        <nav class="sidebar">
            <ul class="sidebar-menu menu-list">
                <li><a wire:navigate href="{{ route('products') }}">Products</a></li>
                <li><a wire:navigate href="{{ route('customers') }}">customers</a></li>
            </ul>
        </nav>
    </x-slot>
</x-sidebar-modal> --}}