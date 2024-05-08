
<nav class="sidebar">
    <ul class="sidebar-menu menu-list">
        <li><a wire:navigate href="{{ route('products') }}">Products</a></li>
        <li><a wire:navigate href="{{ route('customers') }}">customers</a></li>
    </ul>
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