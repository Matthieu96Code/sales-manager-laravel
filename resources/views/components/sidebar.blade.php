
<nav class="sidebar">
    <a class="profile-link" href="">
        <span class="main-icon user-icon">
            <x-iconsax-out-profile-circle />
        </span>
        <h1>User</h1>
    </a>
    <h3 class="main-text menu-title">Menu</h3>
    <ul class="menu-list">
        <li class="menu-list-item">
            <a wire:navigate class="menu-list-link" href="{{ url('users.home') }}">
                <span class="main-icon menu-icon">
                    <x-iconsax-lin-house />
                </span>
                <p>Accueil</p>
            </a>
        </li>
        <li class="menu-list-item">
            <a wire:navigate class="menu-list-link" href="{{ route('products') }}">
                <span class="main-icon menu-icon">
                    <x-iconsax-lin-card-add />
                </span>
                <p>Products</p>
            </a>
        </li>
        <li class="menu-list-item">
            <a wire:navigate class="menu-list-link" href="{{ route('customers') }}">
                <span class="main-icon menu-icon">
                    <x-iconsax-lin-document-text-1 />
                </span>
                <p>customers</p>
            </a>
        </li>
    </ul>

    <form class="logout-form" action="{{ url('logout') }}" method="post">
        @csrf
        <button class="logout-btn" type="submit">
            <span class="main-icon menu-icon">
                <x-iconsax-two-logout />
            </span>
            <p>Déconnexion</p>
        </button>
    </form>

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